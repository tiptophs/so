<?php

namespace app\index\model;
use think\Model;

class User extends Model{

    protected $pk = 'sid';      //默认主键
    protected $table = 'so_user';      //默认数据表

    protected $autoWriteTimestamp = 'datetime'; //开启自动时间戳，并且设置为datetime格式

    protected $createTime = 'create_time';  //创建时间字段
    protected $updateTime = 'update_time';  //更新时间字段
    protected $dateFormat = 'Y-m-d H:i:s';  //时间字段取出后的默认时间格式


    //用户状态获取器
    public function getStatusAttr($value){
        $status = ['1'=>'启用', '0'=>'禁用'];
        return $status[$value];
    }

    //用户性别获取器
    public function getSexAttr($value){
        $sex = ['1'=>'男', '0'=>'女'];
        return $sex[$value];
    }

    //用户密码修改器
    public function setPasswordAttr($value)
    {
        return sha1($value);
    }
}