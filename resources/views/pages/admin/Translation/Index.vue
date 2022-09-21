<template>
    <div>
        <div v-for="item in $page.props.translations">
            {{ item.english }}
            <span class="font-limbu">{{ item.limbu }}</span>
            <a :href="`/translations/${item.id}`">Edit</a>
        </div>
    </div>
</template>

<script lang="ts">
    import { defineComponent } from "vue"
    import Layout from "../../../layouts/default.vue"
    export default defineComponent({
        layout: Layout,
    })
</script>
