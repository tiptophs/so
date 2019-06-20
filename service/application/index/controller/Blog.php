<?php

namespace app\index\controller;

use app\common\controller\Th;
use think\App;
use think\facade\Request;
use think\facade\Validate;
use app\index\model\Article;
use think\facade\Session;
use think\facade\Env;

class Blog extends Th {

    public $base_upload_path = '';
    public $article_upload_path = '';

    /**
     * 构造函数
     */
    public function __construct(App $app = null)
    {
        parent::__construct($app);
    }

    /**
     *初始化
     */
    public function initialize(){
        $this->base_upload_path = Env::get('root_path').'public/upload/user';
        $this->article_upload_path = $this->base_upload_path.'/'.Session::get('user')['uid'].'/article/'.$this->getFileNameByTime();
    }

    //+---------------------------------------
    //|    文章创建、编辑、删除、查询等操作部分
    //+---------------------------------------

    /**
     * ajax 提交文章数据
     * @return \think\response\Json
     */
    public function save(){
        if(Request::post()){        //判断是否为post提交数据
            $data = Request::param();
            $file = Request::file('back');

            if(!is_null($file)){
                // 移动到框架应用根目录/public/uploads/user 目录下
                $info = $file->rule('uniqid')->move($this->article_upload_path);
                $data['back'] = $this->getFileNameByTime().'/'.$info->getSaveName();
                //修改尺寸
                //resize_image($info->getSaveName(), $this->article_upload_path.'/'.$info->getSaveName(), 1611, 946);
            }

            $data['uid'] = Session::get('user')['uid'];
            $check = $this->checkSaveArticle($data);

            if($check['status']){
                $article = Article::create($data);
                if($article){
                    return json(['status'=>true, 'prompt'=>'数据存储成功！']);
                }else{
                    return json(['status'=>false, 'prompt'=>'数据存储失败，请稍后重试...']);
                }
            }else{
                return json(['status'=>false, 'prompt'=>$check['message']]);
            }
        }else{
            return json(['status'=>false, 'prompt'=>'您的请求是非法的...']);
        }
    }


    /**
     * 删除文章数据
     * @return \think\response\Json
     */
    public function delArticle(){

        $ret = array('status'=>true, 'prompt'=>'', 'value'=>'');
        $sid = Request::param('sid');
        if(Article::destroy($sid)){
            return json($ret);
        }else{
            $ret['prompt']='删除数据失败...';
            return json($ret);
        }

    }


    /**
     * 获取分页后的文章
     * @return \think\response\Json
     * @throws \think\Exception\DbException
     */
    public function getArticles()
    {
        //设置返回数组
        $ret = array( 'status'=>true, 'value'=>'', 'prompt'=>'' );

        $data = Request::param();       //获取提交的参数

        $totalNum = 0;                                                                          //总条目数
        $perTotalNum = isset($data['perTotalNum'])? $data['perTotalNum']:5;                     //每页显示多少条
        $currentPage = isset($data['currentPage'])? $data['currentPage']:1;                     //当前也码数
        $currentNum = $currentPage==1? $currentNum=0 : ($currentPage-1)*$perTotalNum;           //当前起始条目数

        // 使用查询构造器查询
        $totalNum = count(Article::all());

        $list = Article::where('uid', Session::get('user')['uid'])
            ->limit($currentNum, $perTotalNum)
            ->order('create_time', 'desc')
            ->all();

        $ret['value'] = array( 'totalNum' => $totalNum, 'articles' => $list );

        return json( $ret );
    }


    /**
     * 获取文章详情
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function detail(){
        //设置默认返回数组
        $ret = array( 'status'=>true, 'value'=>'', 'prompt'=>'' );

        $data = Request::param();        //获取提交的参数

        if( !isset($data['sid']) || $data['sid']=='' ){
            $ret['status'] = false;
            $ret['prompt'] = '文章不存在...';
            return json($ret);
        }

        $detail = Article::where('sid', $data['sid'])->find();

        if($detail!=null){
            $ret['value'] = $detail;
            return json($ret);
        }else{
            $ret['status'] = false;
            $ret['prompt'] = '文章不存在...';
            return json($ret);
        }
    }






    //+-------------------------------
    //|        独立验证部分.以及工具函数
    //+-------------------------------

    /**
     * 文章数据填写验证
     * @param $data
     * @return array
     */
    protected function checkSaveArticle($data){
        //设置返回数组
        $ret = array('status'=>true);

        //定义验证字段
        $rule = [
            'title|标题'=>[
                'require' => 'require',
                'max'     => '60'
            ],
            'desc|文章描述'=>[
                'require' => 'require',
                'max'     => '300'
            ],
            'category|分类'=>[
                'require' => 'require'
            ],
            'type|类别'=>[
                'require' => 'require',
                'number'  => 'number'
            ],
            'tag|标签'=>[
                'require' => 'require'
            ],
            'content|正文'=>[
                'require' => 'require'
            ]
        ];

        //初始化验证过则
        Validate::rule($rule);
        //验证数据
        if(!Validate::check($data)){
            $ret['message'] = Validate::getError();
            $ret['status'] = false;
        }
        return $ret;
    }


    //+------------------------------
    //|         工具函数部分
    //+------------------------------


    /**
     * 获取以时间为名称的文件名
     */
    protected function getFileNameByTime()
    {
        return date('Ymd', time());
    }


    //+------------------------------- 
    //|         测试函数部分
    //+-------------------------------

    public function test(){
        echo 'this controller is ok';
    }

}
