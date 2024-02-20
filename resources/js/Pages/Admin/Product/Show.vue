<template>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button class="btn btn-primary">
                            <Link href="/product-create" style="color: white">Add Product</Link>
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
                            <h3 class="card-title">Product</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="product in products" :key="product.id">
                                    <td>{{ product.id }}</td>
                                    <td>{{ product.category.name }}</td>
                                    <td>{{ product.brand.name }}</td>
                                    <td>{{ product.name }}</td>
                                    <td>
                                        <img :src="product.image" style="height: 50px;width: 50px;"/>
                                    </td>
                                    <td>{{ product.qty }}</td>
                                    <td>{{ product.price }}</td>
                                    <td>{{ product.status==1? 'Active' : 'Inactive'}}</td>
                                    <td>
                                        <Link class="btn btn-primary btn-sm mr-1" :href="`/product/${product.id}/edit`">Edit</Link>
                                        <Link class="btn btn-danger btn-sm" @click="destroy(`${product.id}`)">Delete</Link>
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
import AdminLayout from "@/AdminBase/AdminLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "Show",
    layout: AdminLayout,
    props:{
        products:Object
    },
    methods:{
        destroy(id){
            if(confirm('Are you sure to delete?')){
                this.$inertia.post(`/product/${id}/delete`)
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
