<template>
  <div class="error-message">
    <div class="services-breadcrumb">
      <div class="agile_inner_breadcrumb">
        <ul class="w3_short">
          <li><a href="index.html">首页</a><span>|</span></li>
          <li>友情提示</li>
        </ul>
      </div>
    </div>

    <div class="container">
      <div class="error-content">
        <div class="row">
          <div class="col-md-12">
            <router-link to="/home"
                         tag="a"
                         class="btn btn-primary"
                         style="padding:5px 25px"
                         href="javascirpt:;">返回</router-link>
          </div>
          <div class="col-md-6 col-sm-12">
            <h1 class="error-title">
              Oops
            </h1>

            <h2 class="error-msg">
              你没有权限查看该页面.
            </h2>
            <h6>如果你想获得权限,您可以参考:</h6>
            <ul class="list-unstyled">
              <li class="link-type">或者你可以去:</li>
              <li class="link-type">
                <router-link href="javascript:;"
                             tag="a"
                             to="/home"
                             class="">回首页</router-link>
              </li>
              <li class="link-type">
                <router-link href="javascript:;"
                             to="/login"
                             tag="a">登陆账号</router-link>
              </li>
            </ul>
          </div>
          <div class="col-md-6 col-sm-12">
            <img data-v-cbc28918=""
                 src="/static/img/error.gif"
                 width="313"
                 height="428"
                 alt="Girl has dropped her ice cream.">
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {

}
</script>

<style scoped>
.error-content {
  width: 800px;
  max-width: 100%;
  margin: 100px auto;
}

.error-title {
  font-size: 60px;
  font-weight: 700;
  color: #484848;
  margin: 0.6em 0;
}

.error-msg {
  display: block;
  font-size: 1.5em;
  margin-block-start: 0.83em;
  margin-block-end: 0.83em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  font-weight: bold;
}

h6 {
  display: block;
  font-size: 0.67em;
  margin-block-start: 2.33em;
  margin-block-end: 2.33em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  font-weight: bold;
}

.list-unstyled {
  font-size: 14px;
  /*margin-left: 40px;*/
}

.link-type {
  padding-bottom: 5px;
}
</style>