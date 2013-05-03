<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php //echo $form->textFieldRow($model,'idRespuesta',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'fecha',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'descripcion',array('class'=>'span5','maxlength'=>255)); ?>

	<?php //echo $form->textFieldRow($model,'adjunto',array('class'=>'span5','maxlength'=>1)); ?>

	<?php $listado_puntajes = CHtml::listData(Puntajes::model()->findAll(array('order'=>'descripcion asc')), 'idPuntaje', 'descripcion');?>
	<?php echo $form->dropDownListRow($model, 'idPuntaje',  $listado_puntajes, array('class'=>'span5', 'empty'=>'-- Todos --')); ?>

	<?php //echo $form->textFieldRow($model,'idSolicitud',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'buttonType'=>'submit',
		    'icon'=>'white search',
			'type'=>'success',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
