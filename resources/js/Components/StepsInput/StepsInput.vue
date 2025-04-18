<template>
    <div class="flex flex-col gap-4">
        <div v-for="(step, stepIndex) in addedSteps" :key="stepIndex" class="border p-4 rounded-lg">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-bold">Шаг {{ step.step_number }}</h3>
                <button
                    @click="removeStep(stepIndex)"
                    type="button"
                    class="text-red-500 hover:text-red-700"
                >
                    Удалить шаг
                </button>
            </div>

            <div class="mb-4">
                <label :for="`instructions-${stepIndex}`">Инструкции:</label>
                <textarea
                    :id="`instructions-${stepIndex}`"
                    v-model="step.instructions"
                    class="border w-full p-2 rounded"
                />
            </div>

            <div class="space-y-4">
                <div v-for="(action, actionIndex) in step.actions_json" :key="actionIndex" class="border p-3 rounded">
                    <div class="flex justify-between items-center mb-2">
            <span class="font-medium">
              {{ action.lab_action.name }}
            </span>
                        <button
                            @click="removeAction(stepIndex, actionIndex)"
                            type="button"
                            class="text-red-500 hover:text-red-700"
                        >
                            Удалить
                        </button>
                    </div>

                    <template v-if="action.lab_action.name === 'Налить'">
                        <div class="space-y-2">
                            <!-- Existing reagent and equipment inputs -->
                            <div>
                                <label>Реагент:</label>
                                <select v-model="action.reagent.id" class="border p-1 rounded">
                                    <option v-for="reagent in reagents" :value="reagent.id">
                                        {{ reagent.name }} ({{ reagent.formula }})
                                    </option>
                                </select>
                            </div>
                            <div>
                                <label>Оборудование:</label>
                                <select v-model="action.destination_equipment.equipment.id" class="border p-1 rounded">
                                    <option v-for="item in equipment" :value="item.id">
                                        {{ item.name }}
                                    </option>
                                </select>
                            </div>

                            <!-- New possible_insides input -->
                            <div class="space-y-2">
                                <label>Возможное содержимое:</label>
                                <div v-for="(inside, index) in action.destination_equipment.possible_insides"
                                     :key="index"
                                     class="flex gap-2 items-center">
                                    <select v-model="action.destination_equipment.possible_insides[index]"
                                            class="border p-1 rounded flex-1">
                                        <option :value="{}">[Пусто]</option>
                                        <option v-for="reagent in reagents"
                                                :key="reagent.id"
                                                :value="reagent">
                                            {{ reagent.name }} ({{ reagent.formula }})
                                        </option>
                                    </select>
                                    <button @click="removePossibleInside(action.destination_equipment.possible_insides, index)"
                                            class="text-red-500 hover:text-red-700">
                                        X
                                    </button>
                                </div>
                                <button @click="addPossibleInside(action.destination_equipment.possible_insides)"
                                        class="mt-2 px-2 py-1 bg-gray-100 hover:bg-gray-200 rounded">
                                    Добавить содержимое
                                </button>
                            </div>
                        </div>
                    </template>

                    <template v-if="action.lab_action.name === 'Смешать'">
                        <div class="space-y-2">
                            <div>
                                <label>Оборудование:</label>
                                <select v-model="action.equipment.id" class="border p-1 rounded">
                                    <option v-for="equipment in equipment" :value="equipment.id">
                                        {{ equipment.name }}
                                    </option>
                                </select>
                            </div>
                            <div>
                                <label>Реагенты:</label>
                                <select
                                    v-model="action.reagents"
                                    multiple
                                    class="border p-1 rounded w-full"
                                >
                                    <option v-for="reagent in reagents" :value="reagent">
                                        {{ reagent.name }} ({{ reagent.formula }})
                                    </option>
                                </select>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <button
                @click="showActionTypeDialog(stepIndex)"
                type="button"
                class="mt-4 px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded"
            >
                Добавить действие
            </button>
        </div>

        <button
            @click="addStepToList"
            type="button"
            class="px-4 py-2 bg-blue-500 text-white hover:bg-blue-600 rounded"
        >
            Добавить шаг
        </button>

        <!-- Action Type Selection Dialog -->
        <div v-if="showActionDialog" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg">
                <h4 class="text-lg mb-4">Выберите тип действия</h4>
                <div class="flex gap-4">
                    <button
                        v-for="actionType in availableActionTypes"
                        :key="actionType.id"
                        @click="addNewAction(actionType)"
                        class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded"
                    >
                        {{ actionType.name }}
                    </button>
                </div>
                <button
                    @click="showActionDialog = false"
                    class="mt-4 px-4 py-2 bg-red-500 text-white hover:bg-red-600 rounded"
                >
                    Отмена
                </button>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref, watch } from 'vue';
import type { LabStep, PourAction, MixAction, LabAction } from "../../Lib/types";
import type { Reagent, Equipment } from "../../Lib/types";

const props = defineProps<{
    modelValue: Omit<LabStep, "id"|"lab">[];
    reagents: Reagent[];
    equipment: Equipment[];
    availableActionTypes: LabAction[];
}>();

const emit = defineEmits(['update:modelValue']);

const addedSteps = ref<Omit<LabStep, "id"|"lab">[]>(props.modelValue || []);
const showActionDialog = ref(false);
const currentStepIndex = ref<number>(0);

watch(addedSteps, (newValue) => {
    emit('update:modelValue', newValue);
}, { deep: true });

const addStepToList = () => {
    addedSteps.value.push({
        step_number: addedSteps.value.length + 1,
        instructions: "",
        actions_json: [],
    });
};

const removeStep = (index: number) => {
    addedSteps.value.splice(index, 1);
    updateStepNumbers();
};

const updateStepNumbers = () => {
    addedSteps.value.forEach((step, index) => {
        step.step_number = index + 1;
    });
};

const showActionTypeDialog = (stepIndex: number) => {
    currentStepIndex.value = stepIndex;
    showActionDialog.value = true;
};

const addNewAction = (actionType: LabAction) => {
    const baseAction = {
        lab_action: actionType,
    };

    let newAction;
    if (actionType.name === 'Налить') {
        newAction = {
            ...baseAction,
            reagent: { id: props.reagents[0]?.id },
            destination_equipment: {
                equipment: { id: props.equipment[0]?.id },
                possible_insides: []
            }
        } as PourAction;
    } else {
        newAction = {
            ...baseAction,
            equipment: { id: props.equipment[0]?.id },
            reagents: []
        } as MixAction;
    }

    addedSteps.value[currentStepIndex.value].actions_json.push(newAction);
    showActionDialog.value = false;
};

const removeAction = (stepIndex: number, actionIndex: number) => {
    addedSteps.value[stepIndex].actions_json.splice(actionIndex, 1);
};

const addPossibleInside = (possibleInsides: Array<Reagent | {}>) => {
    possibleInsides.push({});
};

const removePossibleInside = (possibleInsides: Array<Reagent | {}>, index: number) => {
    possibleInsides.splice(index, 1);
};
</script>

<style scoped>
</style>
