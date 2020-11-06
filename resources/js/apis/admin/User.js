import Api from '../Api'
import Csrf from '../Csrf'

export default {
  /* -------------------------------------------------------------------------- */
  /*                         Register @param - form data                        */
  /* -------------------------------------------------------------------------- */

  async register(form) {
    await Csrf.getCookie()
    return Api.post('/register', form)
  },

  /* -------------------------------------------------------------------------- */
  /*                                login @param - form data                    */
  /* -------------------------------------------------------------------------- */

  async login(form) {
    await Csrf.getCookie()
    return Api.post('/login', form)
  },

  /* -------------------------------------------------------------------------- */
  /*                                   logout @param - user                     */
  /* -------------------------------------------------------------------------- */
  async logout() {
    await Csrf.getCookie()
    return Api.post('/logout')
  },

  /* -------------------------------------------------------------------------- */
  /*                            Get Authenticated User                          */
  /* -------------------------------------------------------------------------- */
  async auth() {
    await Csrf.getCookie()
    return Api.get('/user')
  },
}
