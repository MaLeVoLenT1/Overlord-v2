<template>

</template>

<script>
import PageHud from "./PageHud";
import SideHud from "./SideHud";
export default {
    components: {
        'page-hud': PageHud,
        'side-hud': SideHud,
    },
    name: "PageContainer",
    props:{
        'data_top':{"default": false},
        'data_bottom':{"default": false},
        'background-color':{"default": 'primary'},
        'container-style':{"default":"normal"},
        'has-menu':{"default": false},
        'is-calculator':{"default":true},
    },
    data(){
        return{
            location: window.vDashboard.location,
            user: window.vDashboard.user,
            requests: window.vDashboard.requests,
            sideMenuStuck: false,
            pageMenuStuck: false,
        }
    },
}
</script>

<style scoped>

</style>
