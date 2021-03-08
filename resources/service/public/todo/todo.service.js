import axios from "axios";
import Config from "../../../config/config";
var promise;

export default class TodoService {

    list() {
        promise = axios.get(`${Config.api_prefix}/todos`);
        return promise;
    }

    store(data) {
        promise = axios.post(`${Config.api_prefix}/todos`, data);
        return promise;
    }

    update(id, data) {
        promise = axios.put(`${Config.api_prefix}/todos/${id}`, data);
        return promise;
    }

    show(id) {
        promise = axios.get(`${Config.api_prefix}/todos/${id}`);
        return promise;
    }

    delete(id) {
        promise = axios.delete(`${Config.api_prefix}/todos/${id}`);
        return promise;
    }

}
