<?php
$this->breadcrumbs=array(
	'Divisiones'=>array('admin'),
	$model->idDivision,
);

/*$this->menu=array(
	array('label'=>'List Divisiones','url'=>array('index')),
	array('label'=>'Create Divisiones','url'=>array('create')),
	array('label'=>'Update Divisiones','url'=>array('update','id'=>$model->idDivision)),
	array('label'=>'Delete Divisiones','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idDivision),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Divisiones','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos">Detalle de los datos de la division No. <?php echo $model->idDivision; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idDivision',
		'nombre',
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'linkButton',
			'type'=>'success',
			'label'=>'Nueva division',
			'icon'=>'white ok',
			'url'=>array('divisiones/create')
)); ?>
