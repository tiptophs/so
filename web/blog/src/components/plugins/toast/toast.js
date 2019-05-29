import toastComponent from './toast.vue'
const toast = {
    install: function(Vue) {
        // 注册并获取组件，然后在main.js中引用，在Vue.use()就可以了
        Vue.component('v-toast', toastComponent)
    }
}
export default toast