<?php
$this->breadcrumbs=array(
	'Prioridades'=>array('admin'),
	'Crear',
);

/*$this->menu=array(
	array('label'=>'List Prioridades','url'=>array('index')),
	array('label'=>'Manage Prioridades','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos">Creaci&oacute;n de una prioridad</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>