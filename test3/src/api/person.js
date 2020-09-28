import ApiInstance from "./index";

export default {
  get() {
    return ApiInstance.get('persons').then(response => response.data);
  }
}
