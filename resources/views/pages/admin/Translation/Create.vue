<template>
    <div class="container mx-auto mt-20">
        <div class="flex justify-between">
            <div>
                {{ $page.props.count }}/15000
            </div>
            <div>
                {{ $page.props.count / 150 }}%
            </div>
        </div>
        <form @submit="submit">
            <label>In English</label>
            <textarea v-model="form.english"
                      class="z-100 w-full text-2xl h-36 border focus:ring-0 focus:outline-none"/>

            <label>In Limbu</label>
            <textarea :value="editor.model.unicode"
                      class="z-100 w-full text-2xl h-36 border focus:ring-0 focus:outline-none"
                      @input="editor.handleInput"/>

            {{ editor.model.original }}

            <div>
                <label>In pronunciation</label>
                <textarea v-model="form.pronunciation"
                          class="z-100 w-full text-2xl h-36 border focus:ring-0 focus:outline-none"/>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
            </div>
        </form>
    </div>
</template>

<script lang="ts">
    import useEditor from "@/scripts/keyboard/editor.js"
    import { useForm } from "@inertiajs/inertia-vue3"
    import { defineComponent, watchEffect } from "vue"
    import Layout from "../../../layouts/default.vue"

    export default defineComponent({
        layout: Layout,

        setup() {
            const form = useForm({
                english: "",
                limbu: "",
                pronunciation: "",
            })

            const editor = useEditor()

            watchEffect(() => {
                form.limbu = editor.model.unicode
            })

            const submit = () => {
                form.post("/translations", {
                    preserveScroll: true,
                    preserveState: true,
                    onSuccess: (page) => {form.reset()},
                })
            }

            return {
                form,
                submit,
                editor,
            }
        },
    })
</script>
