<template>
    <div v-if="message" class="text-red-500">
        {{ message }}
    </div>
</template>

<script setup lang="ts">
    defineProps({
        message: {
            type: String,
            required: false,
            default: "",
        },
    })
</script>
