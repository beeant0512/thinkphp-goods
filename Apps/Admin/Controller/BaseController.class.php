<?php
/**
 * Created by PhpStorm.
 * User: Beeant
 * Date: 2016/3/18
 * Time: 21:56
 */

namespace Admin\Controller;


use Think\Controller;

class BaseController extends Controller
{
    public function _initialize()
    {
        $uid = session('uid');
        if (!isset($uid)) {
            $this->redirect('/Admin/Login/login', null, 3, '您尚未登录，页面跳转中...');
            //$this->redirect('Admin/User/login');
        }
    }
}