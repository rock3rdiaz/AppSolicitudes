<?php
$this->breadcrumbs=array(
	'Areas'=>array('admin'),
	$model->idArea,
);

/*$this->menu=array(
	array('label'=>'List Areas','url'=>array('index')),
	array('label'=>'Create Areas','url'=>array('create')),
	array('label'=>'Update Areas','url'=>array('update','id'=>$model->idArea)),
	array('label'=>'Delete Areas','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idArea),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Areas','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos">Detalle de los datos del &aacute;reas No. <?php echo $model->idArea; ?></h1>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idArea',
		'nombre',
		'idDivision',
		array('label'=>'Nombre de la division', 'value'=>Divisiones::model()->findByPk($model->idDivision)->nombre),
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'linkButton',
			'type'=>'success',
			'label'=>'Nueva area',
			'icon'=>'white ok',
			'url'=>array('areas/create')
)); ?>
