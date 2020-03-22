import axios from "axios";
export default {
    post: params => axios.post("/registrar/usuario", params)
};