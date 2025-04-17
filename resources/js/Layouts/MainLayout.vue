<template>
    <div class="min-h-screen flex flex-col bg-gradient-to-b from-green-50 to-blue-50">
        <Header/>

        <main class="container mx-auto px-4 py-12 flex-1">
            <slot/>
        </main>

        <Footer/>
    </div>
</template>

<script setup lang="ts">
import Header from "../Components/Header/Header.vue";
import Footer from "../Components/Footer/Footer.vue";
</script>
