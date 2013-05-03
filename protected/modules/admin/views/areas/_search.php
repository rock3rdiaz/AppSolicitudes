<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php //echo $form->textFieldRow($model,'idArea',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>45)); ?>

	<?php $listado_divisiones = CHtml::listData(Divisiones::model()->findAll(array('order'=>'nombre asc')), 'idDivision', 'nombre');?>
	<?php echo $form->dropDownListRow($model, 'idDivision', $listado_divisiones, array('class'=>'span5', 'empty'=>'-- Todas --')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'buttonType'=>'submit',
		    'icon'=>'white ok',
			'type'=>'info',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
