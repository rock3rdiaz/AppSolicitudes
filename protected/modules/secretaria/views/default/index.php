<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>

<h3 class="h1_titulos">Bienvenido(a) <span class="nombre_bienvenida"><?php echo Yii::app()->getSession()->get('nombre');?></h3>

