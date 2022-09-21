<template>
    <div class="grid grid-cols-2 gap-4 mt-20">
        <div class="relative">
            <InputLimbu/>
        </div>
        <div>
            <textarea class="w-full h-36 text-lg border focus:ring-0 focus:outline-none"/>
        </div>
    </div>
    How accurate is this translation ?
    1 2 3 4 5
    <textarea class="border focus:ring-0 focus:outline-none"
              placeholder="Suggest translation"/>
    <button>Share</button>
</template>

<script setup lang="ts">
    import InputLimbu from "@/views/components/forms/InputLimbu.vue"
</script>
