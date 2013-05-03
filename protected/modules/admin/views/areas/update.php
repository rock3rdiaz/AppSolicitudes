<?php
$this->breadcrumbs=array(
	'Areases'=>array('admin'),
	$model->idArea=>array('view','id'=>$model->idArea),
	'Actualizar',
);

/*$this->menu=array(
	array('label'=>'List Areas','url'=>array('index')),
	array('label'=>'Create Areas','url'=>array('create')),
	array('label'=>'View Areas','url'=>array('view','id'=>$model->idArea)),
	array('label'=>'Manage Areas','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos">Actualizaci&oacute;n de los datos del area <?php echo $model->idArea; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>