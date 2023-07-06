<template>
    <div class="max-w-[1280px] mx-auto">
        <slot/>
    </div>
    <FlashContainer/>
</template>
<script setup lang="ts">
import {PropType, watch} from "vue"
import {Flash, FlashContainer, FlashType} from "vue3-headless-flash"
import "vue3-headless-flash/dist/style.css"

type flashesType = {
    [key in FlashType]: string;
};

const props = defineProps({
    flash: {
        required: true,
        type: Object as PropType<flashesType>
    }
})

watch(() => props.flash, (flash) => {
    Object.entries(flash as flashesType).forEach(([type, message]) => {
        if (message) {
            Flash.flash(message, type as FlashType)
        }
    })
})
</script>
