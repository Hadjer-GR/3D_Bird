<template>
    <Head>
        <title>3d Models</title>
        <!-- <meta name="keywords" content="....."> -->
    </Head>

    <link rel="stylesheet" href="../../css/layout/generalLayout.css" />
    <link rel="stylesheet" href="../../css/general/general.css" />
    <link rel="stylesheet" href="../../css/admin/product/ProductList.css" />

    <AdminLayout>
        <div class="container_create">
            <div class="display_p">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 d-show">
                        <div class="row g-4">
                            <div
                                class="col-md-6 wow fadeInUp d-show card_p"
                               >
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a
                                            ><img v-if="url_img!='empty'"
                                                class="img-fluid" style="min-height: 200px;"
                                                :src="url_img "
                                                alt=""
                                        />
                                        <img v-else  style="min-height: 200px;"
                                                class="img-fluid"
                                                src="../../../../../public/assets/img/property-1.jpg"
                                                alt=""
                                        />
                                      </a>
                                        <div
                                            class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            {{ categ }}
                                        </div>
                                        <div
                                            class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">

                                           {{Subcategorie2}}
                                        </div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">{{ file_size }}</h5>
                                        <a class="d-block h5 mb-2" href="">{{ name }}</a>
                                        <br />
                                        <!-- <p><i class="fa fa-map-marker-alt text-primary me-2"></i>Hadjer Ghrab</p> -->
                                    </div>
                                    <div class="d-flex border-top" @click.prevent="show_sub($event)">
                                        <a href="#" target="_blank" class="flex-fill text-center py-2"
                                            ><i class="fa fa-download text-primary me-2"></i>Download</a
                                        >
                                    </div>
                                    <div class="d-su-m">
                                        <div class="d-flex d-item border-top" v-if="link_sketshup.length!=0">
                                            <a  @click.prevent="downloadFile(link_sketshup)" target="_blank" class="flex-fill text-center py-2"
                                                >Sketshup 2015</a
                                            >
                                        </div>
                                        <div class="d-flex d-item border-top" v-if="link_3ds.length!=0">
                                            <a href="#" target="_blank" class="flex-fill text-center py-2">3ds </a>
                                        </div>
                                        <div class="d-flex d-item border-top" v-if="link_collada.length!=0">
                                            <a href="#" target="_blank" class="flex-fill text-center py-2">Collada</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-xxl bg-white p-0 create_p">
                <form class="row" @submit.prevent="submit_product()">
                    <div class="">
                        <div class="form-group col-md-6">
                            <label for="inputName4">Name</label>
                            <input v-model="name" type="text" class="form-control" id="inputName4" placeholder="name" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">tags</label>
                            <input v-model="tags" type="text" class="form-control" id="inputPassword4" placeholder="tags" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress"> Download link sketshup</label>
                        <input v-model="link_sketshup" type="text" class="form-control" id="inputAddress" placeholder="sketshup" />
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2"> Download link 3ds</label>
                        <input v-model="link_3ds"
                            type="text"
                            class="form-control"
                            id="inputAddress2"
                            placeholder=" 3ds "/>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Download link collada</label>
                        <input v-model="link_collada"
                            type="text"
                            class="form-control"
                            id="inputAddress2"
                            placeholder="collada" />
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Download link lumion</label>
                        <input v-model="link_lumion"
                            type="text"
                            class="form-control"
                            id="inputAddress2"
                            placeholder="lumion" />
                    </div>
                    <div class="form-row">

                     <div class="row mt-2">
                      <div class="form-group col-md-4">
                            <label for="inputState">Category</label>
                            <select id="inputState" class="form-control" v-model="categ">
                                <option v-for="item in loadCategories" >{{ item.name }}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Sub Categorie</label>
                            <select id="inputState" class="form-control" v-model="subcateg">
                                <option :value="sub_cat.id" v-for="sub_cat in filteredItems">{{ sub_cat.sub_categorie }}</option>
                            </select>
                        </div>
                     </div>
                        <div class="form-group col-md-4 mt-1">
                            <label for="inputState">State</label>
                            <select id="inputState" class="form-control">
                                <option selected>private page</option>
                                <option>public page</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">File Size</label>
                            <input v-model="file_size" type="text" class="form-control" id="inputZip" />
                        </div>
                        <div class="form-group  mt-2 mb-2">
    <label for="exampleFormControlFile1 mr-1">Logo   </label>

    <input type="file" class="form-control-file" id="exampleFormControlFile1"  @change="handleFileChange">
  </div>

                    </div>

                    <button type="submit" class="btn btn-primary" >Save</button>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { router } from '@inertiajs/vue3';
