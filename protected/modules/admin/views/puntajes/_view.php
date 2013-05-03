<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPuntaje')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPuntaje),array('view','id'=>$data->idPuntaje)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>