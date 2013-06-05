<?php

class InformesController extends Controller{

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('indicadorOportunidadSolucionRequerimiento','add'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('indicadorOportunidadSolucionRequerimiento','add'),
				'users'=>array(Yii::app()->getSession()->get('login')),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('indicadorOportunidadSolucionRequerimiento','add'),
				'users'=>array(Yii::app()->getSession()->get('login')),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * @summary: Accion que renderza los controles de busqueda de la grafica del indicador.
	 * @return [type] [description]
	 */
	public function actionIndicadorOportunidadSolucionRequerimiento(){

		$this->render('indicadorOportunidadSolucionRequerimiento');
	}

	/**
	 * Qsummary: Metodo que permite obtener el total de solicitudes y respuestas dadas un par de fechas
	 * @return [json] [Datos]
	 */
	public function actionXHRGetGrafico(){
		$data = CJSON::decode($_GET['fechas']);	
		
		$values = array();

		$values['total_solicitudes'] = Solicitudes::model()->getNumAll($data['fecha_desde'], $data['fecha_hasta']);
		$values['total_solicitudes_resueltas'] = Solicitudes::model()->getNumAll($data['fecha_desde'], $data['fecha_hasta'], 'pendiente');

		echo CJSON::encode($values);		
	}
}