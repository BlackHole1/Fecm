<template>
  <div class="f-home">
    <i-row>
      <i-col span="8" class="col-left">
        <div class="login-info">
          <i-card style="width:100%">
            <p slot="title">
              <i-icon type="information-circled"></i-icon>
              {{$t('home.loginInfo.title')}}
            </p>
            <div class="explain ivu-row">
              <div class="ivu-col ivu-col-span-8">
                <b>{{$t('home.loginInfo.currentIp')}}:</b>
              </div>
              <div class="ivu-col ivu-col-span-16">
                255.255.255.255
              </div>
            </div>
            <div class="explain ivu-row">
              <div class="ivu-col ivu-col-span-8">
                <b>{{$t('home.loginInfo.LastIp')}}:</b>
              </div>
              <div class="ivu-col ivu-col-span-16">
                255.255.255.255
              </div>
            </div>
            <div class="explain ivu-row">
              <div class="ivu-col ivu-col-span-8">
                <b>{{$t('home.loginInfo.lastLoginTime')}}:</b>
              </div>
              <div class="ivu-col ivu-col-span-16">
                2017.09.12-13:32:20
              </div>
            </div>
            <div class="explain ivu-row">
              <div class="ivu-col ivu-col-span-8">
                <b>{{$t('home.loginInfo.lastLoginUA')}}:</b>
              </div>
              <div class="ivu-col ivu-col-span-16">
                Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/534.16 (KHTML, like Gecko) Chrome/59.0.3220.84 Safari/532.16
              </div>
            </div>
          </i-card>
        </div>
        <div class="captureLogs">
          <i-card style="width:100%;margin-top:20px">
            <v-line :data="chart.data" :title="chart.title"></v-line>
          </i-card>
        </div>
      </i-col>
      <i-col span="16" class="col-right">
        <div class="create-project">
          <i-card>
            <div class="project-description">
              <i-input v-model="project.description.name" :placeholder="$t('home.project.description.name')" class="input-item"></i-input>
              <i-input v-model="project.description.domain" :placeholder="$t('home.project.description.domain')" class="input-item"></i-input>
              <i-input v-model="project.description.note" type="textarea" :rows="4" :placeholder="$t('home.project.description.note')" class="input-item"></i-input>
            </div>
            <div class="functional-selection">
              <i-checkbox-group v-model="project.selection.selected">
                <i-checkbox v-for='(model, key) in selectedLists' :key="key" :label="model" size='large'></i-checkbox>
              </i-checkbox-group>
            </div>
            <div class="clear"></div>
            <div class="optional-content">
              <div class="code-edit">
                <v-codemirror
                  :value="project.optional.codeEdit.code"
                  :options="project.optional.codeEdit.option"
                  ref="codeEditor"
                ></v-codemirror>
              </div>
              <div class="white-list">
                <i-input v-model="project.optional.whiteList" type="textarea" :rows="14" :placeholder="$t('home.project.optional.whiteList')"></i-input>
              </div>
              <div class="clear"></div>
            </div>
          </i-card>
        </div>
      </i-col>
    </i-row>
  </div>
</template>

<script>
import 'echarts/lib/component/title'
import VeLine from 'v-charts/lib/line'
import { codemirror } from 'vue-codemirror-lite'

const { pastTime } = require('../../../common/utils')
require('codemirror/mode/javascript/javascript')

export default {
  name: 'Home',
  created () {
    this.flushChart()
  },
  data () {
    return {
      chart: {
        data: {
          columns: [],
          rows: []
        },
        title: {
          text: '',
          textStyle: {
            fontSize: '14'
          }
        }
      },
      project: {
        description: {
          name: '',
          domain: '',
          note: ''
        },
        selection: {
          selected: [],
          lists: {}
        },
        optional: {
          codeEdit: {
            code: '// Custom code',
            options: {
              mode: 'javascript'
            }
          },
          whiteList: ''
        }
      }
    }
  },
  methods: {
    flushChart () {
      let xAxis = this.$t('home.chart.xAxis')
      let yAxis = this.$t('home.chart.yAxis')
      this.chart.data = {
        columns: [xAxis, yAxis],
        rows: []
      }
      for (let i = 0; i < 7; i++) {
        let rowObj = Object.create(null)
        rowObj[xAxis] = pastTime()[6 - i]
        rowObj[yAxis] = Math.floor(Math.random() * 100)
        this.chart.data.rows.push(rowObj)
      }
      this.chart.title.text = this.$t('home.chart.title')
    },
    flushCodeHints () {
      this.project.optional.codeEdit.code = this.$t('home.project.optional.codeEdit.code')
    }
  },
  computed: {
    selectedLists () {
      let lists = {
        alert: this.$t('home.project.selection.lists.alert'),
        prompt: this.$t('home.project.selection.lists.prompt'),
        prevent: this.$t('home.project.selection.lists.prevent'),
        monitoring: this.$t('home.project.selection.lists.monitoring'),
        loading: this.$t('home.project.selection.lists.loading')
      }
      this.project.selection.lists = lists
      return lists
    }
  },
  components: {
    'v-line': VeLine,
    'v-codemirror': codemirror
  },
  watch: {
    '$i18n.locale': function () {
      this.flushChart()
      this.flushCodeHints()
    }
  }
}
</script>

<style lang="less" scoped>
.col-left {
  padding-right: 10px;
  .login-info {
    .explain {
      margin-top: 5px;
    }
  }
}
.col-right {
  .create-project {
    .project-description, .functional-selection {
      float: left;
    }
    .project-description {
      width: 55%;
      .input-item {
        margin-bottom: 15px;
        &:last-child {
          margin-bottom: 0;
        }
      }
    }
    .functional-selection {
      margin-left: 10px;
      width: 40%;
      label {
        display: block;
        margin-bottom: 5px;
      }
    }
    .optional-content {
      margin-top: 20px;
      .code-edit, .white-list {
        float: left;
      }
      .code-edit {
        width: 55%;
        .vue-codemirror-wrap {
          border: #dddddd solid 1px;
          border-radius: 4px;
          &:hover {
            border-color: #57a3f3;
          }
        }
      }
      .white-list {
        margin-left: 10px;
        width: 40%;
      }
    }
  }
}
.clear {
  clear:both;
  height: 0;
  line-height: 0;
  font-size: 0;
}
</style>

<style lang="less">
.f-home {
  .cm-s-default {
    border-radius: 4px;
  }
}
</style>

