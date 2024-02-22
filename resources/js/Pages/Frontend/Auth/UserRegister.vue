<template>
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class=" pr-3">User Registration</span></h5>
                <div class="bg-light p-30 mb-5">
                    <form @submit.prevent="submit" accept="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Name</label>
                                <input class="form-control" type="text"  v-model="form.name" placeholder="Name">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text"  v-model="form.email" placeholder="example@email.com">
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" type="text"  v-model="form.phone" placeholder="Phone Number">
                            </div>

                            <div class="col-md-12 form-group">
                                <label>Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" accept="image/" @input="form.image = $event.target.files[0]" class="custom-file-input">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <label>Address</label>
                                <textarea class="form-control" v-model="form.address" rows="3" placeholder="Enter the Address"></textarea>
                            </div>


                            <div class="col-md-12 form-group">
                                <label>Password</label>
                                <input class="form-control" type="password"  v-model="form.password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">Registration</button>
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
    name: "UserRegister",
    layout: HomeLayout,
    data(){
        return{
            form:this.$inertia.form({
                name:null,
                email:null,
                phone:null,
                address:null,
                image:null,
                password:null,
            })
        }
    },
    methods:{
        submit(){
            this.form.post("/user-register-store");
        }
    },
}
</script>

<style scoped>

</style>
