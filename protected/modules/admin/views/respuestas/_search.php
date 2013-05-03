<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php //echo $form->textFieldRow($model,'idRespuesta',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'fecha',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'descripcion',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'idSolicitud', array('class'=>'span5')); ?>
	<?php //$listado_usuarios_sistemas = CHtml::listData(Usuarios::model()->findAllByAttributes(array('tipo'=>'sistema')), 'id');?>

	<?php $listado_puntajes = CHtml::listData(Puntajes::model()->findAll(array('order'=>'descripcion asc')), 'idPuntaje', 'descripcion');?>
	<?php echo $form->dropDownListRow($model, 'idPuntaje',  $listado_puntajes, array('class'=>'span5', 'empty'=>'-- Todos --')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'buttonType'=>'submit',
			'type'=>'info',
			'label'=>'Buscar',
			'icon'=>'white ok'
		)); ?>
	</div>

<?php $this->endWidget(); ?>
