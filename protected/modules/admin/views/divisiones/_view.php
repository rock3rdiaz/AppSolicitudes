<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idDivision')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idDivision),array('view','id'=>$data->idDivision)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>