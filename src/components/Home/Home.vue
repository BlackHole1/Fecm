<template>
  <div>
    <Row>
        <Col span="8" class="col-left">
          <div class="loginInfo">
            <Card style="width:100%">
              <p slot="title">
                <Icon type="information-circled"></Icon>
                {{$t('home.left.loginInfo.title')}}
              </p>
              <div class="explain ivu-row">
                <div class="ivu-col ivu-col-span-8">
                  <b>{{$t('home.left.loginInfo.currentIp')}}:</b>
                </div>
                <div class="ivu-col ivu-col-span-16">
                  255.255.255.255
                </div>
              </div>
              <div class="explain ivu-row">
                <div class="ivu-col ivu-col-span-8">
                  <b>{{$t('home.left.loginInfo.LastIp')}}:</b>
                </div>
                <div class="ivu-col ivu-col-span-16">
                  255.255.255.255
                </div>
              </div>
              <div class="explain ivu-row">
                <div class="ivu-col ivu-col-span-8">
                  <b>{{$t('home.left.loginInfo.lastLoginTime')}}:</b>
                </div>
                <div class="ivu-col ivu-col-span-16">
                  2017.09.12-13:32:20
                </div>
              </div>
              <div class="explain ivu-row">
                <div class="ivu-col ivu-col-span-8">
                  <b>{{$t('home.left.loginInfo.lastLoginUA')}}:</b>
                </div>
                <div class="ivu-col ivu-col-span-16">
                  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/534.16 (KHTML, like Gecko) Chrome/59.0.3220.84 Safari/532.16
                </div>
              </div>
            </Card>
          </div>
          <div class="captureLogs">
            <Card style="width:100%;margin-top:20px">
              <ve-line :data="chartData"></ve-line>
            </Card>
          </div>
        </Col>
        <Col span="16">Coding...</Col>
    </Row>
  </div>
</template>

<script>
export default {
  name: 'Home',
  created: function () {
    this.chartData = {
      columns: ['日期', '近七天触发次数图表'],
      rows: [
        { '日期': '1月1日', '近七天触发次数图表': 123 },
        { '日期': '1月2日', '近七天触发次数图表': 12 },
        { '日期': '1月3日', '近七天触发次数图表': 545 },
        { '日期': '1月4日', '近七天触发次数图表': 44 },
        { '日期': '1月5日', '近七天触发次数图表': 987 },
        { '日期': '1月6日', '近七天触发次数图表': 324 }
      ]
    }
  }
}
</script>

<style lang="less" scoped>
.col-left {
  padding-right: 10px;
  .loginInfo {
    .explain {
      margin-top: 5px;
    }
  }
}
</style>
