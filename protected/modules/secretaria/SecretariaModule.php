<?php

class SecretariaModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'secretaria.models.*',
			'secretaria.components.*',
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
												array('label'=>'Informes', 'url'=>'#', 'items'=>array(
								                    array('label'=>'Oportunidad en la solucion a requerimientos', 'url'=>array('informes/indicadorOportunidadSolucionRequerimiento')),	
								                )),
								                array('label'=>'Filtrado de solicitudes', 'url'=>'#', 'items'=>array(
								                    array('label'=>'Solicitudes pendientes', 'url'=>array('solicitudes/admin')),	
								                )),
						            		);
		}
		else
			return false;
	}
}
