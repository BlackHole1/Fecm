// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'

import iView from 'iview'
import 'iview/dist/styles/iview.css'

import VueI18n from 'vue-i18n'
import en from 'iview/dist/locale/en-US'
import zh from 'iview/dist/locale/zh-CN'

import {getLanguage} from '../common/utils'

Vue.use(VueI18n)
Vue.use(iView)

const messages = {
  en: Object.assign(require('./i18n/en'), en),
  zh: Object.assign(require('./i18n/zh'), zh)
}

const i18n = new VueI18n({
  locale: getLanguage(),
  messages
})

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  i18n,
  template: '<App/>',
  components: { App }
})
