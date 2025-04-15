import api from '../axios'
import type { AxiosResponse } from 'axios'
import {Reagent, APIResponse} from "../../Lib/types";

export const getReagents = async (): Promise<AxiosResponse<APIResponse<Reagent[]>>> => {
    return await api.get('/reagents')
}

export const getReagent = async (id: number): Promise<AxiosResponse<APIResponse<Reagent>>> => {
    return await api.get(`/reagents/${id}`)
}

export const createReagent = async (reagentData: Omit<Reagent, 'id'>): Promise<AxiosResponse<APIResponse<Reagent>>> => {
    return await api.post('/reagents', reagentData)
}

export const updateReagent = async (id: number, reagentData: Partial<Reagent>): Promise<AxiosResponse<APIResponse<Reagent>>> => {
    return await api.put(`/reagents/${id}`, reagentData)
}

export const deleteReagent = async (id: number): Promise<AxiosResponse<void>> => {
    return await api.delete(`/reagents/${id}`)
}
