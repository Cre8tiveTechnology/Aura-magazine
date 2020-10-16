import Api from './Api';
import Csrf from "../apis/Csrf";

export default {

    /* -------------------------------------------------------------------------- */
    /*                         Register @param - form data                        */
    /* -------------------------------------------------------------------------- */

    async register (form)
    {
        await Csrf.getCookie();

        return Api.post('/register',form);

    },

    /* -------------------------------------------------------------------------- */
    /*                                login @param - form data                    */
    /* -------------------------------------------------------------------------- */

    async login (form)
    {
        await Csrf.getCookie();

        return Api.post('/login',form);

    },

    /* -------------------------------------------------------------------------- */
    /*                                   logout @param - user                     */
    /* -------------------------------------------------------------------------- */
    async logout (user)
    {
        await Csrf.getCookie();

        return Api.post('/logout',user);

    },


    /* -------------------------------------------------------------------------- */
    /*                            Get Authenticated User                          */
    /* -------------------------------------------------------------------------- */
    auth ()
    {
        return Api.get('/user');
    }
}
