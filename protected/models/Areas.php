<?php

/**
 * This is the model class for table "areas".
 *
 * The followings are the available columns in table 'areas':
 * @property integer $idArea
 * @property string $nombre
 * @property integer $idDivision
 *
 * The followings are the available model relations:
 * @property Usuarios[] $usuarioses
 * @property Divisiones $idDivision0
 */
class Areas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Areas the static model class
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
		return 'areas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, idDivision', 'required'),
			array('idDivision', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idArea, nombre, idDivision', 'safe', 'on'=>'search'),
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
			'usuarioses' => array(self::HAS_MANY, 'Usuarios', 'idArea'),
			'idDivision0' => array(self::BELONGS_TO, 'Divisiones', 'idDivision'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idArea' => 'Id Area',
			'nombre' => 'Nombre',
			'idDivision' => 'Id Division',
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

		$criteria->compare('idArea',$this->idArea);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('idDivision',$this->idDivision);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}