<template>
    <head>
        <title>B2B</title>
    </head>
    <body>
        <div>
            <HomeNavbar :user="user" />
            <slot/>
            <HomeFooter/>
        </div>
    </body>
</template>

<script>


import HomeNavbar from "@/FrontendBase/HomeNavbar.vue";
import HomeFooter from "@/FrontendBase/HomeFooter.vue";

export default {
    name: "HomeLayout",
    components: {HomeFooter, HomeNavbar},
    props:{
        user: Object,
    }

}
</script>

<style scoped>

</style>
