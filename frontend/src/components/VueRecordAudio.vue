<template>
    <div
      v-if="isSupported"
      class="vue-audio-recorder"
      :class="{
        'active': isRecording,
        'paused': isPaused
      }"
      @mousedown="startRecording"
      @mouseleave="stopRecording"
      @mouseup="stopRecording"
      @touchstart="startRecording"
      @touchend="stopRecording"
      @touchcancel="stopRecording"
    >
      <span></span>
    </div>
  </template>
  
  <script>
  import ElementMixin from './ElementMixin'
  
  const supportedTypes = [
    'audio/aac',
    'audio/ogg',
    'audio/wav',
    'audio/webm'
  ]
  
  export default {
    name: 'VueRecordAudio',
    mixins: [ElementMixin],
    props: {
      mimeType: {
        type: String,
        default: 'audio/webm',
        validator: v => supportedTypes.includes(v)
      }
    },
    data () {
      return {
        constraints: {
          audio: true,
          video: false
        }
      }
    }
  }
  </script>

<style>
  .vue-audio-recorder {
  position: relative;
  background-color: #e90228;
  border-radius: 50%;
  width: 64px;
  height: 64px;
  display: inline-block;
  cursor: pointer;
  box-shadow: 0 0 0 0 rgba(232, 76, 61, 0.7);
}
.vue-audio-recorder:hover {
  background-color: #a50202;
}
.vue-audio-recorder.active {
  background-color: #d6b80b;
  -webkit-animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
  -moz-animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
  animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
}
.vue-audio-recorder:before,
.vue-audio-recorder:after {
  content: '';
  position: absolute;
  background-color: #fff;
}
.vue-audio-recorder:after {
  top: 30%;
  left: 43%;
  height: 15%;
  width: 14%;
  border-top-left-radius: 50%;
  border-top-right-radius: 50%;
}
.vue-audio-recorder:before {
  top: 40%;
  left: 43%;
  height: 15%;
  width: 14%;
  border-bottom-left-radius: 50%;
  border-bottom-right-radius: 50%;
}
.vue-audio-recorder span {
  position: absolute;
  top: 50%;
  left: 36%;
  height: 24%;
  width: 28%;
  overflow: hidden;
}
.vue-audio-recorder span:before,
.vue-audio-recorder span:after {
  content: '';
  position: absolute;
  background-color: #fff;
}
.vue-audio-recorder span:before {
  bottom: 50%;
  width: 100%;
  height: 100%;
  box-sizing: border-box;
  border-radius: 50%;
  border: 0.125em solid #fff;
  background: none;
  left: 0;
}
.vue-audio-recorder span:after {
  top: 50%;
  left: 40%;
  width: 20%;
  height: 25%;
}

@keyframes pulse {
  to {
    box-shadow: 0 0 0 10px rgba(239, 83, 80, 0.1);
    background-color: #E53935;
    transform: scale(0.9);
  }
}
</style>