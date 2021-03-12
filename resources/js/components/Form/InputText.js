import React from 'react';

function InputText(props) {
    let { type, name, id, value, onChange } = props;

    return <input
            type={ type ? type : 'text' }
            name={ name ? name : 'fieldName' }
            id={ id ? id : 'fieldId' }
            onChange={onChange}
            className="w-full px-3 py-2 border border-solid border-gray-400 bg-white outline-none rounded-md"
            value={value} />;
}

export default InputText;