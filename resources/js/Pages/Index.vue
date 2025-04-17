<template>
    <MainLayout>
        <section class="text-center max-w-3xl mx-auto">
            <h2 class="text-4xl font-bold text-gray-800 mb-6">Виртуальная химическая лаборатория</h2>
            <p class="text-xl text-gray-600 mb-10">
                Инновационная платформа для проведения химических экспериментов в виртуальной среде.
                Идеальное решение для учебных заведений СПО.
            </p>

            <div class="flex justify-center space-x-4">
                <a
                    :href="demoLink"
                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-lg text-lg transition duration-300 shadow-md"
                >
                    Демо-версия
                </a>
            </div>
        </section>

        <section class="mt-20 grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300">
                <div class="text-green-600 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Реалистичные эксперименты</h3>
                <p class="text-gray-600">Проводите химические опыты в безопасной виртуальной среде с реалистичной
                    физикой и химией.</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300">
                <div class="text-green-600 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Готовые лабораторные</h3>
                <p class="text-gray-600">Библиотека готовых лабораторных работ, соответствующих учебным программам
                    СПО.</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300">
                <div class="text-green-600 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Гибкие настройки</h3>
                <p class="text-gray-600">Настраивайте параметры экспериментов под свои учебные задачи и
                    требования.</p>
            </div>
        </section>
    </MainLayout>
</template>

<script setup lang="ts">
import MainLayout from "../Layouts/MainLayout.vue";

const demoLink = '#';
</script>
