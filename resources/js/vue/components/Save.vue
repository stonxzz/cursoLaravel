<script>
import { all } from "axios";

export default {
  data() {
    return {
      categories: [],
      form: {
        title: "",
        description: "",
        content: "",
        category_id: "",
        posted: "",
      },
      errors: {
        title: "",
        description: "",
        content: "",
        category_id: "",
        posted: "",
      },
    };
  },
  mounted() {
    this.getCategory();
  },
  methods: {
    cleanErrorsForm(){
        this.errors.title = ""
        this.errors.description = ""
        this.errors.content = ""
        this.errors.category_id = ""
        this.errors.posted = ""
    },
    getCategory() {
      this.$axios.get("/api/category/all").then((res) => {
        this.categories = res.data;
      });
    },
    submit(){
        console.log(this.form)

        this.cleanErrorsForm()

        this.$axios.post("/api/post", this.form)
        .then(res=>{
            console.log(res)
        }).catch(e=>{
            // es para accedr a los errores en especifico que ocurran
            console.log(e.response.data)

            if (e.response.data.title) {
                this.errors.title = e.response.data.title[0]
            }
            if (e.response.data.description) {
                this.errors.description = e.response.data.description[0]
            }
            if (e.response.data.content) {
                this.errors.content = e.response.data.content[0]
            }
            if (e.response.data.category_id) {
                this.errors.category_id = e.response.data.category_id[0]
            }
            if (e.response.data.posted) {
                this.errors.posted = e.response.data.posted[0]
            }

        })
    }
  },
};
</script>

<template>
    <!-- //El .prevent es para prevenir que se ejecute el evento por defecto de html -->
  <form @submit.prevent="submit">
    <div>
      <o-field label="Titulo" :variant="errors.title ? 'danger' : primary" :message="errors.title">
        <input v-model="form.title" value=""></input>
      </o-field>
      <o-field label="Descripcion" :variant="errors.description ? 'danger' : primary" :message="errors.description">
        <input v-model="form.description" type="text-area" value=""></input>
      </o-field>
      <o-field label="Contenido" :variant="errors.content ? 'danger' : primary" :message="errors.content">
        <input v-model="form.content" type="text-area" value=""></input>
      </o-field>
      <o-field label="Categoria" :variant="errors.category_id ? 'danger' : primary" :message="errors.category_id">
        <o-select v-model="form.category_id" placeholder="Seleccione una categoria">
          <option v-for="c in categories" :key="c.id" :value="c.id">{{ c.title }}</option>
        </o-select>
      </o-field>
      <o-field label="Posted" :variant="errors.posted ? 'danger' : primary" :message="errors.posted">
        <o-select v-model="form.posted" placeholder="Seleccione un estado">
          <option value="yes">Si</option>
          <option value="not">No</option>
        </o-select>
      </o-field>
      <o-button variant="primary" native-type="submit">Enviar</o-button>
    </div>
  </form>
</template>
