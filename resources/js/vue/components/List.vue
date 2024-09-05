<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";

const posts = ref([]);
const loading = ref(true)
onMounted(async () => {
  try {
    const {data}  = await axios.get("/api/post")
    posts.value = data.data
    loading.value = false
    console.log(data)
  } catch (error) {
    console.log (error)
  }
})
</script>

<template>
  <div>
    <h1>Listado de Post</h1>
     <o-table  :data="posts.length == 0 ? [] : posts">
    <o-table-column
            v-slot="p"
            field="id"
            label="ID">
            {{ p.row.id }}
    </o-table-column>
    <o-table-column
            v-slot="p"
            field="title"
            label="TITÚLO">
            {{ p.row.title }}
    </o-table-column>
    <o-table-column
            v-slot="p"
            field="posted"
            label="POSTEADO">
            {{ p.row.posted }}
    </o-table-column>
    <o-table-column
            v-slot="p"
            field="created_at"
            label="FECHA">
            {{ p.row.created_at }}
    </o-table-column>
    <o-table-column
            v-slot="p"
            field="category"
            label="CATEGORIA">
            {{ p.row.category.title }}
    </o-table-column>
    </o-table>
    
  </div>
</template>
