<template>
    <Head>
         <title>3d Models</title>
         <!-- <meta name="keywords" content="....."> -->

        </Head>

        <link rel="stylesheet" href="/css/layout/generalLayout.css" />

<AdminLayout>
    <div class="container_create container_create_blog ">
  <input required v-model="blog.title" class="blog_t" type="text" placeholder=" the title">
<!-- <h2>hadjer gigi</h2> -->

    <QuillEditor  ref="editor"  :modules="modules_2" toolbar="full"/>
    <button    class="btn_blog"  @click="SubmitBlog()">Update </button>


<!-- <button    class="btn_blog"  @click="SubmitBlog()">publish </button> -->

        </div>

</AdminLayout>

</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import ImageUploader from 'quill-image-uploader';
import { ref } from 'vue'
import { router ,useForm} from '@inertiajs/vue3';



export default{
components:{
    AdminLayout,

},
props:{
        blog:Object,
},
mounted(){
    this.$refs.editor.setHTML(this.blog.content_html);
},
data(){
return{
    form:useForm({
            title:"",
            content:"",
           content_html:""
     }),
     title:this.blog.title,

}
},
setup: () => {
    const modules_2 = {
    name: 'imageUploader',
        module: ImageUploader,
        options: {
          upload: file => {
            return new Promise((resolve, reject) => {
              const formData = new FormData();
              formData.append("image", file);

              axios.post('/upload-image', formData)
              .then(res => {
                console.log(res)
                resolve(res.data.url);
              })
              .catch(err => {
                reject("Upload failed");
                console.error("Error:", err)
              })
            })
          },
    return (){ modules_2 }
  }
}
},
methods: {
    SubmitBlog(){
         this.form.title=this.title;
        this.form.content_html=this.$refs.editor.getHTML();

        this.form.put(`/wp-admin/blogs/${this.blog.id}`);
    }
},

}

</script>

<style>
.container_create_blog{
    position: relative;
    width: 80% !important;
}
/* .editor{
    position: relative;
    height: 500px !important;
    margin-bottom: 40px;
} */
.blog_t{
    position: relative;
    width: 95%;
    /* box-shadow: 4px 3px 1px rgba(0, 0, 0, 0.22); */
    border: unset;
    font-size: 1em;
    font-weight: 600;
    border-bottom: 1px solid rgba(0, 0, 0, 0.5);
}
.btn_blog{
    margin: 10px;
    border-radius:10px;
    border:none;
     color:white;
    background-color:crimson;
    padding:15px 10px;
     cursor:pointer;
transition: all 0.2s;
}
.btn_blog:hover{
    font-weight: 600;
    transform: scale(1.01);
}
</style>
