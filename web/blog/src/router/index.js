import Vue from 'vue'
import Router from 'vue-router'

/* Layout */
import Layout from '@/layout'

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
      },
      {
        path: 'skill',
        name: 'skill',
        component: () => import('@/views/home/skill')
      },
      {
        path: 'contact',
        name: 'contact',
        component: () => import('@/views/home/contact')
      },
      {
        path: 'message',
        name: 'message',
        component: () => import('@/views/home/message')
      },
      {
        path: 'blog',
        name: 'blog',
        component: () => import('@/views/home/blog')
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
    path: '/personal',
    component: Layout,
    redirect: '/personal/index',
    children: [
      {
        path: '/personal/index',
        component: () => import('@/views/personal/index'),
        name: 'personal'
      },
      {
        path: 'particle',
        name: 'particle',
        component: () => import('@/views/personal/particle')
      },
      {
        path: 'tools',
        name: 'tools',
        component: () => import('@/views/personal/tools')
      }
    ]
  },
  {
    path: '/error',
    component: Layout,
    redirect: '/error',
    children: [
      {
        path: '/error',
        component: () => import('@/views/redirect/error'),
        name: 'error'
      }
    ]
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

// 导航守卫
// 使用 router.beforeEach 注册一个全局前置守卫，判断用户是否登陆
router.beforeEach((to, from, next) => {
  if (to.path === '/login') {
    next()
  } else {
    let token = localStorage.getItem('Authorization')

    if (token === 'null' || token === '') {
      next('/login')
    } else {
      next()
    }
  }
})

export default router
