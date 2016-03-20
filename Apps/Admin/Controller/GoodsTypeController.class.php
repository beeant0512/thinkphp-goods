<?php
/**
 * Created by PhpStorm.
 * User: Beeant
 * Date: 2016/3/19
 * Time: 12:23
 */

namespace Admin\Controller;

class GoodsTypeController extends BaseController
{
    public function browse($length = 50)
    {
        $GoodsType = M('GoodsType'); // 实例化User对象
        $where = array();
        $where['deleted'] = 0;
        $count = $GoodsType->where($where)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, $length);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $config = C('PAGE');
        $Page->setConfig('theme',$config['theme']);;
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $GoodsType->where($where)->order('create_time')->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('list', $list);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    public function manage()
    {
        if (IS_POST) {
            $goods_type_id = $_POST['goods_type_id'];
            if (isset($goods_type_id) && !empty($goods_type_id)) {
                $condition = array();
                $condition['goods_type_id'] = $goods_type_id;
                unset($_POST['goods_type_id']);
                $number = M('GoodsType')->where($condition)->save($_POST);
                if ($number) {
                    $this->success('商品类型更新成功，正跳转至商品类型列表页面...', U('GoodsType/browse'));
                } else {
                    $this->error('商品类型更新失败，请重新更新');
                }
            } else {
                $type = D('GoodsType');
                // 自动验证 创建数据集
                if (!$data = $type->create()) {
                    // 防止输出中文乱码
                    header("Content-type: text/html; charset=utf-8");
                    exit($type->getError());
                }
                // 组合查询条件
                $data['goods_type_id'] = $this->uuid('goods_type_id');
                $addNumber = M('GoodsType')->add($data);
                if ($addNumber) {
                    $this->success('商品类型新增成功，正跳转至商品类型列表页面...', U('GoodsType/browse'));
                } else {
                    $this->error('商品类型新增失败，请重新添加');
                }
            }
        } else {
            $this->display();
        }
    }

    public function edit()
    {
        $condition['goods_type_id'] = $_GET['goods_type_id'];
        $list = M('GoodsType')->where($condition)->select();
        $this->assign("type", $list[0]);
        $this->display('manage');
    }

    public function delete()
    {
        // 组合查询条件
        $data['deleted'] = 1;
        $data['goods_type_id'] = $_GET['goods_type_id'];
        $addNumber = M('GoodsType')->save($data);
        if ($addNumber) {
            $this->success('商品类型删除成功，正跳转至商品类型列表页面...', U('GoodsType/browse'));
        } else {
            $this->error('商品类型删除失败，请重新添加');
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