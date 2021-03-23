import { LOAD_LANG } from '../actionTypes';

const initialState = {};

export default function(state = initialState, action) {
    switch (action.type) {
        case LOAD_LANG:
            return { ...state, lang: action.payload };

        default:
            return state;
    }
};