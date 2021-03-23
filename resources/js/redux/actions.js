// import Axios from 'axios';
import { LOAD_LANG } from './actionTypes';
import API from '../constant/API';

export const loadLang = content => ({
    type: LOAD_LANG,
    payload: content
});

/**
 * Fetch language data from API
 *
 */
export const fetchLanguagePack = () => {
    return async dispatch => {
        try {
            let language = await Axios.get(API.lang_pack);
            dispatch(loadLang(language.data.data));
        } catch (err) {
            console.log(err);
        }
    };
};
