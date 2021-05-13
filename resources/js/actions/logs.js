import api from '../api'
import { SET_LOGS } from './types'


export const getLogs = () => async dispatch => {
  try {
    const { data } = await api.get('/history')
    dispatch({ type: SET_LOGS, payload: {
      logs: data.data,
      current_page: data.current_page,
      total: data.total
    }})
    return true
  } catch (e) {
    console.warn(e)
    return false
  }
}