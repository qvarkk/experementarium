<script setup lang="ts">
    import LogoMain from "../Components/PC/LogoMain/LogoMain.vue";
    import About from "../Components/PC/About/About.vue";
    import VideoView from "../Components/PC/VideoView/VideoView.vue";
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
        <svg 
            width="90" 
            height="90" 
            viewBox="0 0 90 90" 
            fill="white" 
            xmlns="http://www.w3.org/2000/svg"
            v-show="isVisible"
            @click="scrollToTop"
            location="bottom end"
            class="back-to-top"
            >
            <circle cx="45" cy="45" r="43.5" stroke="black" stroke-width="3"/>
            <path d="M46.0472 24.926C45.454 24.3477 44.5043 24.3597 43.926 24.9528L34.5016 34.6188C33.9233 35.212 33.9353 36.1617 34.5285 36.74C35.1216 37.3183 36.0713 37.3063 36.6496 36.7131L45.0268 28.1211L53.6188 36.4984C54.212 37.0767 55.1617 37.0647 55.74 36.4715C56.3183 35.8784 56.3063 34.9287 55.7131 34.3504L46.0472 24.926ZM45.4735 63.4138L46.9734 63.3948L46.4999 25.981L45 26L43.5001 26.019L43.9736 63.4328L45.4735 63.4138Z" fill="black"/>
        </svg>
    </MainLayout>
</template>

<style scoped>
.back-to-top {
  position: fixed;
  bottom: 24px;
  right: 24px;
  z-index: 1000;
  transition: opacity 0.3s;
}

.back-to-top:hover {
  opacity: 1;
}

</style>

