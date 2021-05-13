import { SET_LOGS } from '../actions/types';


const INITIAL_STATE = {
  logs: [],
  current_page: 1,
  total: 0,
  per_page: 24,
  numberOfPages: 1,
};

const logsReducer = (state = INITIAL_STATE, { type, payload }) => {
  switch (type) {
    case SET_LOGS:
      return {
        ...state,
        logs: payload.logs,
        numberOfPages: 1
      }
    // case SET_LOGS_PAGE:
    //   return {}
    default:
      return state
  }
}

export default logsReducer