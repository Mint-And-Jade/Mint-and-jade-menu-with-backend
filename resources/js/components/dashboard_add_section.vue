<template>
    <form @submit.prevent="submit" class="w-full flex justify-start flex-col items-center relative">
        <h2 class="mb-8 text-3xl text-[#59d460] font-semibold">
            Add Section
        </h2>
        <div class="mt-1 border-2 rounded-md border-[#59d460] w-full flex items-center flex-col gap-y-16 p-[60px]">
            <!-- section name -->
            <div class="flex flex-col">
                <label class="mb-2" for="name">Name:</label>
                <input class="border-2 px-2 py-1 border-[#59d460]" type="text" v-model="form.sectionName" >
                <p class="text-sm text-red-500" v-if="form.errors.sectionName">{{ form.errors.sectionName }}</p>
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
    setup() {
        const form = useForm({
            sectionName: null,
        })

        function submit() {
            form.post('/section/add', {
                preserveScroll: true,
                onSuccess: () => form.reset(),
            })
        }

        return { form, submit }
    },
}
</script>
