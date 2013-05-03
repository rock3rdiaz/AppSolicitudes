<?php
$this->breadcrumbs=array(
	'Areases',
);

$this->menu=array(
	array('label'=>'Create Areas','url'=>array('create')),
	array('label'=>'Manage Areas','url'=>array('admin')),
);
?>

<h1>Areases</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
