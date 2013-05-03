<?php
$this->breadcrumbs=array(
	'Puntajes'=>array('admin'),
	'Administrar',
);

/*$this->menu=array(
	array('label'=>'List Puntajes','url'=>array('index')),
	array('label'=>'Create Puntajes','url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('puntajes-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 class="h1_titulos">Adminstraci&oacute;n de puntajes</h1>

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
	'id'=>'puntajes-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'type'=>'striped condensed',
	'columns'=>array(
		'idPuntaje',
		'descripcion',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'linkButton',
			'type'=>'success',
			'icon'=>'white ok',
			'url'=>array('puntajes/create'),
			'label'=>'Nuevo puntaje',
)); ?>
