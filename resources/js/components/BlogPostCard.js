import React from 'react';

function BlogPostCard(props) {
    let { postUrl, image, title, date, previewBody } = props;
    const monthList = [
        'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
    ];

    let postImage = {
        backgroundImage: 'url(' + image + ')'
    };

    let jsDate = new Date(date);

    return (
        <a href={postUrl}
            className="block w-full mb-6 py-3 xl:py-0 rounded-md outline-none hover:outline-none text-ib-one hover:text-ib-three transition-all duration-500">
                <div
                    className="w-full h-52 lg:h-32 xl:h-64 rounded-md bg-cover bg-no-repeat border border-solid border-gray-200"
                    style={postImage} />

                <div className="mt-4">
                    <h3 className="text-lg font-bold">
                        {title}
                    </h3>
                    <p className="text-xs text-gray-600 mt-1">
                        { monthList[jsDate.getMonth()] + ' ' + jsDate.getDay() + ', ' + jsDate.getFullYear() }
                    </p>
                    <p class="mt-3 text-gray-800">
                        { previewBody }
                    </p>
                </div>
        </a>
    );
}

export default BlogPostCard;