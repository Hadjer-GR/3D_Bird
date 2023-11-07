<template>
    <Head>
         <title>3d Bird</title>
         <!-- <meta name="keywords" content="....."> -->

        </Head>

    <link rel="stylesheet" href="../../css/layout/layout.css" />
        <link rel="stylesheet" href="../../css/general/general.css" />

    <layout>
        <!-- Header Start -->
        <div class="container-xxl c-general-1">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 c-1-1">
                    <h1 class="display-5 animated fadeIn mb-4">
                        Get your <span class="text-primary">Free 3D Models</span> and start making awesome designs now
                        !!
                    </h1>
                    <p class="animated fadeIn mb-4 pb-2">
                        Open source for the best 3D models ( Sketchup 2015 , collada , 3ds .. )
                    </p>
                    <!-- Search Input -->
                    <div class="c-search">
                        <div class="searchsection">
                            <div class="searchbar">
                                <input
                                    type="text"
                                    class="searchbar__input"
                                    v-model="search"
                                    placeholder="Search for products, models, collections, catalogs, or materials" />
                            </div>
                        </div>
                        <a href="" class="btn btn-primary py-3 px-5 me-3 animated fadeIn search-btn">Search</a>
                    </div>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="../../../public/assets/img/general_1.png" alt="" />
                            <p class="credit" style="text-align: right">Credit : Steve Guzmán</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->

        <!-- Property List Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h1 class="mb-3">3D Models list</h1>
                            <p>Sketchup 2015 , sketchup 2023 , 3ds max, collada....</p>
                        </div>
                    </div>

                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 d-show">
                        <div class="row g-4">
                            <div
                                class="col-lg-4 col-md-6 wow fadeInUp col-lg-4-m d-show"
                                v-for="(item, index) in products.data"
                                :key="index">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="">
                                            <img v-if="item.logo"
                                                class="n1-gen"
                                                :src="'/storage/'+item.logo"
                                                alt="logo"
                                        />
                                        <img v-else
                                                class="n1-gen"
                                                src="../../../public/assets/img/back3.png"
                                                alt="logo"
                                        />


                                    </a>
                                        <div
                                            class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            {{ item.categories['sub_categorie'] }}
                                        </div>
                                        <div
                                            class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                            {{ item.categories['name'] }}
                                        </div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">{{ item.file_size }}</h5>
                                        <a class="d-block h5 mb-2" href=""> {{ item.title }}</a>
                                        <br />
                                        <!-- <p><i class="fa fa-map-marker-alt text-primary me-2"></i>Hadjer Ghrab</p> -->
                                    </div>
                                    <div class="d-flex border-top" @click.prevent="show_sub($event)">
                                        <a href="#" target="_blank" class="flex-fill text-center py-2"
                                            ><i class="fa fa-download text-primary me-2"></i>Download</a
                                        >
                                    </div>
                                    <div class="d-su-m">
                                        <div class="d-flex d-item  border-top" v-if="item.link_sketshup">
                                            <a :href="item.link_sketshup" target="_blank" class="flex-fill text-center py-2"
                                                >Sketshup 2015</a
                                            >
                                        </div>
                                        <div class="d-flex d-item  border-top" v-if="item.link_3ds">
                                            <a :href="item.link_3ds" target="_blank" class="flex-fill text-center py-2">3ds </a>
                                        </div>
                                        <div class="d-flex d-item border-top" v-if="item.link_collada">
                                            <a :href="item.link_collada" target="_blank" class="flex-fill text-center py-2">Collada</a>
                                        </div>
                                        <div class="d-flex d-item border-top" v-if="item.link_lumion">
                                            <a :href="item.link_lumion" target="_blank" class="flex-fill text-center py-2">Lumion</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 text-center">
                                <a class="btn btn-primary py-3 px-5 btn-more" href="">More 3D Models</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Property List End -->
    </layout>
</template>
<script>
import layout from '@/Layouts/GeneralLayout.vue';
export default {
    props:{
        products:Object
    },
    components: {
        layout,
    },
    data() {
        return {


        };
    },methods:{
        show_sub: function (event) {
            var element = event.target.parentElement.parentElement.querySelector('.d-su-m');
            console.log(event.target.parentElement.parentElement);
            if (element) {
                element.classList.toggle('show_sub');
            }
        },
    }
};
</script>
<style>
.n1-gen{
    width: 368.41px !important;
    height: 291.237px !important;
    object-fit: fill;
    background-position: center;

}
</style>

