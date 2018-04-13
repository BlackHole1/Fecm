module.exports = {
  nav: {
    home: 'Home',
    recordDetails: 'Record Details',
    aboutMe: 'About Me'
  },
  home: {
    loginInfo: {
      title: 'Login Info',
      currentIp: 'Current IP',
      LastIp: 'Last IP',
      lastLoginTime: 'Last Login Time',
      lastLoginUA: 'Last Login Usre-Agent'
    },
    chart: {
      title: 'Chart Of Triggering Times',
      xAxis: 'Date',
      yAxis: 'Trigger'
    },
    project: {
      description: {
        name: 'Project Name',
        domain: 'Website Address (Example: https://www.google.com.hk/)',
        note: 'Project Notes'
      },
      selection: {
        lists: {
          alert: 'alert function Hook',
          prompt: 'prompt function Hook',
          prevent: 'prevent alert function and prompt function running',
          monitoring: 'monitoring the console open state',
          loading: 'The risk of loading remote JS code'
        }
      },
      optional: {
        codeEdit: {
          code: '// Custom Code'
        },
        whiteList: 'White List Of Websites'
      }
    }
  }
}
