<template>
    <div class="container mx-auto mt-20">
        <div class="flex justify-between">
            <div>
                {{ $page.props.count }} / 15000
            </div>
            <div>
                {{ ($page.props.count / 150).toFixed(2) }}%
            </div>
        </div>
        <form @submit.prevent="submit">
            <div class="mb-4">
                <label>In English</label>
                <textarea v-model="form.english"
                          class="z-100 w-full text-2xl h-36 border focus:ring-0 focus:outline-none"/>
                <InputError :message="form.errors.english"/>
            </div>

            <div>
                <label>In Limbu</label>
                <InputLimbu v-model="form.limbu"/>
                <InputError :message="form.errors.limbu"/>
            </div>


            <div>
                <label>In pronunciation</label>
                <textarea v-model="form.pronunciation"
                          class="z-100 w-full text-2xl h-36 border focus:ring-0 focus:outline-none"/>
                <InputError :message="form.errors.pronunciation"/>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
            </div>
        </form>
    </div>
</template>

<script lang="ts">
    import InputError from "@/views/components/forms/InputError.vue"
    import InputLimbu from "@/views/components/forms/InputLimbu.vue"
    import { useForm } from "@inertiajs/inertia-vue3"
    import { defineComponent } from "vue"
    import Layout from "../../../layouts/default.vue"

    export default defineComponent({
        components: { InputLimbu, InputError },
        layout: Layout,

        setup() {
            const form = useForm({
                english: "",
                limbu: "",
                pronunciation: "",
            })

            const submit = () => {
                form.post("/translations", {
                    preserveScroll: true,
                    preserveState: true,
                    onSuccess: (page) => {
                        form.reset()
                    },
                })
            }

            return {
                form,
                submit,
            }
        },
    })
</script>
