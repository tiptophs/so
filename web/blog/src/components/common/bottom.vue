<template>
    <div class="footer">
        <div class="f-bg-w3l" style="padding:4em 0em;">
            <div class="container">
                <div class="col-md-4 w3layouts_footer_grid">
                    <h2>联系方式 <span>...</span></h2>
                    <ul class="social_agileinfo">
                        <li style="font-size: 16px;color:#fff;margin-top:15px;"><span style="margin-right:25px;width: 20%;display: inline-block;"><i class="fa fa-phone"></i>&nbsp;电话</span>18322210395</li>
                        <li style="font-size: 16px;color:#fff;margin-top:15px;"><span style="margin-right:25px;width: 20%;display: inline-block;"><i class="fa fa-linux"></i> QQ</span>1085556180</li>
                        <li style="font-size: 16px;color:#fff;margin-top:15px;"><span style="margin-right:25px;width: 20%;display: inline-block;"><i class="fa fa-envelope"></i> 邮箱</span>1085556180@qq.com</li>
                        <li style="font-size: 16px;color:#fff;margin-top:15px;">您也可以选择留言( ⊙ o ⊙ )!</li>

                    </ul>
                </div>
                <div class="col-md-8 w3layouts_footer_grid">
                    <div style="border:1px solid #ccc;width: 75%;">
                        <input type="text" name="search" placeholder="请输入查询内容...(百度一下)" >
                        <button class="btn1"><i class="fa fa-search" aria-hidden="true"></i></button>
                        <div class="clearfix"> </div>
                    </div>
                    <ul class="w3l_footer_nav">
                        <li><a href="index.html" class="active">首页</a></li>
                        <li><a href="services.html">日记本</a></li>
                        <li><a href="gallery.html">关于我</a></li>
                        <li><a href="icons.html">留言</a></li>
                    </ul>
                    <p>Copyright &copy; 2019.Company name All rights reserved. </p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'bottom',
        data(){
            return {

            }
        }
    }

</script>

<style scoped>
    .social_agileinfo li{
        display: block;
    }

    .social_agileinfo li a {
        width: 100%;
        height: 40px;
        display: block;
        border: none;
        text-align: left;
        color: #fff;
    }

    .w3layouts_footer_grid input[type="text"] {
        outline: none;
        padding: 15px 15px;
        color: #fff;
        font-size: 14px;
        width: 88%;
        border: none;
        background: rgba(0, 0, 0, 0.22);
        letter-spacing: 2px;
    }

    @media (min-width: 1650px){
        .container {
            width: 1318px;
        }
    }
</style>