<template>
    <div>
        <div class="my-20">
            <a href="/translation-exports"
               target="_blank"
               class="bg-blue-500 px-6 py-3 rounded text-3">
                Export
            </a>
        </div>
        <div v-for="item in $page.props.translations?.data">
            {{ item.english }}
            <span class="font-limbu">{{ item.limbu }}</span>
            <a :href="`/translations/${item.id}`">Edit</a>
        </div>
    </div>
</template>

<script setup lang="ts">
import Layout from "@/Layouts/Default.vue"

defineOptions({
    layout: Layout,
})
</script>
