// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import store from './store'

// 1.1导入vue-resource
// import VueResource from 'vue-resource'
// 1.2 安装vue-resource
// Vue.use(VueResource)

// 1.1导入axios和qs json->data
import axios from 'axios'
import qs from 'qs'

// 引入bootstrap和jquery以及全局样式文件
import $ from 'jquery'
import './assets/css/font-awesome.css'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min'
import '@/assets/css/style.css'

// 引入ckeditor5-vue
// import CKEditor from '@ckeditor/ckeditor5-vue';
// Vue.use( CKEditor );

// 引入自定义弹窗提示全局组件
import Toast from './components/plugins/toast/toast.js'

// highlight.js代码高亮指令
import Highlight from './components/plugins/highlight/highlight'

// 引入ckeditor组件
import ckeditor from './components/plugins/ckeditor/index.js'

// 引入markdown组件
import mavonEditor from 'mavon-editor'
import 'mavon-editor/dist/css/index.css'

// 引入markdown 模板转义为html组件
import mark from './components/plugins/mark/mark.js'

// 引入element-ui组件
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
Vue.use(ElementUI)

// 1.2 注册axios
Vue.prototype.$axios = axios // 全局注册，使用方法为:this.$axios
Vue.prototype.qs = qs // 全局注册，使用方法为:this.qs

// 1.1 vue-axios的注册方法
// import VueAxios from 'vue-axios'
// Vue.use(VueAxios, axios)

Vue.config.productionTip = false
Vue.use(Toast)
Vue.use(Highlight)
Vue.use(ckeditor)
Vue.use(mavonEditor)
Vue.use(mark)
Vue.use(ElementUI)

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store, // 把 store 对象提供给 “store” 选项，这可以把 store 的实例注入所有的子组件
  components: {
    App
  },
  template: '<App/>'
})
