import React from 'react';

function ButtonLinkRounded(props) {
    let { variant, href } = props;

    let buttonClass = '';
    switch (variant) {
        case 'primary':
            buttonClass = 'border-ib-three bg-ib-three hover:bg-opacity-70 text-ib-four';
            break;

        case 'outline-white':
            buttonClass = 'border-ib-four bg-transparent hover:bg-ib-four text-ib-four hover:text-ib-one';
            break;

        default:
            break;
    }

    return (
        <a
            href={href ? href : '#'}
            className={
                'px-5 py-2 border border-solid outline-none focus:outline-none rounded-full transition-all duration-500 ' +
                buttonClass
            }
        >
            {props.children}
        </a>
    );
}

export default ButtonLinkRounded;
