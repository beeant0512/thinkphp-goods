<?php
/**
 * Created by PhpStorm.
 * User: Beeant
 * Date: 2016/3/19
 * Time: 12:23
 */

namespace Admin\Controller;

class UserController extends BaseController
{
    public function browse($length = 50){
        $User = M('Users'); // 实例化User对象
        $where = array();
        $where['deleted'] = 0;
        $where['user_type'] = 'custom';
        $count  = $User->where($where)->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,$length);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $config = C('PAGE');
        $Page->setConfig('theme',$config['theme']);;
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $User->where($where)->order('regtime')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    public function view(){
        $condition['userid'] = $_GET['userid'];
        $users = M('Users')->where($condition)->select();
        $this->assign("user", $users[0]);
        $this->display('view');
    }

    public function vip(){
        $data['vip'] = 1;
        $data['userid'] = $_GET['userid'];
        $addNumber = M('Users')->save($data);
        if ($addNumber) {
            $this->success('设置VIP成功，正跳转至客户列表页面...', U('User/browse'));
        } else {
            $this->error('设置VIP成功，请重新操作');
        }
    }

    public function unvip(){
        $data['vip'] = 0;
        $data['userid'] = $_GET['userid'];
        $addNumber = M('Users')->save($data);
        if ($addNumber) {
            $this->success('解除VIP成功，正跳转至客户列表页面...', U('User/browse'));
        } else {
            $this->error('解除VIP失败，请重新操作');
        }
    }

    public function lock(){
        $data['islock'] = 1;
        $data['userid'] = $_GET['userid'];
        $addNumber = M('Users')->save($data);
        if ($addNumber) {
            $this->success('客户禁用成功，正跳转至客户列表页面...', U('User/browse'));
        } else {
            $this->error('客户禁用失败，请重新操作');
        }
    }

    public function unlock(){
        $data['islock'] = 0;
        $data['userid'] = $_GET['userid'];
        $addNumber = M('Users')->save($data);
        if ($addNumber) {
            $this->success('客户解锁成功，正跳转至客户列表页面...', U('User/browse'));
        } else {
            $this->error('客户解锁失败，请重新删除');
        }
    }

    public function delete(){
        $data['deleted'] = 1;
        $data['userid'] = $_GET['userid'];
        $addNumber = M('Users')->save($data);
        if ($addNumber) {
            $this->success('客户删除成功，正跳转至客户列表页面...', U('User/browse'));
        } else {
            $this->error('客户删除失败，请重新删除');
        }
    }
}