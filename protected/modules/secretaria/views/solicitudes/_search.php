<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?//php echo $form->textFieldRow($model,'idSolicitud',array('class'=>'span5')); ?>

	<?php 
            echo $form->labelEx($model, 'fecha_envio', array('label'=>'Fecha de envio'));
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                //'name'=>'fecha_realizacion',
                'model'=>$model,
                'attribute'=>'fecha_envio',
                'language'=>'es',
                // additional javascript options for the date picker plugin
                'options'=>array(
                    'showAnim'=>'fold',
                    'dateFormat'=>'yy-mm-dd',
                    'changeMonth'=>'true',
                    'changeYear'=>'true',
                    'showButtonPanel'=>true,
                ),
                'htmlOptions'=>array(
                    'style'=>'height:20px;',
                    'class'=>'span5'
                ),
            ));
    ?>

	<?//php echo $form->textFieldRow($model,'descripcion',array('class'=>'span5','maxlength'=>1000)); ?>

	<?//php echo $form->textFieldRow($model,'idUsuario_origen',array('class'=>'span5')); ?>

	<?//php echo $form->textFieldRow($model,'estado',array('class'=>'span5','maxlength'=>65)); ?>

	<?php $listado_prioridades = CHtml::listData(Prioridades::model()->findAll(array('order'=>'descripcion asc')), 'idPrioridad', 'descripcion');?>
	<?php echo $form->dropDownListRow($model, 'idPrioridad',  $listado_prioridades, array('class'=>'span5', 'empty'=>'-- Todas --')); ?>

	<?php $listado_categorias = CHtml::listData(Categorias::model()->findAll(array('order'=>'descripcion asc')), 'idCategoria', 'descripcion');?>
	<?php echo $form->dropDownListRow($model, 'idCategoria',  $listado_categorias, array('class'=>'span5', 'empty'=>'-- Todas --')); ?>

	<?php //echo $form->dropDownListRow($model, 'idUsuario_destino',  $listado_usuarios, array('class'=>'span5', 'empty'=>'-- Todos --')); ?>

	<?php //echo $form->textFieldRow($model,'adjunto',array('class'=>'span5','maxlength'=>1)); ?>

	<?php //echo $form->textFieldRow($model,'idArea',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'buttonType'=>'submit',
		    'type'=>'success',			
			'label'=>'Buscar',
			'icon'=>'white search'
		)); ?>
	</div>

<?php $this->endWidget(); ?>
