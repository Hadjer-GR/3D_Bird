


<template>

    <div class="container-xxl bg-white p-0 container-layout">

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
                        <!-- <Link :href="route('wp-admin.dashboard')"    :class="{'active':$page.url==='/wp-admin/dashboard'}" class=" nav-item nav-link">Home</Link> -->
                        <Link :href="route('product.index')"  :class="{'active': $page.url.startsWith('/wp-admin/product')}"  class="nav-item nav-link">Models</Link>
                         <Link :href="route('blogs.index')"  :class="{'active': $page.url.startsWith('/wp-admin/blogs')}"  class="nav-item nav-link">Tutorials</Link>
                        <Link  method="post" :href="route('logout')"   class="nav-item nav-link btn btn-primary" style="color:#fff !important;">Logout</Link>

                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->
<!-- <div v-if=" number==1">{{ open() }} {{ show }}</div>
<div v-if="$page.props.flush.message && show" style="position: absolute; top: 10.5%; background-color: #d22021; color: white; padding: 15px 10px ; width: auto; border-radius: 10px; text-align: center; font-size: 1em;font-weight: 600;   z-index: 60; margin-left: auto; margin-right: auto;"  >
{{ $page.props.flush.message}}
 {{ close() }}
</div> -->




    <!-- <div  class="alert alert-success" id="flush">
       {{ $page.props.flush.message}}
            message <br>
            <button @click.prevent="close()">x</button>
    </div> -->

    <slot ></slot>





</div>
</template>



<script >

export default{
    methods: {

    },
}
</script>
