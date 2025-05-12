<script setup lang="ts">
    import { ref, onMounted, onUnmounted } from 'vue';

    const navItems = [
        { id: 'home', title: 'Главная' },
        { id: 'about', title: 'О нас' },
        { id: 'video', title: 'Видеообзор' },
        { id: 'contact', title: 'Контакты' },
    ];

    const activeSection = ref(navItems[0].id);

    const scrollToSection = (sectionId) => {
        const section = document.getElementById(sectionId);
        if (section) {
                section.scrollIntoView({ 
                    behavior: 'smooth',
                    block: 'start'
            });
        }
    };

        // Определение активной секции при скролле
    const handleScroll = () => {
        const scrollPosition = window.scrollY + 100;
        
        navItems.forEach((item) => {
            const section = document.getElementById(item.id);
            if (!section) return;
            
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            
            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                activeSection.value = item.id;
            }
        });
    };

    onMounted(() => {
        window.addEventListener('scroll', handleScroll);
        handleScroll(); // Инициализация при загрузке
    });

    onUnmounted(() => {
        window.removeEventListener('scroll', handleScroll);
    });
</script>

<template>
    <header>
        <v-container class="d-flex justify-space-between">
            <div @click="$inertia.get('/')" class="montserrat-600 cursor-pointer">
                Lab.Zavr
            </div>
            <div v-if="!$page.url.startsWith('/game')" class="montserrat-400 w-50">
                <v-btn-toggle
                        v-model="activeSection"
                        group
                        class="border-lg rounded-xl w-100 d-flex justify-center"
                >
                    <v-btn 
                        rounded="xl"
                        density="compact"
                        class="text-none"
                        v-for="item in navItems" 
                        :key="item.id"
                        :value="item.id"
                        @click="scrollToSection(item.id)"
                    >
                        {{ item.title }}
                    </v-btn>
                </v-btn-toggle>
            </div>
        </v-container>
    </header>
</template>

<style scoped>
    .montserrat-600{
        font-size: 28px;
    }

    .montserrat-400{
        font-size: 24px;
    }

    /* Активная кнопка */
    .v-btn-toggle .v-btn.v-btn--active {
        background-color: black !important;  /* Красный */
        color: white !important;
    }

    /* Неактивная кнопка */
    .v-btn-toggle .v-btn:not(.v-btn--active) {
        background-color: white !important;
        color: black !important;
    }

    /* Ховер */
    .v-btn-toggle .v-btn:hover {
        background-color: black !important;
        color: white !important;
    }
</style>