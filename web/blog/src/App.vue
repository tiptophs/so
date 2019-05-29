<template>
  <div id="page-wrapper">

      <!-- start header -->
      <my-header v-if="headerShow"></my-header>
      <!--end header-->

      <!--container-->
      <router-view></router-view>

      <!-- footer -->
      <my-footer v-if="footerShow"></my-footer>
      <!-- //footer -->
  </div>
</template>

<script>
    import navi from './components/common/navi.vue'
    import bottom from './components/common/bottom.vue'

    export default {
        name: 'App',
        data() {
            return {
                headerShow: true,
                footerShow: true
            }
        },
        components: {
            'my-header': navi,
            'my-footer': bottom
        },
        watch: {
            $route: {
                handler(){
                    if (this.$route.path === "/login" || this.$route.path ==="/register") {
                        this.headerShow = false;
                        this.footerShow = false;
                    }else{
                        this.headerShow = true;
                        this.footerShow = true;
                    }
                },
                // 代表在wacth里声明了firstName这个方法之后立即先去执行handler方法
                immediate: true
            }
        }
    }
</script>

<style>

</style>
