import Api from '../Api'
import Csrf from '../Csrf'

export default {
    /* -------------------------------------------------------------------------- */
    /*                         Register @param - form data                        */
    /* -------------------------------------------------------------------------- */

    async register (form)
    {
        await Csrf.getCookie()
        return Api.post('/register',form)
    },

    /* -------------------------------------------------------------------------- */
    /*                                login @param - form data                    */
    /* -------------------------------------------------------------------------- */

    async login (form)
    {
        await Csrf.getCookie()
        return Api.post('/login',form)
    },

    /* -------------------------------------------------------------------------- */
    /*                                   logout @param - user                     */
    /* -------------------------------------------------------------------------- */
    async logout ()
    {
        await Csrf.getCookie()
        return Api.post('/logout')
    },

    /* -------------------------------------------------------------------------- */
    /*                            Get Authenticated User                          */
    /* -------------------------------------------------------------------------- */
    async auth ()
    {
        await Csrf.getCookie()
        return Api.get('/user')
    },

    /* -------------------------------------------------------------------------- */
    /*                                List Users                               */
    /* -------------------------------------------------------------------------- */
    async listUsers (page)
    {
        await Csrf.getCookie()
        return Api.get(`/user/all?page=${ page }`);

    },

    /* -------------------------------------------------------------------------- */
    /*         Removes User  Temporarily @param - user                      */
    /* -------------------------------------------------------------------------- */
    async removeUser (user)
    {
        await Csrf.getCookie()
        return Api.delete(`/user/remove/${ user }`)
    },

    /* -------------------------------------------------------------------------- */
    /*       Restores temporarily deteled user @param - user                */
    /* -------------------------------------------------------------------------- */
    async restoreUser (user)
    {
        await Csrf.getCookie()
        return Api.post('/user/restore/',user)
    },

    /* -------------------------------------------------------------------------- */
    /*       Edit USER @param - user                                       */
    /* -------------------------------------------------------------------------- */
    async editUser (user,id)
    {
        await Csrf.getCookie()
        return Api.put(`/user/update/${ id }`,user)
    },
}
