<template>
    <div>
        <Welcome v-if="location.main === 'welcome'"></Welcome>
        <Login v-if="location.main === 'login'"></Login>
        <Register v-if="location.main === 'register'"></Register>
        <Home v-if="location.main === 'home'"></Home>
    </div>
</template>

<script>
    import Welcome from "../Pages/Welcome.vue";
    import Login from "../Pages/Login.vue";
    import Register from "../Pages/Register.vue";
    import Home from "../Pages/Home.vue";
    export default {
        components: {
            Welcome,
            Login,
            Register,
            Home
        },
        name: "publicPages",
        data() {
            return {
                location: {main: null, sub: null, target: null, host: null, uri: null},
                user: ((typeof overlord.Dashboard !== 'undefined') ? overlord.Dashboard['user'] : null),
                section: ((typeof overlord.Dashboard !== 'undefined') ? overlord.Dashboard['section'] :  null),
                requests: ((typeof overlord.Dashboard !== 'undefined') ? overlord.Dashboard['request'] :  null),
            }
        },
        created(){
            let self = this;

            if (typeof overlord.Dashboard !== 'undefined') {

                const page = overlord.Dashboard['page'];
                self.location.main = page.main;
                self.location.sub = page.sub;
                self.location.target = page.target;
                self.location.host = page.host;
                self.location.uri = page.uri;
                console.log("Public Pages Loaded.");
            }
            else{
                console.log("Public Pages Failed to Load.");
            }

        }
    }
</script>

<style scoped>

</style>
