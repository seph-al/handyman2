<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

if (ENV == "staging"){
	$db = array(
			'connectionString' => 'mysql:host=localhost;dbname=handyman',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		);
	$fb_callback = 'http://localhost/handyman/login/fbcallback';	
	$fb_appid = '882745951739071';
	$fb_secret = '769fd178acd7ea9c2e106c66d5a6440f';
}else {
	$db = array(
			'connectionString' => 'mysql:host=localhost;dbname=handyman_handyman',
			'emulatePrepare' => true,
			'username' => 'handyman_maida',
			'password' => 'bing2k',
			'charset' => 'utf8',
		);
	$fb_callback = 'http://handyman.com/login/fbcallback';
	$fb_appid = '882745951739071';
	$fb_secret = '769fd178acd7ea9c2e106c66d5a6440f';		
}
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Handyman.com',
    'defaultController'=>'home',
    'charset'=>'utf-8',
    'import'=>array(
        'application.models.*',
        'application.components.*',
        
    ),
    
    'preload'=>array('Ini'),
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.extensions.crugeconnector.*'
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'school30',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		
		'Ini'=>array(
            'class'=>'Ini',
        ),
		// uncomment the following to enable URLs in path-format
		
		 'urlManager'=>array(
   'urlFormat'=>'path',
		  'showScriptName'=>false,
   'rules'=>array(
    '<controller:\w+>/<id:\d+>'=>'<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
   ),
  ),
		
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		
		
		'db'=>$db,
		
	    
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'home/error',
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
		
		'crugeconnector'=>array(
        'class'=>'ext.crugeconnector.CrugeConnector',
        'hostcontrollername'=>'login',
        'onSuccess'=>array('login/fbsuccess'),
        'onError'=>array('login/fberror'),
        'clients'=>array(
            'facebook'=>array(
                // required by crugeconnector:
                'enabled'=>true,
                'class'=>'ext.crugeconnector.clients.Facebook',
                'callback'=>$fb_callback,
                // required by remote interface:
                'client_id'=>$fb_appid,
                'client_secret'=>$fb_secret,
                'scope'=>'email, read_stream',
            ),  
        ),
    ),
	
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'admin@handyman.com',
	),
	
	
);
