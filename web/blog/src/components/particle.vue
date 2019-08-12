<template>
    <div class="personal-particle">
        <!--顶部图片-->
        <div class="agile_inner"></div>
        <!--页面导航-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">
                <ul class="w3_short">
                    <li><router-link to="/home">首页</router-link><span>|</span></li>
                    <li><router-link to="/personal">个人中心</router-link><span>|</span></li>
                    <li>文章创建</li>
                </ul>
            </div>
        </div>
        <!--页面正文部分-->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-default" style="margin-bottom:15px;" @click="switchEditor"> 切换编辑模式 </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="article-base">
                            <div class="form-group article-title">
                                <label class="form-label" for="title">文章标题</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="请在此输入文章标题..." v-model="articles.title">
                            </div>

                            <div class="form-group article-desc">
                                <label class="form-label" for="desc">文章描述</label>
                                <textarea class="form-control" id="desc" rows="4" placeholder="请在此输入描述信息..." v-model="articles.desc"></textarea>
                            </div>

                            <div class="article-background">
                                <label class="form-label" for="desc">预览图</label> 
                                <v-upload></v-upload>
                            </div>
                            <div class="article-config" style="margin-top:40px;">
                                <label class="form-label">配置</label><hr style="margin-top:0px;"/>
                                <div class="row">
                                    <div class="form-group" v-if="isCk">
                                        <label class="col-sm-4 control-label" style="line-height: 34px;">分类</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" v-model="articles.category">
                                                <option v-for="(cate, index) in category" :value="cate.id" :key="index">{{ cate.title }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group" v-if="!isCk">
                                        <label class="col-sm-4 control-label" style="line-height: 34px;">分类</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" v-model="articles.category">
                                                <option v-for="skill in skills" :key="skill.sid" :value="skill.sid">{{ skill.title }}</option>
                                            </select>
                                        </div>
                                    </div><br/>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" style="line-height: 34px;">类别</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" v-model="articles.type">
                                                <option value="1">原创</option>
                                                <option value="2">转载</option>
                                                <option value="3">翻译</option>
                                            </select>
                                        </div>
                                    </div><br/>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" style="line-height: 34px;">标签</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="tagName" value="" placeholder="名称" style="margin-bottom: 5px;" v-model="tagName" />
                                        </div>
                                        <div class="col-sm-12">
                                            <button class="btn btn-primary pull-right" @click="addTag"><i class="fa fa-plus"></i> 添加类型</button>
                                            <div style="clear: both;"></div>
                                            <div class="tags" id="tags">
                                                <template v-for="(item, index) in tags">
                                                    <span class="ar-tag" :key="item.id"><i class="fa fa-times-circle" @click="tags.splice(index, 1)"></i> {{ item.title }} </span>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <v-ckeditor ref="ck" v-if="isCk"></v-ckeditor>
                        <div class="mark-mavon" v-if="!isCk">
                            <mavon-editor :ishljs = "false" v-model="articles.content"></mavon-editor>     
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="article-button">
                            <button type="button" class="btn btn-primary" @click="saveArticle"><i class="fa fa-save"></i> 保存 </button>
                            <button type="button" class="btn btn-primary" @click="goBack"><i class="fa fa-mail-reply"></i> 返回 </button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <v-toast v-show="showDialog" :dialog-option="dialogOption" ref="dialog"></v-toast>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    //引入自定义组件
    import upload_img from './plugins/shupload/upload.vue';
    export default {
        data() {
            return {
                articles: {             //文章对象
                    title: '',
                    desc: '',
                    back: '',
                    type:1,
                    category:1,
                    tag: [],
                    content: '',
                    editor:1
                },
                tags: [
                    { id: 1, title: '后端', },
                    { id: 2, title: '前端', },
                    { id: 3, title: 'vue.js' },
                    { id: 4, title: 'php' },
                    { id: 5, title: 'node.js'}
                ],
                tagName: '',             //自定义标签输入名称
                tagId: 6,                //自定义标签编号
                showDialog: false,       //提示组件信息
                dialogOption:{           //组件默认值
                },
                category:[
                    { id:1, title:'php' },
                    { id:2, title:'html' },
                    { id:3, title:'css' },
                    { id:4, title:'javascript/jquery' },
                    { id:5, title:'vue.js' },
                    { id:6, title:'react.js' },
                    { id:7, title:'angular.js' },
                    { id:8, title:'node.js' },
                    { id:9, title:'thinkphp' },
                    { id:10, title:'CI' },
                    { id:11, title:'rabbitMQ' },
                    { id:12, title:'redis' },
                    { id:13, title:'mysql' },
                    { id:14, title:'后端技术' },
                    { id:15, title:'前端模版/Bootstrap/Ant/ECharts...' },
                    { id:16, title:'其他综合' },
                    { id:16, title:'日常生活' }
                ],
                skills:[],
                isCk: true              //默认编辑模式为ckeditor
                
            };
        },
        components: {
            'v-upload' : upload_img
        },
        methods: {
            //添加标签
            addTag: function(){
                if(this.tagName.trim()=='') return false;
                this.tags.push({
                    id:this.tagId++,
                    title:this.tagName
                });
                this.tagName = '';
            },
            goBack: function(){
                this.showDialog = true;
                this.dialogOption.text = '确定返回？返回后数据无法保存, 是否先保存后返回？';
                this.dialogOption.confirmDisplay = true;
                this.$refs.dialog.confirm().then(() => {
                    this.showDialog = false;
                    this.saveArticle();
                }).catch(() => {
                    this.showDialog = false;
                    this.$router.push("/personal");
                })
            },
            saveArticle: function () {

                this.articles.tag = JSON.stringify(this.tags);
                
                let upfiles = document.getElementById('ass-upload').files['0'];
                this.articles.back = typeof upfiles == 'undefined'? '':upfiles;

                if(this.isCk){
                    this.articles.content = this.$refs.ck.getValue();
                }

                if(this.articles.content.trim()=='' || this.articles.desc.trim()=='' || this.articles.title.trim()==''){
                    this.showDialog = true;
                    this.dialogOption.text = '标题，描述，正文不能为空！';
                    this.dialogOption.confirmDisplay = false;
                    this.$refs.dialog.confirm().then(() => {
                        this.showDialog = false;
                    }).catch(() => {
                        this.showDialog = false;
                    })
                }else{
                    let url = '/api/index/blog/save';               // 这里就是刚才的config/index.js中的/api
                    let form_data =  new FormData();
                    this.$axios({
                        method: "post",
                        url: url,
                        param:{},
                        headers: { "Content-Type": "multipart/form-data" },
                        // onUploadProgress: e => {
                        //     let completeProgress = ((e.loaded / e.total * 100) | 0) + "%";
                        //     //this.progress = completeProgress;
                        // },
                        data: this.articles,
                        transformRequest: [data=> {
                            for(let el in data){
                                form_data.append(el, data[el]);
                            }
                            return form_data;
                        }]
                    }).then(res => {
                        if(res.data.status){
                            this.showDialog = true;
                            this.dialogOption.text = res.data.prompt;
                            this.dialogOption.confirmDisplay = false;
                            this.$refs.dialog.confirm().then(() => {
                                this.showDialog = false;
                            }).catch(() => {
                                this.showDialog = false;
                            })
                            setTimeout( ()=>{
                                this.$router.push("/personal");
                            }, "3000"); //5秒后执行testFunction()函数，只执行一次。
                        }else{
                            this.showDialog = true;
                            this.dialogOption.text = res.data.prompt;
                            this.dialogOption.confirmDisplay = false;
                            this.$refs.dialog.confirm().then(() => {
                                this.showDialog = false;
                            }).catch(() => {
                                this.showDialog = false;
                            })
                        }
                    }).catch(function(err) {
                        this.showDialog = true;
                        this.dialogOption.text = '请求异常,请稍后重试...';
                        this.dialogOption.confirmDisplay = false;
                        this.$refs.dialog.confirm().then(() => {
                            this.showDialog = false;
                        }).catch(() => {
                            this.showDialog = false;
                        })
                    })
                }
            },
            initArticle: function(){                            //文章页面初始化方法
                let sid  = this.$route.query.sid;
                if( sid=='' || typeof sid == 'undefined') return false;

                let url = '/api/index/blog/detail';              // 这里就是刚才的config/index.js中的/api
                this.$axios({                                   //请求数据
                    method: "post",
                    url: url,
                    param:{},
                    data: {sid:sid},
                    transformRequest: [data=> {
                        return this.qs.stringify(data);
                    }]
                }).then(res=>{
                    if(res.data.status){
                        //转换数据格式
                        this.articles = res.data.value;
                        this.$refs.ck.setValue(this.articles.content);
                        //console.log(this.articles);
                    }else{
                        this.showDialog = true;
                        this.dialogOption.text = res.data.prompt;
                        this.dialogOption.confirmDisplay = false;
                        this.$refs.dialog.confirm().then(() => {
                            this.showDialog = false;
                        }).catch(() => {
                            this.showDialog = false;
                        })
                    }
                }).catch(function(err){
                    this.showDialog = true;
                    this.dialogOption.text = '请求异常,请稍后重试...';
                    this.dialogOption.confirmDisplay = false;
                    this.$refs.dialog.confirm().then(() => {
                        this.showDialog = false;
                    }).catch(() => {
                        this.showDialog = false;
                    })
                });
            },
            switchEditor: function(){
                this.isCk = !(this.isCk);
                this.articles.editor = this.isCk==true? 1:2
            },
            //获取我的相关技能，并且展示
            gitskills:function(){                   
                let url = '/api/index/tool/getSkills';        // 这里就是刚才的config/index.js中的/api
                this.$axios({
                    method: "post",
                    url: url,
                    param:{},
                    data: {},
                    transformRequest: [data=> {
                        return this.qs.stringify(data);
                    }]
                }).then(res => {
                    if(res.data.status){
                        this.skills = res.data.result;
                    }
                }).catch(function(err) {})
            }
        },
        mounted() {
            this.initArticle();
            this.gitskills();
        }
    }
</script>

<style scoped>
    .wrapper {
        padding:45px 0px;
    }

    @media (min-width: 1650px){
        .container {
            width: 1318px;
        }
    }

    .article-base {
        border:1px solid #dedede;
        border-radius: 4px;
        padding:15px;
        min-height:560px;
    }

    .form-label {
        margin-bottom:10px;
        font-size: 18px;
    }

    .tags {
        border: 1px solid #ccc;
        border-radius:4px;
        padding:5px;
        margin-top:5px;
        background-color: #DBDBDB;
        min-height: 85px;
    }
    .ar-tag {
        border:1px solid #ccc;
        padding:7px 10px;
        border-radius:4px;
        display: inline-block;
        margin:3px;
        background-color: #fafafa;
    }

    .tag-remove {
        cursor: pointer;
        color: #6589cc;
    }

    .article-button {
        margin-top: 15px;
        border-top: 1px solid #ccc;
        padding:10px 0px;
    }

    .article-button button {
        margin-right:7px;
        float: right;
    }
</style>
<style>

    .markdown-body {
        min-height: 825px !important;   
    }

</style>