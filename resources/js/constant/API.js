const _meta_base_url = document.getElementsByName('_base_url')[0];
const _BASE_URL = _meta_base_url.getAttribute('content') + '/api';

const API = {
    lang_pack: _BASE_URL + '/lang',
    portfolio: _BASE_URL + '/portfolios'
};

export default API;