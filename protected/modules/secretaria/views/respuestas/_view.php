<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idRespuesta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idRespuesta),array('view','id'=>$data->idRespuesta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_envio')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_envio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPuntaje')); ?>:</b>
	<?php echo CHtml::encode($data->idPuntaje); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idSolicitud')); ?>:</b>
	<?php echo CHtml::encode($data->idSolicitud); ?>
	<br />


</div>