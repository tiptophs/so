<template>
    <div class="article-mesage">
        <!--顶部图片-->
        <div class="agile_inner"></div>
        <!--页面导航-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

                <ul class="w3_short">
                    <li><router-link to="/home">首页</router-link><span>|</span></li>
                    <li>文章详情</li>
                </ul>
            </div>
        </div>

        <!--博客正文-->
        <div class="banner-bottom">
            <div class="container">
                <div class="wthree_head_section">
                    <h3 class="w3l_header w3_agileits_header">{{ articles.title }}</h3>
                </div>
                <div class="agile_wthree_inner_grids">
                    <div class="col-md-8 single-left">
                        <div class="single-left1">
                            <img :src="articles.back" alt=" " class="img-responsive" v-if="articles.back!=''" />
                            <h3>{{ articles.desc }}</h3>
                            <ul style="margin-bottom:25px;">
                                <li><span class="fa fa-user" aria-hidden="true"></span><a href="#">Michael Smith</a></li>
                                <li><span class="fa fa-tag" aria-hidden="true"></span><a href="#">5 Tags</a></li>
                                <li><span class="fa fa-envelope-o" aria-hidden="true"></span><a href="#">5 Comments</a></li>
                            </ul>
                            
                            <div class="article-detail" v-if="isCk">
                                <p v-html="articles.content" v-highlightB></p>
                            </div>

                            <div class="article-detail markdown-body" v-if="!isCk">
                                <v-mark v-bind:detail="articles.content"></v-mark>
                            </div>

                        </div>


                        <div class="admin">
                            <p>写在文章后面 :<br/>
                                如果你喜欢该文章的话，不要忘记留言，或者收藏啊！您的支持是我最大的动力！
                                希望这篇小小的文章能解决您的问题和麻烦。<br/><br/>
                                all things are difficult before they are easy<br/>
                                If you shed tears when you miss the sun,you also miss the stars
                            </p>
                            <a href="#"><i>tiptop</i></a>
                        </div>

                        <div class="comments">
                            <h3>最 近 评 论</h3>
                            <div class="comments-grids">
                                <div class="comments-grid">
                                    <div class="comments-grid-left">
                                        <img src="/static/img/banner2.3147d7c.jpg" alt=" " class="img-responsive" />
                                    </div>
                                    <div class="comments-grid-right">
                                        <h4><a href="#">Michael Crisp</a></h4>
                                        <ul>
                                            <li>5 June 2017 <i>|</i></li>
                                            <li><a href="#">Reply</a></li>
                                        </ul>
                                        <p>Ut ex metus, ornare ac ultricies sit amet, auctor a elit. Praesent sit
                                            amet scelerisque massa. Duis porta risus id urna finibus aliquet.</p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="comments-grid">
                                    <div class="comments-grid-left">
                                        <img src="/static/img/banner2.3147d7c.jpg" alt=" " class="img-responsive" />
                                    </div>
                                    <div class="comments-grid-right">
                                        <h4><a href="#">Adam Lii</a></h4>
                                        <ul>
                                            <li>8 June 2017 <i>|</i></li>
                                            <li><a href="#">Reply</a></li>
                                        </ul>
                                        <p>Ut ex metus, ornare ac ultricies sit amet, auctor a elit. Praesent sit
                                            amet scelerisque massa. Duis porta risus id urna finibus aliquet.</p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="comments-grid">
                                    <div class="comments-grid-left">
                                        <img src="/static/img/banner2.3147d7c.jpg" alt=" " class="img-responsive" />
                                    </div>
                                    <div class="comments-grid-right">
                                        <h4><a href="#">Richard Carl</a></h4>
                                        <ul>
                                            <li>11 June 2017 <i>|</i></li>
                                            <li><a href="#">Reply</a></li>
                                        </ul>
                                        <p>Ut ex metus, ornare ac ultricies sit amet, auctor a elit. Praesent sit
                                            amet scelerisque massa. Duis porta risus id urna finibus aliquet.</p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>

                            </div>
                        </div>
                        <div class="leave-coment-form">
                            <h3>留 下 您 的 小 脚 印 吧</h3>
                            <form action="#" method="post">
                                <input type="text" name="Name" placeholder="您的称呼" required="">
                                <input type="email" name="Email" placeholder="您的联系方式/邮箱" required="">
                                <textarea name="Message" placeholder="您的意见和问题..." required=""></textarea>
                                <div class="w3_single_submit">
                                    <input type="submit" value="评论"  style="width: 15%;">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-4 event-right wthree-event-right" >
                        <div class="event-right1 agileinfo-event-right1" >
                            <div class="search1 agileits-search1">
                                <form action="#" method="post">
                                    <input type="search" name="Search" placeholder="请输入查询内容..." required="">
                                    <input type="submit" value="查询">
                                </form>
                            </div>
                            <div class="categories w3ls-categories">
                                <h3>笔 记 分 类</h3>
                                <ul>
                                    <li><i class="fa fa-check" aria-hidden="true"></i><a href="single.html">At vero eos et accusamus iusto</a></li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i><a href="single.html">Sed ut perspiciatis unde omnis</a></li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i><a href="single.html">Accusantium doloremque lauda</a></li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i><a href="single.html">Vel illum qui dolorem fugiat quo</a></li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i><a href="single.html">Quis autem vel eum reprehenderit</a></li>

                                </ul>
                            </div>
                            <div class="posts w3l-posts">
                                <h3>Our Events</h3>
                                <div class="posts-grids w3-posts-grids">
                                    <div class="posts-grid w3-posts-grid">
                                        <div class="posts-grid-left w3-posts-grid-left">
                                            <a href="single.html"><img src="images/g3.jpg" alt=" " class="img-responsive" /></a>
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
                                            <a href="single.html"><img src="images/g6.jpg" alt=" " class="img-responsive" /></a>
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
                                </div>
                            </div>
                            <div class="tags tags1 w3layouts-tags">
                                <h3>常 用 标 签</h3>
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

    export default {
        name: 'message',
        data () {
            return {
                articles:{},                //文章详情
                isCk:true                   //默认编辑器展示格式
            }
        },
        methods: {
            //获取发布的文章
            getPublishArticles: function (sid) {
                let url = '/api/index/blog/detail';        // 这里就是刚才的config/index.js中的/api
                this.$axios({
                    method: "post",
                    url: url,
                    param:{},
                    data: { sid:sid },
                    transformRequest: [data=> {
                        return this.qs.stringify(data);
                    }]
                }).then(res => {
                    if(res.data.status){
                        //转换数据格式
                        this.articles = res.data.value;
                        //采用哪个编辑器显示html
                        this.isCk = this.articles.editor==1? true: false;
                    }
                }).catch(function(err) {})
            }
        },
        components:{

        },
        mounted(){
            this.getPublishArticles(this.$route.query.sid);
        }
    }
</script>

<style scoped>

    @import '../assets/css/blog.css';
    @import "../assets/css/single.css";

    @media (min-width: 1650px){
        .container {
            width: 1318px;
        }
    }

    .white-bg {
        background-color:#fafafa !important;
    }

    .hljs {
        border: 0;
        font-size: 12px;
        display: block;
        padding: 1px;
        margin: 0;
        width: 100%;
        font-weight: 200;
        /*color: #fafafa;*/
        white-space: pre-wrap;
    }
    .hljs ol {
        list-style: decimal;
        margin: 0px 0px 0 40px !important;
        padding: 0px;
    }
    .hljs ol li {
        list-style: decimal-leading-zero;
        border-left: 1px solid #ddd !important;
        padding: 5px!important;
        margin: 0 !important;
        /*white-space: pre;*/
    }

    .article-detail p{
        word-break: break-all;
    }

</style>