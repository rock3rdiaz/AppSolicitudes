<?php

class PreguntasModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'preguntas.models.*',
			'preguntas.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			//return true;

			return $controller->items_menu =  array(
												array('label'=>'Inicio', 'url'=>array('default/index')),
								                array('label'=>'Solicitudes', 'url'=>'#', 'items'=>array(
								                	array('label'=>'Mis solicitudes', 'url'=>array('solicitudes/admin')),
								                	array('label'=>'Nueva solicitud', 'url'=>array('solicitudes/create')))),
								                array('label'=>'Mis Respuestas', 'url'=>'#', 'items'=>array(
								                    array('label'=>'Ver respuestas a mis solicitudes', 'url'=>array('respuestas/admin')),
								                )),
						            		);
		}
		else
			return false;
	}
}
