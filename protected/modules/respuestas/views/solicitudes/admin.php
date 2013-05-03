<script type="text/javascript" charset="utf-8" async defer>
	window.setTimeout(function(){location.reload(true)}, 60000);
</script>

<?php
$this->breadcrumbs=array(
	'Mis solicitudes'=>array('admin'),
	'Solicitudes pendientes',
);

/*$this->menu=array(
	array('label'=>'List Solicitudes','url'=>array('index')),
	array('label'=>'Create Solicitudes','url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('solicitudes-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 class="h1_titulos">Mis solicitudes pendientes</h1>

<?php echo CHtml::link('B&uacute;squeda avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'solicitudes-grid',
	'dataProvider'=>$model->search(array('idUsuario_destino'=>Yii::app()->getSession()->get('id'), 'estado'=>'pendiente')),
	//'filter'=>$model,
	'type'=>'condensed striped',
	'columns'=>array(
		//'idSolicitud',
		'fecha_envio',
		'descripcion',
		array('name'=>'idUsuario_origen', 'header'=>'Remitente',
			'value'=>'($data->idUsuario_origen < 8000) ? Empleados::model()->getNombreCompleto($data->idUsuario_origen) : Temp::model()->getNombreCompleto($data->idUsuario_origen)'//Usuarios de nomina < 8000; Usuarios temporales >= 8000
			),
		//'estado',
		array('name'=>'idPrioridad', 'header'=>'Prioridad',
			'value'=>'Prioridades::model()->findByPk($data->idPrioridad)->descripcion'
			),
		/*
		'idCategoria',
		'idUsuario_destino',
		'adjunto',
		'idArea_origen',
		'idUsuario_temporal',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}{update}',		
			'buttons'=>array(
				'update'=>array(
					'icon'=>'icon-thumbs-up',
					'label'=>'Responder',
					'url'=>'Yii::app()->createUrl("respuestas/respuestas/create", array("id_solicitud"=>$data->primaryKey))'
					)
				)	
		),
	),
)); ?>

<?php
    Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/Miscelaneaus.js',
	   CClientScript::POS_END
	);
?>
