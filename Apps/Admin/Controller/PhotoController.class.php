<?php
/**
 * Created by PhpStorm.
 * User: Beeant
 * Date: 2016/3/19
 * Time: 20:21
 */

namespace Admin\Controller;


class PhotoController extends BaseController
{
    public function upload(){
        $rootId = $_REQUEST['root_id'];
        if (IS_POST) {
            $config = C('UPLOAD_CONFIG');
            $upload = new \Think\Upload($config);// 实例化上传类

            // 上传文件
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功 获取上传文件信息
                foreach($info as $file){
                    $photo = M('Photos');
                    // 保存当前数据对象
                    $data['photo_name'] = $_POST['name'] ? $_POST['name'] : $file['name'];
                    $data['root_id'] = $rootId;
                    $data['photo_id'] = $this->uuid('photo_');
                    $data['savename'] = $file['savename'];
                    $data['source_name'] = $file['name'];
                    $data['size'] = $file['size'];
                    $data['type'] = $file['type'];
                    $data['ext'] = $file['ext'];
                    $data['path'] = $file['savepath'];
                    $data['md5'] = $file['md5'];
                    $data['sha1'] = $file['sha1'];

                    $image = new \Think\Image();
                    $image->open($config['rootPath'].$file['savepath'].$file['savename']);
                    // 生成一个居中裁剪为150*150的缩略图并保存为thumb.jpg
                    $thumbfile = $config['thumbRootPath'].$file['savename'];
                    $image->thumb(150, 150,\Think\Image::IMAGE_THUMB_CENTER)->save($thumbfile);
                    $data['thumbnail_path'] = $file['savename'];

                    $photo->add($data);
                }
            }
            $this->success('图片上传成功，页面跳转中...',U('Goods/photo?root_id='.$rootId));
        } else {
            $this->assign("root_id",$rootId);
            $this->display();
        }
    }

    public function delete(){
        $Photo = M('Photos');
        $condition = array();
        $condition['photo_id'] = $_POST['photo_id'];
        $photo = $Photo->where($condition)->select();
        $config = C('UPLOAD_CONFIG');
        unlink($config['rootPath'].$photo[0]['path'].$photo[0]['savename']);
        unlink($config['thumbRootPath'].$photo[0]['savename']);
        $Photo->where($condition)->delete();
        $this->ajaxReturn(1);
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