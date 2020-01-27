import axios from 'axios';
const API_URL = 'http://todo.localhost/api/';

const httpClient = axios.create({
  baseURL: API_URL,
});

export const getRequest = async (route: string) =>
  await httpClient.get(`${API_URL}${route}`);

export const postRequest = async (route: string, params) =>
  await httpClient.post(`${API_URL}${route}`, params);

export const putRequest = async (route: string, params) =>
  await httpClient.put(`${API_URL}${route}`, params);

export const deleteRequest = async (route: string) =>
  await httpClient.delete(`${API_URL}${route}`);
