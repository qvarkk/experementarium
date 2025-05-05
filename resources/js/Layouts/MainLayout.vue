<script setup lang="ts">
import Header from "../Components/Header/Header.vue";
import Footer from "../Components/Footer/Footer.vue";
</script>

<template>
    <div>
        <Header/>

        <main class="d-flex flex-column align-center">
            <slot/>
        </main>

        <Footer id="contact"/>
    </div>
</template>
