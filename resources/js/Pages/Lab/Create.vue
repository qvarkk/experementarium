<script setup lang="ts">
import ReagentSelect from "../../Components/ReagentSelect.vue";
import EquipmentSelect from "../../Components/EquipmentSelect.vue";
import {ref} from "vue";
import {createLab} from "../../Api/Services/labService";
import {EquipmentWithQuantity, ReagentWithQuantity} from "../../Lib/types";
import {formToJSON} from "axios";

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

// TODO: figure out why quantity is always 1 after adding new lab
const handleSubmit = () => {
    createLab({
        title: mainLabInformation.value.title,
        purpose: mainLabInformation.value.purpose,
        safety_rules: mainLabInformation.value.safety_rules,
        theoretical_basis: mainLabInformation.value.theoretical_basis,
        reagents: selectedReagents.value.map(item => ({ id: item.reagent.id, quantity: item.quantity })),
        equipment: selectedEquipment.value.map(item => ({ id: item.equipment.id, quantity: item.quantity })),
    });
};
</script>

<template>
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
            </div>
            <div class="flex flex-col">
                <label for="safetyInput">Техника безопасности</label>
                <textarea
                    id="safetyInput"
                    class="border-1 px-2 py-1 min-h-[100px]"
                    v-model="mainLabInformation.safety_rules"
                    required
                ></textarea>
            </div>
            <div class="flex flex-col">
                <label for="theoryInput">Теоретический базис</label>
                <textarea
                    id="theoryInput"
                    class="border-1 px-2 py-1 min-h-[100px]"
                    v-model="mainLabInformation.theoretical_basis"
                    required
                ></textarea>
            </div>
        </section>

        <section>
            <ReagentSelect v-model="selectedReagents"/>
        </section>

        <section>
            <EquipmentSelect v-model="selectedEquipment"/>
        </section>

        <button type="submit" class="bg-[#55ff55] p-3 cursor-pointer hover:bg-[#44ee44]">
            Создать
        </button>
    </form>
</template>

<style scoped>
</style>
