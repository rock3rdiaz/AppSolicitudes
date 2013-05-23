<?php
$this->breadcrumbs=array(
	'Solicitudes'=>array('admin'),
	$model->idSolicitud,
);

/*$this->menu=array(
	array('label'=>'List Solicitudes','url'=>array('index')),
	array('label'=>'Create Solicitudes','url'=>array('create')),
	array('label'=>'Update Solicitudes','url'=>array('update','id'=>$model->idSolicitud)),
	array('label'=>'Delete Solicitudes','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idSolicitud),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Solicitudes','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos">Detalle sobre la solicitud  No.<?php echo $model->idSolicitud; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		//'idSolicitud',
		array('name'=>'fecha_envio', 
			'value'=>explode(" ", $model->fecha_envio)[0]),
		array('fecha_envio', 'label'=>'Hora de envio',
			'value'=>explode(" ", $model->fecha_envio)[1]),
		array('name'=>'idArea', 'label'=>'Area solicitante', 'value'=>$model->idAreaOrigen->nombre),
		'descripcion',		
		//'idUsuario_origen',
		array('name'=>'estado', 'value'=>ucfirst($model->estado)),
		array('name'=>'idPrioridad', 'label'=>'Prioridad','value'=>$model->idPrioridad0->descripcion),
		array('name'=>'idCategoria', 'label'=>'Categoria', 'value'=>$model->idCategoria0->descripcion),		
		array('name'=>'idUsuario_temporal', 'label'=>'Nombre posible destinatario', 'value'=>Empleados::model()->getNombreCompleto($model->idUsuario_temporal)),
		array('name'=>'idUsuario_destino', 'label'=>'Nombre destinatario final',
			'value'=>($model->idUsuario_destino == Null ? Null : Empleados::model()->getNombreCompleto($model->idUsuario_destino))),
		array('name'=>'adjunto', 
			'type'=>'raw',
			//'value'=>CHtml::link($model->adjunto, 'download.php?file='.Yii::app()->basePath.'/data/adjuntos/'.$model->adjunto)),
			'value'=>CHtml::link($model->adjunto, Yii::app()->controller->createUrl("downloadAdjunto", array("path"=>Yii::app()->basePath.'/data/adjuntos_solicitudes/'.$model->adjunto)))
			),
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'linkButton',
			'type'=>'success',
			'icon'=>'white remove',
			'url'=>array('solicitudes/admin'),
			'label'=>'Regresar',
)); ?>
