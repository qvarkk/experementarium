export interface APIResponse<T> {
    data: T[];
}

export interface IdWithQuantity {
    id: number;
    quantity: number;
}

export interface Equipment {
    id: number;
    name: string;
}

export interface EquipmentWithQuantity {
    equipment: Equipment;
    quantity: number;
}

export interface Reagent {
    id: number;
    name: string;
    formula: string;
    concentration: number | null;
}

export interface ReagentWithQuantity {
    reagent: Reagent;
    quantity: number;
}

export interface Lab {
    id: number;
    title: string;
    purpose: string;
    safety_rules: string;
    theoretical_basis: string;
    reagents: IdWithQuantity[],
    equipment: IdWithQuantity[]
}

export interface PourAction {
    reagent: Reagent;
    destination_equipment: {
        equipment: Equipment;
        possible_insides: [Reagent | object][];
    };
}

export interface MixAction {
    equipment: Equipment;
    reagents: Reagent[];
}
