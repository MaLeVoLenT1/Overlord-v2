<template>
    <section :class="{'loading-block':loadStyle === 'full', 'loading-block-inner':loadStyle === 'inner'}">
        <img class="loading-gif" :src="location.host + 'images/loading.gif'" alt="">
    </section>
</template>

<script>
export default {
    name: "loading",
    props:{
        "load-style":{"default": "full"}
    },
    data(){
        return {
            location: window.vDashboard.location,
        }
    },
    mounted(){
        let self = this;
        $(document).ready(function(){
            self.resizeContainer();
        });

        $(window).onresize = function(event) {
            self.resizeContainer();
        };

    },
    methods:{
        resizeContainer(){
            let vph, selector;
            if (this.loadStyle === "full") {
                vph = $(window).height();
                selector = $('.loading-block');
            }
            if (this.loadStyle === "inner") {
                vph = $("#inner-content").height() - 70;
                selector = $('.loading-block-inner');
            }
            selector.css({'height': vph + 'px'});

        }
    }
}
</script>

<style scoped>

</style>
