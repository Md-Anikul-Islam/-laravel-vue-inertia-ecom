<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product Edit</li>
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
                            <h3 class="card-title">Product Edit</h3>
                        </div>
                        <form @submit.prevent="update" accept="multipart/form-data">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Category</label>
                                    <select v-model="form.category_id" class="custom-select rounded-0" id="exampleSelectRounded0">
                                        <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Brand</label>
                                    <select v-model="form.brand_id" class="custom-select rounded-0" id="exampleSelectRounded0">
                                        <option v-for="brand in brands" :value="brand.id">{{ brand.name }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="form.name" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" accept="image/" @input="form.image = $event.target.files[0]" class="custom-file-input">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Qty</label>
                                    <input type="number" class="form-control" v-model="form.qty" placeholder="Enter Qty">
                                </div>


                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" class="form-control" v-model="form.price" placeholder="Enter Price">
                                </div>


                                <div class="form-group">
                                    <label>Sale Price</label>
                                    <input type="text" class="form-control" v-model="form.sale_price" placeholder="Enter Price">
                                </div>

                                <div class="form-group">
                                    <label> Details En</label>
                                    <textarea class="form-control" v-model="form.description" rows="5" placeholder="Enter the Description"></textarea>
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
        product: Object,
        categories: Object,
        brands: Object
    },
    data() {
        return {
            form: this.$inertia.form({
                category_id: this.product.category_id ?? '',
                brand_id: this.product.brand_id ?? '',
                name: this.product.name ?? '',
                qty: this.product.qty ?? '',
                price: this.product.price ?? '',
                sale_price: this.product.sale_price ?? '',
                description: this.product.description ?? '',
                image: null,
                status: this.product.status ?? 0,
            })

        }
    },
    methods:{
        update() {
            this.form.post(`/product/${this.product.id}/update`)
        }
    }
}
</script>

<style scoped>

</style>
