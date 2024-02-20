<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button class="btn btn-primary">
                            <Link href="/category-show" style="color: white">Back</Link>
                        </button>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Category Add</h3>
                        </div>
                        <form @submit.prevent="submit" accept="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="form.name" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import {Link} from "@inertiajs/vue3";
import AdminLayout from "@/AdminBase/AdminLayout.vue";

export default {
    name: "Create",
    layout: AdminLayout,
    data(){
        return{
            form:this.$inertia.form({
                name:null,
            })
        }
    },
    methods:{
        submit(){
            this.form.post("/category-store");
        }
    },
    components: {
        Link
    }
}
</script>

<style scoped>

</style>
