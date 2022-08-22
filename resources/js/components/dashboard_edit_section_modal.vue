<template>
    <form @submit.prevent="submit" class="h-fit w-fit flex justify-center">
        <div
            class="bg-white h-fit w-[90%] mt-[20%] p-[60px] rounded-lg cursor-default flex justify-center flex-col gap-y-16">
            <h2 class="text-3xl">Section ID {{ section.id }}</h2>
            <!-- section name -->
            <div class="flex flex-col">
                <label class="mb-2" for="name">Name:</label>
                <input class="border-2 px-2 py-1 border-[#59d460]" type="text" v-model="form.name">
            </div>
            <!-- submit button -->
            <div class="flex justify-center gap-4">
                <button type="submit" :disabled="form.processing"
                    class="bg-[#59d460] p-3 rounded-lg px-6 text-white">Update</button>
                <Link @click="deleted" :href="href" method="delete" as="button" type="button" class="bg-red-500 p-3 rounded-lg px-6 text-white">Delete</Link>
            </div>
        </div>
    </form>
</template>

<script>
import { useForm, Link } from '@inertiajs/inertia-vue3';

export default {
    props: {
        section: Object
    },
    components: {
        Link
    },
    setup(props, context) {
        const form = useForm({
            name: null,
            price: null,
            id: null
        })

        function submit() {
            form.patch('/section/update', {
                preserveScroll: true,
                onSuccess: () => {
                    context.emit('submitted')
                }
            })
        }

        return { form, submit }
    },
    methods: {
        deleted(){
            this.$emit('submitted')
        }
    },
    mounted() {
        this.form.name = this.section.name,
            this.form.price = this.section.price,
            this.form.id = this.section.id
    },
    data() {
        return {
            href: 'section/delete/' + this.section.id
        }
    },
}
</script>
