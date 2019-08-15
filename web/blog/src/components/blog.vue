<template>
    <div class="blog-container">
        <!--顶部图片-->
        <div class="agile_inner"></div>
        <!--页面导航-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

                <ul class="w3_short">
                    <li><router-link to="/home">首页</router-link><span>|</span></li>
                    <li>日记本</li>
                </ul>
            </div>
        </div>
        <!--博客内容界面-->
        <div class="banner-bottom" style="padding-top:45px;">
            <div class="container">
                <div class="wthree_head_section">
                    <h3 class="w3l_header w3_agileits_header">夏贰小呆 <span>Blog</span></h3>
                </div>
                <div class="agile_wthree_inner_grids">
                    <div class="col-md-8 event-left w3-agile-event-left">

                        <template v-for="(item, index ) in articles">
                            <div class="event-left1 w3-agile-event-left1" :key="index">
                                <div class="event-left1-left agile-event-left1-left">
                                    <a href="single.html"><img :src="item.back" alt=" " class="img-responsive" /></a>
                                    <div class="event-left1-left-pos agileits-w3layouts-event-left1-left-pos">
                                        <ul>
                                            <li><a href="#"><span class="fa fa-tags" aria-hidden="true"></span>5 标签</a></li>
                                            <li><a href="#"><span class="fa fa-heart-o" aria-hidden="true"></span>230 喜欢</a></li>
                                            <li><a href="#"><span class="fa fa-user" aria-hidden="true"></span> 作者</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="event-left1-right w3-agileits-event-left1-right">
                                    <h4>{{ item.create_time }}</h4>
                                    <h5><router-link tag="a" :to="{ name:'message', query:{ sid:item.sid } }" href="javascript:;">{{ item.title }}</router-link></h5>
                                    <p>{{ item.desc }}</p>
                                    <div class="agileits-button two">
                                        <a class="btn btn-primary btn-lg hvr-underline-from-left" href="single.html" role="button">详细信息 »</a>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </template>

                        <div class="pages">
                            <ul class="pagination pagination-lg">
                                <li><a href="javascript:;" @click="getPublishArticles( 1 )"><span aria-hidden="true">首页</span></a></li>
                                <li><a href="javascript:;" aria-label="Previous"><span aria-hidden="true"> << </span></a></li>

                                <template v-for="(item, index) in pageLine">
                                    <li :key="index"><a :class="{ active: item.isActive }" @click="getPublishArticles( item.page )" href="javascript:;"><span aria-hidden="true">{{ item.page }}</span></a></li>
                                </template>

                                <li><a href="javascript:;" aria-label="Next"><span aria-hidden="true"> >> </span></a></li>
                                <li><a href="javascript:;" @click="getPublishArticles( pageNum )"><span aria-hidden="true">末页</span></a></li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-md-4 event-right wthree-event-right">
                        <div class="event-right1 agileinfo-event-right1">
                            <div class="search1 agileits-search1">
                                <form action="#" method="post">
                                    <input type="search" name="Search" placeholder="请输入查询标签..." required="">
                                    <input type="submit" value="发送">
                                </form>
                            </div>
                            <div class="categories w3ls-categories">
                                <h3>学习图谱</h3>
                                <ul>
                                    <li><i class="fa fa-check" aria-hidden="true"></i><a href="single.html">At vero eos et accusamus iusto</a></li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i><a href="single.html">Sed ut perspiciatis unde omnis</a></li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i><a href="single.html">Accusantium doloremque lauda</a></li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i><a href="single.html">Vel illum qui dolorem fugiat quo</a></li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i><a href="single.html">Quis autem vel eum reprehenderit</a></li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i><a href="single.html">Neque porro quisquam est qui</a></li>
                                </ul>
                            </div>
                            <div class="posts w3l-posts">
                                <h3>我的 Dream</h3>
                                <div class="posts-grids w3-posts-grids">
                                    <div class="posts-grid w3-posts-grid">
                                        <div class="posts-grid-left w3-posts-grid-left">
                                            <a href="single.html"><img src="../assets/images/banner2.jpg" alt=" " class="img-responsive" /></a>
                                        </div>
                                        <div class="posts-grid-right w3-posts-grid-right">
                                            <h4><a href="single.html">Sed ut perspiciatis unde omnis iste natus</a></h4>
                                            <ul class="wthree_blog_events_list">
                                                <li><i class="fa fa-calendar" aria-hidden="true"></i>10/7/2017</li>
                                                <li><i class="fa fa-user" aria-hidden="true"></i><a href="single.html">Admin</a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="posts-grid w3-posts-grid">
                                        <div class="posts-grid-left w3-posts-grid-left">
                                            <a href="single.html"><img src="../assets/images/banner2.jpg" alt=" " class="img-responsive" /></a>
                                        </div>
                                        <div class="posts-grid-right w3-posts-grid-right">
                                            <h4><a href="single.html">Neque porro quisquam qui dolorem</a></h4>
                                            <ul class="wthree_blog_events_list">
                                                <li><i class="fa fa-calendar" aria-hidden="true"></i>12/7/2017</li>
                                                <li><i class="fa fa-user" aria-hidden="true"></i><a href="single.html">Admin</a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="posts-grid w3-posts-grid">
                                        <div class="posts-grid-left w3-posts-grid-left">
                                            <a href="single.html"><img src="../assets/images/banner2.jpg" alt=" " class="img-responsive" /></a>
                                        </div>
                                        <div class="posts-grid-right w3-posts-grid-right">
                                            <h4><a href="single.html">Nemo enim ipsam voluptatem quia</a></h4>
                                            <ul class="wthree_blog_events_list">
                                                <li><i class="fa fa-calendar" aria-hidden="true"></i>13/8/2017</li>
                                                <li><i class="fa fa-user" aria-hidden="true"></i><a href="single.html">Admin</a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tags tags1 w3layouts-tags">
                                <h3>常用标签</h3>
                                <ul>
                                    <li><a href="single.html">Designs</a></li>
                                    <li><a href="single.html">Growth</a></li>
                                    <li><a href="single.html">Latest</a></li>
                                    <li><a href="single.html">Price</a></li>
                                    <li><a href="single.html">Tools</a></li>
                                    <li><a href="single.html">Agile</a></li>
                                    <li><a href="single.html">Category</a></li>
                                    <li><a href="single.html">Themes</a></li>
                                    <li><a href="single.html">Growth</a></li>
                                    <li><a href="single.html">Agile</a></li>
                                    <li><a href="single.html">Price</a></li>
                                    <li><a href="single.html">Tools</a></li>
                                    <li><a href="single.html">Business</a></li>
                                    <li><a href="single.html">Category</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    //引入css样式文件
    import '../assets/css/blog.css'
    export default {
        name: 'blog',
        data () {
            return {
                articles:[],            //文章信息列表
                pageLine:[],            //文章分页数据
                pageNum:1               //文章页码数
            }
        },
        methods: {
            //获取发布的文章
            getPublishArticles: function (cp=1, ptn=3) {
                if(cp == '...') return false;
                let url = '/api/index/blog/getArticles';        // 这里就是刚才的config/index.js中的/api
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
                        this.articles = res.data.value.articles;
                        //console.log(this.articles);
                        this.totalNum = res.data.value.totalNum;
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
            }
        },
        components:{

        },
        mounted(){
            this.getPublishArticles();
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    .w3l_header:after {
        width: 280px;
        margin-top:15px;
    }

    @media (min-width: 1650px){
        .container {
            width: 1318px;
        }
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
