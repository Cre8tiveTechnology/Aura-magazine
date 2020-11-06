import Api from '../Api'
import Csrf from '../Csrf'

export default {
  /* -------------------------------------------------------------------------- */
  /*             Create Article - @param formdata                               */
  /* -------------------------------------------------------------------------- */
  async createArticle(article, id) {
    await Csrf.getCookie()
    return Api.post(`/article/create/${id}`, article)
  },

  /* -------------------------------------------------------------------------- */
  /*                                List Articles                               */
  /* -------------------------------------------------------------------------- */
  async listArticles() {
    await Csrf.getCookie()
    return Api.get('/article/all')
  },
}
