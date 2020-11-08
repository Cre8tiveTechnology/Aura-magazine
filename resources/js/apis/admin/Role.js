import Api from '../Api'
import Csrf from '../Csrf'

export default {
  /* -------------------------------------------------------------------------- */
  /*             Create Role                                                    */
  /* -------------------------------------------------------------------------- */
  async createRole(role) {
    await Csrf.getCookie()
    return Api.post(`/role/create/`, role)
  },

  /* -------------------------------------------------------------------------- */
  /*                                List Roles                               */
  /* -------------------------------------------------------------------------- */
  async listRoles() {
    await Csrf.getCookie()
    return Api.get('/role/all')
  },
}
