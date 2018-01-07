import Vue from 'vue'
import Router from 'vue-router'
import Main from '@/components/Main'
import Report from '@/components/Report'
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
          path: 'Report',
          name: 'Report',
          component: Report
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
