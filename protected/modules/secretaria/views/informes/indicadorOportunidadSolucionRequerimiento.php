
<h1 class="h1_titulos">Oportunidad en la soluci&oacute;n a requerimientos</h1>
<br />

<div class="well">
	<div class="row-fluid">
		<div class="span12">
			<div class="row-fluid">
				<div class="span4">
					<label for="fecha_desde">Fecha inicial</label>
					<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					    'name'=>'fecha_desde',
					    'language'=>'es',
					    // additional javascript options for the date picker plugin
					    'options'=>array(
					        'showAnim'=>'clip',
					        'dateFormat'=>'yy-mm-dd',
					        'numberOfMonths'=>3,
      						'showButtonPanel'=>true,
					    ),
					    'htmlOptions'=>array(
					        'style'=>'height:20px;'
					    ),
					));?>
				</div>

				<div class="span4">	
					<label for="fecha_hasta">Fecha final</label>
					<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					    'name'=>'fecha_hasta',
					    'language'=>'es',
					    // additional javascript options for the date picker plugin
					    'options'=>array(
					        'showAnim'=>'clip',
					        'dateFormat'=>'yy-mm-dd',
					        'numberOfMonths'=>3,
      						'showButtonPanel'=>true,
					    ),
					    'htmlOptions'=>array(
					        'style'=>'height:20px;'
					    ),
					));?>
				</div>

				<div class="span4">
					<br />
					<button id="btn_generar">Generar</button>
				</div>
			</div>
		</div>
	</div>
</div>

<br />
<br />
<br />

<div id="content_grafica" style="width:100%; height:400px;"></div>

<?php
	Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/vendors/Highcharts-3.0.2/js/highcharts.js',
	   CClientScript::POS_END
	);
	Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/vendors/Highcharts-3.0.2/js/highcharts-more.js',
	   CClientScript::POS_END
	);
	Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/vendors/Highcharts-3.0.2/js/modules/exporting.js',
	   CClientScript::POS_END
	);
	Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/app/Miscelaneaus.js',
	   CClientScript::POS_END
	);
?>