<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'solicitudes-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'fecha_envio',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'prioridad',array('class'=>'span5','maxlength'=>65)); ?>
	<?php echo $form->dropDownListRow($model, 'idPrioridad',  CHtml::listData(Prioridades::model()->findAll(array('order'=>'descripcion asc')), 'idPrioridad', 'descripcion'), array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'categoria',array('class'=>'span5','maxlength'=>65)); ?>
	<?php echo $form->dropDownListRow($model, 'idCategoria',  CHtml::listData(Categorias::model()->findAll(array('order'=>'descripcion asc')), 'idCategoria', 'descripcion'), array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'estado',array('class'=>'span5','maxlength'=>65)); ?>

	<?php //echo $form->textFieldRow($model,'idUsuario_origen',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'idUsuario_destino',array('class'=>'span5')); ?>
	<?php echo $form->dropDownListRow($model, 'idUsuario_temporal', $listado_usuarios, array('empty'=>'-- Seleccione el usuario que respondera su solicitud --', 'class'=>'span5'));?>	

	<?php echo $form->textAreaRow($model,'descripcion',array('class'=>'span5','maxlength'=>8000, 'rows'=>15)); ?>	

	<?php echo $form->dropDownListRow($model, 'idArea_origen', CHtml::listData(Areas::model()->findAll(array('order'=>'nombre asc')), 'idArea', 'nombre'), array('empty'=>'-- Seleccione el area desde la cual envia la solicitud --', 'class'=>'span5'));?>	

	<div class="well">
		<?php echo $form->fileFieldRow($model,'adjunto',array('class'=>'span5')); ?>
	</div>	
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'icon'=>'white ok',
			'label'=>$model->isNewRecord ? 'Enviar solicitud' : 'Actualizar solicitud',
		)); ?>

		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'linkButton',
			'type'=>'success',
			'icon'=>'white remove',
			'url'=>array('solicitudes/admin'),
			'label'=>'Cancelar',
		)); ?>

	</div>

<?php $this->endWidget(); ?>
