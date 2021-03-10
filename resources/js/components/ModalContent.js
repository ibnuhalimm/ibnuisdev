import React from 'react';

function ModalContent(props) {
    return (
        <div className="relative w-11/12 md:w-3/5 mx-auto px-8 py-6 bg-ib-four mt-20 sm:mt-10 md:mt-20 h-4/5 md:h-auto lg:h-3/4 xl:h-auto overflow-y-auto z-50">
            {props.children}
        </div>
    );
}

export default ModalContent;