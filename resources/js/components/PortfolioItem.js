import React from 'react';
import ButtonRounded from './ButtonRounded';

function PortfolioItem(props) {
    let { name, image, actViewProject } = props;

    const wrapperStyle = {
        backgroundImage: 'url(' + image + ')'
    };

    return (
        <div className="w-full h-56 xl:h-80 bg-no-repeat bg-center mb-6 lg:mb-0 rounded-lg" style={wrapperStyle}>
            <div className="w-full h-full left-0 top-0 bg-ib-one bg-opacity-70 flex items-center justify-center rounded-lg">
                <div className="w-3/4 mx-auto text-center">
                    <h3 className="font-bold text-ib-four mb-3 text-lg">
                        {name}
                    </h3>
                    <ButtonRounded
                        variant="outline-white"
                        onClick={props.viewProjectHandler}>
                        {actViewProject}
                    </ButtonRounded>
                </div>
            </div>
        </div>
    );
}

export default PortfolioItem;