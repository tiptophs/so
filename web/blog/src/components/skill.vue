<template>
  <div class="contact-container">
    <!--顶部图片-->
    <div class="agile_inner"></div>
    <!--导航-->
    <div class="services-breadcrumb">
      <div class="agile_inner_breadcrumb">

        <ul class="w3_short">
          <li><a href="index.html">首页</a><span>|</span></li>
          <li>技能列表</li>
        </ul>
      </div>
    </div>
    <!--留言信息-->
    <div class="banner-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-3 fix-width">
            <div class="grid_3 grid_5 wthree"
                 data-spy="affix"
                 data-offset-top="350"
                 data-offset-bottom="200">
              <h3>快速定位</h3>
              <div class="skill-list">
                <p>这里将罗列出所有学习/教程笔记, 方便以后学习查找。同时也希望大家留言啦！</p>
                <div class="list-group list-group-alternate">

                  <template v-for="(item, index) in list">
                    <a href="javascirpt:;"
                       @click="detail(item.sid)"
                       class="list-group-item"
                       :key="index"><span class="badge badge-primary">5021</span> <i class="ti ti-eye"></i> {{ item.title }} </a>
                  </template>
                  <!--<a href="#" class="list-group-item"><span class="badge">201</span> <i class="ti ti-email"></i> Git教程学习笔记 </a>
                                    <a href="#" class="list-group-item"><span class="badge badge-primary">5021</span> <i class="ti ti-eye"></i> Profile visits </a>
                                    <a href="#" class="list-group-item"><span class="badge">14</span> <i class="ti ti-headphone-alt"></i> Call </a>
                                    <a href="#" class="list-group-item"><span class="badge">20</span> <i class="ti ti-comments"></i> Messages </a>
                                    <a href="#" class="list-group-item"><span class="badge badge-warning">14</span> <i class="ti ti-bookmark"></i> Bookmarks </a>
                                    <a href="#" class="list-group-item"><span class="badge badge-danger">30</span> <i class="ti ti-bell"></i> Notifications </a>-->

                </div>
              </div>
              <div class="clearfix"> </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="article">
              <template v-if="article.title">
                <h3 class="article-title">{{ article.title }}</h3>
                <p class="article-desc">{{ article.desc }}</p>
                <div class="tags">
                  <template v-for="(tag, index) in article.tag">
                    <span :key="index">{{ tag.title }}</span>
                  </template>
                </div>
              </template>
              <template v-else>
                <h3 class="article-title"
                    v-html="preview.title"></h3>
                <h3 class="article-desc"
                    v-html="preview.desc"></h3>
                <div class="tags">
                  <span>标签</span>
                  <span>标签</span>
                </div>
              </template>

              <hr style="margin-top:0px;" />

              <template v-if="article.content">
                <div class="article-detail"
                     v-if="isCk">
                  <p v-html="article.content"
                     v-highlightB></p>
                </div>

                <div class="article-detail markdown-body"
                     v-if="!isCk">
                  <v-mark v-bind:detail="article.content"></v-mark>
                </div>
              </template>
              <template v-else>
                <p v-html="preview.content"></p>
              </template>

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
      list: [],
      article: {},
      isCk: true,
      preview: {
        title: '<p style="font-size:24px;">默认标题显示区域</p>',
        desc: '<p style="font-size:16px;">这里将会显示默认的文章描述信息, 用于简要的概括文章的信息,以便用户查看.</p>',
        content: '<p>Git是什么？Git是目前世界上最先进的分布式版本控制系统（没有之一）。Git有什么特点？简单来说就是：高端大气上档次！那什么是版本控制系统？如果你用Microsoft Word写过长篇大论，那你一定有这样的经历....</p>'
      }
    }
  },
  methods: {
    //获取文章详情
    detail: function (sid) {
      let url = '/api/index/blog/detail';        // 这里就是刚才的config/index.js中的/api
      this.$axios({
        method: "post",
        url: url,
        param: {},
        data: { sid: sid },
        transformRequest: [data => {
          return this.qs.stringify(data);
        }]
      }).then(res => {
        if (res.data.status) {
          //转换数据格式
          this.article = res.data.value;
          //采用哪个编辑器显示html
          this.isCk = this.article.editor == 1 ? true : false;
        }
      }).catch(function (err) { })
    },
    handleScroll: function () {
      $('.affix').width($('.fix-width').width());
    }
  },
  mounted () {
    if (this.$route.query.category == '') return false;
    let category = this.$route.query.category;
    this.$axios({
      method: "post",
      url: '/api/index/blog/getSkillArticle',
      param: {},
      data: { category: category },
      transformRequest: [data => {
        return this.qs.stringify(data);
      }]
    }).then(res => {
      if (res.data.status) {
        this.list = res.data.value;
      }
    }).catch(err => { })

    window.addEventListener('scroll', this.handleScroll, true);  // 监听（绑定）滚轮滚动事件

  },
  destroyed: function () {
    window.removeEventListener('scroll', this.handleScroll);   //  离开页面清除（移除）滚轮滚动事件
  }

}
</script>
      
<style scoped>
@media (min-width: 1650px) {
  .container {
    width: 1518px;
  }
}

.skill-list .list-group-item {
  font-size: 18px;
  font-weight: bold;
}

.banner-bottom {
  padding: 2em 0;
}

.article-detail p {
  word-break: break-all;
}

.article-title {
  text-align: center;
  margin: 20px 0px;
}

.article-desc {
  margin-bottom: 15px;
  font-size: 16px;
  font-weight: 500;
}

.article {
  border: 1px solid #dddddd;
  margin-top: 25px;
  padding: 15px;
  border-radius: 12px;
  min-height: 450px;
}

.tags span {
  border: 1px solid #3b98e8;
  padding: 5px 15px;
  border-radius: 4px;
  color: white;
  background-color: #3b98e8;
  font-size: 12px;
  margin-right: 15px;
}

.tags {
  padding: 0px 0px 15px 0px;
}

.affix {
  top: 0px;
}
</style>


