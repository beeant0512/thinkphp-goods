<?php
return array(
    'UPLOAD_CONFIG' => array(
        //文件上传的最大文件大小（以字节为单位），0为不限大小
        'maxSize' => 3145728,
        //文件上传保存的根路径
        'rootPath' => './Uploads/',
        //文件上传的保存路径（相对于根路径）
        'savePath' => '',
        //上传文件的保存规则，支持数组和字符串方式定义
        'saveName' => array('uniqid', ''),
        //上传文件的保存后缀，不设置的话使用原文件后缀
        'saveExt' => '',
        //存在同名文件是否是覆盖，默认为false
        'replace' => false,
        //允许上传的文件后缀（留空为不限制），使用数组或者逗号分隔的字符串设置，默认为空
        'exts' => array('jpg', 'gif', 'png', 'jpeg'),
        //允许上传的文件类型（留空为不限制），使用数组或者逗号分隔的字符串设置，默认为空
        'mimes' => '',
        //自动使用子目录保存上传文件 默认为true
        'autoSub' => true,
        //子目录创建方式，采用数组或者字符串方式定义
        'subName' => array('date', 'Ymd'),
        //是否生成文件的hash编码 默认为true
        'hash' => true,
        //检测文件是否存在回调，如果存在返回文件信息数组
        //'callback' => '',
        //自添加，缩略图根路径
        'thumbRootPath' => './Thumbs/',
        /*上传插件所需的配置*/
        // 允许的扩展
        'allowedFileExtensions' => '["jpg","gif","png","jpeg"]',
        // 单次最大上传个数
        'maxFileCount' => 10,
    )
);