<template>
    <Head>
         <title>3d Models</title>
         <!-- <meta name="keywords" content="....."> -->

        </Head>

        <link rel="stylesheet" href="/css/layout/generalLayout.css" />
        <!-- <link rel="stylesheet" href="/css/general/general.css" /> -->

    <!-- Main CSS Stylesheet -->
    <!-- <link rel="stylesheet"  href="/css/blogs/style.css"> -->

    <!-- Google Web Fonts  -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700"> -->
<AdminLayout>
    <div  v-if="$page.props.flush.message" class="alert alert-success" id="flush" >
       {{ $page.props.flush.message}}
      <button @click.prevent="close()" class="mesg-h"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
  <path d="M13 1L1 13M1 1L13 13" stroke="#101828" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button>

    </div>
    <div class="cont-b">


    <div class="container_create navbar navbar-expand-lg  bg-white navbar-light py-0 px-4">
        <div class="col-md-12 content-page">
      <!-- Blog Post Start -->
         <div  class="col-md-12 ">
             <div class="post-title">
               <p class="title-p" ><h1>{{ blog.title }}</h1></p>

                            </div>
             <div class="post-info">
             	<span> created at {{ blog.created_at.split("T")[0] }} </span>
             </div>
             <div  v-html="blog.content_html">
             </div>

         </div>
     <!-- Blog Post End -->
    </div>

        </div>
<!--  side right -->
        <div class="addv_blog">
            <div class="addv">
    <div class="addv1"></div>
</div>
        </div>
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
props:{
        blog:Object,
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
        },
    show_subMenu(index) {
            const id = 'sub_menu_' + index;
            document.getElementById(id).classList.toggle('hide_setting');
        },
    delete_blog(id){
     router.delete(`blogs/${id}`);
  },
  show_blog(id){
     router.get(`blogs/${id}`);
  }
},

}

</script>

<style>
.write-b{
    font-weight: 600;
}

.cont-b{
    position: relative;
    display: flex;
    width: 88%;
    justify-content: space-between;
    align-items: flex-start;
    flex-direction: row;
    /* border: 1px solid green; */
}
.container_create{
    height: 100%;
    flex-basis: 85%;
    display: flex;
    padding: 20px 15px;

    flex-direction: column;
    justify-content: flex-start;
}
.content-page{
    margin-top: 10px;
    /* border: 1px solid red; */
    /* padding-top: 20px !important; */
    position: relative;
    margin-bottom: 20px;
    /* width:70%; */
    /* margin-left: 10%; */
}
.btn-read{
    color: var(--primary);
    font-weight: 600;
    font-size: 1em;
    transition: all 0.2s;
}
.btn-read:hover{
    color: #696868;
   font-size: 1.03em;
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
    transform: scale(1.1);
}

/* Blog Post & Single Blog Page */


.blog-post div {
    font-size: 16px;
    line-height: 30px;
    color: #696868;
    font-weight: 300;
    letter-spacing: 0.8px;
    font-family: "Poppins", sans-serif;
}
.blog-post{
    /* border: 1px solid red; */
    margin-top: 20px;
    max-height: 400px;

}
.title-p{
    margin: 10px;
}

.title-p{
    -webkit-line-clamp: unset !important;

}
.post-title{
    position: relative;
    display: flex;
}
.title-p{
    flex-basis: 97%;
}
.ch-s span svg{
    width: 7px !important;
    height: 7px !important;
}

.hide_setting{
     display:  none !important;
 }
 /*
 * Design sub menue at the left side
 */
 .sub_menu{
 position:absolute;
 width: 150px;
 height: auto;
 top: 81%;
 /* z-index:25; */
  right: -15px;
  top: 85%;
 padding: 10px 10px;
 border-radius: 10px;
 background:  #fff !important;
 box-shadow: 0px 0px 38.14118194580078px -3.6487998962402344px rgba(16, 24, 40, 0.10);

 }
 .sub-e,.sub-d{
    display: flex !important;
    width: 100%;
    color: #696868;
    text-align: center;
    font-size: 1em;
    font-weight: 600;
    transition: all 0.2s;

 }
 .sub-e svg,.sub-d svg{
    margin-right: 5px;
 }
 .sub-e:hover{
    transform: scale(1.01);
    color: var(--primary) !important;
 }
.sub-d:hover{
    transform: scale(1.01);
    color: red !important;
 }
 .addv_blog{
    flex-basis: 15%;
}
.addv{
    position: relative;
    width: 90%;
    margin-left: 10%;
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
}
.addv1{
    border: 1px solid red;
    height: 250px;
}
</style>
