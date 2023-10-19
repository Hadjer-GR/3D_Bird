<template>
    <Head>
        <title>3d Models</title>
        <!-- <meta name="keywords" content="....."> -->
    </Head>

    <link rel="stylesheet" href="../../css/layout/generalLayout.css" />
    <link rel="stylesheet" href="../../css/general/general.css" />
    <link rel="stylesheet" href="../../css/admin/product/ProductList.css" />
    <link rel="stylesheet" href="../../css/loading-bar.css" />
    <link rel="stylesheet" href="../../css/admin/product/create.css" />


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
                                                class="img-fluid img-fluid-p" style="min-height: 200px;"
                                                :src="url_img "
                                                alt=""
                                        />
                                        <img v-else  style="min-height: 200px;"
                                                class="img-fluid img-fluid-p"
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
                                        <h5 class="text-primary mb-3">{{ form.file_size }}</h5>
                                        <a class="d-block h5 mb-2" href="">{{ form.title }}</a>
                                        <br />
                                        <!-- <p><i class="fa fa-map-marker-alt text-primary me-2"></i>Hadjer Ghrab</p> -->
                                    </div>
                                    <div class="d-flex border-top" @click.prevent="show_sub($event)">
                                        <a href="#" target="_blank" class="flex-fill text-center py-2"
                                            ><i class="fa fa-download text-primary me-2"></i>Download</a
                                        >
                                    </div>
                                    <div class="d-su-m">
                                        <div class="d-flex d-item border-top" v-if="form.link_sketshup.length!=0">
                                            <a :href="form.link_sketshup"  target="_blank" class="flex-fill text-center py-2"
                                                >Sketshup 2015</a>



                                        </div>
                                        <div class="d-flex d-item border-top" v-if="form.link_3ds.length!=0">
                                            <a :href="form.link_3ds" target="_blank" class="flex-fill text-center py-2">3ds </a>
                                        </div>
                                        <div class="d-flex d-item border-top" v-if="form.link_collada.length!=0">
                                            <a :href="form.link_collada" target="_blank" class="flex-fill text-center py-2">Collada</a>
                                        </div>
                                        <div class="d-flex d-item border-top" v-if="form.link_lumion.length!=0">
                                            <a :href="form.link_lumion" target="_blank" class="flex-fill text-center py-2">Collada</a>
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
                            <input v-model="form.title" required type="text" class="form-control" id="inputName4" placeholder="name" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">tags</label>
                            <input v-model="form.tags" required type="text" class="form-control" id="inputPassword4" placeholder="tags" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress"> Download link sketshup</label>
                        <input v-model="form.link_sketshup" type="text" class="form-control" id="inputAddress" placeholder="sketshup" />
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2"> Download link 3ds</label>
                        <input v-model="form.link_3ds"
                            type="text"
                            class="form-control"
                            id="inputAddress2"
                            placeholder=" 3ds "/>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Download link collada</label>
                        <input v-model="form.link_collada"
                            type="text"
                            class="form-control"
                            id="inputAddress2"
                            placeholder="collada" />
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Download link lumion</label>
                        <input v-model="form.link_lumion"
                            type="text"
                            class="form-control"
                            id="inputAddress2"
                            placeholder="lumion" />
                    </div>
                    <div class="form-row">

                     <div class="row mt-2">
                      <div class="form-group col-md-4">
                            <label for="inputState">Category</label>
                            <select required id="inputState" class="form-control" v-model="categ">
                                <option v-for="item in loadCategories" >{{ item.name }}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Sub Categorie</label>
                            <select required id="inputState" class="form-control" v-model="form.cat_id">
                                <option :value="sub_cat.id" v-for="sub_cat in filteredItems">{{ sub_cat.sub_categorie }}</option>
                            </select>
                        </div>
                     </div>
                        <div class="form-group col-md-4 mt-1">
                            <label for="inputState">State</label>
                            <select required id="inputState" v-model="form.state" class="form-control">
                                <option selected>private page</option>
                                <option>public page</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">File Size</label>
                            <input required v-model="form.file_size" type="text" class="form-control" id="inputZip" />
                        </div>
                        <div class="form-group  mt-2 mb-2">
    <label for="exampleFormControlFile1 mr-1">Logo   </label>

    <input type="file" class="form-control-file" required id="exampleFormControlFile1" @input="form.img=$event.target.files[0]"  @change="handleFileChange">
  </div>

                    </div>
                   <div > <p v-if="Object.values(errors).length!=0" style="color:red;">You must fill at least one of the following fields: link SketchUp, link Collada, link 3DS, or link Lumion</p></div>
                    <button type="submit" class="btn btn-primary" >Save</button>
                </form>
            </div>
        </div>

    </AdminLayout>
    <!-- <script type="text/javascript" src="../../js/loading-bar.js"></script> -->

</template>


<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { router ,useForm} from '@inertiajs/vue3';







export default {
    props:{
        loadCategories:Object,subCategories:Object,errors:Object
    },
    components: {
        AdminLayout,
    },
    data() {
        return {
            form:useForm({
            title:"",
            tags:"",
            state:"",
            file_size:"",
            link_sketshup:"",
            link_collada:"",
            link_lumion:"",
            link_3ds:"",
            img:null,
            cat_id:null
     }),

            sub:this.subCategories,
            url_img:"empty",
            categ:"",
            subcateg:"",
            selectedFile:null,
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
      console.log(this.selectedFile);


    },
     submit_product(){
        this.form.post('/wp-admin/product',{
            forceFormData:true
        });
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
        if(this.form.cat_id!=null){

      return   this.subCategories.filter((item) => {
          return item.id==this.form.cat_id
      })[0].sub_categorie
    }
}
  }

};
</script>

