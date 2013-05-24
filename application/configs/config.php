<?php

$dbIni['dbName'] = 'labtab';
$dbIni['dbUser'] = 'root';
$dbIni['dbPass'] = '12341234';
$dbIni['dbHost'] = 'localhost';
	
$zfConfigArray['configurable']['tempImageFolder'] = 'temp_images';
$zfConfigArray['configurable']['serverImageFolder'] = APPLICATION_PATH . '/../data/requisitions/';
$zfConfigArray['configurable']['webDonorsPath'] = APPLICATION_PATH . '/../data/webdonors/';
$zfConfigArray['configurable']['uploadPath'] = APPLICATION_PATH . '/../data/attachments/';


#$zfConfigArray['configurable']['tempImageFolder'] = 'temp_images';
#$zfConfigArray['configurable']['serverImageFolder'] = 'C:/labtab/requisitions/';
#$zfConfigArray['configurable']['webDonorsPath'] = 'C:/labtab/web_donors/';
#$zfConfigArray['configurable']['uploadPath'] = 'C:/labtab/attachments/';


$zfConfigArray['phpSettings']['time_zone'] = 'America/New_York';
$zfConfigArray['phpSettings']['display_startup_errors'] = 1;
$zfConfigArray['phpSettings']['display_errors'] = 1;

$zfConfigArray['includePaths']['library'] = APPLICATION_PATH . '/../library';

$zfConfigArray['resources']['layout']['layoutPath'] = APPLICATION_PATH . "/layouts/scripts";
$zfConfigArray['resources']['layout']['layout'] = "layout";

// tell ZF where to find resource plugins
$zfConfigArray['pluginPaths']['My_Resource'] = APPLICATION_PATH . '/resources';

$zfConfigArray['bootstrap']['path'] = APPLICATION_PATH . '/Bootstrap.php';
$zfConfigArray['bootstrap']['class'] = 'Bootstrap';

$zfConfigArray['autoloaderNamespaces'][] = "Labtab";
$zfConfigArray['autoloaderNamespaces'][] = "Doctrine";
$zfConfigArray['autoloaderNamespaces'][] = "Zendoctrine";
$zfConfigArray['appnamespace'] = 'Application';

$zfConfigArray['resources']['frontController']['controllerDirectory'] = APPLICATION_PATH . '/controllers';
$zfConfigArray['resources']['frontController']['params']['displayExceptions'] = 1;


$zfConfigArray['resources']['db']['adapter']                          =  'pdo_mysql';
$zfConfigArray['resources']['db']['params']['dbname']                 =  $dbIni['dbName'];
$zfConfigArray['resources']['db']['params']['username']               =  $dbIni['dbUser'];
$zfConfigArray['resources']['db']['params']['password']               =  $dbIni['dbPass'];
$zfConfigArray['resources']['db']['params']['host']                   =  $dbIni['dbHost'];
$zfConfigArray['resources']['db']['params']['isDefaultTableAdapter']  =  true;

$zfConfigArray['smtp']['host'] = 'smtp.gmail.com';
$zfConfigArray['smtp']['name'] = 'smtp.gmail.com';
$zfConfigArray['smtp']['config']['auth'] = 'login';
$zfConfigArray['smtp']['config']['password'] = 'xyzzysxyzy';
$zfConfigArray['smtp']['config']['username'] =  'the.web.bender@gmail.com';
$zfConfigArray['smtp']['config']['ssl'] = 'tls';
$zfConfigArray['smtp']['config']['port'] = '587';


// load the doctrine resource plugin
$zfConfigArray['resources']['doctrine'][]   =  '';
//$zfConfigArray['resources']['initialization'][]   =  '';

// configure the doctrine resource plugin
$zfConfigArray['doctrine']['connection']['driver']    =  'pdo_mysql';
$zfConfigArray['doctrine']['connection']['port']      =  '3306';
$zfConfigArray['doctrine']['connection']['dbname']    =  $dbIni['dbName'];
$zfConfigArray['doctrine']['connection']['user']      =  $dbIni['dbUser'];
$zfConfigArray['doctrine']['connection']['password']  =  $dbIni['dbPass'];

$zfConfigArray['doctrine']['settings']['entitiesPath']['Entity'] =  APPLICATION_PATH . '/../library/Labtab';
$zfConfigArray['doctrine']['settings']['entitiesPath']['Model'] =  APPLICATION_PATH . '/../library/Labtab';
$zfConfigArray['doctrine']['settings']['proxiesPath']              =  APPLICATION_PATH . '/doctrine';
$zfConfigArray['doctrine']['settings']['mappingsPath']              =  APPLICATION_PATH . '/doctrine';
$zfConfigArray['doctrine']['settings']['logPath']                  =  APPLICATION_PATH . '/doctrine/log';

switch (APPLICATION_ENV)
{
    case 'development':
    case 'testing':
        $zfConfigArray['phpSettings']['display_startup_errors'] = 1;
        $zfConfigArray['phpSettings']['display_errors'] = 1;
        $zfConfigArray['resources']['frontController']['params']['displayExceptions'] = 1;

        $zfConfigArray['doctrine']['settings']['cacheType'] = '\Doctrine\Common\Cache\ArrayCache';
        break;

    case 'staging':
    case 'production':
    default:
        $zfConfigArray['doctrine']['settings']['cacheType'] = $zfConfigArray['awe']['doctrine']['cacheType'];
        break;
}

