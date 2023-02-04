<template>
    <div>
        <Header v-if="location.main !== ''" :headerStyle="headerStyle" :headerColor="'dark'" @test="testCatch"></Header>
        <Welcome v-if="location.main === '' && location.uri === '/'"></Welcome>
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
