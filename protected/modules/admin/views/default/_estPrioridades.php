<?php
	$this->Widget('ext.highcharts.HighchartsWidget', array(
	   'options'=>array(
	      'title' => array('text' => 'Solicitudes por prioridad'),
	      'theme' => 'grid',
	      'xAxis' => array(
	         'categories' => /*array('Apples', 'Bananas', 'Oranges')*/$tipos_prioridades,
	      ),
	      'yAxis' => array(
	         'title' => array('text' => 'Valores')
	      ),
	      'series' => array(
	         array('name' => 'Frecuencia', 'data' => /*array(1, 0, 4)*/$num_tipos_prioridades),
	         //array('name' => 'John', 'data' => array(5, 7, 3))
	      )
	   )
	));	
?>
