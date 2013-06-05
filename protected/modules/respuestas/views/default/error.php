<?php Yii::app()->user->setFlash('error', '<strong>Lo sentimos!</strong> Ha excedido el n&uacute;mero m&aacute;ximo de respuestas sin puntuar.');?>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'linkButton',
			'type'=>'success',
			'label'=>'Comenzar a puntuar respuestas',
			'icon'=>'white ok',
			'url'=>array('respuestas/admin')
));?> 