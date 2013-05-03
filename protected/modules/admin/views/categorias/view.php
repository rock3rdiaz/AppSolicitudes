<?php
$this->breadcrumbs=array(
	'Categorias'=>array('admin'),
	$model->idCategoria,
);

/*$this->menu=array(
	array('label'=>'List Categorias','url'=>array('index')),
	array('label'=>'Create Categorias','url'=>array('create')),
	array('label'=>'Update Categorias','url'=>array('update','id'=>$model->idCategoria)),
	array('label'=>'Delete Categorias','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idCategoria),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Categorias','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos">Detalle de los datos de la categoria No.<?php echo $model->idCategoria; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idCategoria',
		'descripcion',
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'linkButton',
			'type'=>'success',
			'label'=>'Nueva categoria',
			'icon'=>'white ok',
			'url'=>array('categorias/create')
)); ?>
