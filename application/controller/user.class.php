<?php
class user extends Controller {
    public function add ($id,$user) {
        $this->model->insert();
        $this->display('user');
        // $config = $this->get_config('database');
    }
}