<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Slider Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button class="btn btn-primary">
                            <Link href="/slider-show" style="color: white">Back</Link>
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
                            <h3 class="card-title">Slider Add</h3>
                        </div>
                        <form @submit.prevent="submit" accept="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" v-model="form.title" placeholder="Enter Title">
                                </div>
                                <div class="form-group">
                                    <label>Position</label>
                                    <input type="number" class="form-control" v-model="form.position" placeholder="Enter Position">
                                </div>
                                <div class="form-group">
                                    <label>File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" accept="image/" @input="form.image = $event.target.files[0]" class="custom-file-input">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Details</label>
                                    <textarea type="text" class="form-control" v-model="form.details" placeholder="Enter Details"></textarea>
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
import {Link} from "@inertiajs/vue3";
export default {
    name: "Create",
    layout: AdminLayout,
    data(){
        return{
            form:this.$inertia.form({
                title:null,
                position:null,
                details:null,
                image:null,
            })
        }
    },
    methods:{
        submit(){
            this.form.post("/slider-store");
        }
    },
    components: {
        Link
    }

}
</script>

<style scoped>

</style>
