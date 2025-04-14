export type Equipment = {
  id: number,
  name: string,
}

export type Reagent = {
  id: number,
  name: string,
  concentration: number,
}

export type PourAction = {
  reagent: Reagent,
  destination_equipment: {
    equipment: Equipment,
    possible_insides: [Reagent | object][],
  },
};

export type MixAction = {
  equipment: Equipment,
  reagents: Reagent[],
};
