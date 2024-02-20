<template>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Brand List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button class="btn btn-primary">
                            <Link href="/brand-create" style="color: white">Add Brand</Link>
                        </button>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Brand</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="brand in brands" :key="brand.id">
                                    <td>{{ brand.id }}</td>
                                    <td>{{ brand.name }}</td>
                                    <td>
                                        <img :src="brand.image" style="height: 50px;width: 50px;"/>
                                    </td>
                                    <td>{{ brand.status==1? 'Active' : 'Inactive'}}</td>
                                    <td>
                                        <Link class="btn btn-primary btn-sm mr-1" :href="`/brand/${brand.id}/edit`">Edit</Link>
                                        <Link class="btn btn-danger btn-sm" @click="destroy(`${brand.id}`)">Delete</Link>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
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
    name: "Show",
    layout:AdminLayout,
    props:{
        brands:Object
    },
    methods:{
        destroy(id){
            if(confirm('Are you sure to delete?')){
                this.$inertia.post(`/brand/${id}/delete`)
            }
        }
    },
    components: {
        Link
    },
}
</script>

<style scoped>

</style>
