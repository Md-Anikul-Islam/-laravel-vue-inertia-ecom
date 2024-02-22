<template>
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class=" pr-3">User Login</span></h5>
                <div class="bg-light p-30 mb-5">
                    <form @submit.prevent="login">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" v-model="form.email" placeholder="example@email.com">
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" v-model="form.password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">Login</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</template>

<script>
import HomeLayout from "@/FrontendBase/HomeLayout.vue";

export default {
    name: "UserLogin",
    layout: HomeLayout,
    data(){
        return{
            form:this.$inertia.form({
                email:null,
                password:null,
            })
        }
    },
    methods:{
        login(){
            this.form.post("/user-login-check");
        }
    },
}
</script>

<style scoped>

</style>
