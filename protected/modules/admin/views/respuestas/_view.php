<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idRespuesta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idRespuesta),array('view','id'=>$data->idRespuesta)); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('idSolicitud')); ?>:</b>
	<?php echo CHtml::encode($data->idSolicitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('puntaje')); ?>:</b>
	<?php echo CHtml::encode($data->puntaje); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->idUsuario); ?>
	<br />


</div>