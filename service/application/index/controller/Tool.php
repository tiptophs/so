<?php
namespace app\index\controller;

use app\common\controller\Th;
use app\index\model\ToolItems;
use app\index\model\Tools;
use think\facade\Request;
use think\facade\Session;
use think\facade\Validate;

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
        $ret = array('status' => true, 'prompt' => '');
        $tools = array(
            'resource' => array( //资源下载链接
                'title' => '工具资源下载',
                'item' => array(
                    ['img' => 'http://img.php.cn/upload/article/000/000/003/5b45c06b5c808348.png', 'desc' => 'php开发工具', 'href' => 'http://www.php.cn/xiazai/gongju'],
                ),
            ),
            'toolLink' => array( //工具链接
                'title' => '在线工具链接',
                'item' => array(
                    ['img' => 'http://img.php.cn/upload/tool/000/000/001/58df1702d6551986.png', 'desc' => 'php中文网在线工具箱', 'href' => 'http://www.php.cn/xiazai/tool'],
                ),
            ),
            'website' => array( //收录网站
                'title' => '网站收录',
                'item' => array(
                    ['img' => 'http://www.php.cn/static/images/logo.png', 'desc' => 'php中文网(视频教程)', 'href' => 'http://www.php.cn/'],
                    ['img' => 'https://7nsts.w3cschool.cn/images/w3c/header-logo.png', 'desc' => 'w3c school ES5-6教程', 'href' => 'cnpm'],
                ),
            ),
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
        $ret = array('status' => true, 'prompt' => '');
        $tools = array(
            ['title' => 'Git/SVN/集中式、分布式版本控制系统', 'desc' => '版本控制系统，当然最先学习的就是git啦，毋庸置疑的好！', 'sid' => '1'],
            ['title' => 'Php/ThinkPhp/CI/后台服务', 'desc' => 'php语言，php框架都是开发后台服务不可缺少的部分！当然php是世界上最好的语言。滑稽！', 'sid' => '2'],
            ['title' => 'Bootstrap/响应式布局框架', 'desc' => '前台最流行的模版框架，其他框架都或多或少的借鉴与他！好好学习他没错！', 'sid' => '3'],
            ['title' => 'Vue.js/React/Angular前台编程框架', 'desc' => '不用细说,react/vue/angular前段程序员必学，时代在发展。当然jquery库也不能放弃！', 'sid' => '4'],
            ['title' => 'Python/scrapy相关爬虫技术', 'desc' => 'python爬虫有多火，不用多解释了吧！骚年，任务繁重啊！', 'sid' => '5'],
            ['title' => 'Mysql/Redis/MongoDb/数据库相关', 'desc' => '数据库优化,非关系型数据库，数据并发，海量数据读取...', 'sid' => '6'],
            ['title' => 'NodeJs/ES6/javascript/Jquery相关', 'desc' => '前端也应该学习下nodejs，有了它后充当后台服务，前端也可以开发完成项目了。', 'sid' => '7'],
        );
        $ret['result'] = $tools;
        return json($ret);
    }

    /**
     * 添加工具项方法
     *
     * @return void
     * @Description
     * @example
     * @author user
     * @since
     * @return $string json
     */
    public function addTools()
    {
        //设置数据的默认返回值
        $ret = array('status' => true, 'prompt' => '', 'value' => '');

        //获取提交的所有数据
        $tool = Request::param();

        //验证提交的数据
        $check = $this->checkAddTools($tool);
        if ($check['status']) {
            //添加数组到额外数据
            $tool['uid'] = Session::get('user')['uid'];
            $tool['status'] = 1; //启用
            //添加数据
            $addTool = Tools::create($tool);
            if (!$addTool) {
                $ret['status'] = false;
                $ret['prompt'] = '数据添加失败...';
            } else {
                $ret['value'] = $addTool;
            }
            //返回数据结果
            return json($ret);
        } else {
            $ret['status'] = false;
            $ret['prompt'] = $check['message'];
            return json($ret);
        }
    }

    /**
     * 获取所有工具项列表数据
     *
     * @return void
     * @Description
     * @example
     * @author user
     * @since
     */
    public function getToolList()
    {
        //设置数据的默认返回值
        $ret = array('status' => true, 'prompt' => '', 'value' => '');

        //获取当前登陆账户
        if (Session::has('user')) {
            $uid = Session::get('user')['uid'];
        } else {
            $ret['status'] = false;
            $ret['prompt'] = '请求数据异常...';
            return json($ret);
        }

        // 使用查询构造器查询
        $list = Tools::where([
            'uid' => $uid,
            'status' => 1,
        ])->select();

        if ($list) {
            $ret['value'] = $list;
            return json($ret);
        } else {
            $ret['status'] = false;
            $ret['prompt'] = '请求数据异常...';
            return json($ret);
        }
    }

    /**
     * 修改工具项数据
     *
     * @return void
     * @Description
     * @example
     * @author user
     * @since
     */
    public function editTool()
    {

        //设置数据的默认返回值
        $ret = array('status' => true, 'prompt' => '', 'value' => '');

        //获取提交数据
        $tool = Request::param();
        if ($tool['sid'] == '' || $tool['sid'] == null) {
            $ret['status'] = false;
            $ret['prompt'] = '找不到要更新的数据';
        }

        //验证数据是否规范
        $check = $this->checkAddTools($tool);
        if ($check['status']) {
            $tools = Tools::get($tool['sid']);
            $tools->title = $tool['title'];
            if ($tools->save()) {
                return json($ret);
            } else {
                $ret['status'] = false;
                $ret['prompt'] = '数据更新失败,请稍候重试...';
                return json($ret);
            }
        }
    }

    /**
     * 删除工具项
     *
     * @return void
     * @Description
     * @example
     * @author user
     * @since
     */
    public function delTool()
    {
        //设置数据的默认返回
        $ret = array('status' => true, 'prompt' => '', 'value' => '');
        //获取提交数据
        $tool = Request::param();
        if ($tool['sid'] == '') {
            $ret['status'] = false;
            $ret['prompt'] = '找不到要删除的工具项';
            return json($ret);
        }

        $tools = Tools::get($tool['sid']);
        if ($tools->delete()) {
            return json($ret);
        } else {
            $ret['status'] = false;
            $ret['prompt'] = '删除数据失败...';
            return json($ret);
        }
    }

    //+-----------------------------------
    //|  工具项下工具部分
    //+-----------------------------------

    /**
     * 添加工具
     *
     * @return void
     * @Description
     * @example
     * @author user
     * @since
     */
    public function addItemTool()
    {
        //设置默认数据返回值
        $ret = array('status' => '', 'prompt' => '', 'value' => '');

        //获取数据
        $tool = Request::param();
        $check = $this->checkItemTool($tool);

        if (!$check['status']) {
            $ret['status'] = false;
            $ret['prompt'] = $check['message'];
        };

        $tool['uid'] = Session::get('user')['uid'];
        $addItem = ToolItems::create($tool);
        if ($addItem) {
            $ret['value'] = $addItem;
        } else {
            $ret['status'] = false;
            $ret['prompt'] = '数据添加失败...';
        }
        return json($ret);
    }

    /**
     * 获取工具项下所有列表数据
     *
     * @return void
     * @Description
     * @example
     * @author user
     * @since
     */
    public function getToolItem()
    {
        $ret = array('status' => true, 'prompt' => '', 'value' => '');

        $type = Request::param('type');
        if ($type == '' || $type == null) {
            $ret['status'] = false;
            $ret['prompt'] = '未找到您选择的数据类型';
            return json($ret);
        }

        ToolItems::get($type);

        $totalNum = 0; //总条目数
        $perTotalNum = isset($data['perTotalNum']) ? $data['perTotalNum'] : 5; //每页显示多少条
        $currentPage = isset($data['currentPage']) ? $data['currentPage'] : 1; //当前也码数
        $currentNum = $currentPage == 1 ? $currentNum = 0 : ($currentPage - 1) * $perTotalNum; //当前起始条目数

        // 使用查询构造器查询
        //$totalNum = count(Article::all());

        $list = ToolItems::where([
            'uid' => Session::get('user')['uid'],
            'type' => $type])
            ->limit($currentNum, $perTotalNum)
            ->order('create_time', 'desc')
            ->all();

        $ret['value'] = array('totalNum' => $totalNum, 'tools' => $list);

        return json($ret);
    }

    //+-------------------------------
    //|        独立验证部分.以及工具函数
    //+-------------------------------

    /**
     * 添加工具箱验证部分
     * @param $data
     * @return array
     */
    protected function checkAddTools($data)
    {
        //设置返回数组
        $ret = array('status' => true);

        //定义验证字段
        $rule = [
            'title|工具项名称' => [
                'require' => 'require',
                'max' => '60',
            ],
        ];

        //初始化验证过则
        Validate::rule($rule);
        //验证数据
        if (!Validate::check($data)) {
            $ret['message'] = Validate::getError();
            $ret['status'] = false;
        }
        return $ret;
    }

    /**
     * 验证工具格式是否合法
     * @param $data
     * @return array
     */
    protected function checkItemTool($data)
    {
        //设置返回数组
        $ret = array('status' => true);

        //定义验证字段
        $rule = [
            'title|名称' => [
                'require' => 'require',
                'max' => '60',
            ],
            'type|工具项' => [
                'require' => 'require',
            ],
            'img|图片' => [
                'require' => 'require',
            ],
            'url|地址' => [
                'require' => 'require',
            ],
        ];

        //初始化验证过则
        Validate::rule($rule);
        //验证数据
        if (!Validate::check($data)) {
            $ret['message'] = Validate::getError();
            $ret['status'] = false;
        }
        return $ret;
    }
}
