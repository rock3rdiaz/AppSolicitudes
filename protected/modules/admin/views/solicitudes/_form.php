<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'solicitudes-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'fecha',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'descripcion',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'adjunto',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'idUsuario_origen',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'estado',array('class'=>'span5','maxlength'=>65)); ?>

	<?php echo $form->textFieldRow($model,'prioridad',array('class'=>'span5','maxlength'=>65)); ?>

	<?php echo $form->textFieldRow($model,'categoria',array('class'=>'span5','maxlength'=>65)); ?>

	<?php echo $form->textFieldRow($model,'idUsuario_destino',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'info',
			'icon'=>'white ok',
			'label'=>$model->isNewRecord ? 'Guardar datos' : 'Actualizar datos',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
