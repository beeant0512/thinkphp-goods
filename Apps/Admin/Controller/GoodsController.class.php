<?php
/**
 * Created by PhpStorm.
 * User: Beeant
 * Date: 2016/3/19
 * Time: 12:23
 */

namespace Admin\Controller;

class GoodsController extends BaseGoodsController
{
    public function browse($length = 50)
    {
        $Goods = M('Goods'); // 实例化User对象
        $where = array();
        $where['deleted'] = 0;
        $count = $Goods->where($where)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, $length);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $config = C('PAGE');
        $Page->setConfig('theme',$config['theme']);;
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Goods->where($where)->order('create_time')->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('list', $list);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    public function manage()
    {
        if (IS_POST) {
            $goods_id = $_POST['goods_id'];
            if (isset($goods_id) && !empty($goods_id)) {
                $condition = array();
                $condition['goods_id'] = $goods_id;
                unset($_POST['goods_id']);
                $number = M('goods')->where($condition)->save($_POST);
                if ($number) {
                    $this->success('商品更新成功，正跳转至商品列表页面...', U('Goods/browse'));
                } else {
                    $this->error('商品更新失败，请重新更新');
                }
            } else {
                // 实例化Login对象
                $goods = D('Goods');
                // 自动验证 创建数据集
                if (!$data = $goods->create()) {
                    // 防止输出中文乱码
                    header("Content-type: text/html; charset=utf-8");
                    exit($goods->getError());
                }
                // 组合查询条件
                $data['goods_id'] = $this->uuid('goods_');
                $data['create_time'] = date('y-m-d h:i:s',time());
                $addNumber = M('goods')->add($data);
                if ($addNumber) {
                    $this->success('商品新增成功，正跳转至商品列表页面...', U('Goods/browse'));
                } else {
                    $this->error('商品新增失败，请重新添加');
                }
            }
        } else {
            $this->display();
        }
    }

    public function edit()
    {
        $condition['goods_id'] = $_GET['goods_id'];
        $goods = M('goods')->where($condition)->select();
        $this->assign("goods", $goods[0]);
        $this->display('manage');
    }

    public function delete()
    {
        // 组合查询条件
        $data['deleted'] = 1;
        $data['goods_id'] = $_GET['goods_id'];
        $addNumber = M('goods')->save($data);
        if ($addNumber) {
            $this->success('商品删除成功，正跳转至商品列表页面...', U('Goods/browse'));
        } else {
            $this->error('商品删除失败，请重新删除');
        }
    }

    public function view()
    {
        $condition['goods_id'] = $_GET['goods_id'];
        $goods = M('goods')->where($condition)->select();
        $this->assign("goods", $goods[0]);
        $this->display('view');
    }

    public function photo()
    {
        $photo = M('photos');
        $condition = array();
        $rootId = $_REQUEST['root_id'];
        $condition['root_id'] = $rootId;
        $photos = $photo->where($condition)->select();
        $this->assign('photos', $photos);
        $this->assign('root_id', $rootId);
        $this->display();
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