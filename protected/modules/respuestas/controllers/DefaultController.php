<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		//$listado_respuesta = Solicitudes::model()->findAllByAttributes(array('idUsuario_destino'=>Yii::app()->getSession()->get('id')));

		$listado_respuestas_puntajes = $this->estRespuestas();

		list($num_solicitudes_pendientes, $num_solicitudes_resueltas, $num_solicitudes_cerradas) = $this->estDatosGenerales();

		$this->render('index', array('listado_respuestas_puntajes'=>$listado_respuestas_puntajes,
			'num_solicitudes_pendientes'=>$num_solicitudes_pendientes, 'num_solicitudes_resueltas'=>$num_solicitudes_resueltas,
			'num_solicitudes_cerradas'=>$num_solicitudes_cerradas
			));
	}


	/**
	 * @summary: Metodo que se encarga de obtener los datos necesarios para renderizar la grafica sobre puntajes por respuesta.
	 * @return Null
	 */
	public function estRespuestas(){

		$tipos_puntaje = Puntajes::model()->getTiposPuntajes();

		if(!empty($tipos_puntaje)){
			foreach ($tipos_puntaje as $puntaje){				
				$listado_respuestas_puntajes[] = array($puntaje->descripcion, (int)Respuestas::model()->getMisRespuestasPuntaje(Yii::app()->getSession()->get('id'), $puntaje->descripcion));
			}	
		}
		else{
			$listado_respuestas_puntajes = array();
		}

		return $listado_respuestas_puntajes;
	}

	/**
	 * @summary: Metodo que retorna los datos necesarios para mostrar las solicitudes que el usuario no ha dado respuesta.
	 * @return [int] $num_solicitudes_pendientes [Total de solicitudes que no han sido contestadas]
	 * @return [int] $num_solicitudes_resueltas [Total de solicitudes que ya fueron contestadas]
	 */
	public function estDatosGenerales(){

		$num_solicitudes_pendientes = Solicitudes::model()->getNumSolicitudesPorEstado(Yii::app()->getSession()->get('id'), 'pendiente');
		$num_solicitudes_resueltas  = Solicitudes::model()->getNumSolicitudesPorEstado(Yii::app()->getSession()->get('id'), 'resuelta');
		$num_solicitudes_cerradas   = Solicitudes::model()->getNumSolicitudesPorEstado(Yii::app()->getSession()->get('id'), 'cerrada');
		
		return array($num_solicitudes_pendientes, $num_solicitudes_resueltas, $num_solicitudes_cerradas); 
	}


	public function actionLogout(){
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionError(){
		$this->render('error');
	}
}
?>