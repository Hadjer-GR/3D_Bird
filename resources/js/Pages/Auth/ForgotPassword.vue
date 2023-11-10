<template>
    <section class="vh-100">
      <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-5">
            <img
              src="../../../../public/assets/img/back3.png"
              class="img-fluid"
              alt="Sample image"
            />
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form @submit.prevent="submit()">
                <div
                class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start"
              >
                <p
                  class="lead fw-normal mb-0 me-3"
                  style="
                    text-align: center;
                    font-size: 1.2em !important;
                    font-weight: 600;
                  "
                >
                Forgot your password? No problem. Just let us know your email address and we will email you a password reset
            link that will allow you to choose a new one.
            </p>
              </div>
                <div class="mb-4 text-sm text-gray-600">

        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

              <div class="divider d-flex align-items-center my-4">
                <!-- <p class="text-center fw-bold mx-3 mb-0">Or</p> -->
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
               
                <input
                  type="email"
                  id="form3Example3"
                  class="form-control form-control-lg"
                  placeholder="Enter a valid email address"
                  v-model.lazy.trim="form.email" required
                />
              </div>

              <InputError class="mt-2" :message="form.errors.email" />


              <div class="text-center text-lg-start mt-4 pt-2">
                <button
                  type="submit"
                  :disabled="form.processing"
                  class="btn btn-primary btn-lg"
                  style="padding-left: 2.5rem; padding-right: 2.5rem"
                >
                Email Password Reset Link
                </button>

              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </template>


  <script>
import { useForm ,Link} from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';


  export default {
    props:{status:String},
    components:{
        Link,
        InputError
    },
    data(){
        return{
        form :useForm ({
          email: '',

        }),
        }

    },
    methods: {
    submit(){
    this.form.post(route('password.email'), {
    });
}
    },


  }
  </script>

  <style scoped>
  .vh-100,.row>* {
    background-color: #fff !important;
  }
  .btn-lg {
    background-color: #00B98E !important;
    border: none !important;
    transition: all 0.2s;
  }
  .btn-lg:hover {
    transform: scale(1.1);
  }
  #form2Example3:checked {
    background-color: #00b98ec4!important;
    border: none !important;
  }
  .divider:after,
  .divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
  }
  .h-custom {
    height: calc(100% - 73px);
  }
  @media (max-width: 450px) {
    .h-custom {
      height: 100%;
    }
  }
  </style>
