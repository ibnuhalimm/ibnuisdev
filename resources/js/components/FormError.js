import React from 'react';

function FormError(props) {
    return <p className="text-xs mt-2 text-red-600">{props.children}</p>;
}

export default FormError;
