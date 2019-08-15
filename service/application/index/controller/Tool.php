<?php
namespace app\index\controller;

use app\common\controller\Th;
use think\facade\Request;
use think\facade\Validate;
use think\facade\Session;

class Tool extends Th
{
    
   /**
    * 获取首页资源工具数据
    *
    * @return void
    * @Description
    * @example
    * @author tiptop
    * @since
    */
    public function getTools()
    {
        $ret = array('status'=>true, 'prompt'=>'');
        $tools = array(
            'resource'=>array(                  //资源下载链接
                'title'=>'工具资源下载',
                'item'=>array(
                    ['img'=>'http://img.php.cn/upload/article/000/000/003/5b45c06b5c808348.png', 'desc'=>'php开发工具', 'href'=>'http://www.php.cn/xiazai/gongju'] 
                )
            ),
            'toolLink'=>array(                  //工具链接
                'title'=>'在线工具链接',
                'item'=>array(
                    ['img'=>'http://img.php.cn/upload/tool/000/000/001/58df1702d6551986.png', 'desc'=>'php中文网在线工具箱', 'href'=>'http://www.php.cn/xiazai/tool'] 
                )
            ),
            'website'=>array(                   //收录网站
                'title'=>'网站收录',
                'item'=>array(
                    ['img'=>'http://www.php.cn/static/images/logo.png', 'desc'=>'php中文网(视频教程)', 'href'=>'http://www.php.cn/'], 
                    ['img'=>'https://7nsts.w3cschool.cn/images/w3c/header-logo.png', 'desc'=>'w3c school ES5-6教程', 'href'=>'https://www.w3cschool.cn/ecmascript/']
                )
            )
        );
        $ret['result'] = $tools;
        return json($ret);
    }


    /**
     * 获取我的技能分类数据
     *
     * @return void
     * @Description
     * @example
     * @author tiptop
     * @since
     */
    public function getSkills()
    {
        $ret = array('status'=>true, 'prompt'=>'');
        $tools = array(
            ['title'=>'Git/SVN/集中式、分布式版本控制系统', 'desc'=>'版本控制系统，当然最先学习的就是git啦，毋庸置疑的好！', 'sid'=>'1'],
            ['title'=>'Php/ThinkPhp/CI/后台服务', 'desc'=>'php语言，php框架都是开发后台服务不可缺少的部分！当然php是世界上最好的语言。滑稽！', 'sid'=>'2'],
            ['title'=>'Bootstrap/响应式布局框架', 'desc'=>'前台最流行的模版框架，其他框架都或多或少的借鉴与他！好好学习他没错！', 'sid'=>'3'],
            ['title'=>'Vue.js/React/Angular前台编程框架', 'desc'=>'不用细说,react/vue/angular前段程序员必学，时代在发展。当然jquery库也不能放弃！', 'sid'=>'4'],
            ['title'=>'Python/scrapy相关爬虫技术', 'desc'=>'python爬虫有多火，不用多解释了吧！骚年，任务繁重啊！', 'sid'=>'5'],
            ['title'=>'Mysql/Redis/MongoDb/数据库相关', 'desc'=>'数据库优化,非关系型数据库，数据并发，海量数据读取...', 'sid'=>'6'],
            ['title'=>'NodeJs/ES6/javascript/Jquery相关', 'desc'=>'前端也应该学习下nodejs，有了它后充当后台服务，前端也可以开发完成项目了。', 'sid'=>'7']
        );
        $ret['result'] = $tools;
        return json($ret);
    }

}
