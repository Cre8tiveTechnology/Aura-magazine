import Api from '../Api'

export default {
    /* -------------------------------------------------------------------------- */
    /*                    List Articles -By page for NonAuth Users                */
    /* -------------------------------------------------------------------------- */
    async fetchArticles (page,category)
    {
        return Api.get(`/articles/${ category }/fetch?page=${ page }`)
    },

    /* -------------------------------------------------------------------------- */
    /*                    Get Single Article - NonAuth Users                */
    /* -------------------------------------------------------------------------- */
    async getArticle (article)
    {
        return Api.get(`/articles/${ article }/get`)
    },

    /* -------------------------------------------------------------------------- */
    /*                         Update Article Views Count                         */
    /* -------------------------------------------------------------------------- */
    updateViewsCount (article)
    {
        return Api.post('articles/updateviews',article)
    },

    /* -------------------------------------------------------------------------- */
    /*                    List Articles for an Author                */
    /* -------------------------------------------------------------------------- */
    async getAuthorArticles (page,user)
    {
        return Api.get(`/articles/author/${ user }/get?page=${ page }`)
    },


    async listAllArticles ()
    {
        return await Api.get('articles/all');
    }
}
