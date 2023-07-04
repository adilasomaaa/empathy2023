<template>
    <div
        class="main-section antialiased relative font-nunito text-sm font-normal"
        :class="[store.sidebar ? 'toggle-sidebar' : '', store.menu, store.layout, store.rtlClass]"
    >
        
        <component v-bind:is="landingLayout"></component>
    </div>
  </template>
  
  <script lang="ts" setup>
    import { computed } from 'vue';
  
    import appLayout from '@/layouts/app-layout.vue';
    import landingLayout from '@/layouts/landing-layout.vue';
  
    import { useAppStore } from '@/stores/index';
    import { useMeta } from '@/composables/use-meta';
  
    const store = useAppStore();
  
    // meta
    useMeta({ title: 'Sales Admin' });
  
    const mainLayout = computed(() => {
        return store.mainLayout === 'auth' ? landingLayout : appLayout;
    });
  </script>
  