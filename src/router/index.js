import Vue from 'vue'
import Router from 'vue-router'
import Main from '@/components/Main'
import Home from '@/components/Home'
import Record from '@/components/Record'
import About from '@/components/About'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Main',
      component: Main,
      children: [
        {
          path: 'Home',
          name: 'Home',
          component: Home
        },
        {
          path: 'Record',
          name: 'Record',
          component: Record
        },
        {
          path: 'About',
          name: 'About',
          component: About
        }
      ]
    }
  ]
})
