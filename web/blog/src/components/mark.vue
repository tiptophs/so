<template>
    <div class="markdown-blog">
        <div class="contact-container">
        <!--顶部图片-->
        <div class="agile_inner"></div>
        <!--导航-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

                <ul class="w3_short">
                    <li><a href="index.html">首页</a><span>|</span></li>
                    <li>创建Markdown备课</li>
                </ul>
            </div>
        </div>
        <!--留言信息-->
        <div class="banner-bottom">
            <div class="container">
                <div class="col-md-12">
                    <div class="base-info">
                        <h1>Markdown备课数据创建</h1>
                        <div class="mark-base">
                            <div class="form-group article-title">
                                <label class="form-label" for="title">文章标题</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="请在此输入文章标题..." >
                            </div>

                            <div class="form-group article-desc">
                                <label class="form-label" for="desc">文章描述</label>
                                <textarea class="form-control" id="desc" rows="4" placeholder="请在此输入描述信息..." ></textarea>
                            </div>
                        </div>   
                    </div>

                    <div class="mark-mavon">
                        <mavon-editor :ishljs = "true" v-model="value"></mavon-editor>     
                    </div>
                    
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
    }
}
</script>

<style scoped>
     @media (min-width: 1650px){
        .container {
            width: 1318px;
        }
    }
</style>


