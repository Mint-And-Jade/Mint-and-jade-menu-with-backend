<template>
    <form @submit.prevent="submitItem" class="w-full flex justify-start flex-col items-center relative">
        <h2 class="mb-8 text-3xl text-[#59d460] font-semibold">
            Add Item
        </h2>
        <div class="mt-1 border-2 rounded-md border-[#59d460] w-full flex items-center flex-col gap-y-16 p-[60px]">
            <!-- item name -->
            <div class="flex flex-col">
                <label class="mb-2" for="name">Name:</label>
                <input class="border-2 px-2 py-1 border-[#59d460]" type="text" v-model="form.itemName">
                <p class="text-sm text-red-500" v-if="form.errors.itemName">{{ form.errors.itemName }}</p>
            </div>
            <!-- item price -->
            <div class="flex flex-col">
                <label class="mb-2" for="price">Price:</label>
                <input class="border-2 px-2 py-1 border-[#59d460]" type="text" v-model="form.price">
                <p class="text-sm text-red-500" v-if="form.errors.price">{{ form.errors.price }}</p>
            </div>
            <!-- Categories -->
            <div class="flex flex-col w-[225px]">
                <label class="mb-2" for="category">Category:</label>
                <select class="border-2 px-2 py-1 " name="category" @change="onChange($event)">
                    <option :value="null">--- Select A Category ---</option>
                    <option :value="category.id" v-for="category in categories">{{ category.name }}</option>
                </select>
                <p class="text-sm text-red-500" v-if="form.errors.category_id">{{ form.errors.category_id }}</p>
            </div>
            <!-- submit button -->
            <div class="">
                <button type="submit" :disabled="form.processing"
                    class="bg-[#59d460] p-3 rounded-lg px-6 text-white">Add</button>
            </div>
        </div>
    </form>
</template>


<script>
import { useForm } from '@inertiajs/inertia-vue3';

export default {
    setup(props, context) {
        const form = useForm({
            itemName: null,
            price: null,
            category_id: null
        })

        function submitItem() {
            form.post('/add/item', {
                preserveScroll: true,
                onSuccess: () => {
                    form.reset()
                }
            })
        }

        return { form, submitItem }
    },
    props: {
        categories: Array
    },

    methods: {
        onChange(e) {
            this.form.category_id = e.target.value
        }
    },
}
</script>
