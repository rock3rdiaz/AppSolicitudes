<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$datos_solicitudes = $this->estSolicitudes();

		list($tipos_puntajes, $num_tipos_puntajes) = $this->estPuntajes();

		list($tipos_categorias, $num_tipos_categorias) = $this->estCategorias();

		list($tipos_prioridades, $num_tipos_prioridades) = $this->estPrioridades();

		$this->render('index', array('datos_solicitudes'=>$datos_solicitudes,
			'tipos_puntajes'=>$tipos_puntajes, 'num_tipos_puntajes'=>$num_tipos_puntajes,
			'tipos_categorias'=>$tipos_categorias, 'num_tipos_categorias'=>$num_tipos_categorias,
			'tipos_prioridades'=>$tipos_prioridades, 'num_tipos_prioridades'=>$num_tipos_prioridades));
	}


	/**
	 * @summary: Metodo que obtiene los datos sobre las solicitudes.
	 * @return [array] [Array con los datos listos para renderizar la grafica]
	 */
	public function estSolicitudes(){

		$num_resueltas = Solicitudes::model()->getTotalPorEstado('resuelta');
		$num_pendientes = Solicitudes::model()->getTotalPorEstado('pendiente');
		$num_cerradas = Solicitudes::model()->getTotalPorEstado('cerrada');

		$datos_solicitudes = array(
			array('Resueltas', (float)$num_resueltas),
			array('Pendientes', (float)$num_pendientes),
			array('Cerradas', (float)$num_cerradas)
			);

		return $datos_solicitudes;
	}

	/**
	 * @summary: Metodo que permite obtener todos los datos necesarios para renderizar la grafica
	 * @return Null
	 * @return Null
	 */
	public function estPuntajes(){

		$res_sql = Puntajes::model()->getTiposPuntajes();		
		
		if(!empty($res_sql)){
			/*Construimos los arrays que contienen los items y la frecuencia de cada uno de ellos*/
			foreach ($res_sql as $i) {
				$tipos_puntajes[] = $i->descripcion;
				$num_tipos_puntajes[] = (int)Respuestas::model()->getNumVotosPuntajes($i->descripcion);
			}
		}
		else{
			$tipos_puntajes = array();
			$num_tipos_puntajes = array();
		}

		return array($tipos_puntajes, $num_tipos_puntajes);
	}

	/**
	 * @summary: Metodo que permite obtener todos los datos necesarios para renderizar la grafica
	 * @return Null
	 * @return Null
	 */
	public function estCategorias(){

		$res_sql = Categorias::model()->getTiposCategorias();	

		if(!empty($res_sql)){
			/*Construimos los arrays que contienen los items y la frecuencia de cada uno de ellos*/
			foreach ($res_sql as $i) {
				$tipos_categorias[] = $i->descripcion;
				$num_tipos_categorias[] = (int)Solicitudes::model()->getNumVotosCategorias($i->descripcion);
			}
		}
		else{
			$tipos_categorias = array();
			$num_tipos_categorias = array();
		}	
		
		return array($tipos_categorias, $num_tipos_categorias);
	}

	/**
	 * @summary: Metodo que permite obtener todos los datos necesarios para renderizar la grafica
	 * @return Null
	 * @return Null
	 */
	public function estPrioridades(){

		$res_sql = Prioridades::model()->getTiposPrioridades();		

		if(!empty($res_sql)){
			/*Construimos los arrays que contienen los items y la frecuencia de cada uno de ellos*/
			foreach ($res_sql as $i) {
				$tipos_prioridades[] = $i->descripcion;
				$num_tipos_prioridades[] = (int)Solicitudes::model()->getNumVotosPrioridades($i->descripcion);
			}
		}
		else{
			$tipos_prioridades = array();
			$num_tipos_prioridades = array();
		}

		return array($tipos_prioridades, $num_tipos_prioridades);
	}

	public function actionLogout(){
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}