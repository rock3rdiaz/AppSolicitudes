<?php
$this->breadcrumbs=array(
	'Prioridades'=>array('admin'),
	$model->idPrioridad,
);

/*$this->menu=array(
	array('label'=>'List Prioridades','url'=>array('index')),
	array('label'=>'Create Prioridades','url'=>array('create')),
	array('label'=>'Update Prioridades','url'=>array('update','id'=>$model->idPrioridad)),
	array('label'=>'Delete Prioridades','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idPrioridad),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Prioridades','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos">Detalle de los datos de la prioridades No.<?php echo $model->idPrioridad; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idPrioridad',
		'descripcion',
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'linkButton',
			'type'=>'success',
			'label'=>'Nueva prioridad',
			'icon'=>'white ok',
			'url'=>array('prioridades/create')
)); ?>
