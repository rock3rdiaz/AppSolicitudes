<?php
$this->breadcrumbs=array(
	'Areas'=>array('admin'),
	'Crear',
);

/*$this->menu=array(
	array('label'=>'List Areas','url'=>array('index')),
	array('label'=>'Manage Areas','url'=>array('admin')),
);*/
?>
<h1 class="h1_titulos">Creaci&oacute;n de &aacute;reas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>