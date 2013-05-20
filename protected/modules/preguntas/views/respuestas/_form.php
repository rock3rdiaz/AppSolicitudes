<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'respuestas-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	'focus'=>array($model, 'descripcion'),
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'fecha',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'descripcion',array('class'=>'span5','maxlength'=>255, 'rows'=>15, 'id'=>'preguntas_descripcion')); ?>	

	<?php $listado_puntajes = CHtml::listData(Puntajes::model()->findAll(array('order'=>'descripcion asc')), 'idPuntaje', 'descripcion');?>
	<?php echo $form->dropDownListRow($model, 'idPuntaje',  $listado_puntajes, array('empty'=>'-- Seleccione una opcion --', 'class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'adjunto',array('class'=>'span5','maxlength'=>1)); ?>

	<?php //echo $form->textFieldRow($model,'idSolicitud',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'icon'=>'white ok',
			'label'=>$model->isNewRecord ? 'Guardar datos' : 'Actualizar datos',
		)); ?>

		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'linkButton',
			'type'=>'success',
			'label'=>'Cancelar',
			'icon'=>'white remove',
			'url'=>array('respuestas/admin')
		));?> 
	</div>

<?php $this->endWidget(); ?>
