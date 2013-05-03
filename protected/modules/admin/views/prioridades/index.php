<?php
$this->breadcrumbs=array(
	'Prioridades',
);

$this->menu=array(
	array('label'=>'Create Prioridades','url'=>array('create')),
	array('label'=>'Manage Prioridades','url'=>array('admin')),
);
?>

<h1>Prioridades</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
