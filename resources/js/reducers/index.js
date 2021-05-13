import { combineReducers } from "redux";
import authReducer from './authReducer'
import logsReducer from './logsReducer'

export default combineReducers({
    auth: authReducer,
    logs: logsReducer
})