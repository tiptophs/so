<template>
    <div class="home-container">
        <!--顶部导航信息-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

                <ul class="w3_short">
                    <li><a href="index.html">首页(资源工具)</a><span>|</span></li>
                    <li>工具/相关展示</li>
                </ul>
            </div>
        </div>

        <div class="banner-bottom">
            <div class="container">
                <div class="wthree_head_section">
                    <h3 class="w3l_header w3_agileits_header">夏贰小呆 <span>工具库 </span></h3>
                </div>
                <div class="agile_wthree_inner_grids">
                    <div class="grid_3 grid_4 w3_agileits_icons_page">
                        <div class="icons">
                            <div class="heading-underline">
                                <div class="h-u1"></div>
                                <div class="h-u2"></div>
                                <div class="h-u3"></div>
                                <div class="clearfix"></div>
                            </div>

                            <template v-for="(item, index) in tools">
                                <section :key="index">
                                    <h3 class="page-header page-header icon-subheading"> {{ item.title }} </h3>
                                    <div class="row fontawesome-icon-list">
                                        <template v-for="(tool, num) in item.item">
                                            <div class="icon-box col-md-3 col-sm-4" :key="num"><a class="agile-icon tool-desc" :href="tool.href" target="blank"><img class="tool_img" :src="tool.img">{{ tool.desc }}</a></div>
                                        </template>
                                    </div>
                                </section>
                            </template>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import { getTools } from '@/api/home.js';

    export default {
        name: 'Home',
        data(){
            return {
                tools:[]                //工具存储对象
            }
        },
        methods:{
            getTools:function(){
                getTools().then(res=>{
                    this.tools = res.data;
                });
            }
        },
        components:{},
        mounted(){
            this.getTools();
        }
    }
</script>

<style scoped>
    .tool_img{
        width:25px;
        height:25px;
        margin-right:15px;
    }

    .tool-desc{
        font-size:16px;
        color:#337ab7;
    }
</style>