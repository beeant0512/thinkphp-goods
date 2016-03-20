<?php
/**
 * Created by PhpStorm.
 * User: Beeant
 * Date: 2016/3/20
 * Time: 10:07
 */

namespace Admin\Model;


use Think\Model\RelationModel;

class GoodsOrderDetailModel extends RelationModel
{
    protected $_link = array(
        'Goods' => array(
            'mapping_type' => self::BELONGS_TO,
            'foreign_key' => 'goods_id',
            'mapping_name' => 'goods',
        ),
        'Users' => array(
            'mapping_type' => self::BELONGS_TO,
            'foreign_key' => 'user_id',
            'mapping_name' => 'user',
            'mapping_fields' => 'username',
            'as_fields'=>'username'
        ),
        'GoodsOrder' => array(
            'mapping_type' => self::BELONGS_TO,
            'foreign_key' => 'order_id',
            'mapping_name' => 'order',
            'as_fields'=>'create_time'
        )
    );
}