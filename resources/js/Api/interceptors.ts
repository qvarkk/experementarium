import type { AxiosInstance } from 'axios'

export const setupInterceptors = (instance: AxiosInstance) => {
    // Request interceptor
    instance.interceptors.request.use(
        (config) => {
            return config
        },
        (error) => {
            return Promise.reject(error)
        }
    )

    // Response interceptor
    instance.interceptors.response.use(
        (response) => response,
        (error) => {
            return Promise.reject(error)
        }
    )
}
