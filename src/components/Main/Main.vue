<template>
    <div class="layout">
        <Layout>
            <Header>
                <Menu mode="horizontal" theme="dark" active-name="1" @on-select="gotoPage">
                    <div class="layout-logo"></div>
                    <div class="layout-nav">
                        <MenuItem name="Report">
                            <Icon type="ios-analytics"></Icon>
                            {{$t("nav.report")}}
                        </MenuItem>
                        <MenuItem name="Record">
                            <Icon type="ios-keypad"></Icon>
                            {{$t("nav.recordDetails")}}
                        </MenuItem>
                        <MenuItem name="About">
                            <Icon type="ios-navigate"></Icon>
                            {{$t("nav.aboutMe")}}
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
            <Footer class="layout-footer-center">前端XSS防火墙及后台报警系统 (front-end XSS firewall and back-end alarm system)</Footer>
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
        this.$router.replace('Report')
      }
    },
    gotoPage (name) {
      this.$router.push(name)
    }
  },
  computed: {
    routesWatch () {
      return this.$route.name
    },
    currentModelName () {
      switch (this.routesWatch) {
        case 'Report':
          return this.$t('nav.report')
        case 'Record':
          return this.$t('nav.recordDetails')
        case 'About':
          return this.$t('nav.aboutMe')
        default:
          return this.$t('nav.report')
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
    width: 420px;
    margin: 0 auto;
    margin-right: 20px;
}
.layout-footer-center{
    text-align: center;
}
</style>