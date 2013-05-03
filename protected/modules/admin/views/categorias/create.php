<?php
$this->breadcrumbs=array(
	'Categorias'=>array('admin'),
	'Crear',
);

/*$this->menu=array(
	array('label'=>'List Categorias','url'=>array('index')),
	array('label'=>'Manage Categorias','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos">Creaci&oacute;n de una categoria</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>