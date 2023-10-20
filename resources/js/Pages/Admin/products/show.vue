<template>
        <link rel="stylesheet" href="../../css/layout/generalLayout.css" />
        <link rel="stylesheet" href="/css/admin/product/show.css" />


    <AdminLayout>


<div class="card">
  <nav>
    <button class="btn-back" @click.prevent="back()">

    <svg class="arrow" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="352,115.4 331.3,96 160,256 331.3,416 352,396.7 201.5,256 " stroke="#727272"/></svg>
    Back
    </button>
  </nav>
 <div class="container-card">
    <div class="photo">
    <img :src="'/storage/'+product.logo">
  </div>
  <div class="description">
    <h2>{{ product.title }}</h2>
    <h4>{{ selected_cat.name }}-{{ selected_cat.sub_categorie }}</h4>
    <h1>{{ product.file_size }} MB</h1>
    <p>{{ product.tags }}</p>
    <div class="container-card">
        <a class="show_btn" v-if="product.link_sketshup" :href="product.link_sketshup"  target="_blank" >Sketshup</a>
    <a class="show_btn" v-if="product.link_3ds" :href="product.link_3ds" target="_blank" >3ds</a>
    <a class="show_btn" v-if="product.link_collada" :href="product.link_collada" target="_blank">Collada</a>
    <a class="show_btn" v-if="product.link_lumion" :href="product.link_lumion" target="_blank">Lumion</a>

    </div>


  </div>
 </div>
</div>
</AdminLayout>
</template>

<script>
import { router } from '@inertiajs/vue3'
import AdminLayout from '@/Layouts/AdminLayout.vue';

export default{
components:{
    AdminLayout
},
    props:{
    product:Object,selected_cat:Object
    },

    methods:{
 back(){
    router.get(`/wp-admin/product`);

}
    }
}

</script>
