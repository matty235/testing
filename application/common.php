<?php
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development');

set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library_fork'),
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));


// Use correct config file.
$config = 'config.php';
if(file_exists(APPLICATION_PATH . '/configs/local.' . $config))
{
	require_once APPLICATION_PATH . '/configs/local.config.php';    
}
else
{
	require_once APPLICATION_PATH . '/configs/config.php';
}


