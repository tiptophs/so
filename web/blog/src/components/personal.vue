<template>
    <div class="personal-container">
        <!--顶部图片-->
        <div class="agile_inner"></div>
        <!--页面导航-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

                <ul class="w3_short">
                    <li><router-link to="/home">首页</router-link><span>|</span></li>
                    <li>个人中心</li>
                </ul>
            </div>
        </div>

        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="user-info">
                            <h3 class="title">
                                <img class="user-image" src="/static/img/banner2.3147d7c.jpg"/>
                                <span class="user-name">夏日小呆</span>
                                <p style="margin-top:15px;">阳光总在风雨后,但是风雨中也会有阳光啊...</p>
                            </h3>
                            <div class="article-info">
                                <dl class="text-center">
                                    <dt>评论</dt>
                                    <dd><span class="count">192</span></dd>
                                </dl>
                                <dl class="text-center">
                                    <dt>文章</dt>
                                    <dd><span class="count">132</span></dd>
                                </dl>
                                <dl class="text-center">
                                    <dt>访问</dt>
                                    <dd><span class="count">423</span></dd>
                                </dl>
                                <dl class="text-center">
                                    <dt>留言</dt>
                                    <dd><span class="count">132</span></dd>
                                </dl>
                            </div>
                            <div class="personal-operations">
                                <div class="list-group">
                                    <router-link to="/personal" tag="a" href="javascript:;" class="list-group-item" style="border-radius: 0px;">我的首页</router-link>
                                    <router-link to="/mark" tag="a" href="javascript:;" class="list-group-item">Markdown备课</router-link>
                                    <router-link to="/personal/particle" tag="a" href="javascript:;" class="list-group-item">琐碎笔记</router-link>
                                    <a href="#" class="list-group-item">笔记查询</a>
                                    <a href="#" class="list-group-item">页面控制</a>
                                    <a href="#" class="list-group-item" style="border-bottom:1px solid #ccc;">分类管理</a>
                                </div>
                            </div>
                        </div>

                        <div class="article-year">
                            <h3 class="title">
                                <i class="fa fa-wpforms"></i> 归档
                            </h3>
                            <div class="article-line">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a class="year">2015年1月-12月</a>
                                        <span class="badge">14</span>
                                    </li>
                                    <li class="list-group-item">
                                        <a class="year">2015年1月-12月</a>
                                        <span class="badge">2</span>
                                    </li>
                                    <li class="list-group-item">
                                        <a class="year">2015年1月-12月</a>
                                        <span class="badge">1</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="article-display">
                            <div class="top">
                                <dl>
                                    <dt style="font-weight: normal; margin-right: 35px;">笔记总数 : {{ totalNum }}</dt>
                                    <dt style="font-weight: normal;">排序：</dt>
                                    <dd><a href="javascript:;" class="btn-filter-sort " target="_self">默认</a></dd>
                                    <dd><a href="javascript:;" class="btn-filter-sort active" target="_self">按更新时间</a></dd>
                                    <dd><a href="javascript:;" class="btn-filter-sort " target="_self">按访问量</a></dd>
                                </dl>
                            </div>
                            <div class="articles-content">
                                <template v-for="(item, index) in articles">
                                    <div class="article-item" :key="index">
                                        <h3><router-link :to="{ name:'message', query:{ sid:item.sid } }" href="javascript:;">{{ item.title }}</router-link></h3>
                                        <p>{{ item.desc }}</p>
                                        <div class="bot">
                                            <div class="art-meta">
                                                <i class="fa fa-calendar"></i> <span class="time"> {{ item.create_time }}</span>
                                                <i class="fa fa-eye"></i> <span class="read"> {{ item.clicks || 0 }}</span>
                                                <i class="fa fa-heart"></i> <span class="read"> {{ item.collection || 0 }}</span>
                                            </div>
                                            <div class="operation">
                                                <router-link tag="a" :to="{ name:'particle', query:{ sid:item.sid } }"><i class="fa fa-mail-reply"></i> 展示</router-link>
                                                <router-link tag="a" :to="{ name:'particle', query:{ sid:item.sid } }"><i class="fa fa-edit"></i> 编辑</router-link>
                                                <a href="javascript:;" @click="delArticle(item.sid)"><i class="fa fa-trash-o"></i> 删除</a>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div class="pages">
                            <ul class="pagination pagination-lg">
                                <li><a href="javascript:;" @click="getArticles( 1 )"><span aria-hidden="true">首页</span></a></li>
                                <li><a href="javascript:;" aria-label="Previous"><span aria-hidden="true"> << </span></a></li>

                                <template v-for="(item, index) in pageLine">
                                    <li :key="index"><a :class="{ active: item.isActive }" @click="getArticles( item.page )" href="javascript:;"><span aria-hidden="true">{{ item.page }}</span></a></li>
                                </template>

                                <li><a href="javascript:;" aria-label="Next"><span aria-hidden="true"> >> </span></a></li>
                                <li><a href="javascript:;" @click="getArticles( pageNum )"><span aria-hidden="true">末页</span></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "personal",
        data(){
            return {
                articles:[],         //文章信息列表
                pageLine:[],         //文章分页数据
                totalNum: 0,         //总条目数
                pageNum:1,           //文章页码数
                currentPage:1        //当前也码数
            }
        },
        components:{

        },
        methods:{
            getArticles: function (cp=1, ptn=5) {
                if(cp == '...') return false;
                let url = '/api/index/blog/getArticles';        // 这里就是刚才的config/index.js中的/api
                this.currentPage = cp;
                this.$axios({
                    method: "post",
                    url: url,
                    param:{},
                    data: { currentPage:cp, perTotalNum:ptn },
                    transformRequest: [data=> {
                        return this.qs.stringify(data);
                    }]
                }).then(res => {
                    if(res.data.status){
                        //转换数据格式
                        this.totalNum = res.data.value.totalNum;
                        this.articles = res.data.value.articles;
                        this.pageNum = Math.ceil((this.totalNum)/ptn);
                        this.getPageLine(cp, Math.ceil((this.totalNum)/ptn));

                    }
                }).catch(function(err) {})
            },
            getPageLine: function ( dqPage, pageCount ) {              //获取当前页码样式列表
                this.pageLine = [];                                    //重新赋值

                var i = 1;
                var item={};

                if (pageCount <= 5 ) {                                  //总页数小于五页，则加载所有页

                    for (i; i <= pageCount; i++) {
                        if (i == dqPage) {
                            item = { isActive:true, page:i };
                        }else{
                            item = { isActive:false, page:i };
                        }
                        this.pageLine.push(item);
                    };

                }else if (pageCount > 5) {                              //总页数大于五页，则加载五页

                    if (dqPage < 5) {                                   //当前页小于5，加载1-5页

                        for (i; i <= 5; i++) {
                            if (i == dqPage) {
                                item = { isActive:true, page:i };
                            }else{
                                item = { isActive:false, page:i };
                            }
                            this.pageLine.push(item);
                        };

                        if (dqPage <= pageCount-2) {                    //最后一页追加“...”代表省略的页
                            item = { isActive:false, page:'...' };
                            this.pageLine.push(item);
                        }

                    }else if (dqPage >= 5) {                            //当前页大于5页

                        for (i; i <= 2; i++) {                          //1,2页码始终显示
                            item = { isActive:false, page:i };
                            this.pageLine.push(item);
                        }

                        item = { isActive:false, page:'...' };           //2页码后面用...代替部分未显示的页码
                        this.pageLine.push(item);

                        if (dqPage+1 == pageCount) {                    //当前页+1等于总页码

                            for(i = dqPage-1; i <= pageCount; i++){     //“...”后面跟三个页码当前页居中显示
                                if (i == dqPage) {
                                    item = { isActive:true, page:i };
                                }else{
                                    item = { isActive:false, page:i };
                                }
                                this.pageLine.push(item);
                            }

                        }else if (dqPage >= pageCount) {                 //当前页数等于总页数则是最后一页页码显示在最后

                            for(i = dqPage-2; i <= pageCount; i++){      //...后面跟三个页码当前页居中显示
                                if (i == dqPage) {
                                    item = { isActive:true, page:i };
                                }else{
                                    item = { isActive:false, page:i };
                                }
                                this.pageLine.push(item);
                            }

                        }else if( dqPage < pageCount ){                 //当前页小于总页数，则最后一页后面跟...

                            for(i = dqPage-1; i <= dqPage+1; i++){      //dqPage+1页后面...
                                if (i == dqPage) {
                                    item = { isActive:true, page:i };
                                }else{
                                    item = { isActive:false, page:i };
                                }
                                this.pageLine.push(item);
                            }
                            item = { isActive:false, page:'...' };
                            this.pageLine.push(item);

                        }
                        console.log(this.pageLine);
                    }
                }
            },
            delArticle: function( sid ){
                if( sid=='' ) return false;
                this.$axios({
                    method: "post",
                    url: '/api/index/blog/delArticle',
                    param:{},
                    data:{sid:sid},
                    transformRequest: [data=>{
                        return this.qs.stringify(data);
                    }]
                }).then(res=>{
                    if( res.data.status ){
                        this.getArticles(this.currentPage);
                    }
                }).catch(err=>{});
            }
        },
        mounted() {
            this.getArticles();
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

    .user-info, .article-year{
        border: 1px solid #DBDBDB;
        border-radius: 4px;
        margin-bottom:35px;
    }

    .article-display {
        border: 1px solid #DBDBDB;
        border-radius: 4px;
    }

    .user-info {
        border-bottom: none;
    }


    .user-info .title, .user-info .article-info {
        border-bottom:1px solid #DBDBDB;
        padding:15px;
    }

    .article-year .title {
        border-bottom:1px solid #DBDBDB;
        padding:15px;
        text-align: left;
    }

    .article-year .article-line {
        padding:15px;
    }

    .user-info .article-info {
        display: flex;
        justify-content: space-between;
        width:100%;
    }

    .user-info .article-info dl {
        margin:0px;
    }

    .user-info .article-info dl dt {
        padding:10px;
        font-weight: normal;
    }

    .user-info .article-info dl dd {
        font-weight: 700;
    }

    .user-info .user-image {
        width:60px;
        height:60px;
        border-radius: 50%;
    }

    .user-info .user-name {
        margin-left:15px;
    }

    .list-group-item {
        border:none;
    }

    .list-group {
        margin-bottom:0px;
    }

    .article-display .top {
        padding:12px 24px;
        border-bottom:1px solid #DBDBDB;
    }

    .article-display .bot {
        display: flex;
        justify-content: space-between;
    }

    .article-display .article-item {
        padding:16px 24px 10px;
        border-bottom: 1px solid #DBDBDB;
    }

    .article-display .article-item p {
        margin:15px 0px;
        line-height:22px;
    }

    .article-display .article-item:last-child {
        border-bottom: none;
    }

    .article-display .top dl {
        display: flex;
        justify-content: flex-end;
        margin-bottom:0px;
    }

    .article-display .top dl dd {
        margin-left:43px;
    }

    .article-display .articles-content h3 {
        margin-bottom: 8px;
        font-size: 22px;
        line-height: 24px;
        color: #3d3d3d;
        display: inline-block;
    }

    .article-display .art-meta, .operation {
        margin-top:8px;
    }

    .article-display .art-meta i {
        margin-left:15px;
    }

    .article-display .art-meta i:first-child{
        margin-left:0px;
    }

    .article-display .operation a {
        margin-left:10px;
        border:1px solid #ccc;
        padding:5px 10px;
        border-radius: 4px;
    }

    .list-group-item.active, .list-group-item.active:focus, .list-group-item.active:hover {
        background-color: #dbdbdb;
    }

    .pagination>li {
        margin-right:3px;
        display: inline-block;
    }

    .pagination>li .active {
        background-color: #ffb500;
        border-color: #ffb500;
    }


</style>