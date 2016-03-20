<?php
/**
 * Created by PhpStorm.
 * User: Beeant
 * Date: 2016/3/19
 * Time: 17:02
 */

namespace Admin\Model;


use Think\Model;

class GoodsModel extends Model
{
    /**
     * 自动验证
     * self::EXISTS_VALIDATE 或者0 存在字段就验证（默认）
     * self::MUST_VALIDATE 或者1 必须验证
     * self::VALUE_VALIDATE或者2 值不为空的时候验证
     */
    protected $_validate = array(
        array('goods_name', 'require', '商品名称不能为空！'), //默认情况下用正则进行验证
        array('goods_price', 'require', '商品单价不能为空！'), //默认情况下用正则进行验证
        array('goods_stock', 'require', '商品库存不能为空！'), //默认情况下用正则进行验证
        array('goods_type_id', 'require', '商品类型不能为空！'), //默认情况下用正则进行验证
        array('goods_effects', 'require', '商品功效不能为空！'), //默认情况下用正则进行验证
        array('goods_net_weight', 'require', '商品净含量不能为空！'), //默认情况下用正则进行验证
        array('goods_home_id', 'require', '商品产地不能为空！'), //默认情况下用正则进行验证
        array('goods_brand_id', 'require', '商品品牌不能为空！'), //默认情况下用正则进行验证
        array('goods_type_id', 'require', '商品类型不能为空！'), //默认情况下用正则进行验证
    );
    /**
     * 自动完成
     */
    protected $_auto = array (
        array('create_time', 'time', 1, 'function'),
    );
}