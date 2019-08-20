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
                <li class="list-group-item">免费域名注册</li>
                <li class="list-group-item">免费 Window 空间托管</li>
                <li class="list-group-item">图像的数量</li>
                <li class="list-group-item">24*7 支持</li>
                <li class="list-group-item">每年更新成本</li>
                <li class="list-group-item">免费域名注册</li>
                <li class="list-group-item">免费 Window 空间托管</li>
                <li class="list-group-item">图像的数量</li>
                <li class="list-group-item">24*7 支持</li>
                <li class="list-group-item">每年更新成本</li>
              </ul>
            </div>

            <div class="col-md-8">
              <div class="row">
                <div class="col-md-12">
                  <form class="form-horizontal">
                    <div class="form-group">
                      <label for="tools-type"
                             class="col-sm-2 control-label">所选工具项</label>
                      <div class="col-sm-10">
                        <input type="email"
                               class="form-control"
                               id="tools-type"
                               disabled>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="title"
                             class="col-sm-2 control-label">名称</label>
                      <div class="col-sm-10">
                        <input type="password"
                               class="form-control"
                               id="title"
                               placeholder="请输入名称...">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="picture"
                             class="col-sm-2 control-label">图片</label>
                      <div class="col-sm-10">
                        <input type="password"
                               class="form-control"
                               id="picture"
                               placeholder="请输入图片url地址...">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="link"
                             class="col-sm-2 control-label">链接</label>
                      <div class="col-sm-10">
                        <input type="password"
                               class="form-control"
                               id="link"
                               placeholder="请输入链接地址..">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit"
                                class="btn btn-default">添加</button>
                      </div>
                    </div>
                  </form>
                </div>

                <div class="col-md-12">
                  <h3 style="margin-bottom:16px;">工具列表</h3>
                  <div class="table-tools">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>名称</th>
                          <th>Url连接</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Tanmay</td>
                          <td>Bangalore</td>
                        </tr>
                        <tr>
                          <td>Sachin</td>
                          <td>Mumbai</td>
                        </tr>
                        <tr>
                          <td>Uma</td>
                          <td>Pune</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
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

.table-tools {
  border: 1px solid #dddddd;
  border-radius: 4px;
}
</style>