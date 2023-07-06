<template>
    <div class="container mx-auto mt-20 px-6">
        <form @submit.prevent="submit">
            <div class="lg:grid grid-cols-3 gap-2">
                <div class="mb-4">
                    <label>In Limbu</label>
                    <InputLimbu v-model="form.limbu"/>
                    <InputError :message="form.errors.limbu"/>
                </div>

                <div class="mb-4">
                    <label>In English</label>
                    <textarea v-model="form.english"
                              class="z-100 w-full text-2xl h-36 border rounded focus:ring-0 focus:outline-none"/>
                    <InputError :message="form.errors.english"/>
                </div>

                <div class="mb-4">
                    <label>Pronunciation</label>
                    <textarea v-model="form.pronunciation"
                              class="z-100 w-full text-2xl h-36 border rounded focus:ring-0 focus:outline-none"/>
                    <InputError :message="form.errors.pronunciation"/>
                </div>
            </div>

            <div class="flex justify-between">
                <div class="grid grid-cols-2 gap-2">
                    <Link :href="`/translations/${translation.id-1}`"
                          class="text-center border border-blue-500 text-blue-500 px-4 py-2 rounded">
                        Previous
                    </Link>
                    <Link :href="`/translations/${translation.id+1}`"
                          class="text-center border border-blue-500 text-blue-500 px-4 py-2 rounded">
                        Next
                    </Link>
                </div>
                <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded">
                    Update
                </button>
            </div>
        </form>
    </div>
</template>

<script lang="ts">
import InputError from "@/components/forms/InputError.vue"
import InputLimbu from "@/components/forms/InputLimbu.vue"
import {InertiaForm, Link, useForm} from '@inertiajs/vue3'
import {defineComponent, PropType, watch} from "vue"
import Layout from "@/Layouts/Default.vue"

export default defineComponent({
    components: {InputLimbu, InputError, Link},
    layout: Layout,

    props: {
        translation: {
            type: Object as PropType<{
                id: Number,
                english: String,
                limbu: String,
                pronunciation: String
            }>,
            required: true,
        },
    },

    setup(props) {
        const form: InertiaForm<{
            english: String,
            limbu: String,
            pronunciation: String
        }> = useForm({
            english: "",
            limbu: "",
            pronunciation: "",
        })

        watch(() => props.translation, () => {
            form.english = props.translation.english
            form.limbu = props.translation.limbu
            form.pronunciation = props.translation.pronunciation
        }, {immediate: true, deep: true})

        const submit = () => {
            form.put(`/translations/${props.translation.id}`, {
                preserveState: true,
            })
        }

        return {
            form,
            submit,
        }
    },
})
</script>
