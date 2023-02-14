<template>
    <div class="widget widget-transition widgetMainSticky panel-background" :id="'pageHud-'+location.main" :class="{'sticky-black':stuck}">
        <!-- Shows Icon for Top Widget -->
        <div class="image-holder widget-transition" :class="{imageSticky:stuck, 'image-holder-unstuck':!stuck}" v-for="link in computedLinks" v-if="link.type === 'image'">
            <a @mouseover="button.hover = true" @mouseout="button.hover = false"  href="javascript:void(0)" @click="linkClick('image', link)" >
                <img style="width: 100%;" :src="communityBtn"/>
            </a>
        </div>

        <!-- Main Sticky Main Location Header -->
        <div v-if="stuck" class="page-name" :class="{pageNameStick:sideMenu, pageNameUnstick:!sideMenu}">
            <h6 class="text-uppercase">{{configureStickTitle}}</h6>
        </div>

        <!-- Shows Link list if List list is set to main links-->
        <ul class="widget-category widget-transition ulMain"  :class="{ulSticky:stuck, pageStickyUL:sideMenu}" style="float: left; margin-bottom: 0;">
            <li class="overlordWidget widgetMain" v-for="link in computedLinks" v-if="link.type === 'link'">
                <a @click="linkClick('sub', link)" href="javascript:void(0)" :class="{active:link.active, widgetFontSticked:sideMenu}">
                    <div class="link-holder"> {{link.abbreviation}} </div>
                </a>
            </li>
        </ul>

        <div  class="search-container" v-if="stuck">
            <input type="text" name="searchBox" class="form-control search-box" v-model="search" :placeholder="'Search for ' + configureTitle + ' ...'" @keyup.enter="sendSearch" @mouseout="sendSearch"/>
            <div  class="searchButton"><i class="fa fa-search"></i></div>
        </div>

    </div>
</template>

<script>
export default {
    name: "PageHud",
    props:{
        'hud-style':{'default':'normal'},
        'side-menu':{'default': false},
        location:{"default": ""},
        user:{"default": ""},
        requests:{"default": ""},
    },
    data(){
        return {
            userConfig: window.vDashboard.userConfig,
            scrollDistance:0,
            navTop:0,
            navLeft:0,
            stuck:false,
            button: {hover: false, active: false},
            search:"",
        }
    },
    watch:{
        sideMenu: function(val){
            // Passes and syncs up the Search field when the Hud is stuck.
            if(val){
                if(this.search !== window.vDashboard.hudControls.search){
                    this.search = window.vDashboard.hudControls.search;
                }
            }
        }
    },
    mounted(){
        let self = this;
        self.loaded();
    },

    computed:{
        configureTitle: function(){
            if(this.location.target !== null) return this.location.target;
            else if (this.location.sub !== null) return this.location.sub;
            else return this.location.main;
        },
        configureStickTitle: function(){return window.vDashboard.computedTitle;},
        computedLinks: function(){
            let subLinks = window.vDashboard.computedSubLinks;
            let configuredLinks = [];
            for (let key in subLinks) {
                if (Object.prototype.hasOwnProperty.call(subLinks, key)) {
                    let name;
                    if(key === "home") name = subLinks[key].href;
                    else name = key;
                    configuredLinks.push({
                        name:name,
                        abbreviation: subLinks[key].abbreviation,
                        active: subLinks[key].active,
                        href: subLinks[key].href,
                        portal: subLinks[key].portal,
                        text: subLinks[key].text,
                        type: subLinks[key].type,
                    });
                }
            }
            return configuredLinks;
        },
        communityBtn: function (){
            let buttonImg = window.vDashboard.computedBtn;
            let  mousePosition;
            if(this.button.hover === true) mousePosition = "hover";
            else mousePosition = "normal";
            return this.location.host + "images/buttons/" + buttonImg + mousePosition + ".png";
        },
    },
    methods:{
        loaded(){
            let self = this;
            let selector = "pageHud-" +  this.location.main;
            let subNav = $("#" + selector);
            subNav.sticky({topSpacing:60, zIndex: 7000, responsiveWidth:true, getWidthFrom:'.widgetMainSticky'})
                .on("sticky-start", function(){
                    window.vDashboard.hudState({hud:'page', action:true});
                    self.stickyCommunication(true);
                    self.stuck = true;
                })
                .on("sticky-end", function(){
                    window.vDashboard.hudState({hud:'page', action:false});
                    self.stickyCommunication(false);
                    self.stuck = false;
                });
        },
        linkClick(type, link){
            let trueSub;
            if(link.name === this.location.main) trueSub = null;
            else trueSub = link.name;
            window.vDashboard.updateLocation({
                main:link.portal,
                sub:trueSub,
                target:null,
                title: link.name
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

</style>
