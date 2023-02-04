<template>
    <div>
        <Header v-if="location.main !== ''" :headerStyle="headerStyle" :headerColor="'dark'" @test="testCatch"/>
        <Welcome v-if="location.main === '' && location.uri === '/'"/>
        <Login v-if="location.main === 'login'"/>
        <Register v-if="location.main === 'register'"/>
        <Home v-if="location.main === 'home'"/>
        <Crypto v-if="location.main === 'crypto'"/>
        <News v-if="location.main === 'news'"/>
        <About v-if="location.main === 'about'"/>
        <Hub v-if="location.main === 'hub'"/>
        <Gaming v-if="location.main === 'gaming'"/>
        <Profile v-if="location.main === 'profile'"/>
    </div>
</template>

<script>
    import Header from "./header/overlordHeader.vue";
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
        components: {Header, Welcome, Login, Register, Home, Crypto, News, About, Hub, Gaming, Profile},
        name: "publicPages",
        props:{
            location:{'default': null},
            user:{'default': null},
            section:{'default': null},
            requests:{'default': null}
        },
        computed:{
            headerStyle:function(){
                switch(this.location.main){
                    case'home': return 'fixed';
                    default: return 'floating';
                }
            }
        },
        mounted(){

        },
        methods: {
            /**
             * Test Catch */
            testCatch(){
                // console.log(" Public Pages: Test Catch successful.");
                this.$emit('test');
            }
        }
    }
</script>

<style scoped>

</style>
