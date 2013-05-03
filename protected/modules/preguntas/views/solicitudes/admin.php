<?php
$this->breadcrumbs=array(
	'Solicitudes'=>array('admin'),
	'Administrar',
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

<h1 class="h1_titulos">Todas mis solicitudes</h1>

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
	'id'=>'solicitudes-grid',
	'type'=>'striped condensed',
	'dataProvider'=>$model->search(array('idUsuario_origen'=>Yii::app()->getSession()->get('id'))),//array('nombre_campo'=>'valor_campo')
	//'filter'=>$model,
	'columns'=>array(
		//'idSolicitud',
		'fecha_envio',
		'descripcion',		
		//'idUsuario_origen',
		array('name'=>'estado', 'value'=>'ucfirst($data->estado)'),
		array('name'=>'idPrioridad', 'value'=>'$data->idPrioridad0->descripcion'),
		array('name'=>'idCategoria', 'value'=>'$data->idCategoria0->descripcion'),
		//'idUsuario_destino',
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}{delete}',
			'buttons'=>array(
				'delete'=>array(
					'visible'=>'($data->estado == "pendiente") ? true: false',
					)
				)
		),

		/*array(
			'buttons'=>'haha',
		),*/
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'linkButton',
			'type'=>'success',
			'icon'=>'white ok',
			'url'=>array('solicitudes/create'),
			'label'=>'Nueva solicitud',
)); ?>
