import api from '../api'
import { SET_TOKEN } from '../actions/types'

export const signin = ({ email, password }) => async dispatch => {
  try {
    const { data } = await api.post('/token', { email, password })
    window.localStorage.setItem('token', data)
    dispatch({ type: SET_TOKEN, payload: data })
    return true
  } catch (e) {
    console.warn(e)
    return false
  }
}

export const tryLocalSignin = () => async dispatch => {
  const token = window.localStorage.getItem('token');
  if (token) {
    dispatch({ type: SET_TOKEN, payload: token });
  }
}
