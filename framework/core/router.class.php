<?php
class router {

    /**
     * URL路由,转为PATHINFO的格式
     */
    static function parseUrl () {

        if (isset($_SERVER['PATH_INFO'])){

            //获取pathinfo
            $pathinfo = explode('/', trim($_SERVER['PATH_INFO'], "/"));

            // 获取 control
            $_GET['controller'] = (!empty($pathinfo[0]) ? $pathinfo[0] : 'index');

            array_shift($pathinfo); //将数组开头的单元action移出数组

            // 获取 action
            $_GET['action'] = (!empty($pathinfo[0]) ? $pathinfo[0] : 'index');
            array_shift($pathinfo); //再将将数组开头的单元移出数组

            $_GET['param_arr'] = $pathinfo;

        }else{
            $_GET["controller"] = (!empty($_GET['controller']) ? $_GET['controller']: 'index'); //默认是index模块
            $_GET["action"] = (!empty($_GET['action']) ? $_GET['action'] : 'index'); //默认是index动作

            if($_SERVER["QUERY_STRING"]){
                $m=$_GET["controller"];
                unset($_GET["controller"]);  //去除数组中的m
                $a=$_GET["action"];
                unset($_GET["action"]);  //去除数组中的a
                $query=http_build_query($_GET);   //形成0=foo&1=bar&2=baz&3=boom&cow=milk格式
                //组成新的URL
                $url=$_SERVER["SCRIPT_NAME"]."/{$controller}/{$action}/".str_replace(array("&","="), "/", $query);
                header("Location:".$url);
            }
        }
    }

}