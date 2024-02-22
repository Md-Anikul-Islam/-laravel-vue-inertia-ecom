<template>
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="pr-3">User Account</span></h5>
                <div class="bg-light p-30 mb-5">
                    User Data
                </div>

            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="pr-3">My Profile</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Name: {{user.name}}</h6>
                    </div>
                </div>
                <Link href="/user-logout" class="btn btn-block btn-primary font-weight-bold py-3">User Logout</Link>
            </div>
        </div>
    </div>
</template>

<script>
import HomeLayout from "@/FrontendBase/HomeLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "UserAccount",
    layout: HomeLayout,
    props:{
        user:Object,
    },
    components: {
        Link
    },
}
</script>

<style scoped>

</style>
