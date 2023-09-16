<template>
    <layout>
        <link rel="stylesheet" href="css/layout/layout.css" />

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
                            <img class="img-fluid" src="../assets/img/general_1.png" alt="" />
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
                                v-for="(card, index) in cards"
                                :key="index">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href=""
                                            ><img class="img-fluid" src="../assets/img/property-1.jpg" alt=""
                                        /></a>
                                        <div
                                            class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            gigi
                                        </div>
                                        <div
                                            class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                            gigi
                                        </div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">8000MB</h5>
                                        <a class="d-block h5 mb-2" href="">gigi</a>
                                        <br />
                                        <!-- <p><i class="fa fa-map-marker-alt text-primary me-2"></i>Hadjer Ghrab</p> -->
                                    </div>
                                    <div class="d-flex border-top"  @click.prevent="show_sub($event)">
                                        <a href="#" target="_blank" class="flex-fill text-center py-2"
                                            ><i class="fa fa-download text-primary me-2"></i>Download</a
                                        >
                                    </div>
                                    <div class="d-su-m">
                                        <div class="d-flex d-item  border-top">
                                            <a href="#" target="_blank" class="flex-fill text-center py-2"
                                                >Sketshup 2015</a
                                            >
                                        </div>
                                        <div class="d-flex d-item  border-top">
                                            <a href="#" target="_blank" class="flex-fill text-center py-2">3ds </a>
                                        </div>
                                        <div class="d-flex d-item border-top">
                                            <a href="#" target="_blank" class="flex-fill text-center py-2">Collada</a>
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
import layout from '../components/layout/Main-layout.vue';
export default {
    components: {
        layout,
    },
    data() {
        return {
            cards: [1,2,3,4,5,6,7,8],
           
        };
    },methods:{
      show_sub:function(event){
     var element= event.target.parentElement.parentElement.querySelector('.d-su-m');
     console.log(event.target.parentElement.parentElement);
     if(element){
      element.classList.toggle('show_sub');
     }

      }
    }
};
</script>

<style>
.c-general-1 {
    padding-top: 5rem !important;
    margin-bottom: 20px !important;
}
.c-search {
    position: relative;
}
.search-btn {
    position: absolute;
    right: -18px !important;
    bottom: -2% !important;
    border-radius: 20px !important;
    font-weight: 600;
    font-size: 0.9em !important;
    transform: all 0.2s;
}
.search-btn:hover {
    transform: scale(1.1);
}
/* design search section  */

.searchsection {
    position: relative;
    height: 55px;
    margin-top: 2%;
    width: 100%;
    margin-left: auto;
    margin-right: auto;
    border-radius: 20px;
    border: 1px solid rgba(0, 0, 0, 0.15);
    background: #fff;
    background: #fff;
    box-shadow: 2px 2px 5px 1px rgba(0, 0, 0, 0.15);
    padding: 5px 10px;
}

.searchbar {
    width: 100%;
    position: relative;
    display: flex;
    flex-direction: row;
    align-items: center;

    padding: 10px 10px;
    gap: 11px;
}
.c-1-1 {
    padding: 14px !important;
}
.searchbar__input {
    all: unset;
}
.searchbar__input {
    position: relative;
    color: #0e2e50;
    background: #ffff;
    font-family: Inter;
    font-size: 1.1em;
    font-style: normal;
    font-weight: 500;
    line-height: 19.925px;
    flex-basis: 98%;
}

.searchbar_icon {
    width: 25px;
    height: 25px;
    cursor: pointer;
}
.d-show {
    display: block !important;
    visibility: visible !important;
}
@media (min-width: 992px) {
    .col-lg-4-m {
        width: 24.33333% !important;
    }
}
.d-su-m{
  position: relative;
  height: 0px;
  /* border: 1px solid red; */
  width: 100%;
  border-radius: 10px;
  margin-left: auto;
  margin-right: auto;
  transition: all 0.2s;
}
.d-item a{
  color: #0e2e50 !important;
}
.d-item a:hover{
  color: var(--primary) !important;
}
.show_sub{
  height: 130px !important;

  /* -webkit-transition:height 1s; */

}
.btn-more{
  font-size: 1.2em !important;
  font-weight: 600 !important;
  transition: all 0.2s;
}
.btn-more:hover{
  transform: scale(1.05);
}
</style>
