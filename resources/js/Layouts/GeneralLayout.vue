<template>
     
    <div class="container-xxl bg-white p-0 container-layout">
        <!-- Spinner Start -->
        <div v-if="get" id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
      <!-- Navbar Start -->
      <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">3D Bird</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a   @click="scrollTo('home')" :class="{'active':active_page =='home'}" class=" nav-item nav-link">Home</a>
                        <a   @click="scrollTo('about')" :class="{'active':active_page =='about'}"  class="nav-item nav-link">About</a>
                        <Link :href="route('admin.login')"  class="nav-item nav-link">3D tips & tutorials</Link>

                        <a  @click="scrollTo('contact')"  :class="{'active':active_page =='contact'}"  class="nav-item nav-link">Contact</a>
                        <button  class="nav-item nav-link btn btn-primary" style="color:#fff !important;">3D models</button>

                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->


 <section ref="home" id="home">
    <slot ></slot>
 </section>


        <!-- About Start -->
        <section class="container-xxl py-5" ref="about" id="about">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn d-show" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="../../../public/assets/img/about.jpg">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn d-show" data-wow-delay="0.5s">
                        <h1 class="mb-4">#3D Bird is a free library for 3d models and 3d tips & tutorials </h1>
                        <p class="mb-4">It's the starting point of a new community for designers that will be developed in future versions of the wesite.
Stay turned for new features!!
</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Sketchup 2015 to 2023 models</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Interior and exterior design elements</p>
                        <p><i class="fa fa-check text-primary me-3"></i>100% free and with no registration</p>
                        <a class="btn btn-primary py-3 px-5 mt-3 btn-more" href="">Fly with 3D now!</a>
                    </div>
                </div>
            </div>
          </section>
        <!-- About End -->


<!-- Footer Start -->
        <section id="contact" ref="contact" class="container-fluid bg-dark text-white-50 footer  wow fadeIn footer-layout" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-md-6-m">
                        <h5 class="text-white mb-4 mb-m">Get In Touch</h5>
                        <p class="mb-2  mb-m"> &copy; 3D Bird, All Right Reserved</p>
                        <p class="mb-2  mb-m"><i class="fa fa-envelope me-3"></i>3Dbird.contact@gmail.com</p>

                    </div>

              <a class="mb-2  mb-m author" href="https://htmlcodex.com" target="_blank">Designed By HTML Codex</a>
                </div>
            </div>

        </section>
        <!-- Footer End -->

</div>
</template>

<script>
export default{
 data(){
  return{
   get:false,
   active_page:"home"
  }
},
methods: {
    scrollTo(sectionName) {
      const section = this.$refs[sectionName];
      if (section) {
        this.active_page=sectionName;
        section.scrollIntoView({ behavior: 'smooth' });
      }
    }

}
}
</script>
