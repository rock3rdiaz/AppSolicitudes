<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />
	<!--<meta http-equiv="refresh" content="15"/>-->

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link href='http://fonts.googleapis.com/css?family=Revalia|Margarine' rel='stylesheet' type='text/css'>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">
		<?php 
			echo '<span id="img_logo">'.CHtml::image('images/logocomfenalco.jpg').'</span>';

            echo '<span id="titulo_logo">';
            echo "Bienvenido a WebApp <span id='nom_webapp'>".CHtml::encode(Yii::app()->name).'</span>';
            echo '</span>';
        ?>
		</div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php /*$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		));*/ ?>
	</div><!-- mainmenu -->

	<div id="mi_menu">
		<?php $this->widget('bootstrap.widgets.TbNavbar', array(
		    'type'=>'null', // null or 'inverse'
		    'brand'=>'Mesa de Ayuda',
		    'brandUrl'=>'#',
		    'collapse'=>true, // requires bootstrap-responsive.css
		    'items'=>array(		    	
		        array(
		            'class'=>'bootstrap.widgets.TbMenu',
		            'items'=>
		            $this->items_menu,

		            /*array(
		                array('label'=>'Home', 'url'=>'#', 'active'=>true),
		                array('label'=>'Link', 'url'=>'#'),
		                array('label'=>'Dropdown', 'url'=>'#', 'items'=>array(
		                    array('label'=>'Action', 'url'=>'#'),
		                    array('label'=>'Another action', 'url'=>'#'),
		                    array('label'=>'Something else here', 'url'=>'#'),
		                    '---',
		                    array('label'=>'NAV HEADER'),
		                    array('label'=>'Separated link', 'url'=>'#'),
		                    array('label'=>'One more separated link', 'url'=>'#'),
		                )),
		            ),*/
		        ),
		        /*'<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',*/
		        array(
		            'class'=>'bootstrap.widgets.TbMenu',
		            'htmlOptions'=>array('class'=>'pull-right'),
		            'items'=>array(
		                //array('label'=>'Link', 'url'=>'#'),
		                '---',
		                array('label'=>'Salir', 'url'=>'#', 'items'=>array(
		                    array('label'=>'Salir del aplicativo', 'url'=>'http://192.168.0.202/sevenet/visual/index.php'),
		                )),
		            ),
		        ),
		    ),
		)); ?>
	</div>

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> Comfenalco Quind&iacute;o.<br/>
		Todos los derechos reservados.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
