<template>
    <head>
        <title>B2B</title>
    </head>
    <body>
        <div>
            <HomeNavbar/>
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

}
</script>

<style scoped>

</style>
