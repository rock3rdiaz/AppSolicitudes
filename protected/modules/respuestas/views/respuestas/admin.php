<?php
$this->breadcrumbs=array(
	'Respuestas'=>array('admin'),
	'Administracion',
);

/*$this->menu=array(
	array('label'=>'List Respuestas','url'=>array('index')),
	array('label'=>'Create Respuestas','url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('respuestas-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 clasS="h1_titulos">Historial de mis respuestas</h1>

<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->

<?php echo CHtml::link('B&uacute;squeda avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'respuestas-grid',
	'dataProvider'=>$model->getMisRespuestas('sistemas', Yii::app()->getSession()->get('id')),
	'type'=>'striped condensed',
	//'filter'=>$model,
	'columns'=>array(
		'idRespuesta',
		array('name'=>'fecha_envio',
			'value'=>'explode(" ", $data->fecha_envio)[0]'),
		'descripcion',		
		array('name'=>'idPuntaje', 'value'=>'(isset($data->idPuntaje))?$data->idPuntaje0->descripcion:Null'),
		/*array('name'=>'idSolicitud', 'value'=>'Usuarios::model()->getNombreCompleto($data->idSolicitud0->idUsuario_origen)'),*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}{delete}',
			'buttons'=>array(
				'delete'=>array(
					'visible'=>'(Solicitudes::model()->findByPk($data->idSolicitud)->estado != "cerrada") ? true : false',
					)
				)
		),
	),
)); ?>
