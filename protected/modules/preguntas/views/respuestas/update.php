<?php
$this->breadcrumbs=array(
	'Respuestas'=>array('admin'),
	$model->idRespuesta=>array('view','id'=>$model->idRespuesta),
	'Actualizar',
);

/*$this->menu=array(
	array('label'=>'List Respuestas','url'=>array('index')),
	array('label'=>'Create Respuestas','url'=>array('create')),
	array('label'=>'View Respuestas','url'=>array('view','id'=>$model->idRespuesta)),
	array('label'=>'Manage Respuestas','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos">Actualizaci&oacute;n de los datos de la respuestas <?php echo $model->idRespuesta; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>

<?php
    Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/Miscelaneaus.js',
	   CClientScript::POS_END
	);
?>