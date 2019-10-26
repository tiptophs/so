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
                  <a href="javascript:;" class="hvr-ripple-in">首页</a>
                </router-link>
                <!--<router-link to="/blog" tag="li">
                                    <a href="javascript:;" class="hvr-ripple-in">日记本</a>
                </router-link>-->
                <router-link to="/about" tag="li">
                  <a href="javascript:;" class="hvr-ripple-in">关于我</a>
                </router-link>

                <li>
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
                </router-link>
                <li v-if="showLogin">
                  <router-link to="/login" class="login-button">登录</router-link>
                </li>

                <li v-if="showUser">
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
                      <a href="#">后台登录</a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                      <a href="#">系统退出</a>
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
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.min";
import "../../assets/css/style.css";
export default {
  name: "navi",
  data() {
    return {
      showLogin: true,
      showUser: false,
      uName: ""
    };
  },
  methods: {},
  watch: {
    $route: {
      //检测用户是否登陆
      handler() {
        this.$axios({
          method: "post",
          url: "/api/index/login/isLogin",
          param: {},
          data: {},
          transformRequest: [
            data => {
              return this.qs.stringify(data);
            }
          ]
        })
          .then(res => {
            //个人中心页面需要验证
            if (res.data.status) {
              let _user = res.data.value;
              this.uName = _user.name;
              this.showLogin = false;
              this.showUser = true;
            } else {
              if (
                this.$route.path == "/personal" ||
                this.$route.path == "/personal/particle"
              ) {
                this.$router.push("/error");
              }
            }
          })
          .catch(err => {
            this.$router.push("/error");
          });
      },
      // 代表在wacth里声明了handler这个方法之后立即先去执行handler方法
      immediate: true
    }
  },
  mounted() {
    //this.isLogin();
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
</style>