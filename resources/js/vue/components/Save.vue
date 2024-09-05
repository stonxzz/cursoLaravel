<script>
import { all } from "axios";

export default {
  data() {
    return{
        categories: []
    }
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
  },
};
</script>

<template>
  <div>
    <o-field label="Titulo">
      <o-input value=""></o-input>
    </o-field>
    <o-field label="Descripcion">
      <o-input type="textarea" value=""></o-input>
    </o-field>
    <o-field label="Categoria">
      <o-select placeholder="Seleccione una categoria">
        <option v-for="c in categories" :key="c.id" value="c.id">{{ c.title }}</option>
      </o-select>
    </o-field>
    <o-field label="Posted">
      <o-select placeholder="Seleccione un estado">
        <option value="yes">Si</option>
        <option value="not">No</option>
      </o-select>
    </o-field>
    <o-button variant="primary">Enviar</o-button>
  </div>
</template>
