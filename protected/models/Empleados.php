<?php

/**
 * This is the model class for table "empleados".
 *
 * The followings are the available columns in table 'empleados':
 * @property string $KEYNOM
 * @property string $AREA1
 * @property string $AREA2
 * @property string $AREA3
 * @property string $NOMBRE_M
 * @property integer $NIT_M
 * @property string $CIUDAD_NIT_M
 * @property string $SALARIO
 * @property string $FEC_NAC
 * @property string $LUGAR_NAC_M
 * @property string $STATUS_NOM
 * @property string $MOTIVO_RETIRO
 * @property string $FEC_ACTIVO
 * @property string $FEC_INACTIVO
 * @property string $GRUPO_DPTO_M
 * @property string $GRUPO_ESTADIS_M
 * @property string $GRADO_GERARQÑUICO_M
 * @property string $CUENTA_M
 * @property string $CASA_PPIA_M
 * @property string $PENSION_M
 * @property string $SALUD_M
 * @property string $CLASE_ARP_M
 * @property string $CESANTIAS_M
 * @property string $SUB_TRA_M
 * @property string $SUB_FLIAR_M
 * @property string $CARGO_M
 * @property string $SEXO_M
 * @property string $NUM_LIB_M
 * @property string $DISTRITO_LIB_M
 * @property string $CLASE_LIB_M
 * @property string $TEL_M1
 * @property string $TEL_M2
 * @property string $ESTADO_CIVIL_M
 * @property string $NUM_PER_CARGO_M
 * @property string $NOMBRE_ISS_M
 * @property string $SANGRE_M
 * @property string $DIREC_M
 * @property string $INICIO_CONTRATO
 * @property string $FIN_CONTRATO
 * @property string $NUM_CONTRATOS_M
 * @property string $DURA_CONTRATO_M
 * @property string $TIPO_TRA_M
 * @property string $PER_PAGO
 * @property string $SENA_M
 * @property string $COD_CARGO_M
 * @property string $TIPO_CTTO_M
 * @property string $TIPO_FIJO_M
 * @property string $N_SALUD_M
 * @property string $FECHA_INICIO_PRIMAS_M
 * @property string $FECHA_CORRIDA_M
 * @property string $CLASE_NOMINA_M
 * @property string $CODIGO_BANCO_M
 * @property string $JORNADA_NOM_M
 * @property string $TEL_CELULAR_M
 * @property string $E_MAIL_M
 * @property string $POSEE_CARRO_M
 * @property string $POSEE_MOTO_M
 * @property string $COMUNA_M
 * @property string $PROFESION_M
 * @property string $AHORRO_CESANTIAS_M
 * @property string $AUTORIZA_CREDITOS_M
 * @property double $PORCENTAJE_RTEFTE_M
 * @property string $EMBARGOS_M
 * @property string $FDO_VOLUNTARIO_M
 * @property string $TIPO_DOC_M
 * @property string $NIVEL_GERENCIAL_M
 * @property string $CARGO_NUEVO_M
 */
