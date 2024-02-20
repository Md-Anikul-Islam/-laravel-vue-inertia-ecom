<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category Edit</li>
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
                            <h3 class="card-title">Category Edit</h3>
                        </div>
                        <form @submit.prevent="update" accept="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="form.name" placeholder="Enter Name">

                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Status</label>
                                    <select v-model="form.status" class="custom-select rounded-0" id="exampleSelectRounded0">
                                        <option :value="1" :selected="form.status === 1">Active</option>
                                        <option :value="0" :selected="form.status === 0">Inactive</option>
                                    </select>
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
import AdminLayout from "@/AdminBase/AdminLayout.vue";

export default {
    name: "Edit",
    layout: AdminLayout,
    props: {
        error: Object,
        category: Object
    },


    data() {
        return {
            form: this.$inertia.form({
                name: this.category.name ?? '',
                status: this.category.status ?? 0,
            })

        }
    },

    methods:{
        update() {
            this.form.post(`/category/${this.category.id}/update`)
        }
    }
}
</script>

<style scoped>

</style>
