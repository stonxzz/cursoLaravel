<script>
import { data } from "autoprefixer";

export default {
  data() {
    return {
      posts: [],
      isLoading: true,
      currentPage: 1,
    };
  },
  methods: {
    updatePage() {
      setTimeout(this.listPage, 100);
    },

    clickMe() {
      alert("Clicked!");
    },
    listPage() {
      console.log("Click" + this.currentPage);
      this.isLoading = true;
      this.$axios.get("/api/post?page=" + this.currentPage).then((res) => {
        this.posts = res.data;
        console.log(this.posts);
        this.isLoading = false;
      });
    },
    deletePost(row) {
      //Aqui trae el obeto completo, no solo la data, entonces se usa el index que ocupa en el arreglo posts para borrarlo visualmente
      this.posts.data.splice(row.index, 1);
      console.log(row);
      //Aqui ya accede al row.row que es para obtener ahora si la data del post que se desea borrar
      this.$axios.delete("/api/post/" + row.row.id);
    },
  },

  async mounted() {
    this.listPage();
  },
};
</script>

<template>
  <div>
    <h1>Listado de Post</h1>

    <router-link :to="{ name: 'save' }">Crear</router-link>

    <o-field label="Email" variant="danger" message="This email is invalid">
      <o-input type="email" value="john@" maxlength="30"> </o-input>
    </o-field>

    <o-button @click="clickMe">Click Me</o-button>
    <o-table
      :loading="isLoading"
      :data="posts.current_Page && posts.data.length == 0 ? [] : posts.data"
    >
      <o-table-column field="id" label="ID" numeric v-slot="p">
        {{ p.row.id }}
      </o-table-column>
      <o-table-column field="title" label="Título" v-slot="p">
        {{ p.row.title }}
      </o-table-column>
      <o-table-column field="posted" label="Posteado" v-slot="p">
        {{ p.row.posted }}
      </o-table-column>
      <o-table-column field="created_at" label="Fecha" v-slot="p">
        {{ p.row.created_at }}
      </o-table-column>
      <o-table-column field="category" label="Categoría" v-slot="p">
        {{ p.row.category.title }}
      </o-table-column>
      <o-table-column field="slug" label="Accion" v-slot="p">
        <router-link :to="{ name: 'save', params: { slug: p.row.slug } }"
          >editar</router-link
        >

        <o-button variant="danger" @click="deletePost(p)">Eliminar</o-button>
      </o-table-column>
    </o-table>
    <br />

    <o-pagination
      v-if="posts.current_page && posts.data.length > 0"
      @change="updatePage"
      v-model:current="currentPage"
      :total="posts.total"
      :range-before="rangeBefore || 2"
      :range-after="rangeAfter || 2"
      order="centered"
      size="small"
      :simple="false"
      :rounded="true"
      :per-page="posts.per_page"
    />
  </div>
</template>
