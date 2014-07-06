<?php

define('DS',DIRECTORY_SEPARATOR);//定义文件分隔符
define('CORE_PATH',__DIR__.DS);//定义框架目录
define('CHARTSET','utf-8');//定义字符编码
header("Content-Type:text/html;charset=".CHARTSET);  //设置系统的输出字符为utf-8
session_start();

function __autoload($class) {
    require(CORE_PATH.DS.'core'.DS.strtolower($class).'.class.php');
}

//路由解析
Router::parseUrl();

//加载控制器
require(APP_PATH.'controller'.DS.$_GET['controller'].'.class.php');

$controller = new $_GET['controller'];

call_user_func_array(array(&$controller, $_GET['action']), $_GET['param_arr']);