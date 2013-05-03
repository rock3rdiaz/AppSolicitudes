<?php
$this->breadcrumbs=array(
	'Puntajes',
);

$this->menu=array(
	array('label'=>'Create Puntajes','url'=>array('create')),
	array('label'=>'Manage Puntajes','url'=>array('admin')),
);
?>

<h1>Puntajes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
