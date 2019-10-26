import Vue from 'vue'
import Router from 'vue-router'

/* Layout */
import Layout from '@/layout'

// 引入组件
import blog from '@/components/blog'
import contact from '@/components/contact'
import personal from '@/components/personal'
import particle from '@/components/particle'
import message from '@/components/message'
import skill from '@/components/skill'
import error from '@/components/error'
import tools from '@/components/tools'

Vue.use(Router)

// 常用固定不变的路由
const constantRoutes = [
  {
    path: '/login',
    component: () => import('@/views/login/index'),
    name: 'login'
  },
  {
    path: '/',
    component: Layout,
    redirect: '/home',
    children: [
      {
        path: '/home',
        component: () => import('@/views/home/index'),
        name: 'home'
      }
    ]
  },
  {
    path: '/about',
    component: Layout,
    redirect: '/about/index',
    children: [
      {
        path: '/about/index',
        component: () => import('@/views/about/index'),
        name: 'about'
      }
    ]
  },
  {
    path: '/blog',
    name: 'blog',
    component: blog
  },
  {
    path: '/contact',
    name: 'contact',
    component: contact
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
]

const createRouter = () => new Router({
  // mode: 'history', // require service support
  // scrollBehavior: () => ({ y: 0 }),
  routes: constantRoutes,
  linkActiveClass: 'active'
})

const router = createRouter()

// Detail see: https://github.com/vuejs/vue-router/issues/1234#issuecomment-357941465
// export function resetRouter () {
//   const newRouter = createRouter()
//   router.matcher = newRouter.matcher // reset router
// }

export default router
