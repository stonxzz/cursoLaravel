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
      post:"",
      file:null,
      fileError:""
    };
  },
  async mounted() {
    if(this.$route.params.slug){
        await this.getPost()
        this.initPost()
    }
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
    upload(){
      //return console.log(this.file)

      const formData = new FormData()
      formData.append("image", this.file)

      this.$axios.post("/api/post/upload/"+this.post.id, formData,{
        headers:{
          "Content-Type":"multipart/form-data"
        },
      })
      .then((res)=>{
        console.log(res)
      })
      .catch((e)=>{
        this.fileError= e.response.data.message
      })
    },
    getCategory() {
      this.$axios.get("/api/category/all").then((res) => {
        this.categories = res.data;
      });
    },
    async getPost() {
      this.post = await this.$axios.get("/api/post/slug/"+this.$route.params.slug)
      this.post = this.post.data
      },
    initPost(){
        this.form.title = this.post.title
        this.form.description = this.post.description
        this.form.content = this.post.content
        this.form.category_id = this.post.category_id
        this.form.posted = this.post.posted
    },
    submit(){

        this.cleanErrorsForm()
        if(this.post == "")
        return this.$axios.post("/api/post", this.form)
        .then(res=>{
          this.$oruga.notification.open({
        message: 'registro procesado con exito',
        position:"bottom-right",
        duration: 4000,
        closable:true
    });
            console.log(res)
        }).catch(e=>{
          this.$oruga.notification.open({
        message: 'registro actualizado',
        position:"bottom-right",
        duration: 4000,
        closable:true
    });
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

        //Actualizar
        this.$axios.patch("/api/post/"+this.post.id, this.form)
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
}
  }
</script>

<template>

    <h1 v-if="post">Actualizar Post <span class="font-bold">{{ post.title }}</span></h1>
    <h1 v-else>Crear Post</h1>

    <!-- //El .prevent es para prevenir que se ejecute el evento por defecto de html -->
  <form @submit.prevent="submit">
    <div class="grid grid-cols-2 gap-3">
        <div class="col-span-2">
            <o-field label="Titulo" :variant="errors.title ? 'danger' : primary" :message="errors.title">
        <input v-model="form.title" value=""></input>
      </o-field>
        </div>
      
      <o-field label="Descripcion" :variant="errors.description ? 'danger' : primary" :message="errors.description">
        <textarea v-model="form.description" type="text-area" value=""></textarea>
      </o-field>
      <o-field label="Contenido" :variant="errors.content ? 'danger' : primary" :message="errors.content">
        <textarea v-model="form.content" type="text-area" value=""></textarea>
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

      <div class="flex gap-3" v-if="post">
      <o-field :message="fileError">
      <o-upload v-model="file">
        <o-button tag="a" class="btn btn-success" variant="primary">
          <o-icon icon="upload"></o-icon>
          <span>Click para cargar</span>
        </o-button>
      </o-upload>
    </o-field>

      <button class="btn btn-success" @click="upload" icon-left="upload">
        subir
      </button>
    </div>
    </div>
    <o-button variant="primary" native-type="submit">Enviar</o-button>
  </form>
</template>
