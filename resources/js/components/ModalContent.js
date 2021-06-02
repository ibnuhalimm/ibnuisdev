import React from 'react';

function ModalContent(props) {
    return (
        <div className="relative w-11/12 md:w-3/5 xl:max-w-3xl mx-auto px-3 py-6 bg-white mt-20 sm:mt-10 md:mt-20 z-50 rounded-lg">
            {props.children}
        </div>
    );
}

export default ModalContent;
