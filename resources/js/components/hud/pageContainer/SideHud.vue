<template>
    <div class="widget widget-transition widgetSideSticky" :class="{paddingFullHud: computedPadding}">
        <!-- Search Box -->
        <div  class="col-md-12 search-container-side search-transition" v-if="!pageMenu" :style="'max-width:'+ computedLinksFix +'px;'">
            <div  class="searchButtonSide"><i class="fa fa-search"></i></div>
            <input type="text" name="searchBox" class="form-control search-box-side"
                   v-model="search" :placeholder="'Search for ' + configureTitle + ' ...'"
                   @keyup.enter="sendSearch" @mouseout="sendSearch"/>
        </div>

        <!-- ****************************************************** Page Links ****************************************************** -->
        <div :id="'sideHud-'+location.main" :class="{listFix:stuck}" class="linkSection">
            <h6 v-if="!stuck" class="text-uppercase side-menu-title">
                {{configureTitle}}

                <template v-for="link of computedLinks">
                    <a v-if="link.name === 'all'" href="javascript:void(0)" class="allLink" :class="{active: link.active}"> {{link.text}} </a>
                </template>

           </h6>

            <hr v-if="!stuck" class="hrSideBar"/>
            <ul v-if="!stuck" class="widget-transition"  style="float: left; margin-bottom: 15px;">

                <template v-for="link in computedLinks">
                    <li class="widgetSide" v-if="link.type ==='top' && link.name !== 'all'">
                        <a href="javascript:void(0)"> {{link.text}} </a>
                    </li>
                </template>

            </ul>
            <ul v-if="stuck" class="second-sticky-menu">

                <template v-for="link in computedLinks">
                    <li class="overlordWidget" v-if="link.stickyShow" style="float: left; padding-right: 15px; ">
                        <a href="javascript:void(0)" :class="{active: link.active}">{{link.text}}</a>
                    </li>
                </template>

            </ul>
        </div>

        <!-- First Widget -->
        <slot name="widget_1"></slot>

        <!-- ****************************************************** Authenticated Links ****************************************************** -->
        <template v-for="link in computedAuthLinks">
            <div v-if="userConfig['hasAPI']" class="linkSection">

                <h6 class="text-uppercase side-menu-title">
                    {{link.title}}

                    <template v-for="subLink in link.links">
                        <a href="javascript:void(0)" class="allLink" v-if="subLink.name === 'all'" :class="{active: subLink.active}">
                            {{subLink.text}}
                        </a>
                    </template>

                </h6>

                <hr class="hrSideBar"/>
                <ul class="widget-transition"  style="float: left; margin-bottom: 15px;">

                    <template v-for="subLink in link.links">
                        <li class="widgetSide" v-if="subLink.name !== 'all'">
                            <a href="javascript:void(0)" :class="{active: subLink.active}">{{subLink.text}}</a>
                        </li>
                    </template>

                </ul>

                <!-- Slot Widgets in between link lists.-->
                <div v-if="computedAuthLinks[1] !== undefined">
                    <slot v-if="computedAuthLinks[1].title === link.title" name="widget_2"></slot>
                </div>

                <div v-if="computedAuthLinks[3] !== undefined">
                    <slot v-if="computedAuthLinks[3].title === link.title" name="widget_3"></slot>
                </div>
            </div>
        </template>

        <slot v-if="computedAuthLinks[1] === undefined" name="widget_2"></slot>
        <slot v-if="computedAuthLinks[3] === undefined" name="widget_3"></slot>
    </div>
</template>

<script>
export default {
    name: "SideHud",
    props:{
        'hud-style':{'default':'normal'},
        'page-menu':{'default': false},
    },
    data(){
        return {
            stuck:false,
            location: window.vDashboard['location'],
            user: window.vDashboard.user,
            requests: window.vDashboard['requests'],
            userConfig: window.vDashboard['userConfig'],
            search:""
        }
    },
    watch:{
        // Watches Page Hud
        pageMenu: function(val){
            // Passes and syncs up the Search field when the Hud is not stuck.
            if(!val){
                if(this.search !== window.vDashboard.hudControls.search){
                    this.search = window.vDashboard.hudControls.search;
                }
            }
        }
    },
    computed:{
        // Where To sticky, based on Hud Style
        computedTopSpacing: function(){switch(this['hudStyle']){ case"normal": return 60; case"full": return 60;}},

        // Fixes Widget if widget is Hud Style full and is stuck.
        computedClassFix: function(){ return this.stuck && this['hudStyle'] === 'full'},

        // Computes link Max Width based on Hud Style.
        computedLinksFix: function(){ switch(this['hudStyle']){case"normal": return 232; case"full": return 355;}},

        // Adds padding to Widget if widget is Hud Style full and is stuck.
        computedPadding: function(){
            switch(this['hudStyle']) {
                case"normal": return false;
                case"full": return !this.stuck;
            }
        },

        computedAuthLinks: function(){
            let self = this;
            if(self.userConfig.isSignedIn){
                let subPage = (self.location.sub !== null) ? self.location.sub : "home";
                return window.vDashboard['computedSubLinks'][subPage].authenticated;
            }
            else return [];
        },
        computedLinks: function (){
            let self = this;
            let subPage;
            if(self.location.sub !== null){
                subPage = self.location.sub;
            }
            else{
                if(self.requests.item !== null) subPage = "target";
                else subPage = "home";
            }


            return window.vDashboard['computedSubLinks'][subPage].links;
        },
        configureTitle: function(){
            if(this.location.target !== null) {
                switch(this.location.main){
                    case"news":
                        if(this.location.target) {
                            if(this.requests['item'] !== null) return this.requests['item']['title'];
                            else return this.location.target;
                        }
                        else return this.location.target;
                    default: return this.location.target;
                }
            }
            else if (this.location.sub !== null) return this.location.sub;
            else return this.location.main;
        },
    },
    mounted(){
        this.loaded();
    },
    methods:{
        loaded(){
            let self = this;
            let selector = "sideHud-" +  this.location.main;
            let subNav = $("#" + selector);

            subNav.sticky({topSpacing:self.computedTopSpacing, zIndex: 8000, responsiveWidth:true, getWidthFrom:'.widgetSideSticky'})
                .on("sticky-start", function(){

                    window.vDashboard.hudState({hud:'side', action:true});
                    self.stickyCommunication(true);
                    self.stuck = true;
                })
                .on("sticky-end", function(){
                    window.vDashboard.hudState({hud:'side', action:false});
                    self.stickyCommunication(false);
                    self.stuck = false;
                });

        },

        sendSearch(){
            if(this.search !== ''){
                if(this.search !== window.vDashboard.hudControls.search) window.vDashboard.updateSearch(this.search);
            }
        },
        stickyCommunication(isStuck){this.$emit("stickyTalk", isStuck);}
    }
}
</script>

<style scoped>
    .listFix{
        left: 150px;
        width: 100% !important;
    }
    .linkSection{
        float: left;
        width:100%;
        margin-bottom: 5px;
        text-align: left
    }
    .allLink{
        text-transform: lowercase;
        position: relative;
        float: right;
    }
</style>