class Empleados extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Empleados the static model class
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
		return 'empleados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('KEYNOM, AREA1, AREA2, AREA3, NOMBRE_M, NIT_M, SALARIO', 'required'),
			array('NIT_M', 'numerical', 'integerOnly'=>true),
			array('PORCENTAJE_RTEFTE_M', 'numerical'),
			array('KEYNOM', 'length', 'max'=>4),
			array('AREA1, AREA2, AREA3, GRUPO_DPTO_M, GRUPO_ESTADIS_M, GRADO_GERARQÑUICO_M, DISTRITO_LIB_M, NUM_PER_CARGO_M, NUM_CONTRATOS_M, DURA_CONTRATO_M, PER_PAGO, N_SALUD_M, CLASE_NOMINA_M, COMUNA_M, FDO_VOLUNTARIO_M', 'length', 'max'=>2),
			array('NOMBRE_M, PROFESION_M', 'length', 'max'=>35),
			array('CIUDAD_NIT_M, NUM_LIB_M', 'length', 'max'=>15),
			array('SALARIO', 'length', 'max'=>19),
			array('LUGAR_NAC_M', 'length', 'max'=>14),
			array('STATUS_NOM, CASA_PPIA_M, PENSION_M, SALUD_M, CLASE_ARP_M, CESANTIAS_M, SUB_TRA_M, SUB_FLIAR_M, SEXO_M, CLASE_LIB_M, ESTADO_CIVIL_M, TIPO_TRA_M, SENA_M, TIPO_CTTO_M, TIPO_FIJO_M, FECHA_CORRIDA_M, CODIGO_BANCO_M, JORNADA_NOM_M, POSEE_CARRO_M, POSEE_MOTO_M, AHORRO_CESANTIAS_M, AUTORIZA_CREDITOS_M, EMBARGOS_M, TIPO_DOC_M, NIVEL_GERENCIAL_M', 'length', 'max'=>1),
			array('MOTIVO_RETIRO', 'length', 'max'=>60),
			array('CUENTA_M', 'length', 'max'=>11),
			array('CARGO_M, NOMBRE_ISS_M, E_MAIL_M', 'length', 'max'=>30),
			array('TEL_M1, TEL_M2', 'length', 'max'=>7),
			array('SANGRE_M, COD_CARGO_M', 'length', 'max'=>3),
			array('DIREC_M', 'length', 'max'=>40),
			array('TEL_CELULAR_M', 'length', 'max'=>12),
			array('CARGO_NUEVO_M', 'length', 'max'=>50),
			array('FEC_NAC, FEC_ACTIVO, FEC_INACTIVO, INICIO_CONTRATO, FIN_CONTRATO, FECHA_INICIO_PRIMAS_M', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('KEYNOM, AREA1, AREA2, AREA3, NOMBRE_M, NIT_M, CIUDAD_NIT_M, SALARIO, FEC_NAC, LUGAR_NAC_M, STATUS_NOM, MOTIVO_RETIRO, FEC_ACTIVO, FEC_INACTIVO, GRUPO_DPTO_M, GRUPO_ESTADIS_M, GRADO_GERARQÑUICO_M, CUENTA_M, CASA_PPIA_M, PENSION_M, SALUD_M, CLASE_ARP_M, CESANTIAS_M, SUB_TRA_M, SUB_FLIAR_M, CARGO_M, SEXO_M, NUM_LIB_M, DISTRITO_LIB_M, CLASE_LIB_M, TEL_M1, TEL_M2, ESTADO_CIVIL_M, NUM_PER_CARGO_M, NOMBRE_ISS_M, SANGRE_M, DIREC_M, INICIO_CONTRATO, FIN_CONTRATO, NUM_CONTRATOS_M, DURA_CONTRATO_M, TIPO_TRA_M, PER_PAGO, SENA_M, COD_CARGO_M, TIPO_CTTO_M, TIPO_FIJO_M, N_SALUD_M, FECHA_INICIO_PRIMAS_M, FECHA_CORRIDA_M, CLASE_NOMINA_M, CODIGO_BANCO_M, JORNADA_NOM_M, TEL_CELULAR_M, E_MAIL_M, POSEE_CARRO_M, POSEE_MOTO_M, COMUNA_M, PROFESION_M, AHORRO_CESANTIAS_M, AUTORIZA_CREDITOS_M, PORCENTAJE_RTEFTE_M, EMBARGOS_M, FDO_VOLUNTARIO_M, TIPO_DOC_M, NIVEL_GERENCIAL_M, CARGO_NUEVO_M', 'safe', 'on'=>'search'),
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
			'KEYNOM' => 'Keynom',
			'AREA1' => 'Area1',
			'AREA2' => 'Area2',
			'AREA3' => 'Area3',
			'NOMBRE_M' => 'Nombre M',
			'NIT_M' => 'Nit M',
			'CIUDAD_NIT_M' => 'Ciudad Nit M',
			'SALARIO' => 'Salario',
			'FEC_NAC' => 'Fec Nac',
			'LUGAR_NAC_M' => 'Lugar Nac M',
			'STATUS_NOM' => 'Status Nom',
			'MOTIVO_RETIRO' => 'Motivo Retiro',
			'FEC_ACTIVO' => 'Fec Activo',
			'FEC_INACTIVO' => 'Fec Inactivo',
			'GRUPO_DPTO_M' => 'Grupo Dpto M',
			'GRUPO_ESTADIS_M' => 'Grupo Estadis M',
			'GRADO_GERARQÑUICO_M' => 'Grado GerarqÑ Uico M',
			'CUENTA_M' => 'Cuenta M',
			'CASA_PPIA_M' => 'Casa Ppia M',
			'PENSION_M' => 'Pension M',
			'SALUD_M' => 'Salud M',
			'CLASE_ARP_M' => 'Clase Arp M',
			'CESANTIAS_M' => 'Cesantias M',
			'SUB_TRA_M' => 'Sub Tra M',
			'SUB_FLIAR_M' => 'Sub Fliar M',
			'CARGO_M' => 'Cargo M',
			'SEXO_M' => 'Sexo M',
			'NUM_LIB_M' => 'Num Lib M',
			'DISTRITO_LIB_M' => 'Distrito Lib M',
			'CLASE_LIB_M' => 'Clase Lib M',
			'TEL_M1' => 'Tel M1',
			'TEL_M2' => 'Tel M2',
			'ESTADO_CIVIL_M' => 'Estado Civil M',
			'NUM_PER_CARGO_M' => 'Num Per Cargo M',
			'NOMBRE_ISS_M' => 'Nombre Iss M',
			'SANGRE_M' => 'Sangre M',
			'DIREC_M' => 'Direc M',
			'INICIO_CONTRATO' => 'Inicio Contrato',
			'FIN_CONTRATO' => 'Fin Contrato',
			'NUM_CONTRATOS_M' => 'Num Contratos M',
			'DURA_CONTRATO_M' => 'Dura Contrato M',
			'TIPO_TRA_M' => 'Tipo Tra M',
			'PER_PAGO' => 'Per Pago',
			'SENA_M' => 'Sena M',
			'COD_CARGO_M' => 'Cod Cargo M',
			'TIPO_CTTO_M' => 'Tipo Ctto M',
			'TIPO_FIJO_M' => 'Tipo Fijo M',
			'N_SALUD_M' => 'N Salud M',
			'FECHA_INICIO_PRIMAS_M' => 'Fecha Inicio Primas M',
			'FECHA_CORRIDA_M' => 'Fecha Corrida M',
			'CLASE_NOMINA_M' => 'Clase Nomina M',
			'CODIGO_BANCO_M' => 'Codigo Banco M',
			'JORNADA_NOM_M' => 'Jornada Nom M',
			'TEL_CELULAR_M' => 'Tel Celular M',
			'E_MAIL_M' => 'E Mail M',
			'POSEE_CARRO_M' => 'Posee Carro M',
			'POSEE_MOTO_M' => 'Posee Moto M',
			'COMUNA_M' => 'Comuna M',
			'PROFESION_M' => 'Profesion M',
			'AHORRO_CESANTIAS_M' => 'Ahorro Cesantias M',
			'AUTORIZA_CREDITOS_M' => 'Autoriza Creditos M',
			'PORCENTAJE_RTEFTE_M' => 'Porcentaje Rtefte M',
			'EMBARGOS_M' => 'Embargos M',
			'FDO_VOLUNTARIO_M' => 'Fdo Voluntario M',
			'TIPO_DOC_M' => 'Tipo Doc M',
			'NIVEL_GERENCIAL_M' => 'Nivel Gerencial M',
			'CARGO_NUEVO_M' => 'Cargo Nuevo M',
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

		$criteria->compare('KEYNOM',$this->KEYNOM,true);
		$criteria->compare('AREA1',$this->AREA1,true);
		$criteria->compare('AREA2',$this->AREA2,true);
		$criteria->compare('AREA3',$this->AREA3,true);
		$criteria->compare('NOMBRE_M',$this->NOMBRE_M,true);
		$criteria->compare('NIT_M',$this->NIT_M);
		$criteria->compare('CIUDAD_NIT_M',$this->CIUDAD_NIT_M,true);
		$criteria->compare('SALARIO',$this->SALARIO,true);
		$criteria->compare('FEC_NAC',$this->FEC_NAC,true);
		$criteria->compare('LUGAR_NAC_M',$this->LUGAR_NAC_M,true);
		$criteria->compare('STATUS_NOM',$this->STATUS_NOM,true);
		$criteria->compare('MOTIVO_RETIRO',$this->MOTIVO_RETIRO,true);
		$criteria->compare('FEC_ACTIVO',$this->FEC_ACTIVO,true);
		$criteria->compare('FEC_INACTIVO',$this->FEC_INACTIVO,true);
		$criteria->compare('GRUPO_DPTO_M',$this->GRUPO_DPTO_M,true);
		$criteria->compare('GRUPO_ESTADIS_M',$this->GRUPO_ESTADIS_M,true);
		$criteria->compare('GRADO_GERARQÑUICO_M',$this->GRADO_GERARQÑUICO_M,true);
		$criteria->compare('CUENTA_M',$this->CUENTA_M,true);
		$criteria->compare('CASA_PPIA_M',$this->CASA_PPIA_M,true);
		$criteria->compare('PENSION_M',$this->PENSION_M,true);
		$criteria->compare('SALUD_M',$this->SALUD_M,true);
		$criteria->compare('CLASE_ARP_M',$this->CLASE_ARP_M,true);
		$criteria->compare('CESANTIAS_M',$this->CESANTIAS_M,true);
		$criteria->compare('SUB_TRA_M',$this->SUB_TRA_M,true);
		$criteria->compare('SUB_FLIAR_M',$this->SUB_FLIAR_M,true);
		$criteria->compare('CARGO_M',$this->CARGO_M,true);
		$criteria->compare('SEXO_M',$this->SEXO_M,true);
		$criteria->compare('NUM_LIB_M',$this->NUM_LIB_M,true);
		$criteria->compare('DISTRITO_LIB_M',$this->DISTRITO_LIB_M,true);
		$criteria->compare('CLASE_LIB_M',$this->CLASE_LIB_M,true);
		$criteria->compare('TEL_M1',$this->TEL_M1,true);
		$criteria->compare('TEL_M2',$this->TEL_M2,true);
		$criteria->compare('ESTADO_CIVIL_M',$this->ESTADO_CIVIL_M,true);
		$criteria->compare('NUM_PER_CARGO_M',$this->NUM_PER_CARGO_M,true);
		$criteria->compare('NOMBRE_ISS_M',$this->NOMBRE_ISS_M,true);
		$criteria->compare('SANGRE_M',$this->SANGRE_M,true);
		$criteria->compare('DIREC_M',$this->DIREC_M,true);
		$criteria->compare('INICIO_CONTRATO',$this->INICIO_CONTRATO,true);
		$criteria->compare('FIN_CONTRATO',$this->FIN_CONTRATO,true);
		$criteria->compare('NUM_CONTRATOS_M',$this->NUM_CONTRATOS_M,true);
		$criteria->compare('DURA_CONTRATO_M',$this->DURA_CONTRATO_M,true);
		$criteria->compare('TIPO_TRA_M',$this->TIPO_TRA_M,true);
		$criteria->compare('PER_PAGO',$this->PER_PAGO,true);
		$criteria->compare('SENA_M',$this->SENA_M,true);
		$criteria->compare('COD_CARGO_M',$this->COD_CARGO_M,true);
		$criteria->compare('TIPO_CTTO_M',$this->TIPO_CTTO_M,true);
		$criteria->compare('TIPO_FIJO_M',$this->TIPO_FIJO_M,true);
		$criteria->compare('N_SALUD_M',$this->N_SALUD_M,true);
		$criteria->compare('FECHA_INICIO_PRIMAS_M',$this->FECHA_INICIO_PRIMAS_M,true);
		$criteria->compare('FECHA_CORRIDA_M',$this->FECHA_CORRIDA_M,true);
		$criteria->compare('CLASE_NOMINA_M',$this->CLASE_NOMINA_M,true);
		$criteria->compare('CODIGO_BANCO_M',$this->CODIGO_BANCO_M,true);
		$criteria->compare('JORNADA_NOM_M',$this->JORNADA_NOM_M,true);
		$criteria->compare('TEL_CELULAR_M',$this->TEL_CELULAR_M,true);
		$criteria->compare('E_MAIL_M',$this->E_MAIL_M,true);
		$criteria->compare('POSEE_CARRO_M',$this->POSEE_CARRO_M,true);
		$criteria->compare('POSEE_MOTO_M',$this->POSEE_MOTO_M,true);
		$criteria->compare('COMUNA_M',$this->COMUNA_M,true);
		$criteria->compare('PROFESION_M',$this->PROFESION_M,true);
		$criteria->compare('AHORRO_CESANTIAS_M',$this->AHORRO_CESANTIAS_M,true);
		$criteria->compare('AUTORIZA_CREDITOS_M',$this->AUTORIZA_CREDITOS_M,true);
		$criteria->compare('PORCENTAJE_RTEFTE_M',$this->PORCENTAJE_RTEFTE_M);
		$criteria->compare('EMBARGOS_M',$this->EMBARGOS_M,true);
		$criteria->compare('FDO_VOLUNTARIO_M',$this->FDO_VOLUNTARIO_M,true);
		$criteria->compare('TIPO_DOC_M',$this->TIPO_DOC_M,true);
		$criteria->compare('NIVEL_GERENCIAL_M',$this->NIVEL_GERENCIAL_M,true);
		$criteria->compare('CARGO_NUEVO_M',$this->CARGO_NUEVO_M,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @summary: Metodo que retorna el nombre completo de un usuario
	 * @param  [int] $id [Codigo de nomina del usuario]
	 * @return [string] $nombre_completo [Nombre completo del usuario]
	 */
	public function getNombreCompleto($id){
		return str_replace('_', ' ', $this->findByPk($id)->NOMBRE_M);
	}

	/**
	 * Metodo que retorna todos los empleados del area de sistemas.
	 * @return [$listado_empleados] [Array que contiene los codigos de todos los emppleados del area de sistemas]
	 */
	public function getAllPosiblesDestinatarios(){
		$criteria = new CDbCriteria();

		$criteria->select = 'KEYNOM';
		$criteria->condition = "GRUPO_DPTO_M = 12";
		$criteria->order = 'NOMBRE_M asc';

		$empleados_sistemas = new CActiveDataProvider($this, array('criteria'=>$criteria));

		foreach($empleados_sistemas->getData() as $u){
			/*Los usuarios con los siguientes codigos no deben incluirse en el listado de posibles destinatarios puesto que son el jefe, la secretaria, un funcionario inactivo y el electricista*/
			if($u['KEYNOM'] == '0202' || $u['KEYNOM'] == '0056' || $u['KEYNOM'] == '1609' || $u['KEYNOM'] == '0121'){
				continue;
			}
			$posibles_destinatarios[$u['KEYNOM']] = $this->getNombreCompleto($u['KEYNOM']);
		}

		return $posibles_destinatarios;		
	}
}