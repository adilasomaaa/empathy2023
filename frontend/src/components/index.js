import VueRecordAudio from './VueRecordAudio.vue'
// import VueRecordVideo from './VueRecordVideo'

export {
  VueRecordAudio,
//   VueRecordVideo
}

export default function install(Vue) {
  Vue.component('VueRecordAudio', VueRecordAudio)
//   Vue.component('VueRecordVideo', VueRecordVideo)
}