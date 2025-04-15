import api from '../axios'
import type { AxiosResponse } from 'axios'
import {Equipment, APIResponse} from "../../Lib/types";

export const getAllEquipment = async (): Promise<AxiosResponse<APIResponse<Equipment[]>>> => {
    return await api.get('/equipment')
}

export const getEquipment = async (id: number): Promise<AxiosResponse<APIResponse<Equipment>>> => {
    return await api.get(`/equipment/${id}`)
}

export const createEquipment = async (equipmentData: Omit<Equipment, 'id'>): Promise<AxiosResponse<APIResponse<Equipment>>> => {
    return await api.post('/equipment', equipmentData)
}

export const updateEquipment = async (id: number, equipmentData: Partial<Equipment>): Promise<AxiosResponse<APIResponse<Equipment>>> => {
    return await api.put(`/equipment/${id}`, equipmentData)
}

export const deleteEquipment = async (id: number): Promise<AxiosResponse<void>> => {
    return await api.delete(`/equipment/${id}`)
}
