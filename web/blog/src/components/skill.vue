<template>
    <div class="contact-container">
        <!--顶部图片-->
        <div class="agile_inner"></div>
        <!--导航-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

                <ul class="w3_short">
                    <li><a href="index.html">首页</a><span>|</span></li>
                    <li>技能列表</li>
                </ul>
            </div>
        </div>
        <!--留言信息-->
        <div class="banner-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="grid_3 grid_5 wthree">
                            <h3>快速定位</h3>
                            <div class="skill-list">
                                <p>这里将罗列出所有学习/教程笔记, 方便以后学习查找。同时也希望大家留言啦！</p>
                                <div class="list-group list-group-alternate">
                                    <a href="#" class="list-group-item"><span class="badge">201</span> <i class="ti ti-email"></i> Git教程学习笔记 </a>
                                    <a href="#" class="list-group-item"><span class="badge badge-primary">5021</span> <i class="ti ti-eye"></i> Profile visits </a>
                                    <a href="#" class="list-group-item"><span class="badge">14</span> <i class="ti ti-headphone-alt"></i> Call </a>
                                    <a href="#" class="list-group-item"><span class="badge">20</span> <i class="ti ti-comments"></i> Messages </a>
                                    <a href="#" class="list-group-item"><span class="badge badge-warning">14</span> <i class="ti ti-bookmark"></i> Bookmarks </a>
                                    <a href="#" class="list-group-item"><span class="badge badge-danger">30</span> <i class="ti ti-bell"></i> Notifications </a>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <mavon-editor v-model="value"/>
                    </div>    
                </div>
                
            </div>
        </div>        
    </div>

</template>


<script>
export default {
    data(){
        return {
            value:''
        }
    },
    methods:{

    },
    mounted(){
        //this.$route.query.sid
    }   
}
</script>

<style scoped>
    @media (min-width: 1650px){
        .container {
            width: 1318px;
        }
    }

    .skill-list .list-group-item{
        font-size: 18px;
        font-weight:bold;
    }
</style>


