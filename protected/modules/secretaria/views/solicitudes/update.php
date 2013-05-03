<?php
$this->breadcrumbs=array(
	'Solicitudes'=>array('index'),
	$model->idSolicitud=>array('view','id'=>$model->idSolicitud),
	'Update',
);

$this->menu=array(
	array('label'=>'List Solicitudes','url'=>array('index')),
	array('label'=>'Create Solicitudes','url'=>array('create')),
	array('label'=>'View Solicitudes','url'=>array('view','id'=>$model->idSolicitud)),
	array('label'=>'Manage Solicitudes','url'=>array('admin')),
);
?>

<h1>Update Solicitudes <?php echo $model->idSolicitud; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>