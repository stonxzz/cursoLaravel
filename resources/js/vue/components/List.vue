<script>
import { data } from "autoprefixer";
import { useRouter } from "vue-router";

export default {
  data() {
    return {
      posts: [],
      isLoading: true,
      currentPage: 1,
      confirmDeleteActive: false,
      deletePostRow: "",
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
    deletePost() {
      this.confirmDeleteActive=false
      //Aqui trae el obeto completo, no solo la data, entonces se usa el index que ocupa en el arreglo posts para borrarlo visualmente
      this.posts.data.splice(this.deletePostRow.index, 1);
      //Aqui ya accede al row.row que es para obtener ahora si la data del post que se desea borrar
      this.$axios.delete("/api/post/" + this.deletePostRow.row.id);
    },
  },

  async mounted() {
    this.listPage();
  },
};
</script>

<template>
  <div>
    <o-modal v-model:active="confirmDeleteActive">
      <div class="p-4">
        <p>¿Seguro que quieres borrar el post?</p>
      </div>
      <div class="flex flex-row-reverse gap-2 bg-gray-500" p-3>
        <button class="btn btn-success" @click="confirmDeleteActive = false">
          Cancelar
        </button>
        <button class="btn btn-danger" @click="deletePost(p)">Eliminar</button>
      </div>
    </o-modal>
    <h1>Listado de Post</h1>
    <router-link iconLeft="plus" class="btn btn-success my-4" :to="{ name: 'save' }"
      >Crear</router-link
    >

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
        <router-link
          class="mr-3 ml-3"
          :to="{ name: 'save', params: { slug: p.row.slug } }"
          >editar</router-link
        >

        <button
          class="btn btn-danger"
          @click="deletePostRow = p; confirmDeleteActive=true"
        >
          Eliminar
        </button>
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
