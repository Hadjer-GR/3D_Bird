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
                This is a secure area of the application. Please confirm your password before continuing.

                </p>
              </div>

              <div class="divider d-flex align-items-center my-4">
                <!-- <p class="text-center fw-bold mx-3 mb-0">Or</p> -->
              </div>



              <!-- Password input -->
              <div class="form-outline mb-3">
                <label class="form-label" for="form3Example4">Password</label>
                <input
                  type="password"
                  id="form3Example4"
                  class="form-control form-control-lg"
                  placeholder="Enter password"
                  v-model.lazy="form.password"
                  autocomplete="current-password"
                    autofocus
                  required
                />
                <InputError class="mt-2" :message="form.errors.password" />

              </div>



              <div class="text-center text-lg-start mt-4 pt-2">
                <button
                  type="submit"
                  :disabled="form.processing"
                  class="btn btn-primary btn-lg"
                  style="padding-left: 2.5rem; padding-right: 2.5rem"
                >
                Confirm
                </button>

              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </template>


  <script>
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';


  export default {
    props:{errors:Object,canResetPassword:Boolean},
    components:{
        InputError,
    },
    data(){
        return{
        form :useForm ({
          password: '',
        }),

        }

    },
    methods: {
    submit(){
    this.form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
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

