<template>
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center px-1 px-sm-2 px-md-3">
      <div class="col-8 col-sm-10 px-0 bg-light">
        {{ person.name }}
      </div>
    </div>
    <div class="card-body p-1 p-lg-2 p-xl-3">
      <ul>
        <li v-for="contact in person.contacts" :key="contact.id">
          <strong>{{ contact.type }}</strong>: {{ contact.description }}
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
  import PersonApi from '@/api/person';

  export default {
    data() {
      return {
        person: []
      }
    },

    mounted() {
      PersonApi.get(this.$route.params.id).then(response => this.person = response.data);
    },
  };
</script>
