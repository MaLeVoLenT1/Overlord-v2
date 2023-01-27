<template>
    <transition name="modal">
        <div class="modal-mask" :style="'z-index:' + zIndex + ';'">
            <div class="modal-wrapper">
                <div class="modal-container OverLord-Shadow-Main" :style="'width:' + width + ';'">

                    <div class="modal-header">
                        <slot name="header">

                        </slot>
                    </div>

                    <div class="modal-body">
                        <slot name="body">

                        </slot>
                    </div>

                    <div class="modal-footer">
                        <slot name="footer">
                            <button class="btn btn-small btn-dark-solid full-width" @click="$emit('close')">
                                CLOSE
                            </button>
                        </slot>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    name: "modal",
    props:{
        width:{
            'default': '80%',
        },
        info:{
            'default':null,
        },
        zIndex:{
            'default': '9998',
        }
    }
}
</script>

