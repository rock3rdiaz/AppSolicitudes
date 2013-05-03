<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php //echo $form->textFieldRow($model,'idSolicitud',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'fecha_envio',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'descripcion',array('class'=>'span5','maxlength'=>1000)); ?>

	<?php //echo $form->textFieldRow($model,'idUsuario_origen',array('class'=>'span5','maxlength'=>4)); ?>

	<?php echo $form->dropDownListRow($model, 'estado',  array('pendiente'=>'Pendiente', 'resuelta'=>'Resuelta', 'cerrada'=>'Cerrada'),
												 array('class'=>'span5', 'empty'=>'-- Todos --')); ?>

	<?php $listado_prioridades = CHtml::listData(Prioridades::model()->findAll(array('order'=>'descripcion asc')), 'idPrioridad', 'descripcion');?>
	<?php echo $form->dropDownListRow($model, 'idPrioridad',  $listado_prioridades, array('class'=>'span5', 'empty'=>'-- Todos --')); ?>

	<?php $listado_categorias = CHtml::listData(Categorias::model()->findAll(array('order'=>'descripcion asc')), 'idCategoria', 'descripcion');?>
	<?php echo $form->dropDownListRow($model, 'idCategoria',  $listado_categorias, array('class'=>'span5', 'empty'=>'-- Todos --')); ?>

	<?php //echo $form->textFieldRow($model,'idUsuario_destino',array('class'=>'span5','maxlength'=>4)); ?>

	<?php //echo $form->textFieldRow($model,'adjunto',array('class'=>'span5','maxlength'=>40)); ?>

	<?php //echo $form->textFieldRow($model,'idArea_origen',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'idUsuario_temporal',array('class'=>'span5','maxlength'=>4)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Buscar',
			'icon'=>'white search'
		)); ?>
	</div>

<?php $this->endWidget(); ?>
