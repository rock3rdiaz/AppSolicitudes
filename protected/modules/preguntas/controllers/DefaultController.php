<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$total_solicitudes_enviadas = Solicitudes::model()->countByAttributes(array('idUsuario_origen'=>Yii::app()->getSession()->get('id')));
		
		$model = new Solicitudes();

		$total_respuestas_recibidas      = $model->getNumRespuestasRecibidas(Yii::app()->getSession()->get('id'));
		$total_solicitudeS_por_calificar = $model->getNumSolicitudePorPuntuar(Yii::app()->getSession()->get('id'));

		$this->render('index', 
			array(
				'total_solicitudes_enviadas'=>$total_solicitudes_enviadas,
				'total_solicitudeS_por_calificar'=>$total_solicitudeS_por_calificar,
				'total_respuestas_recibidas'=>$total_respuestas_recibidas
				)
			);
	}

	public function actionError(){
		$this->render('error');
	}

	public function actionLogout(){
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}