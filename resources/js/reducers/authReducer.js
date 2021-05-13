import { SET_TOKEN, REMOVE_TOKEN } from '../actions/types'

const INITIAL_STATE = {
    token: null,
};

const authReducer = (state = INITIAL_STATE, { type, payload }) => {
    switch (type) {
        case SET_TOKEN:
            return { ...state, token: payload }
        case REMOVE_TOKEN:
            return { ...state, token: null }
        default:
            return state
    }
}

export default authReducer
