<template>
    <form @submit.prevent="submit" class="w-full flex justify-start flex-col items-center relative">
        <h2 class="mb-8 text-3xl text-[#59d460] font-semibold">
            Add Category
        </h2>
        <div class="mt-1 border-2 rounded-md border-[#59d460] w-full flex items-center flex-col gap-y-16 p-[60px]">
            <!-- category name -->
            <div class="flex flex-col">
                <label class="mb-2" for="name">Name:</label>
                <input class="border-2 px-2 py-1 border-[#59d460]" type="text" v-model="form.categoryName">
                <p class="text-sm text-red-500" v-if="form.errors.categoryName">{{ form.errors.categoryName }}</p>
            </div>
            <!-- category note -->
            <div class="flex flex-col">
                <label class="mb-2" for="name">Note:</label>
                <textarea class="border-2 px-2 py-1 border-[#59d460]" v-model="form.note" name="note" id="note" cols="30" rows="10"></textarea>
                <p class="text-sm text-red-500" v-if="form.errors.categoryName">{{ form.errors.categoryName }}</p>
            </div>
            <!-- section -->
            <div class="flex flex-col w-[225px]">
                <label class="mb-2" for="category">Section:</label>
                <select class="border-2 px-2 py-1 " name="section" @change="onChange($event)">
                    <option :value="null">--- Select A Section ---</option>
                    <option :value="section.id" v-for="section in sections">{{ section.name }}</option>
                </select>
                <p class="text-sm text-red-500" v-if="form.errors.section_id">{{ form.errors.section_id }}</p>
            </div>
            <!-- submit button -->
            <div class="">
                <button type="submit" @click="submitted" :disabled="form.processing"
                    class="bg-[#59d460] p-3 rounded-lg px-6 text-white">Add</button>
            </div>
        </div>
    </form>
</template>


<script>
import { useForm } from '@inertiajs/inertia-vue3';

export default {
    setup() {
        const form = useForm({
            categoryName: null,
            section_id: null,
            note: null,
        })

        function submit() {
            form.post('/category/add', {
                preserveScroll: true,
                onSuccess: () => form.reset(),
            })
        }

        return { form, submit }
    },
    methods: {
        submitted() {
            alert('Added')
        }
    },
    props: {
        sections: Array,
    },
    methods: {
        onChange(e) {
            this.form.section_id = e.target.value
        }
    },
}
</script>
