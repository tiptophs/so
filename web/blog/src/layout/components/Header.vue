<template>
  <header class="header-top">
    <div class="main_section_agile" id="home">
      <div class="agileits_w3layouts_banner_nav">
        <nav class="navbar navbar-default">
          <div class="navbar-header navbar-left">
            <button
              type="button"
              class="navbar-toggle collapsed"
              data-toggle="collapse"
              data-target="#bs-example-navbar-collapse-1"
            >
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <h1>
              <router-link class="navbar-brand" to="/home">
                <span>S</span>oft
              </router-link>
            </h1>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
            <nav class="menu-hover-effect menu-hover-effect-4">
              <ul class="nav navbar-nav">
                <router-link to="/home" tag="li">
                  <a href="javascript:;" class="hvr-ripple-in">soft</a>
                </router-link>
                <!--<router-link to="/blog" tag="li">
                                    <a href="javascript:;" class="hvr-ripple-in">日记本</a>
                </router-link>-->
                <router-link to="/about" tag="li">
                  <a href="javascript:;" class="hvr-ripple-in">关于我</a>
                </router-link>

                <!--<li>
                  <a href="services.html" class="hvr-ripple-in">soft</a>
                </li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle hvr-ripple-in" data-toggle="dropdown">
                    办公工具
                    <b class="fa fa-caret-down" aria-hidden="true"></b>
                  </a>
                  <ul class="dropdown-menu agile_short_dropdown">
                    <li>
                      <a href="icons.html">Web Icons</a>
                    </li>
                    <li>
                      <a href="typography.html">Typography</a>
                    </li>
                  </ul>
                </li>
                <router-link to="/contact" tag="li">
                  <a href="javascript:;" class="hvr-ripple-in">留言</a>
                </router-link>-->

                <li v-if="!isLogin">
                  <router-link to="/login" class="login-button">登录</router-link>
                </li>

                <li v-if="isLogin">
                  <a
                    class="login-button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    {{ uName }}
                    <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <router-link to="/personal" tag="li">
                      <a href="javascript:;">个人中心</a>
                    </router-link>
                    <li role="separator" class="divider"></li>
                    <li>
                      <a href="#" @click.prevent = "logout">系统退出</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </nav>
        <div class="clearfix"></div>
      </div>
    </div>
  </header>
</template>

<script>
import { mapState } from 'vuex';

export default {
  name: "navi",
  data() {
    return {
      isLogin: false   //登录状态
    };
  },
  computed:{
    ...mapState({
      uName: state => state.user.name
    })
  },
  methods: {
    logout(){   //推出登录
      this.$store.dispatch('user/logout').then(res=>{
        this.$router.push({ path: '/login'})
      })
    }
  },
  watch: {},
  mounted() {
    //验证用户是否登录
    if (this.uName!='') this.isLogin = true;
  }
};
</script>

<style scoped>
.login-button {
  cursor: pointer;
  color: dodgerblue !important;
}

.dropdown-menu {
  top: 120%;
}

@media (min-width: 768px) {
  .navbar-right .dropdown-menu {
    right: auto;
    left: auto;
  }
}

.divider{
  margin:0px;
}

.dropdown-menu{
  padding:0px;
}

.dropdown-menu li a {
  padding:8px 20px;
}

@media (max-width: 767px){
  .navbar-default .navbar-nav .open .dropdown-menu>li>a {
      color: #333;
      padding: 7px 0;
      background: #fff;
      text-align: center;
      font-size: 16px;
  }
}
</style>