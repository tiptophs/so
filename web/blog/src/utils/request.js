import axios from 'axios'
import store from '@/store'
import { MessageBox, Message } from 'element-ui'
import { getToken } from '@/utils/auth'

// 创建一个axios实例
const service = axios.create({
  baseURL: '/api',
  timeout: 8000
})

// 添加一个请求的拦截器
service.interceptors.request.use(
  config => {
    // Do something before request is sent

    if (store.getters.token) {
    // let each request carry token
    // ['X-Token'] is a custom headers key
    // please modify it according to the actual situation
      config.headers['Authorization'] = getToken()
    }
    return config
  },
  error => {
  // Do something with request error
    console.log('请求拦截器----' + error) // for debug
    return Promise.reject(error)
  })

// 添加一个响应的拦截机
service.interceptors.response.use(
  /**
   * If you want to get http information such as headers or status
   * Please return  response => response
  */

  /**
   * Determine the request status by custom code
   * Here is just an example
   * You can also judge the status by HTTP Status Code
   */
  response => {
    // Do something with response data
    const res = response.data
    // 自定义返回的code，不是20000请求失败.

    if (res.code !== 20000) {
      // 50008: 非法的token请求; 50012: 有其他登录的客户端; 50014: Token 失效;
      if (res.code === 50008 || res.code === 50012 || res.code === 50014) {
        // to re-login
        MessageBox.confirm('You have been logged out, you can cancel to stay on this page, or log in again', 'Confirm logout', {
          confirmButtonText: 'Re-Login',
          cancelButtonText: 'Cancel',
          type: 'warning'
        }).then(() => {
          store.dispatch('user/resetToken').then(() => {
            location.reload()
          })
        })
      } else { // 其他任何错误
        Message({
          message: res.prompt || '你的请求已经消失在二次元, 请稍后重试...',
          type: 'error',
          duration: 5 * 1000
        })
      }
      return Promise.reject(new Error(res.prompt || 'Error'))
    } else {
      return res
    }
  },
  error => {
    // Do something with response error
    console.log('err' + error) // for debug
    return Promise.reject(error)
  })

export default service
