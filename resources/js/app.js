import Vue from 'vue'

import VueSafeHTML from 'vue-safe-html'
import { NavbarPlugin } from 'bootstrap-vue'

import translation from './mixins/translation'

require('./bootstrap')

const files = require.context('./Components', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.mixin(translation)
Vue.use(NavbarPlugin)
Vue.use(VueSafeHTML)

new Vue({
    el: '#app',
    methods: {
        logout() {
            document.getElementById('logout-form').submit()
        }
    }
})
