<?php
$this->breadcrumbs=array(
	'Respuestas'=>array('admin'),
	$model->idRespuesta,
);

/*$this->menu=array(
	array('label'=>'List Respuestas','url'=>array('index')),
	array('label'=>'Create Respuestas','url'=>array('create')),
	array('label'=>'Update Respuestas','url'=>array('update','id'=>$model->idRespuesta)),
	array('label'=>'Delete Respuestas','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idRespuesta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Respuestas','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos">Detalle de los datos de la respuestas No.<?php echo $model->idRespuesta; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idSolicitud',
		array('label'=>'Fecha solicitud', 'value'=>$model->idSolicitud0->fecha_envio),		
		array('label'=>'Descripcion solicitud', 'value'=>$model->idSolicitud0->descripcion),
		'idRespuesta',
		'fecha_envio',
		'descripcion',		
		array('label'=>'Nombre del destinatario', 'value'=>Empleados::model()->getNombreCompleto($model->idSolicitud0->idUsuario_destino)),
		array('name'=>'idPuntaje', 'label'=>'Puntaje', 'value'=>isset($model->idPuntaje)?$model->idPuntaje0->descripcion:Null)
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'linkButton',
			'type'=>'success',
			'label'=>'Regresar',
			'icon'=>'white remove',
			'url'=>array('respuestas/admin')
)); ?>

