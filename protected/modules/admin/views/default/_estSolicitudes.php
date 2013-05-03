<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

<?php 

	$this->Widget('ext.highcharts.HighchartsWidget', array(
	   'options'=>array(
	      'chart'=> array(
	            'renderTo'=>'container',
	            'plotBackgroundColor'=> null,
	            'plotBorderWidth'=> null,
	            'plotShadow'=> false
	        ),
	      'title' => array('text' => 'Total de solicitudes enviadas hasta la fecha: '.Solicitudes::model()->count()),
	        'tooltip'=>array(
	                'formatter'=>'js:function() { return "<b>"+ this.point.name +"</b>: "+ this.percentage +" %"; }'
	                     ),
	        'plotOptions'=>array(
	            'pie'=>array(
	                'allowPointSelect'=> true,
	                'cursor'=>'pointer',
	                'dataLabels'=>array(
	                    'enabled'=> true,
	                    'color'=>'#000000',
	                    'connectorColor'=>'#000000',
	                    'formatter'=>'js:function() { return "<b>"+ this.point.name +"</b>:"+this.percentage +" %"; }'  
	 
	                                   )
	                        )
	                 ),
	 
	      'series' => array(
	         /*array('type'=>'pie','name' => 'Browser share', 'data' => array(array('Firefox',45.0),array('opera',26.8),array('Safari',8.5),array('Opera',6.2),array('Others',0.7),array(
	                    'name'=>'Chrome',
	                    'y'=>12.8,
	                    'sliced'=>true,
	                    'selected'=>true
	                    ))),*/

	          array('type'=>'pie','name' => 'Solicitudes', 'data' => $datos_solicitudes),	 
	      )
	 
	   )
	)); 
?>