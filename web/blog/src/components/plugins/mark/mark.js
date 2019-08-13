import markComponent from './mark.vue'

const mark = {
    install: function(Vue) {
        // 注册并获取组件，然后在main.js中引用，在Vue.use()就可以了
        Vue.component('v-mark', markComponent)
    }
}
export default mark