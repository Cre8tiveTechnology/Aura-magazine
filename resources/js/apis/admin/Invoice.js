import Api from '../Api'
import Csrf from '../Csrf'

export default {
    /* -------------------------------------------------------------------------- */
    /*             Create Invoice - @param formdata                               */
    /* -------------------------------------------------------------------------- */
    async createInvoice (invoice,id)
    {
        await Csrf.getCookie()
        return Api.post(`/invoice/create/${ id }`,invoice)
    },

    /* -------------------------------------------------------------------------- */
    /*                    List Invoices -By page for Super Admin                  */
    /* -------------------------------------------------------------------------- */
    async listInvoices (page)
    {
        await Csrf.getCookie()
        return Api.get(`/invoice/all?page=${ page }`)
    },

    /* -------------------------------------------------------------------------- */
    /*         Removes Invoice  Temporarily @param - Invoice                      */
    /* -------------------------------------------------------------------------- */
    async removeInvoice (invoice)
    {
        await Csrf.getCookie()
        return Api.delete(`/invoice/remove/${ invoice }`)
    },

    /* -------------------------------------------------------------------------- */
    /*       Restores temporarily deteled Invoice @param - Invoice                */
    /* -------------------------------------------------------------------------- */
    async restoreInvoice (invoice)
    {
        await Csrf.getCookie()
        return Api.post('/invoice/restore/',invoice)
    },

    /* -------------------------------------------------------------------------- */
    /*       Edit Invoice @param - Invoice                                       */
    /* -------------------------------------------------------------------------- */
    async editInvoice (invoice,id)
    {
        await Csrf.getCookie()
        return Api.put(`/invoice/update/${ id }`,invoice)
    },
}
