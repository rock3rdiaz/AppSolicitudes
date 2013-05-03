<?php
$this->breadcrumbs=array(
	'Divisiones',
);

$this->menu=array(
	array('label'=>'Create Divisiones','url'=>array('create')),
	array('label'=>'Manage Divisiones','url'=>array('admin')),
);
?>

<h1>Divisiones</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
