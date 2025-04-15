import api from '../axios'
import type { AxiosResponse } from 'axios'
import {Lab, APIResponse, LabCreateDTO, LabGetDTO} from "../../Lib/types";

export const getLabs = async (): Promise<AxiosResponse<APIResponse<LabGetDTO[]>>> => {
    return await api.get('/labs')
}

export const getLab = async (id: number): Promise<AxiosResponse<APIResponse<LabGetDTO>>> => {
    return await api.get(`/labs/${id}`)
}

export const createLab = async (labData: Omit<LabCreateDTO, 'id'>): Promise<AxiosResponse<APIResponse<Lab>>> => {
    return await api.post('/labs', labData)
}

export const updateLab = async (id: number, labData: Partial<Lab>): Promise<AxiosResponse<APIResponse<Lab>>> => {
    return await api.put(`/labs/${id}`, labData)
}

export const deleteLab = async (id: number): Promise<AxiosResponse<void>> => {
    return await api.delete(`/labs/${id}`)
}
