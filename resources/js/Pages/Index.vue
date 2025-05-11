<script setup lang="ts">
    import LogoMain from "../Components/LogoMain/LogoMain.vue";
    import About from "../Components/About/About.vue";
    import VideoView from "../Components/VideoView/VideoView.vue";
    import MainLayout from "../Layouts/MainLayout.vue";

    import { ref, onMounted, onUnmounted } from 'vue';

    const isVisible = ref(false);

    const handleScroll = () => {
        isVisible.value = window.scrollY > 300;
    };

    const scrollToTop = () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    onMounted(() => window.addEventListener('scroll', handleScroll));
    onUnmounted(() => window.removeEventListener('scroll', handleScroll));
</script>

<template> 
    <MainLayout>
        <LogoMain class="h-screen" id="home">Главная</LogoMain>
        <About class="h-screen" id="about">О нас</About>
        <VideoView class="h-screen" id="video">Видеобзор</VideoView>
        <v-fab
            v-show="isVisible"
            @click="scrollToTop"
            icon="mdi-arrow-up"
            color="primary"
            location="bottom end"
            class="back-to-top"
        />
    </MainLayout>
</template>

<style scoped>
.back-to-top {
  position: fixed;
  bottom: 24px;
  right: 24px;
  z-index: 1000;
  opacity: 0.8;
  transition: opacity 0.3s;
}

.back-to-top:hover {
  opacity: 1;
}

</style>

