<?php
class Controller {

    public function __construct () {
        $db_type = $this->get_config()['database']['db_type'];
        $db_config = $this->get_config()['database'];
        
        $this->model = new Model($db_type,$db_config);
    }

    //输出模版文件
    public function display($display_file){
        require(APP_PATH.'view/'.$display_file.'.html');
    }

    //读取配置文件
    public function get_config ($index = null) {

        return require(APP_PATH.'config.php');

        if (!is_null($index)) {
            return $config[$index];
        }

    }



}