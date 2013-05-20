<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'respuestas-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>
	
	<div class="well">
		<label for="descripcion_solicitud">Descripcion de la solicitud seleccionada</label>	
		<?php echo CHtml::textArea('descripcion_solicitud', $descripcion_solicitud, array('class'=>'span5', 'maxlength'=>255, 'rows'=>15, 'disabled'=>'true'))?>

		<br/>
		<div class="well">
			<label for="">Archivo adjunto</label>	
			<?php 
				if($adjunto != Null){
					echo CHtml::link($adjunto, Yii::app()->controller->createUrl("downloadAdjunto", array("path"=>Yii::app()->basePath.'/data/adjuntos_solicitudes/'.$adjunto)));
				}	
				else{
					echo "<p>No existe archivo adjunto!</p>";
				}		
			?>
		</div>
	</div>
	

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'fecha',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'descripcion', array('class'=>'span5','maxlength'=>255, 'rows'=>15)); ?>	

	<?php //echo $form->textFieldRow($model,'puntaje',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'adjunto',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->fileFieldRow($model,'adjunto',array('class'=>'span5')); ?>

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
			'icon'=>'white remove',
			'url'=>array('solicitudes/admin'),
			'label'=>'Cancelar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
