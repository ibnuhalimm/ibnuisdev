import React from 'react';
import ReactDOM from 'react-dom';
import CallToAction from './CallToAction';
import Portfolio from './Portfolio';

if (document.getElementById('cta-ui-content')) {
    ReactDOM.render(<CallToAction/>, document.getElementById('cta-ui-content'));
}

if (document.getElementById('portfolio-ui-content')) {
    ReactDOM.render(<Portfolio/>, document.getElementById('portfolio-ui-content'));
}