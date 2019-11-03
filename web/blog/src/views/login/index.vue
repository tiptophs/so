<template>
    <div class="login">
        <div id="video-container">
            <video poster="@/assets/login/video/Ipad.jpg" autoplay muted loop class="vidbacking">
                <source src="@/assets/login/video/Ipad.mp4" type="video/mp4">
            </video>

           <div class="center-container">
                <div class="w3ls-header">
                    <div class="header-main">
                        <div class="videologin" v-if="showLogin">
                            <div class="top-login first">
                                <div class="border">
                                    <span><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <h3>So! 登 录</h3>
                            <div class="header-bottom">
                                <div class="header-right w3agile">
                                    <div class="header-left-bottom agileinfo">
                                        <form action="#" method="post" @submit.prevent="login">
                                            <div class="icon1">
                                                <i class="fa fa-user-o" aria-hidden="true"></i>
                                                <input  type="text" name="account" placeholder="请输入您的邮箱..." required="" v-model="logParam.account"/>
                                            </div>
                                            <div class="icon1">
                                                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                                <input type="password" placeholder="请输入您的密码..." required="" v-model="logParam.password"/>
                                            </div>
                                            <label class="anim">
                                                <span>没有账号？<a href="javascript:;" class="register-view" @click="isShow">点击注册</a></span>
                                            </label>
                                            <a href="#" class="forgot">忘记密码? 找回...</a>
                                            <div class="bottom">
                                                <input type="submit" value="进 入"/>
                                            </div>
                                            <div class="header-left-top">
                                                <div class="sign-up">
                                                    <h5>or</h5>
                                                    <!--<h4>其 他 方 式</h4>-->
                                                </div>
                                            </div>
                                            <div class="header-social wthree">
                                                <ul>
                                                    <li><a href="#" class="f"><i class="fa fa-facebook" aria-hidden="true"></i>Facebook</a></li>
                                                    <li><a href="#" class="t"><i class="fa fa-twitter" aria-hidden="true"></i>Twitter</a></li>
                                                    <li><a href="#" class="g"><i class="fa fa-google-plus" aria-hidden="true"></i>Google+</a></li>
                                                </ul>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="videoregister" v-if="!showLogin">
                            <div class="top-login second">
                                <div class="border">
                                    <span><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <h3>So! 注 册</h3>
                            <div class="header-bottom">
                                <div class="header-right w3agile">
                                    <div class="header-left-bottom agileinfo">
                                        <form action="#" method="post" @submit.prevent="register">
                                            <div class="icon1">
                                                <i class="fa fa-user-o" aria-hidden="true"></i>
                                                <input name="name" type="text" placeholder="昵 称" required="" v-model="regParam.name"/>
                                            </div>
                                            <div class="icon1">
                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                <input name="email" type="email" placeholder="您的邮箱地址..." required="" v-model="regParam.email" />
                                            </div>
                                            <div class="icon1">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                                <input name="phone" type="tel" placeholder="您的电话号码..." required="" v-model="regParam.phone"/>
                                            </div>
                                            <div class="icon1">
                                                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                                <input name="password" type="password" placeholder="您的注册密码..." required="" v-model="regParam.password"/>
                                            </div>
                                            <div class="icon1">
                                                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                                <input name="confirm_password" type="password" placeholder="请您确认密码..." required="" v-model="regParam['confirm_password']"/>
                                            </div>
                                            <label class="anim-login">
                                                <span>咦? 我已有账号！<a href="javascript:;" class="login-view" @click="isShow">点击登录</a></span>
                                            </label>

                                            <div class="bottom">
                                                <input type="submit" value="注 册" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { login } from '@/api/user.js';
    import { mapMutations } from 'vuex';
    //引入login页面js组件
    import '@/assets/login/js/jquery.vidbacking.js';

    export default {
        data () {
            return {
                regParam:{},                    //注册数据对象
                logParam:{},                    //登录数据对象
                showLogin:true                  //显示登录页面
            }
        },
        computed:{                            
            
        },
        methods: {
            isShow: function(){
                this.showLogin = !this.showLogin;
            },
            login: function(){                  //登录
                //请求数据
                this.$store.dispatch('user/login', this.logParam).then((res) => {
                    this.$router.push({ path: '/'})
                }).catch((error) => {
                    this.$message.error('账号登陆失败,请稍后重试...');
                })

            },
            register: function(){               //注册
                let url = '/api/index/login/register';               // 这里就是刚才的config/index.js中的/api
                // 或者使用以下代码也可
                this.$axios({
                    method: "post",
                    url: url,
                    data:this.regParam,
                    transformRequest: [ data => {
                        // 对 data 进行任意转换处理
                        return this.qs.stringify(data);
                    }],
                }).then(res => {
                    if(res.data.status){
                        sessionStorage.setItem('user', this.qs.stringify(res.data.user));
                        this.$router.push("/home")
                    }
                }).catch(function(err) {
                    alert('注册账户出现错误...');
                });
            }
        },
        created (){
            
        },
        mounted (){
            //初始化
            $('body').vidbacking({
                'masked': false
            });
        }
    }
</script>


/**引入局部css文件样式 */
<style src="@/assets/login/css/style.css" scoped />
<style src="@/assets/login/css/font-awesome.css" scoped />
<style src="@/assets/login/css/jquery.vidbacking.css" scoped />
<style scoped>

    .register-view {
        margin: 0px 5px !important;
        color: #0accff !important;
    }

    .login-view {
        margin: 0px 5px !important;
        color: #0accff !important;
    }

    .bottom {
        margin-top:15px !important;
    }
</style>