import axios from "axios"

export default axios .create({
    baseURL : process.env.VUE_APP_API_URL,
    headers: {
        'content-type': 'application/json',
        Authorization: 'Bearer ' + localStorage.getItem('token')

    }
})