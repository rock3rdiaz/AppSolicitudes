<?php
$this->breadcrumbs=array(
	'Solicitudes',
);

$this->menu=array(
	array('label'=>'Create Solicitudes','url'=>array('create')),
	array('label'=>'Manage Solicitudes','url'=>array('admin')),
);
?>

<h1>Solicitudes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
