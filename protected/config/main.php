<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Mesa de ayuda',
	'language'=>'es',

	// preloading 'log' component
	'preload'=>array('log',
					'bootstrap'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths'=>array('bootstrap.gii'),//Adicionado para boostrapt
		),
		'admin',
		'preguntas',
		'respuestas',
		'secretaria'
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'bootstrap'=>array('class'=>'ext.bootstrap.components.Bootstrap'),//Adicionado para bootstrap
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		/*String de conexion con la BD propia de la aplicacion*/
		'db'=>array(
			'connectionString' => 'sqlsrv:Server=192.168.0.171;Database=DBSolicitudes',			
			'username' => 'sa',
			'password' => 'sistemas',
			'charset' => 'utf8',
		),

		/*Con este string de conexion obtenemos los datos de todos los funcionarios, de planta o temporales*/
		'db_nomina'=>array(
			'class'=>'CDbConnection',
			'connectionString' => 'sqlsrv:Server=192.168.0.171;Database=Nomina',			
			'username' => 'sa',
			'password' => 'sistemas',
			'charset' => 'utf8',
		),

		/*Este string de conexion nos permite obtener los proyectos asociados a cada usuario de sistemas*/
		'db_mantis'=>array(
			'class'=>'CDbConnection',
			'connectionString' => 'mysql:host=192.168.0.171;dbname=bugtracker',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				
				/*array(
					'class'=>'CWebLogRoute',
					'categories' => 'system.db.*',//Selecciono que deseo mostrar
					'levels'=>'trace',
				),*/
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);