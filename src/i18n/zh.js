module.exports = {
  nav: {
    home: '首页',
    recordDetails: '记录详情',
    aboutMe: '关于我'
  },
  home: {
    loginInfo: {
      title: '登录信息',
      currentIp: '当前IP',
      LastIp: '上次IP',
      lastLoginTime: '上次登录时间',
      lastLoginUA: '上次登录User-Agent'
    },
    chart: {
      title: '近七天触发次数',
      xAxis: '日期',
      yAxis: '触发'
    },
    project: {
      description: {
        name: '项目名',
        domain: '网站地址 (例子: https://www.google.com.hk/)',
        note: '项目备注'
      },
      selection: {
        lists: {
          alert: 'alert函数钩子',
          prompt: 'prompt函数钩子',
          prevent: '阻止alert、prompt函数继续运行',
          monitoring: '监听控制台开启状态',
          loading: '加载远程js代码的危险程度'
        }
      },
      optional: {
        codeEdit: {
          code: '// 自定义代码'
        },
        whiteList: '网站白名单'
      }
    }
  }
}
