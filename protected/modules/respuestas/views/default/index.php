<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>

<h3 class="h1_titulos">Bienvenido <span class="nombre_bienvenida"><?php echo Yii::app()->getSession()->get('nombre');?></span></h3>
<br/>
<p class="noticias_bienvenida">Los siguientes datos le ofrecen una visi&oacute;n general de su trabajo con este aplicativo.</p>



<?php $this->widget('bootstrap.widgets.TbTabs', array(
    'type'=>'tabs',
    'placement'=>'left', // 'above', 'right', 'below' or 'left'
    'tabs'=>array(

        array('label'=>'Puntajes por respuesta', 'content'=>$this->renderPartial('_estRespuestasPuntaje', 
          array('listado_respuestas_puntajes'=>$listado_respuestas_puntajes), $this), 'active'=>true),

        array('label'=>'Datos generales', 'content'=>$this->renderPartial('_estDatosGenerales', 
          array('num_solicitudes_pendientes'=>$num_solicitudes_pendientes, 'num_solicitudes_resueltas'=>$num_solicitudes_resueltas, 'num_solicitudes_cerradas'=>$num_solicitudes_cerradas), $this)),
    ),
)); ?>











