import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom';
import BlogPostCard from '../../../components/BlogPostCard';
import API from '../../../constant/API';
import MorePost from './MorePost';


function LatestPost() {
    let [ initialLoaded, setInitialLoaded ] = useState(false);
    let [ isLoaded, setIsLoaded ] = useState(false);
    let [ lastId, setLastId ] = useState(0);
    let [ posts, setPosts ] = useState([]);

    let [ lang, setLang ] = useState({});

    useEffect(() => {
        _getLangPack();
        _getPosts();
    }, []);


    const _getLangPack = () => {
        axios.get(API.lang_pack)
            .then(response => {
                let responseBody = response.data;
                let language = responseBody.data;

                setLang(language);
            });
    };


    const _getPosts = () => {
        setIsLoaded(false);

        axios.post(API.latest_posts, {
            lastId: lastId,
            exceptIds: blog_except_ids
        })
            .then(response => {
                let responseBody = response.data;
                let allPosts = [ ...posts, ...responseBody.data.posts ];

                setIsLoaded(true);
                setInitialLoaded(true);
                setLastId(responseBody.data.lastId);
                setPosts(allPosts);
            });
    }


    const loadMorePostHandler = () => {
        _getPosts();
    };


    let morePostButton = <MorePost isLoaded={isLoaded} lang={lang} loadMorePost={loadMorePostHandler} />
    if (lastId == -1 || initialLoaded === false) {
        morePostButton = null;
    }


    return (
        <div>
            <div className="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-0 lg:gap-4 xl:gap-8">
                {posts.map((post, key) => {
                    return (
                        <BlogPostCard
                            key={key}
                            postUrl={post.post_url}
                            title={post.title}
                            image={post.image_url}
                            date={post.created_at}
                            previewBody={post.preview_body} />
                    )
                }) }
            </div>
            {morePostButton}
        </div>
    );
}

export default LatestPost;

if (document.getElementById('latest-post-ui-content')) {
    ReactDOM.render(<LatestPost/>, document.getElementById('latest-post-ui-content'));
}