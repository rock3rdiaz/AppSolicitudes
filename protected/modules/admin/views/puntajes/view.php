<?php
$this->breadcrumbs=array(
	'Puntajes'=>array('admin'),
	$model->idPuntaje,
);

/*$this->menu=array(
	array('label'=>'List Categorias','url'=>array('index')),
	array('label'=>'Create Categorias','url'=>array('create')),
	array('label'=>'Update Categorias','url'=>array('update','id'=>$model->idCategoria)),
	array('label'=>'Delete Categorias','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idCategoria),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Categorias','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos">Detalle de los datos del puntaje No.<?php echo $model->idPuntaje; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idPuntaje',
		'descripcion',
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'linkButton',
			'type'=>'success',
			'label'=>'Nuevo puntaje',
			'icon'=>'white ok',
			'url'=>array('puntajes/create')
)); ?>