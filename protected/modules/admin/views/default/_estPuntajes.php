<?php
	$this->Widget('ext.highcharts.HighchartsWidget', array(
	   'options'=>array(
	      'title' => array('text' => 'Respuestas por puntaje'),
	      'xAxis' => array(
	         'categories' => /*array('Apples', 'Bananas', 'Oranges')*/$tipos_puntajes,
	      ),
	      'yAxis' => array(
	         'title' => array('text' => 'Valores')
	      ),
	      'series' => array(
	         array('name' => 'Frecuencia', 'data' => /*array(1, 0, 4)*/$num_tipos_puntajes),
	         //array('name' => 'John', 'data' => array(5, 7, 3))
	      )
	   )
	));	
?>


