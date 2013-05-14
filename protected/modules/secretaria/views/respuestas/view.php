<?php
$this->breadcrumbs=array(
	'Respuestases'=>array('index'),
	$model->idRespuesta,
);

$this->menu=array(
	array('label'=>'List Respuestas','url'=>array('index')),
	array('label'=>'Create Respuestas','url'=>array('create')),
	array('label'=>'Update Respuestas','url'=>array('update','id'=>$model->idRespuesta)),
	array('label'=>'Delete Respuestas','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idRespuesta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Respuestas','url'=>array('admin')),
);
?>

<h1>View Respuestas #<?php echo $model->idRespuesta; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idRespuesta',
		'fecha_envio',
		'descripcion',
		'idPuntaje',
		'idSolicitud',
	),
)); ?>
