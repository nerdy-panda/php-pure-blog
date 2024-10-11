function urlParameters(queryString){
    if(queryString===undefined)
        queryString = window.location.search;
    return new URLSearchParams(queryString);
}

export {urlParameters};