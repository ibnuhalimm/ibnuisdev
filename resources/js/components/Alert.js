import React from 'react';

function Alert(props) {
    let { variant, isShow, closeHandler } = props;

    let colorBase = 'gray';
    let titleText = 'Default!';
    switch (variant) {
        case 'success':
            colorBase = 'green';
            titleText = 'Success!';
            break;

        case 'danger':
            titleText = 'Error!';
            colorBase = 'red';
            break;

        default:
            titleText = 'Default!';
            colorBase = 'gray';
            break;
    }

    return isShow ? (
        <div className={'bg-' + colorBase + '-200 p-4 mb-4 rounded-lg'}>
            <button type="button" className="bg-transparent float-right" onClick={closeHandler}>
                <svg
                    className={'w-4 h-auto text-' + colorBase + '-600'}
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <p className={'text-' + colorBase + '-600 pr-5'}>
                <strong className="mr-2">{titleText}</strong>
                {props.children}
            </p>
        </div>
    ) : null;
}

export default Alert;
