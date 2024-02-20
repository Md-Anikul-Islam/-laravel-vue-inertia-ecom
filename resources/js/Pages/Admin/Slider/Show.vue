<template>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Slider List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button class="btn btn-primary">
                            <Link href="/slider-create" style="color: white">Add Slider</Link>
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
                            <h3 class="card-title">Slider</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Position</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="slider in sliders" :key="slider.id">
                                    <td>{{ slider.id }}</td>
                                    <td>{{ slider.title }}</td>
                                    <td>{{ slider.position }}</td>
                                    <td>
                                        <img :src="slider.image" style="height: 50px;width: 50px;"/>
                                    </td>
                                    <td>{{ slider.status==1? 'Active' : 'Inactive'}}</td>
                                    <td>
                                        <Link class="btn btn-primary btn-sm mr-1" :href="`/slider/${slider.id}/edit`">Edit</Link>
                                        <Link class="btn btn-danger btn-sm" @click="destroy(`${slider.id}`)">Delete</Link>
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
    layout:AdminLayout,
    props:{
        sliders:Object
    },
    methods:{
        destroy(id){
            if(confirm('Are you sure to delete?')){
                this.$inertia.post(`/slider/${id}/delete`)
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
