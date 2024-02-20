<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button class="btn btn-primary">
                            <Link href="/category-create" style="color: white">Add Category</Link>
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
                            <h3 class="card-title">Category</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="category in categories" :key="category.id">
                                    <td>{{ category.id }}</td>
                                    <td>{{ category.name }}</td>
                                    <td>{{ category.status==1? 'Active' : 'Inactive'}}</td>
                                    <td>
                                        <Link class="btn btn-primary btn-sm mr-1" :href="`/category/${category.id}/edit`">Edit</Link>
                                        <Link class="btn btn-danger btn-sm" @click="destroy(`${category.id}`)">Delete</Link>
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
        categories:Object
    },
    methods:{
        destroy(id){
            if(confirm('Are you sure to delete?')){
                this.$inertia.post(`/category/${id}/delete`)
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
