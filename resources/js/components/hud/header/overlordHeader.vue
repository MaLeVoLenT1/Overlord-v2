<template>
    <header class="l-header" v-bind:class="{'l-header_overlay': isOverlay}">

        <div class="l-navbar l-navbar_expand js-navbar-sticky"
            v-bind:class="{'l-navbar_t-light': isLight,'l-navbar_t-dark-trans': isDark, 'l-navbar_s-floating': isFloating,'l-navbar_s-center': isCenter}">

            <div v-bind:class="{'container': isContainer, 'container-fluid': isFluid, 'container-float': isFloating, 'container-display': showDisplay}">

                <nav class="menuzord js-primary-navigation" role="navigation" aria-label="Primary Navigation">

                    <a v-if="this.headerStyle === 'floating' && this.showIcon === true" :href="location.host + 'home'" class="logo-brand">
                        <img class="retina" :src="location.host + 'images/logos/overlord/Overlord_O.png'" alt="Overlord">
                        Overlord
                    </a>

                    <a v-if="this.headerStyle !== 'floating'" :href="location.host + 'home'" class="logo-brand">
                        <img class="retina" :src="location.host + 'images/logos/overlord/Overlord_O.png'" alt="Overlord">
                        Overlord
                    </a>

                    <header-options :links="links" @test="testCatch"/>

                </nav>
            </div>

        </div>
    </header>
</template>

<script>

import headerOptions from "./headerOptions";
export default {
    name: "overlordHeader",
    props:{
        headerStyle:{'default': 'fixed'},
        headerColor:{'default': 'dark'},
    },
    components:{
        'header-options': headerOptions
    },
    data(){
        return{
            location: window.vDashboard.location,
            links:window.vDashboard.links,
            // Movement Controls
            isMoved: false, isOverlay: false, isFloating: false,
            isCenter: false, isFluid: false, isContainer: true,
            isDark: true, isLight: false, showIcon: false,
        }
    },
    computed:{
        showDisplay:function(){
            return this.isFloating && !this.isMoved;
        }
    },
    mounted(){
        this.initSticky();
        // configure style
        switch(this.headerStyle){
            case'floating':
                this.isOverlay = true;
                this.isFloating = true;
                this.isCenter = false;
                this.isContainer = false;
                this.isFluid = false;
                break;
            case'standard':
                this.isOverlay = false;
                this.isFloating = false;
                this.isCenter = false;
                this.isFluid = true;
                this.isContainer = false;
                break;
            case'center':
                this.isOverlay = false;
                this.isFloating = false;
                this.isCenter = true;
                this.isFluid = true;
                this.isContainer = false;
                break;
            case'fixed':
                this.isOverlay = true;
                this.isFloating = false;
                this.isCenter = false;
                this.isFluid = true;
                this.isContainer = false;
                break;
        }

        // configure color
        switch(this.headerColor){
            case'dark': this.isDark = true; this.isLight = false;   break;
            case'light': this.isDark = false; this.isLight = true;   break;
        }
    },
    methods:{
        /**
         * Test Catch */
        testCatch(){
            // console.log(' OverlordHeader: test catch successful ');
            this.$emit('test');
        },
        initSticky() {
            let $navbarSticky, navbarHeight, $brandLogo, centerLogoNormalHeight, centerLogoStickyHeight, bottomNav, navMenu;
            let self = this;
            $navbarSticky = $(".js-navbar-sticky").not(".l-navbar_s-left");
            navbarHeight = $navbarSticky.height();
            $brandLogo = $(".logo-brand");
            centerLogoNormalHeight = 100;
            centerLogoStickyHeight = 60;

            bottomNav = $("#Overlord-Nav-Bottom");
            navMenu = $("#overlord-menu");

            if ($navbarSticky.hasClass("l-navbar_s-center")) {
                $brandLogo.height(centerLogoNormalHeight);
            }

            $navbarSticky.sticky({
                className: "l-navbar-wrapper_has-sticky",
                wrapperClassName: "l-navbar-wrapper",
                zIndex: 10000,
                bottomSpacing: 100
            }).on("sticky-start", function() {
                self.isMoved = true;
                bottomNav.show();
                navMenu.show();
                if ($navbarSticky.hasClass("l-navbar_s-center")) {
                    $brandLogo.height(0);
                    setTimeout(function() {
                        $brandLogo.addClass("sticky-fix").height(centerLogoStickyHeight);
                    }, 300);
                }
            }).on("sticky-end", function () {
                $navbarSticky.parent().height(navbarHeight);
                self.isMoved = false;
                bottomNav.hide();
                navMenu.hide();
                if ($navbarSticky.hasClass("l-navbar_s-center")) {
                    $brandLogo.removeClass("sticky-fix").height(centerLogoNormalHeight);
                }
            });
        }

    }
}
</script>

<style scoped>

</style>
