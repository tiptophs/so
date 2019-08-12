<template>
    <div class="about-container">
        <!--顶部图片展示-->
        <div class="agile_inner"></div>
        <!--顶部导航信息-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

                <ul class="w3_short">
                    <li><a href="index.html">首页</a><span>|</span></li>
                    <li>关于我</li>
                </ul>
            </div>
        </div>
        <!--标语
        <div class="banner-bottom">
            <div class="banner_bottom_w3ls_info">
                <div class="wthree_head_section">
                    <h3 class="w3l_header w3_agileits_header">
                        夏日小呆 ...(・`ω´・)的码农自述<br/>
                    </h3>
                </div>

                <p style="font-size:16px;">
                    生活必须有条理，作为一名码农，脑容量又不大，随着时代的发展，需要学习的东西会越来越多，创建一个博客，不光是为了更好的展示自己。
                    更是为了能够方便快捷的查询到需要的东西。俗话说得好“好记性不如烂笔头”，更何况“码农”的世界，代码的“更新换代”速度是多么的迅速...。
                    所以创建本“博客”的初衷，是为了更好的辅助于我的工作学习！ps:我才不告诉你，我是为了代码复用才搞的（ctrl+c、ctrl+v）！
                </p>
                <span style="font-size: 18px;font-weight: 700;"><img src="/static/img/me.jpg" style="width: 360px"></img></span>

                <div class="agileits-button two">
                    <a class="btn btn-primary btn-lg hvr-underline-from-left" href="javascript:;" role="button">本前台采用Vue.js框架 →_→！</a>
                </div>
            </div>
        </div>-->
        <!--关于我介绍
        <div class="about" id="welcome">
            <div class="container">
                <div class="wthree_head_section">
                    <h3 class="w3l_header w3_agileits_header two">‎(๑·́ ₃ ·̀๑) <span>我的职场介绍</span></h3>
                </div>
                <div class="agile_wthree_inner_grids">

                    <div class="col-md-12 about_agileinfo">
                        <div style="font-weight: normal;font-size: 26px;color: #fff;">学校生涯</div>
                        <p style="font-size: 16px;">
                            毕业于“中国石油大学胜利学院”，学习专业为“机械设计与自动化”。2014年上半年，具体时间不祥！请原谅我的呆瓜！（外出培训java, html, css等导致生物钟混乱...）。<br/>
                            2011-2013曾担任“社会实践社团”主席一职，多次组织社会实践活动。<br/>
                            2014年 参加“软通动力编程培训”培训班，学习java,html,css,javascript,xml等基础编程语言。
                        </p>

                        <div style="font-weight: normal;font-size: 26px;color: #fff;margin-top:45px;">公司经历</div>
                        <p style="font-size: 16px;">
                            2014年培训完毕后经面试顺利进入“天津软通动力空港分公司”，同年6月份左右顺利毕业，成为一名“社会仔”外加“码农”！开始接触mybatis持久层框架。
                            很遗憾 ╮(╯▽╰)╭ 同年因个人原因主动离职。<br/>
                            2014年经过多次面试，奔着"可以学习到更多知识，公司大小，工作累重都可以考虑，学习语言易于家乡寻找工作的态度"，选择进入"天津勇志科技有限公司"。
                            开始学习php、tp框架、ci框架、bootstrap前台模版、vue.js前台框架...等。

                        </p>

                        <div style="font-weight: normal;font-size: 26px;color: #fff;margin-top:45px;">未来展望</div>
                        <p style="font-size: 16px;">
                            转瞬间已经工作5年了，可以真正的算一名”码农“了。未来还有许多要做的事情！加油...<br/>
                            有梦想是好的，关键是你要怎样实现它！（我有一个大胆的规划和实践...）。

                        </p>

                        <span style="font-size: 18px;font-weight: 700;"><img src="/static/img/mes.jpg" style="margin-top:30px; width:360px;"></img></span>

                        <div class="agileits-button two service">
                            <a class="btn btn-primary btn-lg hvr-underline-from-left" href="javascript:;" role="button">就这点介绍，再点也没有啦...</a>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>-->

        <!--我的技能-->
        <div class="banner-bottom service_agile">
            <div class="container">

                <!--<div class="wthree_head_section">
                    <h3 class="w3l_header"> ( ˘•灬•˘ )<span>我的技术储备</span></h3>
                </div>-->

                <div class="agile_wthree_inner_grids row">
                    <!-- 循环我的技能数据 -->
                    
                    <template v-for="item in skills">
                        <div class="col-md-4 agileits_banner_bottom_left" :key="item.sid" style="height:219px;margin-bottom:15px;">
                            <div class="agileinfo_banner_bottom_pos">
                                <div class="w3_agileits_banner_bottom_pos_grid">
                                    <div class="col-xs-3 wthree_banner_bottom_grid_left">
                                        <div class="agile_banner_bottom_grid_left_grid hvr-radial-out">
                                            <i class="fa fa-laptop" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-9 wthree_banner_bottom_grid_right">
                                        <h4 style="line-height:1.5;height:66px;">{{ item.title }}</h4>
                                        <p style="height:64px;overflow:hidden;">{{ item.desc }}</p>
                                        <div class="agileits-button two">
                                            <router-link tag="a" class="btn btn-primary btn-lg hvr-underline-from-left" :to="{ name:'skill', query:{ sid:item.sid } }" role="button" style="margin-top:0px;">了解更多</router-link>
                                        </div>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        </div>
                    </template>

                </div>

                <div class="clearfix"> </div>
            </div>
        </div>

    </div>
</template>


<script>


    export default {
        data(){
            return {
                skills:[]           //技能对象
            }
        },
        methods:{
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
        mounted(){
            this.gitskills();
        }

    }

</script>

<style>
    @media (min-width: 1650px){
        .container {
            width: 1318px;
        }
    }

</style>