<template>
    <Head>
         <title>3d Models</title>
         <!-- <meta name="keywords" content="....."> -->

        </Head>

    <link rel="stylesheet" href="../../css/layout/generalLayout.css" />
        <link rel="stylesheet" href="../../css/general/general.css" />
        <link rel="stylesheet" href="../../css/admin/product/ProductList.css" />

<AdminLayout>
    <div  v-if="$page.props.flush.message" class="alert alert-success" id="flush" >
       {{ $page.props.flush.message}}
      <button @click.prevent=" close()" class="mesg-h"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
  <path d="M13 1L1 13M1 1L13 13" stroke="#101828" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button>

    </div>
   <!-- Property List Start -->
   <div class="container-xxl py-5">
            <div class="container">
                <!-- <div>
                    <h2>{{ state}} igig</h2>
                </div> -->
                    <Link href="/wp-admin/product/create" class="insert_model">Add a Model</Link>
                             <!-- Search Input -->
 <div class="c-search">
      <div class="searchsection">
        <div class="searchbar">
          <span class="searchbar_icon">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="21"
              height="21"
              viewBox="0 0 21 21"
              fill="none"
            >
              <path
                d="M18.4936 18.4448L14.865 14.8161M14.865 14.8161C15.4857 14.1955 15.978 13.4586 16.314 12.6476C16.6499 11.8366 16.8228 10.9674 16.8228 10.0896C16.8228 9.21181 16.6499 8.34261 16.314 7.53162C15.978 6.72064 15.4857 5.98377 14.865 5.36307C14.2443 4.74237 13.5074 4.25001 12.6964 3.91409C11.8854 3.57817 11.0162 3.40527 10.1384 3.40527C9.26064 3.40527 8.39143 3.57817 7.58045 3.91409C6.76947 4.25001 6.0326 4.74237 5.4119 5.36307C4.15834 6.61663 3.4541 8.31681 3.4541 10.0896C3.4541 11.8624 4.15834 13.5626 5.4119 14.8161C6.66545 16.0697 8.36564 16.7739 10.1384 16.7739C11.9112 16.7739 13.6114 16.0697 14.865 14.8161Z"
                stroke="#667085"
                stroke-width="1.50394"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </span>
          <input
            type="text"
            class="searchbar__input"
            v-model="search"
            placeholder=" Search for  models, collections, catalogs, or materials"
          />
        </div>
      </div>
      <!-- <Link href="/wp-admin/product" :data="{ search }" preserve-state  class="btn btn-primary py-3 px-5 me-3 animated fadeIn search-btn">Search</Link> -->

    </div>
      <!-- table -->
      <div class="s-1">
        <div class="m-1">
          <table class="gfg">
            <thead>
              <tr class="head_product" >
                <th class="head_product">Logo</th>
                <th class="head_product">Name</th>
                <th class="head_product">Category</th>
                <th class="head_product">Subcategory</th>
                <th class="head_product">state</th>
                <th class="head_product">File Size</th>

                <th class="head_product">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(item, index) in products.data" :key="index" class="item-product">
                <td class="body_product">
                  <div class="n-1">

                    <img v-if="item.logo"
                                                class="n1-2"
                                                :src="'/storage/'+item.logo"
                                                alt="logo"
                                        />
                                        <img v-else
                                                class="n1-2"
                                                src="../../../../../public/assets/img/back3.png"
                                                alt="logo"
                                        />

                  </div>
                </td>
                <td class="body_product"> <span class="n1-2">{{ item.title }}</span></td>
                <td class="body_product">{{ item.categories['name'] }}</td>
                <td class="body_product">
                    {{ item.categories['sub_categorie']}}
                </td>
                <td class="sp body_product">{{ item.state}}</td>

                <td class="sp body_product">{{ item.file_size }}</td>
                <td class="body_product">
                  <button class="chat"  @click.prevent="show_product(item.id)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
  <path d="M3 11.9999C3 11.9999 6.27273 5.49994 12 5.49994C17.7273 5.49994 21 11.9999 21 11.9999C21 11.9999 17.7273 18.4999 12 18.4999C6.27273 18.4999 3 11.9999 3 11.9999Z" stroke="#98A9BC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M12 14.4999C13.1046 14.4999 14 13.3807 14 11.9999C14 10.6192 13.1046 9.49994 12 9.49994C10.8954 9.49994 10 10.6192 10 11.9999C10 13.3807 10.8954 14.4999 12 14.4999Z" stroke="#98A9BC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                  </button>
                  <button class="chat" @click.prevent="edit_product(item.id)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
  <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#98A9BC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                  </button>

                  <button class="chat" @click.prevent="delete_product(item.id)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
  <path d="M3 6.00006H5H21" stroke="#98A9BC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M8 6.00006V4.00006C8 3.46963 8.21071 2.96092 8.58579 2.58585C8.96086 2.21077 9.46957 2.00006 10 2.00006H14C14.5304 2.00006 15.0391 2.21077 15.4142 2.58585C15.7893 2.96092 16 3.46963 16 4.00006V6.00006M19 6.00006V20.0001C19 20.5305 18.7893 21.0392 18.4142 21.4143C18.0391 21.7893 17.5304 22.0001 17 22.0001H7C6.46957 22.0001 5.96086 21.7893 5.58579 21.4143C5.21071 21.0392 5 20.5305 5 20.0001V6.00006H19Z" stroke="#98A9BC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>



</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    <pagination class="mt-6" :links="products.links" />


                        </div>
                    </div>








</AdminLayout>
</template>
<script>

import AdminLayout from '@/Layouts/AdminLayout.vue';
import { router } from '@inertiajs/vue3'
import pagination from '@/Components/pagination.vue';

export default{
    components:{
    AdminLayout,
    pagination

},
created(){
    console.log(this.products);

},
    props:{
        products:Object,state:Object
    },
    data(){
      return{
        search: "",
        exampleItems:[1,2,3,4,5],
        pageOfItems: [],


      }
    },

methods: {
  delete_product(id){
    console.log(id);
     router.delete(`product/${id}`);
  },
  edit_product(id){
    router.get(`/wp-admin/product/${id}/edit`);
  },show_product(id){
    router.get(`/wp-admin/product/${id}`);

  },
  close(){
            router.get('product');
        }
},
computed: {
    getdata(){
        console.log(this.products);

    }
},

}
</script>


