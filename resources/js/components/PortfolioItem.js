import React from 'react';

function PortfolioItem(props) {
    let { name, image, actViewProject } = props;

    const wrapperStyle = {
        backgroundImage: 'url(' + image + ')'
    };

    return (
        <div className="w-full h-56 xl:h-80 bg-no-repeat bg-center mb-6 lg:mb-0" style={wrapperStyle}>
            <div className="w-full h-full left-0 top-0 bg-ib-one bg-opacity-70 flex items-center justify-center">
                <div className="w-3/4 mx-auto text-center">
                    <h3 className="font-bold text-ib-four mb-3 text-lg">
                        {name}
                    </h3>
                    <button
                        className="px-5 py-2 border border-solid border-ib-four bg-transparent hover:bg-ib-four text-ib-four hover:text-ib-one outline-none focus:outline-none"
                        onClick={props.viewProjectHandler}>
                        {actViewProject}
                    </button>
                </div>
            </div>
        </div>
    );
}

export default PortfolioItem;