<template>
    <nav class="flex items-center justify-between border-t pt-4">
        <div class="flex-1 flex justify-between sm:hidden">
            <Link
                :href="links.prev ?? ''"
                class="px-4 py-2 border rounded-md"
                :class="{ 'opacity-50 cursor-not-allowed': !links.prev }"
                preserve-scroll
            >
                Назад
            </Link>
            <Link
                :href="links.next ?? ''"
                class="px-4 py-2 border rounded-md"
                :class="{ 'opacity-50 cursor-not-allowed': !links.next }"
                preserve-scroll
            >
                Вперед
            </Link>
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div class="flex gap-2">
                <span class="text-sm text-gray-700">
                    Показано с {{ meta.from }} по {{ meta.to }} из {{ meta.total }} записей
                </span>
            </div>

            <div class="flex gap-1">
                <template v-for="(link, index) in meta.links" :key="index">
                    <Link
                        v-if="link.url"
                        :href="link.url"
                        class="px-3 py-1 border rounded"
                        :class="{
                            'bg-blue-500 text-white border-blue-600': link.active,
                            'hover:bg-gray-100': !link.active
                        }"
                        preserve-scroll
                        v-html="link.label"
                    />
                    <span
                        v-else
                        class="px-3 py-1 border rounded opacity-50 cursor-not-allowed"
                        v-html="link.label"
                    />
                </template>
            </div>
        </div>
    </nav>
</template>

<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
import type { Paginated } from "../../Lib/types";

defineProps<{
    links: Paginated<any>['links'];
    meta: Paginated<any>['meta'];
}>();
</script>

<style scoped>
</style>
