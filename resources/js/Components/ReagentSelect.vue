<script setup lang="ts">
import {getReagents} from "../Api/Services/reagentService.js";
import {ref} from "vue";
import type {Reagent} from "../Lib/types";

interface ReagentWithQuantity {
    reagent: Reagent;
    quantity: number;
}

const props = defineProps<{
    modelValue: ReagentWithQuantity[];
}>();

const emit = defineEmits(['update:modelValue']);

const isLoading = ref<boolean>(true);
const reagents = ref<Reagent[]>([]);
getReagents().then(res => {
    isLoading.value = false;
    reagents.value = res.data.data;
});

const selectedReagents = ref<ReagentWithQuantity[]>(props.modelValue || []);
const reagentSelect = ref<HTMLSelectElement | null>(null);

const addReagentToList = () => {
    if (!reagentSelect.value || reagentSelect.value.value === "0") return;

    const selectedId = reagentSelect.value.value;
    const alreadyExists = selectedReagents.value.some(
        el => el.reagent.id.toString() === selectedId
    );

    if (!alreadyExists) {
        const foundReagent = reagents.value.find(
            el => el.id.toString() === selectedId
        );

        if (foundReagent) {
            selectedReagents.value.push({
                reagent: foundReagent,
                quantity: 1
            });
        }

        reagentSelect.value.value = "0";
    }
};

const removeReagent = (id: number) => {
    selectedReagents.value = selectedReagents.value.filter(
        el => el.reagent.id !== id
    );
};
</script>

<template>
    <div class="flex flex-col gap-2">
        <label for="reagentSelect" class="font-bold">Используемые реагенты</label>

        <div v-for="item in selectedReagents" :key="item.reagent.id" class="flex items-center gap-2">
            <label class="border-1 px-2 py-1 flex-1">
                {{ item.reagent.name }} ({{ item.reagent.formula }})
            </label>
            <input
                v-model.number="item.quantity"
                type="number"
                min="1"
                class="border-1 px-2 py-1 w-20"
            >
            <button
                @click="removeReagent(item.reagent.id)"
                type="button"
                class="border-1 px-2 py-1 bg-red-100 hover:bg-red-200"
            >
                Удалить
            </button>
        </div>

        <div v-if="isLoading" class="border-1 px-2 py-1">
            Загрузка...
            <!-- // TODO: create loader component-->
        </div>
        <div class="flex gap-2" v-else>
            <select
                ref="reagentSelect"
                class="border-1 px-2 py-1 flex-1"
                name="reagentSelect"
                id="reagentSelect"
            >
                <option value="0" disabled selected>Выберите реагент</option>
                <option
                    v-for="item in reagents"
                    :key="item.id"
                    :value="item.id"
                >
                    {{ item.name }} - {{ item.formula }}
                    <template v-if="item.concentration !== null">
                        ({{ item.concentration }}%)
                    </template>
                </option>
            </select>
            <button
                @click="addReagentToList"
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
