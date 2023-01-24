<template>
    <div>
        <Welcome v-if="location.main === 'welcome'"></Welcome>
        <Login v-if="location.main === 'login'"></Login>
        <Register v-if="location.main === 'register'"></Register>
        <Home v-if="location.main === 'home'"></Home>
        <Crypto v-if="location.main === 'crypto'"></Crypto>
        <News v-if="location.main === 'news'"></News>
        <About v-if="location.main === 'about'"></About>
        <Hub v-if="location.main === 'hub'"></Hub>
        <Gaming v-if="location.main === 'gaming'"></Gaming>
        <Profile v-if="location.main === 'profile'"></Profile>
    </div>
</template>

<script>
    import Welcome from "../Pages/Welcome.vue";
    import Login from "../Pages/Login.vue";
    import Register from "../Pages/Register.vue";
    import Home from "../Pages/Home.vue";
    import Crypto from "../Pages/Crypto.vue";
    import News from "../Pages/News.vue";
    import About from "../Pages/About.vue";
    import Hub from "../Pages/Hub.vue";
    import Gaming from "../Pages/Gaming.vue";
    import Profile from "../Pages/Profile.vue";

    export default {
        components: {Welcome, Login, Register, Home, Crypto, News, About, Hub, Gaming, Profile},
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
