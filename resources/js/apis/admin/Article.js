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
  /*                    List Articles -By page for Super Admin                  */
  /* -------------------------------------------------------------------------- */
  async listArticles(page) {
    await Csrf.getCookie()
    return Api.get(`/article/all?page=${page}`)
  },

  /* -------------------------------------------------------------------------- */
  /*         Removes Article  Temporarily @param - article                      */
  /* -------------------------------------------------------------------------- */
  async removeArticle(article) {
    await Csrf.getCookie()
    return Api.delete(`/article/remove/${article}`)
  },

  /* -------------------------------------------------------------------------- */
  /*       Restores temporarily deteled article @param - article                */
  /* -------------------------------------------------------------------------- */
  async restoreArticle(article) {
    await Csrf.getCookie()
    return Api.post('/article/restore/', article)
  },
}
