<?php

/**
 * This is the model class for table "puntajes".
 *
 * The followings are the available columns in table 'puntajes':
 * @property integer $idPuntaje
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property Respuestas[] $respuestases
 */
class Puntajes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Puntajes the static model class
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
		return 'puntajes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion', 'required'),
			array('descripcion', 'length', 'max'=>65),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPuntaje, descripcion', 'safe', 'on'=>'search'),
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
			'respuestases' => array(self::HAS_MANY, 'Respuestas', 'idPuntaje'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPuntaje' => 'Id Puntaje',
			'descripcion' => 'Descripcion',
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

		$criteria->compare('idPuntaje',$this->idPuntaje);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @summary: Metodo que permite obtener los tipos de puntajes existentes en la tabla 'puntajes'
	 * @return Null
	 * @return [array] $datos [Array que contiene los datos necesarios para graficar]
	 */
	public function getTiposPuntajes(){
		$criteria = new CDbCriteria();
		$criteria->distinct = 'descripcion';

		$data_provider = new CActiveDataProvider($this, array('criteria'=>$criteria));

		return $data_provider->getData();
	}
}