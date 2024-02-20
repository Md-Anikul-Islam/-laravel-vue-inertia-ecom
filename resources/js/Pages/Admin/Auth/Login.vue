<template>
    <div class="container">
        <div class="wrapper d-flex align-items-center justify-content-center h-100">
            <div class="card login-form">
                <div class="card-body">
                    <h5 class="card-title text-center login_title">Login Form</h5>
                    <form @submit.prevent="login">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" v-model="form.email" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" v-model="form.password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data(){
        return{
            form:this.$inertia.form({
                email:null,
                password:null,
            })
        }
    },
    methods:{
        login(){
            this.form.post("/admin-login");
        }
    },
}
</script>

<style scoped>
html, body, .container{
    height: 100vh;
}
.login_title {
    display: flex;
    width: 100%;
    justify-content: center;
    margin-bottom: 30px;
}
.login-form {
    width: 350px;
    padding: 2rem 1rem 1rem;
}

form {
    padding: 1rem;
}
</style>
