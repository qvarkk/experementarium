<script setup lang="ts">
import {ref} from "vue";
import type {Equipment, EquipmentWithQuantity} from "../../Lib/types";
import {getAllEquipment} from "../../Api/Services/equipmentService";

const props = defineProps<{
    modelValue: EquipmentWithQuantity[];
    equipment: Equipment[];
}>();

const emit = defineEmits(['update:modelValue']);

const selectedEquipment = ref<EquipmentWithQuantity[]>(props.modelValue || []);
const equipmentSelect = ref<HTMLSelectElement | null>(null);

const addEquipmentToList = () => {
    if (!equipmentSelect.value || equipmentSelect.value.value === "0") return;

    const selectedId = equipmentSelect.value.value;
    const alreadyExists = selectedEquipment.value.some(
        el => el.equipment.id.toString() === selectedId
    );

    if (!alreadyExists) {
        const foundEquipment = props.equipment.find(
            el => el.id.toString() === selectedId
        );

        if (foundEquipment) {
            selectedEquipment.value.push({
                equipment: foundEquipment,
                quantity: 1
            });
        }

        equipmentSelect.value.value = "0";
    }
};

const removeEquipment = (id: number) => {
    selectedEquipment.value = selectedEquipment.value.filter(
        el => el.equipment.id !== id
    );
};
</script>

<template>
    <div class="flex flex-col gap-2">
        <label for="equipmentSelect" class="font-bold">Используемое оборудование</label>

        <div v-for="item in selectedEquipment" :key="item.equipment.id" class="flex items-center gap-2">
            <span class="border-1 px-2 py-1 flex-1">
                {{ item.equipment.name }}
            </span>
            <input
                v-model.number="item.quantity"
                type="number"
                min="1"
                class="border-1 px-2 py-1 w-20"
            >
            <button
                @click="removeEquipment(item.equipment.id)"
                type="button"
                class="border-1 px-2 py-1 bg-red-100 hover:bg-red-200"
            >
                Удалить
            </button>
        </div>

        <div class="flex gap-2">
            <select
                ref="equipmentSelect"
                class="border-1 px-2 py-1 flex-1"
                name="equipmentSelect"
                id="equipmentSelect"
            >
                <option value="0" disabled selected>Выберите оборудование</option>
                <option
                    v-for="item in equipment"
                    :key="item.id"
                    :value="item.id"
                >
                    {{ item.name }}
                </option>
            </select>
            <button
                @click="addEquipmentToList"
                type="button"
                class="border-1 px-2 py-1 bg-blue-100 hover:bg-blue-200"
            >
                Добавить
            </button>
        </div>
    </div>
</template>

<style scoped>

</style>
