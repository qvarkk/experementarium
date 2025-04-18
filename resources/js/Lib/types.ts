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

export interface LabAction {
    id: number;
    name: 'Налить' | 'Смешать';
}

export interface LabStep {
    id: number;
    lab: Lab;
    step_number: number;
    instructions: string;
    actions_json: Action[];
}

type Action = PourAction | MixAction;

export interface PourAction extends Action {
    lab_action: LabAction & { name: 'Налить' };
    reagent: Reagent;
    destination_equipment: {
        equipment: Equipment;
        possible_insides: (Reagent | {})[];
    };
}

export interface MixAction extends Action {
    lab_action: LabAction & { name: 'Смешать' };
    equipment: Equipment;
    reagents: Reagent[];
}

export function isPourAction(action: Action): action is PourAction {
    return action.lab_action.name === 'Налить';
}

export function isMixAction(action: Action): action is MixAction {
    return action.lab_action.name === 'Смешать';
}
