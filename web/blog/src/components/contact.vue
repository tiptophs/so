<template>
    <div class="contact-container">
        <!--顶部图片-->
        <div class="agile_inner"></div>
        <!--导航-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

                <ul class="w3_short">
                    <li><a href="index.html">首页</a><span>|</span></li>
                    <li>留言</li>
                </ul>
            </div>
        </div>
        <!--留言信息-->
        <div class="banner-bottom">
            <div class="container">
                <div class="wthree_head_section">
                    <h3 class="w3l_header w3_agileits_header">(っ´▽`)っ <span>请 对 我 留 言 或 邮 件 吧</span></h3>
                </div>
                <div class="agile_wthree_inner_grids">
                    <div class="contact_img_agile">
                    </div>
                    <div class="contact-form agile_inner_grids">
                        <div class="wthree_head_section">
                            <h3 class="w3l_header w3_agileits_header check-button"><span class="active">邮件</span><span>留言</span></h3>
                        </div>
                        <form action="#" method="post">
                            <div class="fields-grid">
                                <div class="styled-input agile-styled-input-top">
                                    <input type="text" name="Full Name" required="">
                                    <label>您 的 称 呼</label>
                                    <span></span>
                                </div>
                                <div class="styled-input agile-styled-input-top">
                                    <input type="text" name="Phone" required="">
                                    <label>您 的 联 系 方 式</label>
                                    <span></span>
                                </div>
                                <div class="styled-input ">
                                    <input type="email" name="Email" required="">
                                    <label>您 的 联 系 邮 箱</label>
                                    <span></span>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="styled-input textarea-grid">
                                <textarea name="Message" required=""></textarea>
                                <label>您 的 留 言（我会尽快回复您...）</label>
                                <span></span>
                            </div>
                            <input type="submit" value="发 送" style="border-radius: 4px;">
                        </form>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!-- 地图 -->
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387142.84010033106!2d-74.25819252532891!3d40.70583163828471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1475140387172" style="border:0"></iframe>
        </div>
    </div>
</template>

<script>

</script>

<style scoped>
    .check-button{
        font-size: 32px;
    }

    .check-button span{
        border:1px solid #ccc;
        padding:4px 30px;
        margin-right:15px;
        border-radius: 4px;
        cursor: pointer;

    }

    .w3l_header:after{
        border-top:none;
    }

    .check-button span.active{
        background-color: #2ebcff;
        color: #fff;
    }

</style>