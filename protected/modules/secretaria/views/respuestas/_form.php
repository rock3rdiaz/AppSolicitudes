<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'respuestas-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="well">
		<label for="descripcion_solicitud">Descripcion de la solicitud seleccionada</label>	
		<?php echo CHtml::textArea('descripcion_solicitud', $descripcion_solicitud, array('class'=>'span5', 'maxlength'=>255, 'rows'=>15, 'disabled'=>'true'))?>
	</div>

	<?php echo $form->textAreaRow($model,'descripcion',array('rows'=>15, 'class'=>'span5','maxlength'=>1000)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'icon'=>'white ok',
			'label'=>$model->isNewRecord ? 'Responder solicitud' : 'Actualizar respuesta',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
