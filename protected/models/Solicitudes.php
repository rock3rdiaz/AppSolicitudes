<?php

/**
 * This is the model class for table "solicitudes".
 *
 * The followings are the available columns in table 'solicitudes':
 * @property integer $idSolicitud
 * @property string $fecha_envio
 * @property string $descripcion
 * @property string $idUsuario_origen
 * @property string $estado
 * @property integer $idPrioridad
 * @property integer $idCategoria
 * @property string $idUsuario_destino
 * @property string $adjunto
 * @property integer $idArea_origen
 * @property string $idUsuario_temporal
 *
 * The followings are the available model relations:
 * @property Respuestas[] $respuestases
 * @property AclaracionesSolicitudes[] $aclaracionesSolicitudes
 * @property Areas $idAreaOrigen
 * @property Categorias $idCategoria0
 * @property Prioridades $idPrioridad0
 */
class Solicitudes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Solicitudes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'solicitudes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_envio, descripcion, idUsuario_origen, estado, idPrioridad, idCategoria, idArea_origen, idUsuario_temporal', 'required'),
			array('idPrioridad, idCategoria, idArea_origen', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>8000),
			array('idUsuario_origen, idUsuario_destino, idUsuario_temporal', 'length', 'max'=>4),
			array('estado', 'length', 'max'=>65),
			array('adjunto', 'length', 'max'=>300),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idSolicitud, fecha_envio, descripcion, idUsuario_origen, estado, idPrioridad, idCategoria, idUsuario_destino, idArea_origen, idUsuario_temporal', 'safe', 'on'=>'search'),
			array('adjunto', 'file', 'types'=>'jpg, gif, png, xlsx, xls, docx, doc, txt', 'allowEmpty'=>true), 
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'respuestases' => array(self::HAS_MANY, 'Respuestas', 'idSolicitud'),
			'aclaracionesSolicitudes' => array(self::HAS_MANY, 'AclaracionesSolicitudes', 'idSolicitud'),
			'idAreaOrigen' => array(self::BELONGS_TO, 'Areas', 'idArea_origen'),
			'idCategoria0' => array(self::BELONGS_TO, 'Categorias', 'idCategoria'),
			'idPrioridad0' => array(self::BELONGS_TO, 'Prioridades', 'idPrioridad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idSolicitud' => 'Id Solicitud',
			'fecha_envio' => 'Fecha de envio',
			'descripcion' => 'Descripcion',
			'idUsuario_origen' => 'Id remitente',
			'estado' => 'Estado',
			'idPrioridad' => 'Id Prioridad',
			'idCategoria' => 'Id Categoria',
			'idUsuario_destino' => 'Id destinatario',
			'adjunto' => 'Adjunto',
			'idArea_origen' => 'Area de origen',
			'idUsuario_temporal' => 'Posible destinatario',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @summary: Metodo que permite obtener solo las solicitudes enviadas por cada usuario o dadas por cada usuario. Solo usado por los usuarios que envian solicitudes
	 * @param  [string] $tipo_usuario [Tipo de usuario: puede ser 'externo' o 'sistema']
	 * @param  [int] $id_usuario [Id del usuario que envio la solicitud que ha sido contestada.]
	 * 
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($args =  null)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;	

		/*Se han enviado condiciones?*/
		if($args !== null){
			/*Adicionamos las condiciones enviadas desde cada modulo*/
			foreach($args as $key=>$value){
				if($value == 'is NULL'){
					//$criteria->condition = "$key $value";
					$criteria->addCondition("$key $value");
				}
				else{
					//$criteria->condition = "$key  = '$value'";
					$criteria->addCondition("$key  = '$value'");
				}			
			}	
		}

		$criteria->compare('idSolicitud',$this->idSolicitud);
		$criteria->compare('fecha_envio',$this->fecha_envio,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('idUsuario_origen',$this->idUsuario_origen);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('idPrioridad',$this->idPrioridad);
		$criteria->compare('idCategoria',$this->idCategoria);
		$criteria->compare('idUsuario_destino',$this->idUsuario_destino);
		$criteria->compare('idArea_origen',$this->idArea_origen);
		$criteria->compare('adjunto',$this->adjunto,true);
		$criteria->order = 'fecha_envio desc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @summary: Metodo que retorna el numero de respuestas que no ha puntuado el usuario suyo codigo se recibe como parametro.
	 * @param  [int] $id_usuario_origen [Codigo de nomina del usuario origen]
	 * @return [int] $num               [Numero de solicitudes sin puntuar]
	 */
	public function getNumSolicitudePorPuntuar($id_usuario_origen){
		$criteria = new CDbCriteria();
		$criteria->join = "inner join respuestas as r on t.idSolicitud = r.idSolicitud";
		$criteria->condition = "t.idUsuario_origen = '$id_usuario_origen'";
		$criteria->addCondition("r.idPuntaje is NULL");

		return $this->count($criteria);
	}

	/**
	 * @summary: Metodo que retorna el numeto de respuestas recibidas a las solicitudes enviadas por un usuario en especifico.
	 * @param  [int] $id_usuario_origen [Codigo de nomina del usuario origen]
	 * @return [int] $num               [Numero de respuestas recibidas]
	 */
	public function getNumRespuestasRecibidas($id_usuario_origen){
		$criteria = new CDbCriteria();
		$criteria->join = "inner join respuestas as r on t.idSolicitud = r.idSolicitud";
		$criteria->condition = "t.idUsuario_origen = '$id_usuario_origen'";

		return $this->count($criteria);
	}



	/**
	 * @summary: Metodo que realiza el conteo de las solicitudes de acuerdo a su estado.
	 * @param  [string] $estado [Estdo de la solicitud: 'resuelta' o 'pendiente']
	 * @return [int] $num [Numero de registros que cumplen la condicion]
	 */
	public function getTotalPorEstado($estado){

		$criteria = new CDbCriteria();
		$criteria->select = 'estado';
		$criteria->condition = "estado = '$estado'";

		return $this->count($criteria);
	}

	/**
	 * @summary: Metodo que me permite obtener el numero total de categorias dado su descripcion.
	 * @param  [string] $puntaje [categoria. Salen de la tabla 'categorias']
	 * @return [int]    $total   [Total de registros encontrados]
	 */
	public function getNumVotosCategorias($categoria){

		$criteria = new CDbCriteria();
		$criteria->select = 'idSolicitud';
		$criteria->condition = "idCategoria = (select idCategoria from categorias where descripcion = '$categoria')";

		return $this->count($criteria);
	}

	/**
	 * @summary: Metodo que me permite obtener el numero total de prioridades dado su descripcion.
	 * @param  [string] $prioridad [prioridad. Salen de la tabla 'prioridades']
	 * @return [int]    $total   [Total de registros encontrados]
	 */
	public function getNumVotosPrioridades($prioridad){

		$criteria = new CDbCriteria();
		$criteria->select = 'idSolicitud';
		$criteria->condition = "idPrioridad = (select idPrioridad from prioridades where descripcion = '$prioridad')";

		return $this->count($criteria);
	}


	/**
	 * @summary: Metdo que retorna al numero de solicitudes dado su estado ('pendiente', 'resuelta', 'cerrada')
	 * @param  [int] $id_usuario [Id del usuario de sistemas]
	 * @param  [string] $estado     [Estado de la solicitud: 'pendiente' o 'resuelta']
	 * @return [int]  $num          [Numero de registros encontrados]
	 */
	public function getNumSolicitudesPorEstado($id_usuario = '', $estado){

		$criteria = new CDbCriteria();
		$criteria->select = 'idSolicitud';		
		$criteria->condition = "idUsuario_destino = '$id_usuario'";
		$criteria->addCondition("estado = '$estado'");

		return $this->count($criteria);
	}

	/**
	 * @summary: Metodo que permite obtener el numero total de solicitudes dadas dos fechas
	 * @param [sting] $fecha_desde [Fecha de inicio de la busqueda]
	 * @param [sting] $estado [Estado de la solicitude: pendiente, cerrada o resuelta]
	 * @param [sting] $fecha_hasta [Fecha final de la busqueda]
	 * @return [int] $num [Numero total de solicitudes encontradas]
	 */
	public function getNumAll($fecha_desde, $fecha_hasta, $estado = ''){

		$criteria = new CDbCriteria();

		if($estado != ''){
			$criteria->condition = "estado <> '$estado'";
		}
		
		$criteria->addBetweenCondition('fecha_envio', $fecha_desde, $fecha_hasta);	

		return $this->count($criteria);
	}
}