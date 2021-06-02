import React from 'react';

function FormLabel(props) {
    let { fieldId, isRequired } = props;

    return (
        <label htmlFor={fieldId} className="block mb-2">
            {props.children}
            {isRequired ? <span className="text-red-500 ml-1">*</span> : null}
        </label>
    );
}

export default FormLabel;
