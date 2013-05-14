<script type="text/javascript" charset="utf-8" async defer>
	window.setTimeout(function(){location.reload(true)}, 60000);
</script>


<?php
$this->breadcrumbs=array(
	'Solicitudes'=>array('admin'),
	'Pendientes',
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
$('.search-form form').submit(function(e){	
	e.stopPropagation();//Evitamos que se propague la accion por defecto sin bloquear los demas callbacks
	$.fn.yiiGridView.update('solicitudes-grid', {
		data: $(this).serialize()
	});
	//return false;
});
");
?>


<h1 clasS="h1_titulos">Solicitudes pendientes</h1>

<?php echo CHtml::link('B&uacute;squeda avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
	//'listado_usuarios'=>$listado_usuarios
)); ?>
</div><!--search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'solicitudes-grid',
	'dataProvider'=>$model->search(array('idUsuario_destino'=>'is NULL')),//array('nombre_campo'=>'valor_campo', 'nombre_campo'=>'valor_campo')
	'type'=>'striped condensed',
	'enableSorting'=>false,
	//'filter'=>$model,
	'columns'=>array(
		//'idSolicitud',
		'fecha_envio',
		'descripcion',
		//'idUsuario_origen',
		//'estado',
		array('name'=>'idPrioridad', 
			'type'=>'raw', 
			'value'=>'CHtml::dropDownList($data->idSolicitud."_txtprioridad", $data->idPrioridad, CHtml::listData(Prioridades::model()->findAll(array("order"=>"descripcion asc")), "idPrioridad", "descripcion"), array("class"=>"span2 prioridades"))',
			//'filter'=>CHtml::listData(Prioridades::model()->findAll(array('order'=>'descripcion asc')), 'idPrioridad', 'descripcion'),
			),		
		array('name'=>'idCategoria', 
			'type'=>'raw', 
			'value'=>'CHtml::dropDownList($data->idSolicitud."_txtcategoria", $data->idCategoria, CHtml::listData(Categorias::model()->findAll(array("order"=>"descripcion asc")), "idCategoria", "descripcion"), array("class"=>"categorias"))',
			//'filter'=>CHtml::listData(Categorias::model()->findAll(array('order'=>'descripcion asc')), 'idCategoria', 'descripcion'),
			),	
		array(
			'name'=>'idUsuario_destino', 
			'type'=>'raw', 
			'value'=>'CHtml::dropDownList($data->idSolicitud."_txtdestinatario", $data->idUsuario_destino, Empleados::model()->getAllPosiblesDestinatarios(), array("class"=>"destinatarios", "empty"=>"-- Seleccione el destinatario --"))', 
			//'filter'=>Empleados::model()->getAllPosiblesDestinatarios()
			),	
		//'adjunto',
		//'idArea',		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}{redirect}{direct}',
			'buttons'=>array(
				'redirect'=>array(
					'label'=>'', 					
					'options'=>array('class'=>"icon-share-alt botones_redireccion", 'title'=>"Redireccionar"),
					),
				'direct'=>array(
					'label'=>'', 					
					'options'=>array('class'=>"icon-repeat", 'title'=>"Responder directamente"),
					'url'=>'Yii::app()->controller->createUrl("respuestas/create",array("id_solicitud"=>$data->primaryKey))',
					)
				),
		),
	),
)); ?>

<?php
    Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/Miscelaneaus.js',
	   CClientScript::POS_END
	);
?>