<template>
    <Head title="Создание лабораторной работы"/>
    <form @submit.prevent="handleSubmit" class="flex flex-col gap-3 p-5">
        <section>
            <span class="font-bold">Основная информация</span>
            <div class="flex flex-col">
                <label for="titleInput">Тема</label>
                <input
                    type="text"
                    id="titleInput"
                    class="border-1 px-2 py-1"
                    v-model="mainLabInformation.title"
                    required
                >
                <span v-if="errors.title" class="text-red-600 font-bold">{{ errors.title }}</span>
            </div>
            <div class="flex flex-col">
                <label for="purposeInput">Цель работы</label>
                <input
                    type="text"
                    id="purposeInput"
                    class="border-1 px-2 py-1"
                    v-model="mainLabInformation.purpose"
                    required
                >
                <span v-if="errors.purpose" class="text-red-600 font-bold">{{ errors.purpose }}</span>
            </div>
            <div class="flex flex-col">
                <label for="safetyInput">Техника безопасности</label>
                <textarea
                    id="safetyInput"
                    class="border-1 px-2 py-1 min-h-[100px]"
                    v-model="mainLabInformation.safety_rules"
                    required
                ></textarea>
                <span v-if="errors.safety_rules" class="text-red-600 font-bold">{{ errors.safety_rules }}</span>
            </div>
            <div class="flex flex-col">
                <label for="theoryInput">Теоретический базис</label>
                <textarea
                    id="theoryInput"
                    class="border-1 px-2 py-1 min-h-[100px]"
                    v-model="mainLabInformation.theoretical_basis"
                    required
                ></textarea>
                <span v-if="errors.theoretical_basis" class="text-red-600 font-bold">{{ errors.theoretical_basis }}</span>
            </div>
        </section>

        <section>
            <ReagentSelect v-model="selectedReagents" :reagents="reagents"/>
        </section>

        <section>
            <EquipmentSelect v-model="selectedEquipment" :equipment="equipment"/>
        </section>

        <section>
            <StepsInput v-model="addedSteps" :equipment="equipment" :reagents="reagents" :available-action-types="[{ id: 1, name: 'Налить' }, { id: 2, name: 'Смешать' }]" />
        </section>

        <span v-if="errors.message" class="text-red-600 font-bold">{{ errors.message }}</span>
        <button type="submit" class="bg-[#55ff55] p-3 cursor-pointer hover:bg-[#44ee44]">
            Создать
        </button>
    </form>
</template>

<script setup lang="ts">
import {router, Head} from "@inertiajs/vue3";
import ReagentSelect from "../../Components/Selects/ReagentSelect.vue";
import EquipmentSelect from "../../Components/Selects/EquipmentSelect.vue";
import {Equipment, EquipmentWithQuantity, type LabStep, Reagent, ReagentWithQuantity} from "../../Lib/types";
import {ref} from "vue";
import StepsInput from "../../Components/StepsInput/StepsInput.vue";

const props = defineProps<{
    reagents: Reagent[];
    equipment: Equipment[];
    store_url: string;
    errors: Object;
}>();

type MainLabInformation = {
    title: string,
    purpose: string,
    safety_rules: string,
    theoretical_basis: string
}

const mainLabInformation = ref<MainLabInformation>({
    title: "",
    purpose: "",
    safety_rules: "",
    theoretical_basis: "",
});
const selectedReagents = ref<ReagentWithQuantity[]>([]);
const selectedEquipment = ref<EquipmentWithQuantity[]>([]);
const addedSteps = ref<Omit<LabStep, "id"|"lab">[]>([]);

const handleSubmit = () => {

    router.post(props.store_url, {
        title: mainLabInformation.value.title,
        purpose: mainLabInformation.value.purpose,
        safety_rules: mainLabInformation.value.safety_rules,
        theoretical_basis: mainLabInformation.value.theoretical_basis,
        reagents: selectedReagents.value.map(item => ({id: item.reagent.id, quantity: item.quantity})),
        equipment: selectedEquipment.value.map(item => ({id: item.equipment.id, quantity: item.quantity})),
        steps: addedSteps.value.map((step) => ({
            ...step,
            actions_json: JSON.stringify(step.actions_json)
        }))
    });
};
</script>

<style scoped>
</style>
