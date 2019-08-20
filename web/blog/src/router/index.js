import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

//引入组件
import blog from '@/components/blog'
import home from '@/components/home'
import about from '@/components/about'
import contact from '@/components/contact'
import login from '@/components/login'
import personal from '@/components/personal'
import particle from '@/components/particle'
import message from '@/components/message'
import skill from '@/components/skill'
import error from '@/components/error'
import tools from '@/components/tools'

export default new Router({
  routes: [{
      path: '/',
      redirect: '/home'
    },
    {
      path: '/home',
      name: 'home',
      component: home
    },
    {
      path: '/blog',
      name: 'blog',
      component: blog
    },
    {
      path: '/about',
      name: 'about',
      component: about
    },
    {
      path: '/contact',
      name: 'contact',
      component: contact
    },
    {
      path: '/login',
      name: 'login',
      component: login
    },
    {
      path: '/personal',
      name: 'personal',
      component: personal
    },
    {
      path: '/personal/particle',
      name: 'particle',
      component: particle
    },
    {
      path: '/message',
      name: 'message',
      component: message
    },
    {
      path: '/skill',
      name: 'skill',
      component: skill
    },
    {
      path: '/error',
      name: 'error',
      component: error
    },
    {
      path: '/personal/tools',
      name: 'tools',
      component: tools
    }
  ],
  linkActiveClass: 'active'
})
