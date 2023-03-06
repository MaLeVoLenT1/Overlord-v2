<template>

    <div class="Overlord-Panel"
         v-bind:class="{
            'page-content': containerStyle === 'normal', 'body-content': containerStyle === 'full' || containerStyle ==='calc',
            'Panel-Color-Primary': backgroundColor === 'primary', 'Panel-Color-Trans': backgroundColor === 'transparent',
            'Panel-Color-Gradient': backgroundColor === 'gradient', 'matt-black-normal': backgroundColor === 'matt',
            'Panel-Color-Transparent': backgroundColor === 'none'}">

        <div v-if="data_top === true" style="position: initial;" class="menu-header OverlordBevel Bevel-h20"></div>

        <!-- ##################################################################################### Normal Page Style ##################################################################################### -->
        <div v-if="containerStyle === 'normal'" class="Overlord-pageFix">
            <!-- No Menu -->
            <div v-if="!hasMenu" class="container"><slot></slot></div>

            <!-- Menu -->
            <div v-if="hasMenu" class="container">

                <!-- Page Menu -->
                <div class="row" style="top: 30px; position: absolute;">
                    <div class="col-md-12" style="padding-left:0;">
                        <page-hud :side-menu="sideMenuStuck" @stickyTalk="pageHudChange" :hud-style="containerStyle"/>
                    </div>
                </div>

                <div id="inner-content" class="row matt-back" style="padding-top: 50px; margin-top: 15px; padding-right: 15px;">

                    <!-- Side Menu -->
                    <div class="col-md-3">
                        <side-hud :page-menu="pageMenuStuck" @stickyTalk="sideHudChange" :hud-style="containerStyle">
                            <!-- First Widget -->
                            <template slot="widget_1"><slot name="widget-1"></slot></template>
                            <template slot="widget_2"><slot name="widget-2"></slot></template>
                            <template slot="widget_3"><slot name="widget-3"></slot></template>
                        </side-hud>
                        <slot name="side-menu"></slot>
                    </div>
                    <div class="col-md-9  matt-black-normal">
                        <slot></slot>
                    </div>
                </div>
            </div>
        </div>

        <!-- ##################################################################################### Full Page Style ##################################################################################### -->
        <!-- MENU Start -->
        <div v-if="(containerStyle === 'full' || containerStyle === 'calc') && hasMenu" class="container-fluid hidden-xs hidden-sm">
            <div class="selectTitle"><p class="text-center">{{configureStickTitle}}</p></div>

            <div v-if="containerStyle === 'full'" class="col-md-12" style="padding-left:0;">
                <page-hud :side-menu="sideMenuStuck" @stickyTalk="pageHudChange" :hud-style="containerStyle"/>
            </div>

            <div v-if="containerStyle === 'calc'" class="col-md-6 professions">
                <slot name="leftSideMenu"></slot>
            </div>
            <div  v-if="containerStyle === 'calc'" class="col-md-6 professions2">
                <slot name="rightSideMenu"></slot>
            </div>
        </div>
        <div v-if="(containerStyle === 'full' || containerStyle === 'calc') && hasMenu" class="menu-header col-md-12 OverlordBevel Bevel-h20"></div>
        <!-- Side Menus -->
        <div v-if="containerStyle === 'full' && hasMenu" class="col-md-3">
            <side-hud :page-menu="pageMenuStuck" @stickyTalk="sideHudChange" :hud-style="'full'"/>
            <slot name="sideMenu"></slot>
        </div>
        <!-- ******* MENU FINISH -->

        <div  v-if="containerStyle === 'full'" class="col-md-9  matt-black-normal">
            <slot></slot>
        </div>

        <div v-if="data_bottom === true" style="position: initial;" class="menu-header OverlordBevel Bevel-h20"></div>


    </div>
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
        location:{"default": {main: "", sub: ""}},
        user:{"default": ""},
        requests:{"default": ""},
    },
    data(){
        return{
            sideMenuStuck: false,
            pageMenuStuck: false,
        }
    },
    computed:{
        configureStickTitle: function(){
            switch(this.location.main){
                case'hub': return "Community Hub";
                case'news': return "News Portal";
                case'about': return "App Information";
                case'crypto': return "Crypto Portal";
                case'games': return "Gaming Portal";
            }
        }
    },
    methods:{
        pageHudChange(change){
            console.log("Page Hud Change: " + change)
            this.pageMenuStuck = change;
        },
        sideHudChange(change){this.sideMenuStuck = change;}
    },
}
</script>

<style scoped>

</style>
