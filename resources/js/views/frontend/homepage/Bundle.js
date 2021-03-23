import React from 'react';
import ReactDOM from 'react-dom';
import CallToAction from './CallToAction';
import Portfolio from './Portfolio';

import { Provider } from 'react-redux';
import store from '../../../redux/store';
import { fetchLanguagePack } from '../../../redux/actions';
window.store = store;

store.dispatch(fetchLanguagePack());

if (document.getElementById('cta-ui-content')) {
    ReactDOM.render(
        <Provider store={store}>
            <CallToAction/>
        </Provider>,
        document.getElementById('cta-ui-content')
    );
}

if (document.getElementById('portfolio-ui-content')) {
    ReactDOM.render(
        <Provider store={store}>
            <Portfolio/>,
        </Provider>,
        document.getElementById('portfolio-ui-content')
    );
}