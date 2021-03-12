import React from 'react';

function ButtonRounded(props) {
    let { variant, type } = props;

    let buttonClass = '';
    switch (variant) {
        case 'primary':
            buttonClass = 'border-ib-three bg-ib-three hover:bg-opacity-70 text-ib-four';
            break;

        case 'primary-loading':
            buttonClass = 'border-ib-three bg-ib-three bg-opacity-50 text-ib-four cursor-default';
            break;

        case 'outline-white':
            buttonClass = 'border-ib-four bg-transparent hover:bg-ib-four text-ib-four hover:text-ib-one';
            break;

        default:
            break;
    }

    return (
        <button
            type={type ? type : 'button'}
            className={ 'px-5 py-2 border border-solid outline-none focus:outline-none rounded-full transition-all duration-500 ' + buttonClass }
            onClick={props.onClick}>
            {props.children}
        </button>
    );
}

export default ButtonRounded;