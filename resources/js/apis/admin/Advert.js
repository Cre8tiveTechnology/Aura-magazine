import Api from '../Api'
import Csrf from '../Csrf'

export default {
  /* -------------------------------------------------------------------------- */
  /*             Create Advert - @param formdata                               */
  /* -------------------------------------------------------------------------- */
  async createAdvert(advert, id) {
    await Csrf.getCookie()
    return Api.post(`/advert/create/${id}`, advert)
  },

  /* -------------------------------------------------------------------------- */
  /*                    List Adverts -By page                   */
  /* -------------------------------------------------------------------------- */
  async listAdverts(page) {
    await Csrf.getCookie()
    return Api.get(`/advert/all?page=${page}`)
  },

  /* -------------------------------------------------------------------------- */
  /*         Removes Advert  Temporarily @param - advert                      */
  /* -------------------------------------------------------------------------- */
  async removeAdvert(advert) {
    await Csrf.getCookie()
    return Api.delete(`/advert/remove/${advert}`)
  },

  /* -------------------------------------------------------------------------- */
  /*       Restores temporarily deteled advert @param - advert                */
  /* -------------------------------------------------------------------------- */
  async restoreAdvert(advert) {
    await Csrf.getCookie()
    return Api.post('/advert/restore/', advert)
  },
}
