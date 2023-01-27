<template>
    <div id="fullscreen-banner" class="parallax text-center vertical-align overlord-parallax-back" :style="'height: ' + parallaxHeight + 'vh;'">
        <div class="parallax-overlord">
            <!-- Background  -->
            <div class='layer-1 layer' data-depth='.10' data-type='parallax' data-direction='down'></div>
            <!-- Back Hexes   -->
            <div class='layer-2 layer' data-depth='0.20' data-type='parallax' data-direction='down'></div>
            <!-- Middle Float Hexes   -->
            <div class='layer-3 layer' data-depth='0.35' data-type='parallax' data-direction='down'>
                <div class="middle-hex-container">
                    <div class="container-sides">
                        <div class="side" :style="'text-align: left;'">
                            <img v-if="display === 'main'" class="hex-left" :src="location.host + 'images/backgrounds/overlordParallax2/middle-float-hexes-left.png'" alt=""/>
                            <img v-if="display === 'sub'" class="hex-left-sub"  :src="location.host + 'images/backgrounds/overlordParallax2/middle-float-hexes-left.png'" alt=""/>
                        </div>
                        <div class="side" :style="'text-align: right;'">
                            <img v-if="display === 'main'" class="hex-right" :src="location.host + 'images/backgrounds/overlordParallax2/middle-float-hexes-right.png'" alt=""/>
                            <img v-if="display === 'sub'" class="hex-right-sub" :src="location.host + 'images/backgrounds/overlordParallax2/middle-float-hexes-right.png'" alt=""/>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Overlord Logo  -->
            <div v-if="display === 'main'" class='layer-4 layer' data-depth='.60' data-type='parallax' data-direction='down'>
                <div class="logo-container" :style="'height:' + windowHeight + '.px; text-align:' + logoAlign + ';'">
                    <img v-if="display === 'main'" class="parallax-logo" :src="location.host + 'images/logos/overlord/Overlord-Logo.png'" alt=""/>
                </div>
            </div>
            <!-- Top Float Hexes  -->
            <div class='layer-6 layer' data-depth='0.70' data-type='parallax' data-direction='down'>
                <div class="top-hex-container">
                    <div class="container-sides">
                        <div class="side" :style="'text-align: left;'">
                            <img v-if="display === 'main'" class="hex-left" :src="location.host + 'images/backgrounds/overlordParallax2/top-float-hexes-left.png'" alt=""/>
                            <img v-if="display === 'sub'" class="hex-left-sub" :src="location.host + 'images/backgrounds/overlordParallax2/top-float-hexes-left.png'" alt=""/>
                        </div>
                        <div class="side" :style="'text-align: right;'">
                            <img v-if="display === 'main'" class="hex-right" :src="location.host + 'images/backgrounds/overlordParallax2/top-float-hexes-right.png'" alt=""/>
                            <img v-if="display === 'sub'" class="hex-right-sub" :src="location.host + 'images/backgrounds/overlordParallax2/top-float-hexes-right.png'" alt=""/>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Tribal  -->
            <div class='layer-5 layer' data-depth='0.85' data-type='parallax' data-direction='down'>
                <div class="container-tribal" :style="'height:' + windowHeight + '.px;'">
                    <img v-if="display === 'main'" class="parallax-tribal" :src="location.host + 'images/backgrounds/overlordParallax2/tribal.png'" alt=""/>
                    <img v-if="display === 'sub'" class="parallax-tribal-header" :src="location.host + 'images/backgrounds/overlordParallax2/tribal.png'" alt=""/>
                </div>

            </div>
            <!-- Bottom Overlay  -->
            <div class='layer-overlay layer' data-depth='1.00' data-type='parallax' data-direction='down'></div>
            <!-- Overlord Logo  -->
            <div v-if="display === 'sub'" class='layer-4 layer' :style="'z-index: auto;'" data-depth='.60' data-type='parallax' data-direction='down'>
                <div class="logo-container" :style="'height:' + windowHeight + '.px; text-align:' + logoAlign + ';'">
                    <img  class="parallax-logo-header" :src="location.host + '/images/logos/overlord/Overlord-Logo.png'" alt=""/>
                    <nav  class="header-information" aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb OverLord-Shadow-Main">

                            <li class="breadcrumb-item">
                                <a href="javascript:void(0)" @click="nav('home')">Home</a>
                            </li>

                            <li class="breadcrumb-item" :class="{'active': mainActive}">
                                <a v-if="mainActive !== true" href="javascript:void(0)" @click="nav(location.main)">{{location.main}}</a>
                                <span v-if="mainActive === true">{{location.main}}</span>
                            </li>

                            <li v-if="location.sub" class="breadcrumb-item" :class="{'active': subActive}">
                                <a v-if="subActive !== true" href="javascript:void(0)" @click="nav(location.sub)">{{location.sub}}</a>
                                <span v-if="subActive === true">{{location.sub}}</span>
                            </li>

                            <li v-if="location.target !== null" class="breadcrumb-item" :class="{'active': targetActive}">
                                <span>{{targetTitle}}</span>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "OverlordParallaxV1",
    props: ['display'],
    data(){
        return {
            location: window.vDashboard.location,
            requests: window.vDashboard.requests,
        }
    },
    computed:{
        targetTitle: function (){
            switch(this.location.main){
                case"news":
                    if(this.location.target !== null) {
                        if(this.requests['item'])return this.requests['item']['title'];
                        else return this.location.target
                    }
                    else return this.location.target;
                default: return this.location.target;
            }
        },
        parallaxHeight:function(){
            switch(this.display){
                case'main':return 100;
                case'sub':return 45;
            }
        },
        windowHeight:function(){
            switch(this.display){
                case'main':return $(window).height();
                case'sub':return $(window).height()/2;
            }
        },
        logoAlign:function(){
            switch(this.display){
                case'main':return 'center';
                case'sub':return 'left';
            }
        },
        linkActive:function(){
            if (this.location.target === null){
                if(this.location.sub !== null){return 'sub';
                }else{return 'main';}
            }else{return 'target';}
        },
        mainActive:function(){
            if(this.linkActive === 'main'){return true;}
        },
        subActive:function(){
            if(this.linkActive === 'sub'){return true;}
        },
        targetActive:function(){
            if(this.linkActive === 'target'){return true;}
        },

        windowWidth:function(){
            return $(window).width();
        },
    },
    mounted(){
        let self = this;
        let depth, i, layer, layers, len, movement, topDistance, translate3d, direction;
        topDistance = this.pageYOffset;
        layers = document.querySelectorAll("[data-type='parallax']");
        for (i = 0, len = layers.length; i < len; i++) {
            layer = layers[i];
            depth = layer.getAttribute('data-depth');
            direction = layer.getAttribute('data-direction');

            if (direction === 'up'){
                movement = topDistance * depth;
            }
            if (direction === 'down'){
                movement = -(topDistance * depth);
            }
            translate3d = 'translate3d(0, ' + movement + 'px, 0)';
            layer.style['-webkit-transform'] = translate3d;
            layer.style['-moz-transform'] = translate3d;
            layer.style['-ms-transform'] = translate3d;
            layer.style['-o-transform'] = translate3d;
            layer.style.transform = translate3d;
        }
        $("#loading-progress").imagesLoaded(function(){
            self.$emit('done-loading');
        });
        window.addEventListener('scroll', function(event) {
            let depth, i, layer, layers, len, movement, topDistance, translate3d, direction;
            topDistance = this.pageYOffset;
            layers = document.querySelectorAll("[data-type='parallax']");
            for (i = 0, len = layers.length; i < len; i++) {
                layer = layers[i];
                depth = layer.getAttribute('data-depth');
                direction = layer.getAttribute('data-direction');

                if (direction === 'up'){
                    movement = topDistance * depth;
                }
                if (direction === 'down'){
                    movement = -(topDistance * depth);
                }
                translate3d = 'translate3d(0, ' + movement + 'px, 0)';
                layer.style['-webkit-transform'] = translate3d;
                layer.style['-moz-transform'] = translate3d;
                layer.style['-ms-transform'] = translate3d;
                layer.style['-o-transform'] = translate3d;
                layer.style.transform = translate3d;
            }
        });
    },
    methods:{
        nav(target){
            alert(target);
        }
    }
}
</script>

<style scoped>

</style>
