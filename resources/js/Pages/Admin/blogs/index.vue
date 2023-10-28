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
         <div  v-for="(item, index) in blogs" :key="index" class="col-md-12 blog-post">
             <div class="post-title">
               <p class="title-p" href="single.html"><h1>{{ item.title }}</h1></p>
               <button  @click.stop="show_subMenu(index)" class="ch-s ch-s-sub"> <span
                                        ><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="4"
                                            height="4"
                                            viewBox="0 0 4 4"
                                            fill="none">
                                            <path
                                                d="M1.99969 3.2907C2.82038 3.2907 3.48574 2.62535 3.48574 1.80465C3.48574 0.983958 2.82038 0.318604 1.99969 0.318604C1.17899 0.318604 0.513638 0.983958 0.513638 1.80465C0.513638 2.62535 1.17899 3.2907 1.99969 3.2907Z"
                                                fill="black" /></svg ><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="4"
                                            height="4"
                                            viewBox="0 0 4 4"
                                            fill="none">
                                            <path
                                                d="M1.99969 3.2907C2.82038 3.2907 3.48574 2.62535 3.48574 1.80465C3.48574 0.983958 2.82038 0.318604 1.99969 0.318604C1.17899 0.318604 0.513638 0.983958 0.513638 1.80465C0.513638 2.62535 1.17899 3.2907 1.99969 3.2907Z"
                                                fill="black" /></svg ><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="4"
                                            height="4"
                                            viewBox="0 0 4 4"
                                            fill="none">
                                            <path
                                                d="M1.99969 3.2907C2.82038 3.2907 3.48574 2.62535 3.48574 1.80465C3.48574 0.983958 2.82038 0.318604 1.99969 0.318604C1.17899 0.318604 0.513638 0.983958 0.513638 1.80465C0.513638 2.62535 1.17899 3.2907 1.99969 3.2907Z"
                                                fill="black" /></svg ></span></button>


   <!--  Sub Menu -->
   <div class="sub_menu hide_setting" :id="`sub_menu_${index}`">
                                <div class="sub_item-">
                                    <button class="sub-e" @click.prevent="edit_blog(item.id)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
  <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#696868" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
            Edit      </button>
                                </div>
                                <div class="profile-line"></div>

                                <div class="sub_item-">

                  <button class="sub-d" @click.prevent="delete_blog(item.id)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
  <path d="M3 6.00006H5H21" stroke="#696868" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M8 6.00006V4.00006C8 3.46963 8.21071 2.96092 8.58579 2.58585C8.96086 2.21077 9.46957 2.00006 10 2.00006H14C14.5304 2.00006 15.0391 2.21077 15.4142 2.58585C15.7893 2.96092 16 3.46963 16 4.00006V6.00006M19 6.00006V20.0001C19 20.5305 18.7893 21.0392 18.4142 21.4143C18.0391 21.7893 17.5304 22.0001 17 22.0001H7C6.46957 22.0001 5.96086 21.7893 5.58579 21.4143C5.21071 21.0392 5 20.5305 5 20.0001V6.00006H19Z" stroke="#696868" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
Delete

</button>
                                </div>

                                <div class="profile-line"></div>



                                </div>
                            </div>
             <div class="post-info">
             	<span> created at {{ item.created_at.split("T")[0] }} </span>
             </div>
             <p class="content_html" v-html="item.content_html">
             </p>

             <button @click.prevent="show_blog(item.id)" class="button btn-read button-style button-anim fa fa-long-arrow-right"><span>Read More</span></button>
         </div>
     <!-- Blog Post End -->
    </div>
        </div>
<!--  side right -->
        <div class="addv_blog">
<button    class="btn_blog"  @click="create_blog()">publish </button>
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
        blogs:Object,
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
  },
  edit_blog(id){
     router.get(`blogs/${id}/edit`);
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
    width:100%;
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


.blog-post p {
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
.content_html,.title-p{
    /* border: 1px solid green; */
    max-height: 280px;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 4;
    line-height: 18px !important;
    overflow: hidden;
    margin-bottom: 10px;
}
.title-p{
    -webkit-line-clamp: 2 !important;

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
