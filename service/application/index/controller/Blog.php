<?php

namespace app\index\controller;

use app\common\controller\Th;
use think\App;
use think\facade\Request;
use think\facade\Validate;
use app\index\model\Article;
use think\facade\Session;
use think\facade\Env;
use think\facade\Config;

class Blog extends Th {

    
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
            $data['uid'] = Session::get('user')['uid'];
            $file = Request::file('back');

            //文件上传
            if(!is_null($file)){
                // 移动到框架应用根目录/public/uploads/user 目录下
                $upload_path = Config::get('custom.file_upload_path').'/'. $data['uid'].'/'.$this->getFileNameByTime();
                $info = $file->rule('uniqid')->move($upload_path);
                $data['back'] = $this->getFileNameByTime().'/'.$info->getSaveName();
                //修改尺寸
                //resize_image($info->getSaveName(), $this->article_upload_path.'/'.$info->getSaveName(), 1611, 946);
            }
            
            //验证数据
            $check = $this->checkSaveArticle($data);
            if($check['status']){

                if($data['sid']==''){
                    //添加数据
                    unset($data['sid']);
                    $article = Article::create($data);
                    if($article){
                        return json(['status'=>true, 'prompt'=>'数据存储成功！']);
                    }else{
                        return json(['status'=>false, 'prompt'=>'数据存储失败，请稍后重试...']);
                    }
                }else{
                    //更新数据 
                    $up = Article::update($data);
                    if($up){
                        return json(['status'=>true, 'prompt'=>'数据更新成功！']);
                    }else{
                        return json(['status'=>false, 'prompt'=>'数据更新失败，请稍后重试...']);
                    }
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
        
        $article = Article::get($sid);
        $path = Config::get('custom.file_upload_path').'/'. $sid.'/'.$article['back'];
        if($article->delete()){
            $this->unlinkPathFile($path);
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

   /**
     * 文章数据填写验证
     * @param $data
     * @return array
     */
    protected function checkMarkSave(){
        //设置返回数组
        $ret = array('status'=>true);

        //定义验证字段
        $rule = [
            'title|标题'=>[
                'require' => 'require',
                'max'     => '60'
            ],
            'category|分类'=>[
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

    /**
     * 删除指定路径下的文件
     * @param $path string
     */
    protected function unlinkPathFile($path){
        return unlink($path);
    }


    //+------------------------------- 
    //|         测试函数部分
    //+-------------------------------

    public function test(){
        echo 'this controller is ok';
    }

}
