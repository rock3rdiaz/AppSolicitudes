<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'areas-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'idDivision',array('class'=>'span5')); ?>
	<?php $listado_divisiones = CHTml::listData(Divisiones::model()->findAll(array('order'=>'nombre asc')), 'idDivision', 'nombre');?>
	<?php echo $form->dropDownListRow($model, 'idDivision', $listado_divisiones, array('empty'=>'-- Seleccione una opcion --', 'class'=>'span5'));?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>$model->isNewRecord ? 'Guardar' : 'Actualizar',
			'icon'=>'white ok'
		)); ?>

		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'linkButton',
			'type'=>'success',
			'icon'=>'white remove',
			'url'=>array('areas/admin'),
			'label'=>'Cancelar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
