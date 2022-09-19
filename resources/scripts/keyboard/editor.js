import { reactive, ref } from "vue"
import { COMPLEX, SINGLE } from "./mapping"
export default function useEditor() {
    const model = reactive({
        unicode: "",
        original: "",
    })

    const translate = (data, key = 0, value = 1) => {
        Object.entries(COMPLEX).forEach((item) => {
            data = data.replaceAll(item[key], item[value])
        })

        Object.entries(SINGLE).forEach((item) => {
            data = data.replaceAll(item[key], item[value])
        })

        return data
    }

    const reverseTranslate = (data) => {
        return translate(data, 1, 0)
    }

    const handleInput = (event) => {
        const string = event.target.value
        model.original = reverseTranslate(string)
        model.unicode = translate(model.original)
    }

    return {
        model,
        handleInput,
    }
}
