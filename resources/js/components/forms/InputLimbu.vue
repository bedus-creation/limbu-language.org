<template>
 <textarea :value="editor.model.unicode"
           placeholder="Enter the limbu translation here"
           class="font-limbu z-100 w-full text-2xl h-36 border rounded focus:ring-0 focus:outline-none"
           @input="handleInput"/>
</template>

<script setup lang="ts">
    import useEditor from "@/Utils/keyboard/editor.js"
    import { watchEffect } from "vue"
    const editor = useEditor()

    const props = defineProps({
        modelValue: {
            type: String,
            required: false,
            default: "",
        },
    })

    const emits = defineEmits(["update:modelValue"])

    watchEffect(() => {
        editor.setData(props.modelValue)
    })

    const handleInput = (event) => {
        editor.setData(event.target.value)
        emits("update:modelValue", editor.model.unicode)
    }
</script>
