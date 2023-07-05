<template>
    <div>
        <div v-for="item in $page.props.translations?.data">
            {{ item.english }}
            <span class="font-limbu">{{ item.limbu }}</span>
            <a :href="`/translations/${item.id}`">Edit</a>
        </div>
    </div>
</template>

<script setup lang="ts">
import Layout from "../../../layouts/default.vue"

defineOptions({
    layout: Layout,
})
</script>
