<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Inyungu.com',
	'theme' => 'abound',

	// preloading 'log' component
	'preload'=>array('log', 'bootstrap'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.giix-components.*', // giix components
		'application.extensions.*',
		'ext.cascadedropdown.ECascadeDropDown',
	),
   
	'modules'=>array(
	  'gii'=>array(
            'generatorPaths'=>array(
                //'bootstrap.gii',
			    'ext.giiplus',
				'ext.giix-core', // giix generators
            ),
			'class'=>'system.gii.GiiModule',
			'password'=>'coco',
			'ipFilters'=>array('127.0.0.1','::1'),
        ),
		'backup'=> array(
		    'path' => '_backup/' 
		),
		'wdcalendar'=> array( 
		    // 'admin' => 'install'
			'embed' => true
	    ),
		'importcsv'=>array(
            'path'=>'upload/importCsv/', // path to folder for saving csv file and file with import params
        ),
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		*/
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			 'class' => 'WebUser',
		),
		'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
		// UserCounter
        'counter' => array(
            'class' => 'UserCounter',
        ),
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

		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=inyungu',
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
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'cntabana@yahoo.fr',
	),
);