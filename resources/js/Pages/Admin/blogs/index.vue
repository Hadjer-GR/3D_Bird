<template>
    <Head>
         <title>3d Models</title>
         <!-- <meta name="keywords" content="....."> -->

        </Head>

        <link rel="stylesheet" href="/css/layout/generalLayout.css" />
        <link rel="stylesheet" href="/css/general/general.css" />
<AdminLayout>
    <div  v-if="$page.props.flush.message" class="alert alert-success" id="flush" >
       {{ $page.props.flush.message}}
      <button @click.prevent="close()" class="mesg-h"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
  <path d="M13 1L1 13M1 1L13 13" stroke="#101828" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button>

    </div>


    <div class="container_create ">

<button    class="btn_blog"  @click="create_blog()">publish </button>

        </div>

</AdminLayout>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';

import { ref } from 'vue'
import { router ,useForm} from '@inertiajs/vue3';



export default{
components:{
    AdminLayout,

},
data(){
return{

}
},

methods: {
    create_blog(){
        router.get("/wp-admin/blogs/create");
    },
    close(){
            router.get('/wp-admin/blogs');
        }
},

}

</script>

<style>
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
    transform: scale(1.1);
}
</style>
