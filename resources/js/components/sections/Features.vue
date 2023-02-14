<template>
    <page-container :location="location" :data_top="true" :data_bottom="true">
        <div class="row">
            <div class="m-bot-80 inline-block">
                <!--title-->
                <div class="heading-title-alt border-short-bottom text-center">
                    <h3 class="text-uppercase" style="color: rgba(19, 145, 148, 0.82) !important;">A Guild Wars 2 App</h3>
                    <div class="half-txt">All in one Guild Wars 2 Analytical tool & Community hub designed for the most organized and dedicated.</div>
                </div>
                <!--title-->
            </div>

            <div class="col-md-4">
                <div class="featured-item feature-border-box text-left OverLord-Features">
                    <div class="icon"  @mouseover="btnHover('guilds')" @mouseout="btnHover('guilds')">
                        <img :src="location.host + 'images/buttons/guilds-icon-2-' + guildsBtnImage + '.png'" style="position: relative; width: 100%"/>
                    </div>
                    <div class="title text-uppercase">
                        <h4 style="color: rgba(182, 253, 255, 0.82) !important; text-shadow: rgb(3, 3, 3) 2px 3px 1px; font-size: 20px;">Guilds</h4>
                    </div>
                    <div class="desc">
                        Robust guild management and community system that records and monitors your guild for you.
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="featured-item feature-border-box text-left OverLord-Features">
                    <div class="icon" @mouseover="btnHover('builds')" @mouseout="btnHover('builds')">
                        <img :src="location.host + 'images/buttons/builds-icon-2-' + buildsBtnImage + '.png'" style="position: relative; width: 100%"/>
                    </div>
                    <div class="title text-uppercase">
                        <h4 style="color: rgba(182, 253, 255, 0.82) !important; text-shadow: rgb(3, 3, 3) 2px 3px 1px; font-size: 20px;">Profession Builder</h4>
                    </div>
                    <div class="desc">
                        A One of a kind, API enabled Profession builder with incremental character snapshots and flexible access levels built around a user-controlled database.
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="featured-item feature-border-box text-left OverLord-Features">
                    <div class="icon" @mouseover="btnHover('wvw')" @mouseout="btnHover('wvw')">
                        <img :src="location.host + 'images/buttons/wvw-icon-2-' + wvwBtnImage + '.png'" style="position: relative; width: 100%"/>
                    </div>
                    <div class="title text-uppercase">
                        <h4 style="color: rgba(182, 253, 255, 0.82) !important; text-shadow: rgb(3, 3, 3) 2px 3px 1px; font-size: 20px;">WvW Intel</h4>
                    </div>
                    <div class="desc">
                        Advanced live stat tracking & historical recording of everything WvW related. Characters, Guilds, Servers and Tiers.
                    </div>
                </div>
            </div>
        </div>
    </page-container>

</template>

<script>
import pageContainer from "../hud/pageContainer/PageContainer.vue";
export default {
    name: "Features",
    components: {
        'page-container': pageContainer,
    },
    props:{
        location:{"default": ""},
    },
    computed:{
        wvwBtnImage: function (){if (this.buttons.wvw === true){   return 'hover'; }else{  return 'basic'; }},

        buildsBtnImage: function (){if(this.buttons.builds === true){ return 'hover'; }else{  return 'basic';}},

        guildsBtnImage: function (){if(this.buttons.guilds === true){return 'hover';}else{return 'basic';}},
    },
    data(){
        return {
            id:'features-section',
            buttons:{
                wvw: false,
                guilds: false,
                builds: false
            }
        }
    },
    methods:{
        btnHover(target){
            switch(target){
                case 'wvw': this.buttons.wvw = !this.buttons.wvw;   break;
                case 'guilds': this.buttons.guilds = !this.buttons.guilds;  break;
                case 'builds': this.buttons.builds = !this.buttons.builds; break;
            }
        },
    }
}
</script>

<style scoped>

</style>
