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

<h1 class="h1_titulos">Detalle de los datos de la  solicitudes No.<?php echo $model->idSolicitud; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idSolicitud',
		array('name'=>'fecha_envio', 'label'=>'Fecha envio solicitud'),
		'descripcion',
		array('name'=>'idUsuario_origen', 'label'=>'Remitente',
			'value'=>($model->idUsuario_origen < 8000) ? Empleados::model()->getNombreCompleto($model->idUsuario_origen) : Temp::model()->getNombreCompleto($model->idUsuario_origen)//Usuarios de nomina < 8000; Usuarios temporales >= 8000
			),
		//'idUsuario_destino',		
		array('name'=>'idPrioridad', 'label'=>'Prioridad', 'value'=>$model->idPrioridad0->descripcion),
		array('name'=>'idCategoria', 'label'=>'Categoria', 'value'=>$model->idCategoria0->descripcion),
		array('name'=>'estado', 'value'=>ucfirst($model->estado)),
		array('label'=>'Id Respuesta', 
			'value'=>(Respuestas::model()->findByAttributes(array('idSolicitud'=>$model->idSolicitud)) != Null)?Respuestas::model()->findByAttributes(array('idSolicitud'=>$model->idSolicitud))->idRespuesta:Null),
		array('label'=>'Fecha envio respuesta', 
			'value'=>(Respuestas::model()->findByAttributes(array('idSolicitud'=>$model->idSolicitud)) != Null)?Respuestas::model()->findByAttributes(array('idSolicitud'=>$model->idSolicitud))->fecha_envio:Null),
		array('label'=>'Nombre del autor de la respuesta', 
			'value'=>(Respuestas::model()->findByAttributes(array('idSolicitud'=>$model->idSolicitud)) != Null)?Empleados::model()->getNombreCompleto($model->idUsuario_destino):Null),
		array('label'=>'Descripcion de la respuesta', 
			'value'=>(Respuestas::model()->findByAttributes(array('idSolicitud'=>$model->idSolicitud)) != Null)?Respuestas::model()->findByAttributes(array('idSolicitud'=>$model->idSolicitud))->descripcion:Null),
		array('label'=>'Puntaje dado a la respuesta', 
			'value'=>(Respuestas::model()->findByAttributes(array('idSolicitud'=>$model->idSolicitud)) != Null)?((Respuestas::model()->findByAttributes(array('idSolicitud'=>$model->idSolicitud))->idPuntaje != Null)?Respuestas::model()->findByAttributes(array('idSolicitud'=>$model->idSolicitud))->idPuntaje0->descripcion:Null):Null),
	),
)); ?>
