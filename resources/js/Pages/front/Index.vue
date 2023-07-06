<template>
    <div class="container mx-auto px-6 lg:px-20">
        <div class="lg:grid grid-cols-2 gap-4 my-20">
            <div class="relative">
                In English
                <textarea
                    v-model="form.english"
                    class="w-full h-36 text-lg border focus:ring-0 focus:outline-none"
                    @input="translate"/>
            </div>
            <div>
                In Limbu
                <textarea :value="limbu"
                          readonly
                          class="w-full h-36 text-lg border focus:ring-0 focus:outline-none"/>
                <div v-show="english && !limbu" class="text-red-500">
                    Sorry, Couldn't translate. Please suggest translation to improve the translation.
                </div>
            </div>
        </div>

        <div v-if="nextTranslateLink" class="flex justify-center">
            <Link :href="nextTranslateLink"
                  class="text-center bg-blue-500 px-6 py-3 rounded text-white">
                Help use Translate
            </Link>
        </div>

        <HomeAbout/>
    </div>
</template>

<script setup lang="ts">
import HomeAbout from "@/Pages/front/Home/HomeAbout.vue";
import {Link, useForm} from "@inertiajs/vue3";
import {watch} from "vue";
import {debounce} from "lodash"

const props = defineProps({
    limbu: {
        type: String,
        required: false,
        default: ""
    },
    english: {
        type: String,
        required: false,
        default: ""
    },
    nextTranslateLink: {
        type: String,
        required: false,
        default: null
    }
})

const form = useForm({
    english: ""
})

watch(() => props.english, () => {
    form.english = props.english
}, {immediate: true})

const translate = debounce(() => {
    form.get('/', {
        preserveState: true,
        preserveScroll: true
    })
}, 200)
</script>
