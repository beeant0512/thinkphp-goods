<?php
/**
 * Created by PhpStorm.
 * User: Beeant
 * Date: 2016/3/19
 * Time: 12:23
 */

namespace Admin\Controller;

class GoodsBrandController extends BaseController
{
    public function browse($length = 50){
        $GoodsBrand = M('GoodsBrand'); // 实例化User对象
        $where = array();
        $where['deleted'] = 0;
        $count  = $GoodsBrand->where($where)->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,$length);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $config = C('PAGE');
        $Page->setConfig('theme',$config['theme']);;
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $GoodsBrand->where($where)->order('create_time')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    public function manage()
    {
        if (IS_POST) {
            $goods_brand_id = $_POST['goods_brand_id'];
            if (isset($goods_brand_id) && !empty($goods_brand_id)) {
                $condition = array();
                $condition['goods_brand_id'] = $goods_brand_id;
                unset($_POST['goods_brand_id']);
                $number = M('GoodsBrand')->where($condition)->save($_POST);
                if ($number) {
                    $this->success('商品品牌更新成功，正跳转至商品品牌列表页面...', U('GoodsBrand/browse'));
                } else {
                    $this->error('商品品牌更新失败，请重新更新');
                }
            } else {
                $brand = D('GoodsBrand');
                // 自动验证 创建数据集
                if (!$data = $brand->create()) {
                    // 防止输出中文乱码
                    header("Content-type: text/html; charset=utf-8");
                    exit($brand->getError());
                }
                // 组合查询条件
                $data['goods_brand_id'] = $this->uuid('goods_brand_id');
                $addNumber = M('GoodsBrand')->add($data);
                if ($addNumber) {
                    $this->success('商品品牌新增成功，正跳转至商品品牌列表页面...', U('GoodsBrand/browse'));
                } else {
                    $this->error('商品品牌新增失败，请重新添加');
                }
            }
        } else {
            $this->display();
        }
    }

    public function edit()
    {
        $condition['goods_brand_id'] = $_GET['goods_brand_id'];
        $list = M('GoodsBrand')->where($condition)->select();
        $this->assign("brand", $list[0]);
        $this->display('manage');
    }

    public function delete()
    {
        // 组合查询条件
        $data['deleted'] = 1;
        $data['goods_brand_id'] = $_GET['goods_brand_id'];
        $addNumber = M('GoodsBrand')->save($data);
        if ($addNumber) {
            $this->success('商品品牌删除成功，正跳转至商品品牌列表页面...', U('GoodsBrand/browse'));
        } else {
            $this->error('商品品牌删除失败，请重新添加');
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