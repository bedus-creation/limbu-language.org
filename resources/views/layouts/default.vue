<script setup lang="ts">
    // This is a persistent layout
    // Include me with <template layout="default" />
</script>

<template>
    <div class="max-w-[1280px] mx-auto">
        <slot/>
    </div>
    <FlashContainer/>
</template>
<script lang="ts">
    import { usePage } from "@inertiajs/inertia-vue3"
    import { watch } from "vue"
    import { Flash, FlashContainer } from "vue3-headless-flash"
    import "vue3-headless-flash/dist/style.css"

    const page = usePage()

    watch(() => page.props.value?.flash, (flash) => {
        Object.entries(flash as []).forEach(([type, message]) => {
            Flash.flash(type, message)
        })
    })
</script>
