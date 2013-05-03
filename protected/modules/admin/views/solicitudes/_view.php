<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idSolicitud')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idSolicitud),array('view','id'=>$data->idSolicitud)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_envio')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_envio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adjunto')); ?>:</b>
	<?php echo CHtml::encode($data->adjunto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->idUsuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prioridad')); ?>:</b>
	<?php echo CHtml::encode($data->prioridad); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('categoria')); ?>:</b>
	<?php echo CHtml::encode($data->categoria); ?>
	<br />

	*/ ?>

</div>