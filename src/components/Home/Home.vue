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
            <ve-line :data="chartData" :title="chartTitle"></ve-line>
          </Card>
        </div>
      </Col>
      <Col span="16">Coding...</Col>
    </Row>
  </div>
</template>

<script>
import 'echarts/lib/component/title'
import VeLine from 'v-charts/lib/line'
const { pastTime } = require('../../../common/utils')
export default {
  name: 'Home',
  created () {
    this.flushChart()
  },
  methods: {
    flushChart () {
      let xAxis = this.$t('home.left.chart.xAxis')
      let yAxis = this.$t('home.left.chart.yAxis')
      this.chartData = {
        columns: [xAxis, yAxis],
        rows: []
      }
      for (let i = 0; i < 7; i++) {
        let rowObj = Object.create(null)
        rowObj[xAxis] = pastTime()[6 - i]
        rowObj[yAxis] = Math.floor(Math.random() * 100)
        this.chartData.rows.push(rowObj)
      }
      this.chartTitle.text = this.$t('home.left.chart.title')
    }
  },
  data () {
    return {
      chartData: {
        columns: [],
        rows: []
      },
      chartTitle: {
        text: '',
        textStyle: {
          fontSize: '14'
        }
      }
    }
  },
  components: {
    've-line': VeLine
  },
  watch: {
    '$i18n.locale': 'flushChart'
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
