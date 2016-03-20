<?php
return array(
    'DEFAULT_MODULE' => 'Home', //默认模块
    /* 'URL_MODEL'             =>  3,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
     // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式*/

    // 显示页面Trace信息
    'SHOW_PAGE_TRACE' => true,
    // 开发禁用SQL缓存
    'DB_SQL_BUILD_CACHE' => false,

    'DB_TYPE' => 'mysql',     // 数据库类型
    'DB_HOST' => 'localhost', // 服务器地址
    'DB_NAME' => 'tangwj',          // 数据库名
    'DB_USER' => 'root',      // 用户名
    'DB_PWD' => '123456',          // 密码
    'DB_PORT' => '3306',        // 端口
    'DB_PREFIX' => 'share_',    // 数据库表前缀
    'LOAD_EXT_CONFIG' => 'uploadfile,config_page'
);