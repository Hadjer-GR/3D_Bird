<template>
    <Head>
         <title>3d Models</title>
         <!-- <meta name="keywords" content="....."> -->

        </Head>

        <link rel="stylesheet" href="/css/layout/generalLayout.css" />

<AdminLayout>
    <div class="container_create " style="border:1px solid red">
<!-- <h2>hadjer gigi</h2> -->

<QuillEditor v-model:content="content" :modules="modules" toolbar="full" ref="editor"/>

<button    class="btn2"  @click="SubmitBlog()" style=" border-radius:10px; border:none; color:white; background-color:crimson; padding:15px 10px; cursor:pointer;" >publish </button>

        </div>

</AdminLayout>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import ImageUploader from 'quill-image-uploader';
import { ref } from 'vue'



export default{
components:{
    AdminLayout,

},
data(){
return{
    content:"",
}
},
setup: () => {
    const modules = {
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
    return (){ modules }
  }
}
},
methods: {
    SubmitBlog(){
        console.log(this.$refs.editor.getHTML())
        console.log( JSON.stringify(this.content));
    }
},

}

</script>
