<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'respuestas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'fecha_envio',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'descripcion',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'adjunto',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'idSolicitud',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'puntaje',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'idUsuario',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
