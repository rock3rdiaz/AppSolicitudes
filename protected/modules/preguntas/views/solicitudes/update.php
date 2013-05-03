<?php
$this->breadcrumbs=array(
	'Solicitudes'=>array('admin'),
	$model->idSolicitud=>array('view','id'=>$model->idSolicitud),
	'Actualizar',
);

/*$this->menu=array(
	array('label'=>'List Solicitudes','url'=>array('index')),
	array('label'=>'Create Solicitudes','url'=>array('create')),
	array('label'=>'View Solicitudes','url'=>array('view','id'=>$model->idSolicitud)),
	array('label'=>'Manage Solicitudes','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos">Actualizaci&oacute;n de los datos de la solicitud No. <?php echo $model->idSolicitud; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'listado_prioridades'=>$listado_prioridades,
			'listado_categorias'=>$listado_categorias, 'listado_usuarios'=>$listado_usuarios, 'listado_areas'=>$listado_areas
	)); ?>