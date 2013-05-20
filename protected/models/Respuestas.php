<?php

/**
 * This is the model class for table "respuestas".
 *
 * The followings are the available columns in table 'respuestas':
 * @property integer $idRespuesta
 * @property string $fecha_envio
 * @property string $descripcion
 * @property integer $idPuntaje
 * @property integer $idSolicitud
 *  @property integer $adjunjto
 *
 * The followings are the available model relations:
 * @property Puntajes $idPuntaje0
 * @property Solicitudes $idSolicitud0
 */
class Respuestas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Respuestas the static model class
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
		return 'respuestas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_envio, descripcion, idSolicitud', 'required'),
			array('idPuntaje, idSolicitud', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>255),
			array('adjunto', 'length', 'max'=>300),
			array('adjunto', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true), 
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idRespuesta, fecha, descripcion, idPuntaje, idSolicitud', 'safe', 'on'=>'search'),
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
			'idPuntaje0' => array(self::BELONGS_TO, 'Puntajes', 'idPuntaje'),
			'idSolicitud0' => array(self::BELONGS_TO, 'Solicitudes', 'idSolicitud'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idRespuesta' => 'Id Respuesta',
			'fecha_envio' => 'Fecha respuesta',
			'descripcion' => 'Descripcion respuesta',
			'idPuntaje' => 'Id Puntaje',
			'adjunto' => 'Adjunto',
			'idSolicitud' => 'Id Solicitud',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idRespuesta',$this->idRespuesta);
		$criteria->compare('fecha_envio',$this->fecha_envio,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('idPuntaje',$this->idPuntaje);
		$criteria->compare('idSolicitud',$this->idSolicitud);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}






	/**
	 * @summary: Metodo que permite obtener solo las respuestas a las solicitudes enviadas por cada usuario o dadas por cada usuario.
	 * @param  [string] $tipo_usuario [Tipo de usuario: puede ser 'externo' o 'sistema']
	 * @param  [int] $id_usuario [Id del usuario que envio la solicitud que ha sido contestada.]
	 * @return [CActiveDataProvider] $datos [Datos encontrados]
	 */
	public function getMisRespuestas($tipo_usuario = Null, $id_usuario = Null){

		$criteria = new CDbCriteria();

		$criteria->join = 'inner join solicitudes as s on t.idSolicitud = s.idSolicitud';
		$criteria->order = 'fecha_envio desc';

		if($tipo_usuario == 'externo'){
			$criteria->condition = "s.idUsuario_origen = '$id_usuario'";
		}
		else{
			$criteria->condition = "s.idUsuario_destino = '$id_usuario'";
		}	

		$criteria->compare('idPuntaje',$this->idPuntaje);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));

	}






	/**
	 * @summary: Metodo que me permite obtener el numero total de respuestas dado su puntaje.
	 * @param  [string] $puntaje [Valor del puntaje. Salen de la tabla 'puntajes']
	 * @return [int]    $total   [Total de registros encontrados]
	 */
	public function getNumVotosPuntajes($puntaje){

		/*Objeto Criteria que se construye a partir de la siguiente consulta sql:
		*'select COUNT(idRespuesta) from respuestas 
		* where idPuntaje = 
		* (select idPuntaje from puntajes where descripcion = 'Bueno')'
		*/

		$criteria = new CDbCriteria();
		$criteria->select = 'idPuntaje';
		$criteria->condition = "idPuntaje = (select idPuntaje from puntajes where descripcion = '$puntaje')";

		return $this->count($criteria);
	}





	/**
	 * @summary: Metodo que permite obtener la calificacion dada a las respuestas ofrecidas por el funcionario.
	 * @param [int] $id_usuario [Id del usuario que ha contestado las solicitudes]
	 * @param [string] $puntaje [Puntaje dado por el solicitante a la respuesta]
	 * @return [int] $num_registros [Numero de respuestas dadas por el puntaje definido]
	 */
	public function getMisRespuestasPuntaje($id_usuario, $puntaje){

		/*Esta es la consulta sql que se ha construido mediante el framework:
		* 'select COUNT(*) from respuestas inner join solicitudes on 
		*	solicitudes.idSolicitud = respuestas.idSolicitud
		*	where solicitudes.idUsuario_destino=2 and 
		*	respuestas.idPuntaje = (select idPuntaje from puntajes where descripcion = 'Malo')'
		*
		*/

		$criteria = new CDbCriteria();
		$criteria->select = 'idRespuesta';
		$criteria->join = "inner join solicitudes on t.idSolicitud = solicitudes.idSolicitud";
		$criteria->condition = "solicitudes.idUsuario_destino = '$id_usuario'";
		$criteria->addCondition("t.idPuntaje = (select idPuntaje from puntajes where descripcion = '$puntaje')");

		return $this->count($criteria);
	}
}