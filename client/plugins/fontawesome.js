import Vue from 'vue'
import { library, config } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import {
  faArrowCircleUp,
  faUser,
  faHome,
  faLock,
  faSignOutAlt,
  faCog
} from '@fortawesome/free-solid-svg-icons'

import { faGithub } from '@fortawesome/free-brands-svg-icons'

config.autoAddCss = false

library.add(
  faArrowCircleUp,
  faUser,
  faHome,
  faLock,
  faSignOutAlt,
  faCog,
  faGithub
)

Vue.component('fa', FontAwesomeIcon)
