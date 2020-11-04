import Api from '../Api'
import Csrf from '../Csrf'

export default {

    /* -------------------------------------------------------------------------- */
    /*             Create Article - @param formdata                               */
    /* -------------------------------------------------------------------------- */
    async createArticle (article)
    {
        await Csrf.getCookie();
        return Api.post('/article/create',article
        );
    },

    /* -------------------------------------------------------------------------- */
    /*                                List Articles                               */
    /* -------------------------------------------------------------------------- */
    async listArticles ()
    {
        await Csrf.getCookie();
        return Api.get('/article/all');
    },

}
