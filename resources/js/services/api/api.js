import axios from 'axios';
import { interceptors } from "./interceptors";

const api = axios.create({
  baseURL: '/api',
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
  }
});

interceptors(api);

export const addOrder = async (order) => {
  return await api.post('order/create', order);
}
