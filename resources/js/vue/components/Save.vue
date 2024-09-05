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
    };
  },
  mounted() {
    this.getCategory();
  },
  methods: {
    getCategory() {
      this.$axios.get("/api/category/all").then((res) => {
        this.categories = res.data;
      });
    },
    submit(){
        this.$axios.post("/api/post", this.form)
        .then(res=>{
            console.log(res)
        })
    }
  },
};
</script>

<template>
    <!-- //El .prevent es para prevenir que se ejecute el evento por defecto de html -->
  <form @submit.prevent="submit">
    <div>
      <o-field label="Titulo">
        <input v-model="form.title" value=""></input>
      </o-field>
      <o-field label="Descripcion">
        <input v-model="form.description" type="text-area" value=""></input>
      </o-field>
      <o-field label="Contenido">
        <input v-model="form.content" type="text-area" value=""></input>
      </o-field>
      <o-field label="Categoria">
        <o-select v-model="form.category_id" placeholder="Seleccione una categoria">
          <option v-for="c in categories" :key="c.id" :value="c.id">{{ c.title }}</option>
        </o-select>
      </o-field>
      <o-field label="Posted">
        <o-select v-model="form.posted" placeholder="Seleccione un estado">
          <option value="yes">Si</option>
          <option value="not">No</option>
        </o-select>
      </o-field>
      <o-button variant="primary" native-type="submit">Enviar</o-button>
    </div>
  </form>
</template>
