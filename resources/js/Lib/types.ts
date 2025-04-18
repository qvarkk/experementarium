export interface Paginated<T> {
    data: T[];
    links: {
        first: string;
        last: string;
        next: string | null;
        prev: string | null;
    };
    meta: {
        current_page: int;
        from: int;
        last_page: int;
        links: {
            url: string | null,
            active: bool,
            label: string,
        }[];
        path: string;
        per_page: int;
        to: int;
        total: int;
    }
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
}

export interface LabGetDTO extends Lab {
    reagents: ReagentWithQuantity[];
    equipment: EquipmentWithQuantity[];
}

export interface LabCreateDTO extends Lab {
    reagents: IdWithQuantity[];
    equipment: IdWithQuantity[];
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
