<template>
  <div class="layout">
    <Layout>
      <Header>
        <Menu mode="horizontal" theme="dark" active-name="Home" @on-select="gotoPage">
          <div class="layout-logo"></div>
          <div class="layout-nav">
            <MenuItem name="Home">
              <Icon type="ios-analytics"></Icon>
              {{$t("nav.home")}}
            </MenuItem>
            <MenuItem name="Record">
              <Icon type="ios-keypad"></Icon>
              {{$t("nav.recordDetails")}}
            </MenuItem>
            <MenuItem name="About">
              <Icon type="ios-navigate"></Icon>
              {{$t("nav.aboutMe")}}
            </MenuItem>
            <MenuItem name="Language" @click.native="switchLanguage">
              <Icon type="gear-a"></Icon>
              中文 / English
            </MenuItem>
          </div>
        </Menu>
      </Header>
      <Content :style="{padding: '0 50px'}">
        <Breadcrumb :style="{margin: '20px 0'}">
          <BreadcrumbItem>{{currentModelName}}</BreadcrumbItem>
        </Breadcrumb>
        <Card>
          <div style="min-height: 200px;">
            <router-view></router-view>
          </div>
        </Card>
      </Content>
      <Footer class="layout-footer-center">
        <span>前端XSS防火墙及后台报警系统 (front-end XSS firewall and back-end alarm system)</span>
      </Footer>
    </Layout>
  </div>
</template>

<script>
export default {
  name: 'Main',
  created () {
    this.isMain()
  },
  methods: {
    isMain () {
      if (this.routesWatch === 'Main') {
        this.$router.replace('Home')
      }
    },
    gotoPage (name) {
      if (name !== 'Language') {
        this.$router.push(name)
      }
    },
    switchLanguage () {
      let locale = this.$i18n.locale
      locale === 'zh' ? this.$i18n.locale = 'en' : this.$i18n.locale = 'zh'
    }
  },
  computed: {
    routesWatch () {
      return this.$route.name
    },
    currentModelName () {
      switch (this.routesWatch) {
        case 'Home':
          return this.$t('nav.home')
        case 'Record':
          return this.$t('nav.recordDetails')
        case 'About':
          return this.$t('nav.aboutMe')
        default:
          return this.$t('nav.home')
      }
    }
  },
  watch: {
    '$route': 'isMain'
  }
}
</script>

<style scoped>
.layout{
    border: 1px solid #d7dde4;
    background: #f5f7f9;
    position: relative;
    border-radius: 4px;
    overflow: hidden;
}
.layout-logo{
    width: 100px;
    height: 30px;
    background-image: url('/static/logo.png');
    border-radius: 3px;
    float: left;
    position: relative;
    top: 15px;
    left: 20px;
}
.layout-nav{
    width: 520px;
    margin: 0 auto;
    margin-right: 20px;
}
.layout-footer-center{
    text-align: center;
}
</style>