import React from 'react';
import ButtonRounded from '../../../components/ButtonRounded';

function MorePost(props) {
    let { isLoaded, lang, loadMorePost } = props;

    return isLoaded
    ?   <div className="mt-10 text-center">
            <ButtonRounded
                variant="primary"
                onClick={loadMorePost}>
                    {lang.more_post}
            </ButtonRounded>
        </div>
    :   <div className="mt-10 text-center">
            <ButtonRounded
                variant="primary-loading">
                    {lang.loading}...
            </ButtonRounded>
        </div>;
}

export default MorePost;