import { reactive } from 'vue';
// import mega from 'megajs'
import { File } from 'https://cdn.skypack.dev/megajs@1'



export default {
    props:{
        loadCategories:Object,subCategories:Object
    },
    components: {
        AdminLayout,
    },
    data() {
        return {
            name:"",
            tags:"",
            file_size:"",
            link_sketshup:"",
            link_collada:"",
            link_3ds:"",
            link_lumion:"",
            sub:this.subCategories,
            url_img:"empty",
            categ:"",
            subcateg:"",
            selectedFile:Object,
            cat_id:0
        };
    },
    methods: {
        show_sub: function (event) {
            var element = event.target.parentElement.parentElement.querySelector('.d-su-m');
            console.log(event.target.parentElement.parentElement);
            if (element) {
                element.classList.toggle('show_sub');
            }
        },
        handleFileChange: function (event) {
      this.selectedFile = event.target.files[0];
      this.url_img = URL.createObjectURL(this.selectedFile);
      console.log(this.loadCategories);

    },
     submit_product(){
     const form = reactive({
         name:this.name,
            tags:this.tags,
            file_size:this.file_size,
            link_sketshup:this.link_sketshup,
            link_collada:this.link_3ds,
            link_lumion:this.link_lumion,
            link_3ds:this.link_collada,
            img:this.selectedFile,
            cat_id:this.subcateg
     })

     router.post('product/store', form);
}, downloadFile(url){
 try{
  fetch(url)
  .then(res => {
    if (res.status != 200) { console.log("Bad server response"); }
    return res.blob();
  })
// .then(res => res.blob())
.then(data => {

    const  link =document.createElement("a");
  link.href=URL.createObjectURL(data);
  link.download=new Date().getTime();
  link.click();

})
.catch(error => console.log('error', error));






 }catch(err){
console.log(err);
 }
}

    },
    computed: {
    filteredItems() {
        if(this.categ.length!=0){
            const arry= this.subCategories.filter((item) => {
          return item.name.toLowerCase().indexOf(this.categ.toLowerCase()) > -1;

      });
      return arry;
        }else{
            this.subcateg=" ";
        }
    },
    Subcategorie2(){
        if(this.subcateg!=0){

      return   this.subCategories.filter((item) => {
          return item.id==this.subcateg
      })[0].sub_categorie
    }
}
  }

};
</script>
<style>
.create_p {
    flex-basis: 60%;
    /* z-index: 200 !important; */
    /* margin-right: 100px; */
}
.display_p {
    flex-basis: 30%;
    /* border: 1px solid red; */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-content: center;
    align-items: center;
}

.card_p {
    min-width: 300px;
}
.container_create {
    position: relative;
    display: flex;
    flex-direction: row-reverse;
    width: 95%;
    height: auto;
    /* margin-top: 20px; */
}
.btn-primary{
  transition: all 0.2s;
}
.btn-primary:hover{
  transform: scale(1.02);
}
@media only screen and (max-width: 1160px) {
    .container_create {
        flex-direction: column !important;
    }
}
/* @media (max-width: 1060px) {
  .col-lg-4-m {
    width: 24.33333% !important;
  }
} */
</style>
