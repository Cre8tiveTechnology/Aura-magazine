import Api from '../Api'
import Csrf from '../Csrf'

export default {
  /* -------------------------------------------------------------------------- */
  /*                            Create Role                                     */
  /* -------------------------------------------------------------------------- */
  async createRole(role) {
    await Csrf.getCookie()
    return Api.post(`/role/create/`, role)
  },

  /* -------------------------------------------------------------------------- */
  /*                                List Roles                               */
  /* -------------------------------------------------------------------------- */
  async listRoles(page) {
    await Csrf.getCookie()
    return Api.get(`/role/all?page=${page}`)
  },

  /* -------------------------------------------------------------------------- */
  /*         Removes Role  Temporarily @param - role                      */
  /* -------------------------------------------------------------------------- */
  async removeRole(role) {
    await Csrf.getCookie()
    return Api.delete(`/role/remove/${role}`)
  },

  /* -------------------------------------------------------------------------- */
  /*       Restores temporarily deteled role @param - role                */
  /* -------------------------------------------------------------------------- */
  async restoreRole(role) {
    await Csrf.getCookie()
    return Api.post('/role/restore/', role)
  },
}
