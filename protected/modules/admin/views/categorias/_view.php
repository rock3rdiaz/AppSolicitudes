<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCategoria')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCategoria),array('view','id'=>$data->idCategoria)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>