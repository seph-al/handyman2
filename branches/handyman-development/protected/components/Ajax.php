<?php

class Ajax extends Controller
{
    public $_uid;
    public $_lev;
    public $_inf;

    public function init()
    {
        $this->_uid = Ini::userId();
        $this->_lev = Ini::userLevel();
        $this->_inf = Ini::userDetails();
        return null;
    }
    /**
     * If the $array is not an array, it will automatically assigned to r's value in the response
     * ie. {"s":1,"r":"fe"}
     */
    public function renderJSON($array = array(), $status = true)
    {
        header('Content-Type: application/json');
        if(!is_array($array))
            $array = array('r'=>$array);
        if($status)
            echo CJSON::encode(array_merge(array('s'=>1), $array));
        else
            echo CJSON::encode(array_merge(array('s'=>0), $array));
        Ini::end();
    }
    public function noAccess()
    {
        echo CJSON::encode(array('s'=>0, 'errorList'=>array('You have no access to process this request')));
        Ini::end();
    }
    public function invalidRequest()
    {
        echo CJSON::encode(array('s'=>0, 'errorList'=>array('Invalid request')));
        Ini::end();
    }
    public function login($post)
    {
        $param               = array();
        $param['username']   = Ini::gSt('LOCAL_UID');
        $param['rememberMe'] = true;
        $model = new formLogin;
        if(Ini::userLevel($param['username'])):
            $model->attributes = $param;
            if($model->validate() && $model->login()):
                $this->renderJSON(array('x'=>'http://admin.'.HOST.'/admin/default/'),true);
            endif;
        endif;
        $this->renderJSON(array('errs'=>array('Sorry, you don\'t have permission to access admin')), false);
    }
}
