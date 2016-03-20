<?php
/**
 * Created by PhpStorm.
 * User: Beeant
 * Date: 2016/3/19
 * Time: 12:23
 */

namespace Admin\Controller;

class GoodsHomeController extends BaseController
{
    public function browse($length = 50){
        $GoodsHome = M('GoodsHome'); // 实例化User对象
        $where = array();
        $where['deleted'] = 0;
        $count  = $GoodsHome->where($where)->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,$length);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $config = C('PAGE');
        $Page->setConfig('theme',$config['theme']);;
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $GoodsHome->where($where)->order('create_time')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    public function manage()
    {
        if (IS_POST) {
            $home_id = $_POST['home_id'];
            if (isset($home_id) && !empty($home_id)) {
                $condition = array();
                $condition['home_id'] = $home_id;
                unset($_POST['home_id']);
                $number = M('GoodsHome')->where($condition)->save($_POST);
                if ($number) {
                    $this->success('商品产地更新成功，正跳转至商品产地列表页面...', U('GoodsHome/browse'));
                } else {
                    $this->error('商品产地更新失败，请重新更新');
                }
            } else {
                $home = D('GoodsHome');
                // 自动验证 创建数据集
                if (!$data = $home->create()) {
                    // 防止输出中文乱码
                    header("Content-type: text/html; charset=utf-8");
                    exit($home->getError());
                }
                // 组合查询条件
                $data['home_id'] = $this->uuid('home_id');
                $addNumber = M('GoodsHome')->add($data);
                if ($addNumber) {
                    $this->success('商品产地新增成功，正跳转至商品产地列表页面...', U('GoodsHome/browse'));
                } else {
                    $this->error('商品产地新增失败，请重新添加');
                }
            }
        } else {
            $this->display();
        }
    }

    public function edit()
    {
        $condition['home_id'] = $_GET['home_id'];
        $home = M('GoodsHome')->where($condition)->select();
        $this->assign("home", $home[0]);
        $this->display('manage');
    }

    public function delete()
    {
        // 组合查询条件
        $data['deleted'] = 1;
        $data['home_id'] = $_GET['home_id'];
        $addNumber = M('GoodsHome')->save($data);
        if ($addNumber) {
            $this->success('商品产地删除成功，正跳转至商品产地列表页面...', U('GoodsHome/browse'));
        } else {
            $this->error('商品产地删除失败，请重新添加');
        }
    }

    public function uuid($prefix = '')
    {
        $chars = md5(uniqid(mt_rand(), true));
        $uuid = substr($chars, 0, 8) . '-';
        $uuid .= substr($chars, 8, 4) . '-';
        $uuid .= substr($chars, 12, 4) . '-';
        $uuid .= substr($chars, 16, 4) . '-';
        $uuid .= substr($chars, 20, 12);
        return $prefix . $uuid;
    }
}