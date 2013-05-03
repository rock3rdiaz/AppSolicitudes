<?php

class AdminModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here

			return $controller->items_menu =  array(
												array('label'=>'Inicio', 'url'=>array('default/index')),

												array('label'=>'Configuracion', 'url'=>'#', 'items'=>array(
								                    array('label'=>'General'),							                    	
								                    	array('label'=>'Categorias', 'url'=>array('categorias/admin'), 'icon'=>'icon-indent-right icon-white'),								                    	
								                    	array('label'=>'Puntajes', 'url'=>array('puntajes/admin'), 'icon'=>'icon-edit icon-white'),
								                    	array('label'=>'Prioridades', 'url'=>array('prioridades/admin'), 'icon'=>'icon-flag icon-white'),
								                 	'---',
								                    array('label'=>'Organizacion'),
								                    	array('label'=>'Divisiones', 'url'=>array('divisiones/admin'), 'icon'=>'icon-briefcase icon-white'),
								                    	array('label'=>'Areas', 'url'=>array('areas/admin'), 'icon'=>'icon-list-alt icon-white'),								                    	
								                    	),
													),

								                array('label'=>'Solicitudes', 'url'=>'#', 'items'=>array(
								                	array('label'=>'Historial de solicitudes y respuestas', 'url'=>array('solicitudes/admin'), 'icon'=>'icon-folder-close icon-white'))),
						            		);
		       
			//return true;
		}
		else
			return false;
	}
}
