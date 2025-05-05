<template>
    <Head title="Лабораторные работы"/>

    <div class="p-6 max-w-7xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Лабораторные работы</h1>

        <div class="grid gap-4 mb-6">
            <div v-for="lab in paginatedLabs.data" :key="lab.id" class="border rounded-lg p-4 shadow-sm">
                <h2 class="text-xl font-semibold mb-2">{{ lab.title }}</h2>
                <div class="space-y-2">
                    <p><span class="font-medium">Цель работы:</span> {{ lab.purpose }}</p>
                    <p><span class="font-medium">Техника безопасности:</span> {{ lab.safety_rules }}</p>
                    <p><span class="font-medium">Теоретический базис:</span> {{ lab.theoretical_basis }}</p>
                </div>
            </div>
        </div>

        <Pagination :links="paginatedLabs.links" :meta="paginatedLabs.meta"/>
    </div>
</template>

<script setup lang="ts">
import { Head } from "@inertiajs/vue3";
import Pagination from "../../Components/Paginator/Paginator.vue";
import type { Paginated, Lab } from "../../Lib/types";

const props = defineProps<{
    paginatedLabs: Paginated<Lab>;
}>();
</script>

<style scoped>
</style>