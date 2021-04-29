import React from 'react';

function ModalBody(props) {
    return (
        <div className="h-96 md:h-auto lg:h-3/4 xl:h-auto overflow-y-auto px-4">
            {props.children}
        </div>
    );
}

export default ModalBody;