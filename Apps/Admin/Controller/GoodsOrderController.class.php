<?php
/**
 * Created by PhpStorm.
 * User: Beeant
 * Date: 2016/3/19
 * Time: 12:23
 */

namespace Admin\Controller;

class GoodsOrderController extends BaseController
{
    public function browse($length = 50){
        $GoodsOrder = D('GoodsOrder'); // 实例化User对象
        $where = array();
        $where['deleted'] = 0;
        $count  = $GoodsOrder->where($where)->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,$length);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $config = C('PAGE');
        $Page->setConfig('theme',$config['theme']);
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $GoodsOrder->relation(true)->where($where)->order('create_time')->limit($Page->firstRow.','.$Page->listRows)->select();
        trace($list);
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    public function detail(){
        $GoodsOrder = D('GoodsOrderDetail'); // 实例化User对象
        $where = array();
        $where['order_id'] = $_GET['order_id'];
        $list = $GoodsOrder->relation(true)->where($where)->select();

       /* // 实例化一个空模型，没有对应任何数据表
        $Dao = M();
        //或者使用 $Dao = new Model();

        $list = $Dao->query("select * from ");*/
        trace($list);
        $this->assign('order',$list);// 赋值数据集
        $this->display(); // 输出模板
    }
}