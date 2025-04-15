export interface APIResponse<T> {
    data: T[];
}

export interface Equipment {
    id: number;
    name: string;
}

export interface Reagent {
    id: number;
    name: string;
    formula: string;
    concentration: number | null;
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
