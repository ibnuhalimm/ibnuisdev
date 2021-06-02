const _meta_base_url = document.getElementsByName('_base_url')[0];
const _BASE_URL = _meta_base_url.getAttribute('content');

const API = {
    base_url: _BASE_URL,
    lang_pack: _BASE_URL + '/api/lang',
    portfolio: _BASE_URL + '/api/portfolios',
    latest_posts: _BASE_URL + '/api/posts/latest',
    message: _BASE_URL + '/api/messages',
    message_cta: _BASE_URL + '/api/messages/cta',
};

export default API;
