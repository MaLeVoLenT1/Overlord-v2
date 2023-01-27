<template>
    <div class="landing-container">
        <div class="logo">
            <img class="logo-tribal" :src="determineIMAGE_PATH + 'tribal_m.png'" alt="">
            <img class="logo-text" :src="determineIMAGE_PATH + 'Overlord_m.png'" alt="overlord">
            <div class="landing-links">
                <a href="home">Home</a>
                <a href="hub">Hub</a>
                <a href="crypto">Crypto</a>
                <a href="login">Log-In</a>
                <a href="games">Gaming</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    components: {},
    name: "welcome",
    data(){
        return {
            location: window.vDashboard.location,
            user: window.vDashboard.user,
            requests: window.vDashboard.requests,
        }
    },
    computed:{
        determineIMAGE_PATH(){
            switch (this.requests.env["app_env"]) {
                case'local': default: return "/overlord-v2/public/images/logos/overlord/";

            }
        }
    }

}
</script>

