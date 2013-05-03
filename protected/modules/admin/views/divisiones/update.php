<?php
$this->breadcrumbs=array(
	'Divisiones'=>array('admin'),
	$model->idDivision=>array('view','id'=>$model->idDivision),
	'Actualizar',
);

/*$this->menu=array(
	array('label'=>'List Divisiones','url'=>array('index')),
	array('label'=>'Create Divisiones','url'=>array('create')),
	array('label'=>'View Divisiones','url'=>array('view','id'=>$model->idDivision)),
	array('label'=>'Manage Divisiones','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos">Actualizaci&oacute;n de los datos de la division <?php echo $model->idDivision; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>