<template>
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center px-1 px-sm-2 px-md-3">
      <div class="col-8 col-sm-10 px-0 bg-light">
        Novo
      </div>
    </div>
    <div class="card-body p-1 p-lg-2 p-xl-3">
      <ValidationObserver ref="$validator" v-slot="{ handleSubmit }">
        <form @submit.prevent="handleSubmit(salvar)">
          <div class="row">
            <div class="form-group col-12">
              <label for="name">Nome</label>
              <ValidationProvider rules="required" v-slot="{ classes }" name="name" tag="div">
                <input type="text" id="name" class="form-control" :class="classes" maxlength="250" v-model="person.name">
                <div class="invalid-feedback">Campo obrigatório</div>
              </ValidationProvider>
            </div>
            <div class="form-group col-12">

              <div class="form-row" v-for="(contact, index) in person.contacts" :key="index">
                <div class="form-group col-3">
                  <label for="type" v-if="index == 0">Tipo</label>
                  <ValidationProvider
                    rules="required"
                    name="type"
                    tag="div"
                    v-slot="{ classes, errors }"
                  >
                    <select
                      name="type"
                      id="type"
                      class="form-control custom-select"
                      :class="classes"
                      v-model="contact.type"
                    >
                      <option :value="undefined" />
                      <option value="phone">Telefone</option>
                      <option value="whatsapp">WhatsApp</option>
                      <option value="email">E-mail</option>
                    </select>
                    <div class="invalid-feedback">{{ errors[0] }}</div>
                  </ValidationProvider>
                </div>
                <div class="form-group col">
                  <label for="description" v-if="index == 0">Descrição</label>
                  <ValidationProvider
                    rules="required"
                    name="description"
                    tag="div"
                    v-slot="{ classes, errors }"
                  >
                    <input
                      type="text"
                      name="description"
                      class="form-control"
                      :class="classes"
                      v-model="contact.description"
                    />
                    <div class="invalid-feedback">{{ errors[0] }}</div>
                  </ValidationProvider>
                </div>
                <div class="form-group" v-if="index >= 1">
                  <button
                    type="button"
                    title="Remover"
                    class="btn btn-danger btn-sm mt-1"
                    @click="removeContact(index)"
                  >
                    -
                  </button>
                </div>
              </div>

              <button type="button" class="btn btn-link float-right" @click="addContact">
                + Adicionar
              </button>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <button class="btn btn-primary mr-2 float-right" type="submit">Salvar</button>
            </div>
          </div>
        </form>
      </ValidationObserver>
    </div>
  </div>
</template>

<script>
  import PersonApi from '@/api/person';

  const defaultContact = {
    type: null,
    description: null
  };

  export default {
    data() {
      return {
        person: {
          name: null,
          contacts: [{ ...defaultContact }]
        }
      }
    },

    methods: {
      addContact() {
        this.person.contacts.push({ ...defaultContact });
      },

      removeContact(index) {
        this.person.contacts.splice(index, 1);
      },

      async salvar() {
        try {
          let person = await PersonApi.create(this.person);
          this.$router.push({ name: "person-view", params: { id: person.id } });
        } catch (error) {

        }
      }
    }
  };
</script>
