<?php
$this->breadcrumbs=array(
	'Prioridades'=>array('admin'),
	$model->idPrioridad=>array('view','id'=>$model->idPrioridad),
	'Actualizar',
);

/*$this->menu=array(
	array('label'=>'List Prioridades','url'=>array('index')),
	array('label'=>'Create Prioridades','url'=>array('create')),
	array('label'=>'View Prioridades','url'=>array('view','id'=>$model->idPrioridad)),
	array('label'=>'Manage Prioridades','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos">Actualizaci&oacute;n de los datos de la prioridades <?php echo $model->idPrioridad; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>