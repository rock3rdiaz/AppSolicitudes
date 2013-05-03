<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>

<h3 class="h1_titulos">Bienvenido(a) <span class="nombre_bienvenida"><?php echo Yii::app()->getSession()->get('nombre');?></h3>

<p class="noticias_bienvenida">Esta secci&oacute;n le ofrece una visi&oacute;n general sobre los procesos que monitorea esta aplicaci&oacute;n. Estudielos con detenimiento.</p>

<?php $this->widget('bootstrap.widgets.TbTabs', array(
    'type'=>'tabs',
    'placement'=>'left', // 'above', 'right', 'below' or 'left'
    'tabs'=>array(
        array('label'=>'Solicitudes', 'content'=>$this->renderPartial('_estSolicitudes', array('datos_solicitudes'=>$datos_solicitudes), $this), 'active'=>true),
       
        array('label'=>'Puntajes', 'content'=>$this->renderPartial('_estPuntajes', 
        	array('tipos_puntajes'=>$tipos_puntajes, 'num_tipos_puntajes'=>$num_tipos_puntajes), $this)),

        array('label'=>'Categorias', 'content'=>$this->renderPartial('_estCategorias', 
        	array('tipos_categorias'=>$tipos_categorias, 'num_tipos_categorias'=>$num_tipos_categorias), $this)),

        array('label'=>'Prioridades', 'content'=>$this->renderPartial('_estPrioridades', 
        	array('tipos_prioridades'=>$tipos_prioridades, 'num_tipos_prioridades'=>$num_tipos_prioridades), $this))
    ),
)); ?>