<?php
/**
 * Created by PhpStorm.
 * User: Beeant
 * Date: 2016/3/19
 * Time: 14:55
 */

namespace Admin\Controller;


class BaseGoodsController extends BaseController
{
    public function _initialize(){
        $this->getGoodsTypeList();
        $this->getGoodsHomeList();
        $this->getGoodsBrandList();
    }

    public function getGoodsTypeList(){
        $session = session('goodsType');
        $disableSession = true;
        if(!isset($session) || $disableSession){
            $data = M('GoodsType');
            $list = $data->select();
            $array = array();
            foreach ($list as $value){
                $array[$value['goods_type_id']] = $value['goods_type_name'];
            }
            session('goodsType', $array);
            $this->assign('goodsTypeList',$array);
        } else {
            $this->assign('goodsTypeList',$session);
        }
        return $session;
    }

    public function getGoodsHomeList(){
        $session = session('goodsHome');
        $disableSession = true;
        if(!isset($session) || $disableSession){
            $data = M('GoodsHome');
            $list = $data->select();
            $array = array();
            foreach ($list as $value){
                $array[$value['home_id']] = $value['home_name'];
            }
            session('goodsHome', $array);
            $this->assign('goodsHomeList',$array);
        } else {
            $this->assign('goodsHomeList',$session);
        }
        return $session;
    }

    public function getGoodsBrandList(){
        $session = session('goodsBrand');
        $disableSession = true;
        if(!isset($session) || $disableSession){
            $data = M('GoodsBrand');
            $list = $data->select();
            $array = array();
            foreach ($list as $value){
                $array[$value['goods_brand_id']] = $value['goods_brand_name'];
            }
            session('goodsBrands', $array);
            $this->assign('goodsBrandList',$array);
        } else {
            $this->assign('goodsBrandList',$session);
        }

        return $session;
    }
}