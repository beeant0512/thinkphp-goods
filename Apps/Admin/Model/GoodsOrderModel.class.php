<?php
/**
 * Created by PhpStorm.
 * User: Beeant
 * Date: 2016/3/20
 * Time: 8:49
 */

namespace Admin\Model;


use Think\Model\RelationModel;

class GoodsOrderModel extends RelationModel
{
    protected $_link = array(
        'GoodsOrderDetail' => array(
            'mapping_type' => self::HAS_MANY,
            'foreign_key' => 'order_id',
            'mapping_name' => 'detail',
        ),
        'Users' => array(
            'mapping_type' => self::BELONGS_TO,
            'foreign_key' => 'user_id',
            'mapping_name' => 'user',
            'mapping_fields' => 'username',
            'as_fields' => 'username'
        ),
    );
}