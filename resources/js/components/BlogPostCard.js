import React from 'react';

function BlogPostCard(props) {
    let { postUrl, image, title, date } = props;
    const monthList = [
        'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
    ];

    let postImage = {
        backgroundImage: 'url(' + image + ')'
    };

    let jsDate = new Date(date);

    return (
        <a href={postUrl}
            className="block w-full py-3 xl:py-0 rounded-md outline-none hover:outline-none text-ib-one hover:text-ib-three transition-all duration-500">
            <div className="flex flex-row items-start justify-between">
                <div className="w-1/3 lg:w-2/5 xl:w-5/12">
                    <div className="w-24 h-20 md:w-24 md:h-24 xl:w-4/5 xl:h-24 rounded-md bg-cover bg-no-repeat border border-solid border-gray-200" style={postImage}></div>
                </div>
                <div className="w-2/3 lg:w-3/5 xl:w-7/12 flex flex-col items-start justify-between py-1">
                    <div className="-ml-2 sm:-ml-4 md:-ml-8">
                        <h3 className="h-auto font-bold truncate-two-lines">
                            {title}
                        </h3>
                        <p className="text-xs text-gray-600 mt-1">
                            { monthList[jsDate.getMonth()] + ' ' + jsDate.getDay() + ', ' + jsDate.getFullYear() }
                        </p>
                    </div>
                </div>
            </div>
        </a>
    );
}

export default BlogPostCard;