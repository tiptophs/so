<template>
  <div class="tools">

    <!--顶部图片-->
    <div class="agile_inner"></div>
    <!--页面导航-->
    <div class="services-breadcrumb">
      <div class="agile_inner_breadcrumb">

        <ul class="w3_short">
          <li>
            <router-link to="/home">首页</router-link><span>|</span>
          </li>
          <li>工具库</li>
        </ul>
      </div>
    </div>

    <div class="wrapper">
      <div class="container">
        <div class="page-header">
          <h1> 工具库 <small> 用于查询的教程或下载安装的工具 </small></h1>
        </div>

        <!--添加tools工具类型-->
        <div class="tools-add">
          <form class="form-inline"
                role="form">
            <div class="form-group"
                 style="width:31%;">
              <label class="sr-only"
                     for="name">名称</label>
              <input type="text"
                     class="form-control"
                     id="name"
                     style="width:100%;"
                     placeholder="请输入工具类型名称">
            </div>
            <button type="submit"
                    class="btn btn-default">提交</button>
          </form>
          <p style="margin-top:5px;">工具项最多可创建15个.</p>
        </div>

        <div class="tool-item">
          <div class="row">
            <div class="col-md-4">
              <ul class="list-group">
                <li class="list-group-item">免费域名注册</li>
                <li class="list-group-item">免费 Window 空间托管</li>
                <li class="list-group-item">图像的数量</li>
                <li class="list-group-item">24*7 支持</li>
                <li class="list-group-item">每年更新成本</li>
              </ul>
            </div>

            <div class="col-md-4">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>名称</th>
                    <th>城市</th>
                    <th>邮编</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Tanmay</td>
                    <td>Bangalore</td>
                    <td>560001</td>
                  </tr>
                  <tr>
                    <td>Sachin</td>
                    <td>Mumbai</td>
                    <td>400003</td>
                  </tr>
                  <tr>
                    <td>Uma</td>
                    <td>Pune</td>
                    <td>411027</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-md-4">
              <form role="form">
                <div class="form-group">
                  <label for="name">名称</label>
                  <input type="text"
                         class="form-control"
                         id="name"
                         placeholder="请输入名称">
                </div>
                <div class="form-group">
                  <label for="inputfile">文件输入</label>
                  <input type="file"
                         id="inputfile">
                  <p class="help-block">这里是块级帮助文本的实例。</p>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox">请打勾
                  </label>
                </div>
                <button type="submit"
                        class="btn btn-default">提交</button>
              </form>
            </div>
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
.tools-add {
  padding: 15px 0px;
  margin: 15px 0px;
}
</style>