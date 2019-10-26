<template>
  <div class="tools">

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
                     v-model="tools.title"
                     style="width:100%;color:#22abb3;"
                     placeholder="请输入工具类型名称">
            </div>
            <button type="submit"
                    class="btn btn-default"
                    v-if="isToolAdd"
                    @click="addTools">提交</button>
            <button type="submit"
                    class="btn btn-default"
                    v-if="!isToolAdd"
                    @click="editTools">修改</button>
            <button type="submit"
                    class="btn btn-default"
                    v-if="!isToolAdd"
                    @click="toolsDel">删除</button>
            <button type="submit"
                    class="btn btn-default"
                    v-if="!isToolAdd"
                    @click="refresh">刷新</button>
          </form>
          <p style="margin-top:5px;">工具项最多可创建15个.</p>
        </div>

        <div class="tool-item">
          <div class="row">
            <div class="col-md-4">
              <ul class="list-group">
                <li class="list-group-item"
                    v-for="(item, index) in toolList"
                    :key="index"
                    :class="{ active: item.sid==selectId }"
                    @click="toolsViewEdit(item.sid, item.title)">{{item.title}}
                </li>
              </ul>
            </div>

            <div class="col-md-8">

              <form class="form-horizontal">
                <div class="form-group">
                  <label for="title"
                         class="col-sm-2 control-label">名称</label>
                  <div class="col-sm-10">
                    <input type="text"
                           class="form-control"
                           id="title"
                           v-model="itemTool.title"
                           placeholder="请输入名称...">
                  </div>
                </div>
                <div class="form-group">
                  <label for="picture"
                         class="col-sm-2 control-label">图片</label>
                  <div class="col-sm-10">
                    <input type="text"
                           class="form-control"
                           id="picture"
                           v-model="itemTool.img"
                           placeholder="请输入图片url地址...">
                  </div>
                </div>
                <div class="form-group">
                  <label for="link"
                         class="col-sm-2 control-label">链接</label>
                  <div class="col-sm-10">
                    <input type="text"
                           class="form-control"
                           id="link"
                           v-model="itemTool.url"
                           placeholder="请输入链接地址..">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit"
                            class="btn btn-default"
                            v-if="!isToolAdd"
                            @click="addItemTool">添加</button>
                  </div>
                </div>
              </form>

            </div>

            <div class="col-md-12">
              <div class="table">
                <el-table :data="tableData.slice((currentPage-1)*pagesize,currentPage*pagesize)"
                          border
                          max-height="350"
                          show-overflow-tooltip
                          style="width: 100%">
                  <!--<el-table-column type="selection"
                                   width="45">
                  </el-table-column>-->
                  <el-table-column label="名称"
                                   width="260">
                    <template slot-scope="scope">
                      <span style="margin-left: 10px">{{ scope.row.title }}</span>
                    </template>
                  </el-table-column>
                  <el-table-column label="创建时间"
                                   width="180">
                    <template slot-scope="scope">
                      <span style="margin-left: 10px">{{ scope.row.create_time }}</span>
                    </template>
                  </el-table-column>
                  <el-table-column label="链接地址"
                                   width="360">
                    <template slot-scope="scope">
                      <span style="margin-left: 10px">{{ scope.row.url }}</span>
                    </template>
                  </el-table-column>

                  <el-table-column label="操作">
                    <template slot-scope="scope">
                      <el-button size="mini"
                                 type="danger"
                                 @click="handleDelete(scope.$index, scope.row)">删除</el-button>
                    </template>
                  </el-table-column>
                </el-table>

                <el-pagination @size-change="handleSizeChange"
                               @current-change="handleCurrentChange"
                               :current-page="currentPage"
                               :page-sizes="[5, 10, 20, 40]"
                               :page-size="pagesize"
                               layout="total, sizes, prev, pager, next, jumper"
                               :total="tableData.length"
                               style="margin-top:25px;text-align:right;">
                </el-pagination>
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
  data () {
    return {
      //添加工具项对象
      tools: {
        title: '',
        sid: ''
      },
      //加载列表数组
      toolList: [],
      //添加工具对象
      itemTool: {
        type: '',
        title: '',
        img: '',
        url: ''
      },
      //相关显示状态
      isToolAdd: true,
      isActive: false,
      isitemEdit: false,
      selectId: -1,
      tableData: [],
      currentPage: 1, //初始页
      pagesize: 10,    //    每页的数据
      multipleSelection: []
    }
  },
  methods: {
    addTools () {
      if (this.tools.title.trim() == '') return false;
      this.$axios({
        url: '/api/index/tool/addTools',
        method: 'post',
        param: {},
        data: this.tools,
        transformRequest: [data => {
          return this.qs.stringify(data);
        }]
      }).then(res => {
        if (res.data.status) {
          this.toolList.push(res.data.value);
          this.tools.title = '';
        } else {
          alert(res.data.prompt);
        }
      }).catch(err => { })
    },
    getToolList () {
      this.$axios({
        url: '/api/index/tool/getToolList',
        method: 'post',
        param: {},
        data: {}
      }).then(res => {
        if (res.data.status) {
          this.toolList = res.data.value;
        }
      }).catch(err => { });
    },
    //修改展示
    toolsViewEdit (id, title) {
      this.tools.sid = id;
      this.tools.title = title;
      this.isToolAdd = false;
      this.selectId = id;
      this.itemTool.type = id;
      this.getToolItem();
    },
    //修改工具项
    editTools () {
      this.$axios({
        url: '/api/index/tool/editTool',
        method: 'post',
        param: {},
        data: this.tools,
        transformRequest: [data => {
          return this.qs.stringify(data);
        }]
      }).then(res => {
        if (res.data.status) {
          this.toolList.map(tool => {
            if (tool.sid == this.tools.sid) {
              tool.title = this.tools.title
            }
          })
        }
      }).catch(err => { });
    },
    //删除工具项
    toolsDel () {
      this.$axios({
        url: '/api/index/tool/delTool',
        method: 'post',
        param: {},
        data: { sid: this.tools.sid },
        transformRequest: [data => {
          return this.qs.stringify(data);
        }]
      }).then(res => {
        if (res.data.status) {
          const index = this.toolList.findIndex(tool => tool.sid === this.tools.sid);
          this.toolList.splice(index, 1);
          this.refresh();
        }
      });
    },
    //刷新数据
    refresh () {
      this.tools.sid = '';
      this.tools.title = '';
      this.isToolAdd = true;
      this.selectId = -1;
      this.itemTool.type = '';
      this.tableData = [];
    },
    //添加子选项
    addItemTool () {
      this.$axios({
        url: '/api/index/tool/addItemTool',
        method: 'post',
        param: '',
        data: this.itemTool,
        transformRequest: [data => {
          return this.qs.stringify(data);
        }]
      }).then(res => {
        if (res.data.status) {
          alert('数据添加成功!');
          this.itemTool.title = '';
          this.itemTool.url = '';
          this.itemTool.img = '';
          this.getToolItem();
        }
      });
    },
    //获取所有子选项
    getToolItem () {
      this.$axios({
        url: '/api/index/tool/getToolItem',
        method: 'post',
        param: {},
        data: { type: this.tools.sid },
        transformRequest: [data => {
          return this.qs.stringify(data);
        }]
      }).then(res => {
        if (res.data.status) {
          this.tableData = res.data.value.tools;
        }
      });
    },
    //删除item数据
    handleDelete (index, data) {
      this.$axios({
        url: '/api/index/tool/delToolItem',
        method: 'post',
        param: {},
        data: { sid: data.sid },
        transformRequest: [data => {
          return this.qs.stringify(data);
        }]
      }).then(res => {
        if (res.data.status) {
          const index = this.tableData.findIndex(row => row.sid === data.sid);
          this.tableData.splice(index, 1);
          alert('数据删除成功');
        }
      });
    },
    // 初始页currentPage、初始每页数据数pagesize和数据data
    handleSizeChange: function (size) {
      this.pagesize = size;
      console.log(this.pagesize)  //每页下拉显示数据
    },
    handleCurrentChange: function (currentPage) {
      this.currentPage = currentPage;
      console.log(this.currentPage)  //点击第几页
    }
  },
  created () {
    this.getToolList();
    this.getToolItem();
  },
  mounted () {

  }
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

.tool-item .list-group-item {
  cursor: pointer;
}

.box-card {
  min-height: 480px;
  margin-bottom: 45px;
}

.table td,
.table > tbody > tr > td,
.table > tbody > tr > th,
.table > tfoot > tr > td,
.table > tfoot > tr > th,
.table > thead > tr > td,
.table > thead > tr > th {
  padding: 0px !important;
}
</style>