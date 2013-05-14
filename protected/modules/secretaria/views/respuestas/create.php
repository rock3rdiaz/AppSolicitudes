<?php
$this->breadcrumbs=array(
	'Solicitudes pendientes'=>array('solicitudes/admin'),
	'Crear respuesta',
);

/*$this->menu=array(
	array('label'=>'List Respuestas','url'=>array('index')),
	array('label'=>'Manage Respuestas','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos">Creaci&oacute;n de respuestas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'descripcion_solicitud'=>$descripcion_solicitud)); ?>