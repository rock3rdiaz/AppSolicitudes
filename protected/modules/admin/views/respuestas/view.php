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

<h1 class="h1_titulos">Detalle de los datos de la respuestas No. <?php echo $model->idRespuesta; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		//'idRespuesta',
		'fecha_envio',
		array('label'=>'Nombre del autor de la respuesta', 
			'value'=>Empleados::model()->getNombreCompleto($model->idSolicitud0->idUsuario_destino)),
		'descripcion',
		array('name'=>'idPuntaje', 'label'=>'Puntaje', 'value'=>isset($model->idPuntaje)?$model->idPuntaje0->descripcion:Null),
		'idSolicitud',
		array('label'=>'Fecha solicitud',
			'value'=>$model->idSolicitud0->fecha_envio),
		array('label'=>'Nombre del autor de la solicitud',
			'value'=>($model->idSolicitud0->idUsuario_origen < 8000) ? Empleados::model()->getNombreCompleto($model->idSolicitud0->idUsuario_origen) : Temp::model()->getNombreCompleto($model->idSolicitud0->idUsuario_origen)//Usuarios de nomina < 8000; Usuarios temporales >= 8000
			),		
	),
)); ?>
