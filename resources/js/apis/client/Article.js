import Api from '../Api'

export default {
  /* -------------------------------------------------------------------------- */
  /*                    List Articles -By page for NonAuth Users                */
  /* -------------------------------------------------------------------------- */
  async fetchArticles(page, category) {
    return Api.get(`/articles/${category}/fetch?page=${page}`)
  },
}
