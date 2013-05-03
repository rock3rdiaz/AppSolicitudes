<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idArea')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idArea),array('view','id'=>$data->idArea)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idDivision')); ?>:</b>
	<?php echo CHtml::encode($data->idDivision); ?>
	<br />


</div>