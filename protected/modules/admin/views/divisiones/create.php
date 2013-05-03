<?php
$this->breadcrumbs=array(
	'Divisiones'=>array('admin'),
	'Crear',
);

/*$this->menu=array(
	array('label'=>'List Divisiones','url'=>array('index')),
	array('label'=>'Manage Divisiones','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos">Creaci&oacute;n de divisiones</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>