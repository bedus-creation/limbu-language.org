<template>
    <div class="grid grid-cols-2 gap-4 mt-20">
        <div class="relative">
            <textarea class="z-100 w-full text-2xl h-36 border focus:ring-0 focus:outline-none"
                      ref="textRef"
                      :value="editorLimbu.model.unicode"
                      @input="editorLimbu.handleInput"/>
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

    <Keyboard/>
</template>

<script lang="ts">
    import useEditor from "@/scripts/keyboard/editor.js"
    import Keyboard from "@/views/components/Keyboard.vue"
    import Layout from "@/views/layouts/default.vue"
    import { defineComponent, ref } from "vue"

    export default defineComponent({
        components: { Keyboard },
        layout: Layout,

        setup() {
            const textRef = ref(null)
            const editorLimbu = useEditor()

            return {
                textRef,
                editorLimbu,
            }
        },
    })
</script>
