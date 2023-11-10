const routes = {
    commentIndex: '/api/blog/{postId}/comments',
    commentStore: '/api/blog/{postId}/comments',
    commentEdit: '/api/blog/comments/{commentId}',
    commentDelete: '/api/blog/comments/{commentId}'
}

export default function generate(name, params = {}) {
    let route = routes[name];
    let getParams = '';

    for (const key in params) {
        route = route.replace('{' + key + '}', params[key]);
        delete params[key];
    }

    if (Object.keys(params).length > 0) {
        const searchParams = new URLSearchParams(params);
        getParams = '?' + searchParams.toString();
    }
    
    return route + getParams;
}