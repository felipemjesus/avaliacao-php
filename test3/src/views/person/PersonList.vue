<template>
  <div>
    <table class="table table-bordered">
      <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">-</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="person in persons" :key="person.id">
        <td>{{ person.name }}</td>
        <td>-</td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  import PersonApi from '@/api/person';

  export default {
    data() {
      return {
        persons: []
      }
    },

    async mounted() {
      this.persons = await PersonApi.get();
    }
  };
</script>
