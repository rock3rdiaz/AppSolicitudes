<?php 
	$this->breadcrumbs=array(
	'Nuevo usuario',
);
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'newUsuarios-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'nombres',array('class'=>'span5','maxlength'=>65)); ?>
	<?php echo $form->textFieldRow($model,'apellidos',array('class'=>'span5','maxlength'=>65)); ?>
	
	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>65)); ?>

	<?php echo $form->textFieldRow($model,'login',array('class'=>'span5','maxlength'=>65)); ?>

	<?php echo $form->passwordFieldRow($model,'pass',array('class'=>'span5','maxlength'=>65)); ?>	

	<?php //echo $form->textFieldRow($model,'idArea',array('class'=>'span5')); ?>
	<?php $listado_areas = CHtml::listData(Areas::model()->findAll(array('order'=>'nombre asc')), 'idArea', 'nombre');?>
	<?php echo $form->dropDownListRow($model, 'idArea', $listado_areas, array('class'=>'span5'));?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'info',
			'label'=>$model->isNewRecord ? 'Guardar' : 'Actualizar',
			'icon'=>'white ok'
		)); ?>
	</div>

<?php $this->endWidget(); ?>
