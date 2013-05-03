<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idSolicitud')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idSolicitud),array('view','id'=>$data->idSolicitud)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adjunto')); ?>:</b>
	<?php echo CHtml::encode($data->adjunto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUsuario_origen')); ?>:</b>
	<?php echo CHtml::encode($data->idUsuario_origen); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUsuario_destino')); ?>:</b>
	<?php echo CHtml::encode($data->idUsuario_destino); ?>
	<br />

	*/ ?>

</div>