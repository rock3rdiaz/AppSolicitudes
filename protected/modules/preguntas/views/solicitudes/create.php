<?php
$this->breadcrumbs=array(
	'Solicitudes'=>array('admin'),
	'Crear',
);

/*$this->menu=array(
	array('label'=>'List Solicitudes','url'=>array('index')),
	array('label'=>'Manage Solicitudes','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos">Creaci&oacute;n de nueva solicitud</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'listado_usuarios'=>$listado_usuarios)); ?>

<?php
    Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/Miscelaneaus.js',
       CClientScript::POS_END
    );
?>