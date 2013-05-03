<?php
$this->breadcrumbs=array(
	'Mis solicitudes pendientes'=>array('admin'),
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

<h1 class="h1_titulos">Detalle solicitud No. <?php echo $model->idSolicitud; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idSolicitud',
		'fecha_envio',
		'descripcion',
		array('name'=>'idUsuario_origen', 'label'=>'Remitente',
			'value'=>($model->idUsuario_origen < 8000) ? Empleados::model()->getNombreCompleto($model->idUsuario_origen) : Temp::model()->getNombreCompleto($model->idUsuario_origen)//Usuarios de nomina < 8000; Usuarios temporales >= 8000
			),
		//'estado',
		array('name'=>'idPrioridad', 'label'=>'Prioridad',
			'value'=>Prioridades::model()->findByPk($model->idPrioridad)->descripcion
			),
		array('name'=>'idCategoria', 'label'=>'Categoria',
			'value'=>Categorias::model()->findByPk($model->idCategoria)->descripcion
			),
		//'idUsuario_destino',
		array('name'=>'idArea_origen', 
			'value'=>$model->idAreaOrigen->nombre
			),
		array('name'=>'adjunto', 
			'type'=>'raw',
			//'value'=>CHtml::link($model->adjunto, 'download.php?file='.Yii::app()->basePath.'/data/adjuntos/'.$model->adjunto)),
			'value'=>CHtml::link($model->adjunto, Yii::app()->controller->createUrl("downloadAdjunto", array("path"=>Yii::app()->basePath.'/data/adjuntos/'.$model->adjunto)))
			),
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'linkButton',
			'icon'=>'white remove',
			'type'=>'success',
			'label'=>'Regresar',
			'url'=>array('solicitudes/admin'),
)); ?>
