<?php
$this->breadcrumbs=array(
	'Divisiones'=>array('admin'),
	'Administrar',
);

/*$this->menu=array(
	array('label'=>'List Divisiones','url'=>array('index')),
	array('label'=>'Create Divisiones','url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('divisiones-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 class="h1_titulos">Administraci&oacute;n de divisiones</h1>

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
	'id'=>'divisiones-grid',
	'type'=>'striped condensed',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'idDivision',
		'nombre',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'linkButton',
			'type'=>'success',
			'icon'=>'white ok',
			'url'=>array('divisiones/create'),
			'label'=>'Nueva division',
)); ?>
