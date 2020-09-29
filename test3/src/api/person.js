import ApiInstance from "./index";

export default {
  getAll() {
    return ApiInstance.get('persons').then(response => response.data);
  },

  get(id) {
    return ApiInstance.get(`persons/${id}`).then(response => response.data);
  },

  create(person) {
    return ApiInstance.post('persons', person).then(response => response.data);
  }
}
