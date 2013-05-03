<?php
$this->breadcrumbs=array(
	'Puntajes'=>array('index'),
	$model->idPuntaje=>array('view','id'=>$model->idPuntaje),
	'Update',
);

/*$this->menu=array(
	array('label'=>'List Categorias','url'=>array('index')),
	array('label'=>'Create Categorias','url'=>array('create')),
	array('label'=>'View Categorias','url'=>array('view','id'=>$model->idCategoria)),
	array('label'=>'Manage Categorias','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos">Actualizaci&oacute;n de los datos del puntaje <?php echo $model->idPuntaje; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>