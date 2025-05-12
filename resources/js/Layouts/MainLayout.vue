<script setup lang="ts">
    import PCHeader from "../Components/PC/Header/Header.vue";
    import PCFooter from "../Components/PC/Footer/Footer.vue";
    import MobileHeader from "../Components/Mobile/Header/Header.vue";
    // import MobileFooter from "../Components/Mobile/Footer/Footer.vue";
    import { ref, onMounted, onUnmounted } from 'vue';

    const deviceType = ref('desktop')

    const updateScreenSize = () => {
        if (window.innerWidth < 900) deviceType.value = 'mobile'
        else deviceType.value = 'desktop'
    }

    onMounted(() => {
        window.addEventListener('resize', updateScreenSize)
        updateScreenSize()
    })

    onUnmounted(() => {
        window.removeEventListener('resize', updateScreenSize)
    })
</script>

<template>
    <div>
        <PCHeader v-if = "deviceType == 'desktop'"/>
        <MobileHeader v-else/>

        <main class="d-flex flex-column align-center">
            <slot/>
        </main>

        <PCFooter v-if = "deviceType == 'desktop'" id="contact"/>
        <MobileFooter v-else/>
    </div>
</template>
