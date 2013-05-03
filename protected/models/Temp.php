<?php

/**
 * This is the model class for table "temp".
 *
 * The followings are the available columns in table 'temp':
 * @property string $codigo
 * @property string $nombre
 * @property string $cedula
 * @property string $area
 * @property string $dependencia
 * @property string $fechaIngreso
 * @property string $fincontrato
 * @property string $cargo
 * @property string $salario
 * @property string $contrato
 * @property string $estado
 * @property string $fecha
 * @property string $jornada
 * @property string $empresa
 */
class Temp extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Temp the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return CDbConnection database connection
	 */
	public function getDbConnection()
	{
		return Yii::app()->db_nomina;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'temp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigo', 'length', 'max'=>4),
			array('nombre', 'length', 'max'=>33),
			array('cedula', 'length', 'max'=>11),
			array('area, cargo', 'length', 'max'=>25),
			array('dependencia', 'length', 'max'=>20),
			array('fechaIngreso, fincontrato, estado, fecha', 'length', 'max'=>16),
			array('salario', 'length', 'max'=>19),
			array('contrato', 'length', 'max'=>10),
			array('jornada', 'length', 'max'=>50),
			array('empresa', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('codigo, nombre, cedula, area, dependencia, fechaIngreso, fincontrato, cargo, salario, contrato, estado, fecha, jornada, empresa', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codigo' => 'Codigo',
			'nombre' => 'Nombre',
			'cedula' => 'Cedula',
			'area' => 'Area',
			'dependencia' => 'Dependencia',
			'fechaIngreso' => 'Fecha Ingreso',
			'fincontrato' => 'Fincontrato',
			'cargo' => 'Cargo',
			'salario' => 'Salario',
			'contrato' => 'Contrato',
			'estado' => 'Estado',
			'fecha' => 'Fecha',
			'jornada' => 'Jornada',
			'empresa' => 'Empresa',
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

		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('cedula',$this->cedula,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('dependencia',$this->dependencia,true);
		$criteria->compare('fechaIngreso',$this->fechaIngreso,true);
		$criteria->compare('fincontrato',$this->fincontrato,true);
		$criteria->compare('cargo',$this->cargo,true);
		$criteria->compare('salario',$this->salario,true);
		$criteria->compare('contrato',$this->contrato,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('jornada',$this->jornada,true);
		$criteria->compare('empresa',$this->empresa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @summary: Metodo que retorna el nombre completo de un usuario temporal
	 * @param  [int] $id [Codigo de nomina del usuario temporal]
	 * @return [string] $nombre_completo [Nombre completo del usuario temporal]
	 */
	public function getNombreCompleto($id){
		return str_replace('_', ' ', $this->findByAttributes(array('codigo'=>$id))->nombre);
	}
}