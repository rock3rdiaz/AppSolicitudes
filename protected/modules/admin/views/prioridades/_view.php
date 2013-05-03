<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPrioridad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPrioridad),array('view','id'=>$data->idPrioridad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>