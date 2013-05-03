<?php
$this->breadcrumbs=array(
	'Solicitudes pendientes'=>array('admin'),
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

<h1 class="h1_titulos">Detalle Solicitud No.<?php echo $model->idSolicitud; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idSolicitud',
		'fecha_envio',
		'idUsuario_origen',
		array('label'=>'Nombre remitente',
			'value'=>($model->idUsuario_origen < 8000) ? Empleados::model()->getNombreCompleto($model->idUsuario_origen) : Temp::model()->getNombreCompleto($model->idUsuario_origen),
			),
		'descripcion',		
		array('name'=>'estado', 'value'=>ucfirst($model->estado)),
		array('name'=>'idPrioridad',
			'value'=>Prioridades::model()->findByPk($model->idPrioridad)->descripcion,
			),
		array('name'=>'idCategoria',
			'value'=>Categorias::model()->findByPk($model->idCategoria)->descripcion,
			),
		//'idUsuario_destino',
		array('name'=>'idUsuario_temporal', 'label'=>'Posible destinatario',
			'value'=>($model->idUsuario_temporal < 8000) ? Empleados::model()->getNombreCompleto($model->idUsuario_temporal) : Temp::model()->getNombreCompleto($model->idUsuario_temporal)
			),
		/*array('label'=>'Nombre destinatario',
			'value'=>($model->idUsuario_destino != Null) ? Empleados::model()->getNombreCompleto($model->idUsuario_destino) : Null,
			),*/
		//'adjunto',
		array('name'=>'idArea',
			'label'=>'Area desde donde se genero',
			'value'=>$model->idAreaOrigen->nombre
			)
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'linkButton',
			'type'=>'success',
			'icon'=>'white remove',
			'url'=>array('solicitudes/admin'),
			'label'=>'Regresar',
)); ?>
