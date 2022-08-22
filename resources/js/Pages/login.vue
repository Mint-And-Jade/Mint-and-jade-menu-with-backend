<template>
    <div class=" flex justify-center items-center w-full h-[100vh]">
        <form @submit.prevent="submit" class="w-[350px] flex justify-start flex-col items-center relative ">
            <h2 class="mb-8 text-3xl text-[#59d460] font-semibold">
                Login
            </h2>
            <div class="mt-1 border-2 rounded-md border-[#59d460] w-full flex items-center flex-col gap-y-16 p-[60px]">
                <!-- email -->
                <div class="flex flex-col">
                    <label class="mb-2" for="email">Email:</label>
                    <input class="border-2 px-2 py-1 border-[#59d460]" type="text" v-model="form.email">
                    <p class="text-sm text-red-500" v-if="form.errors.email">{{ form.errors.email }}</p>
                </div>
                <!-- password -->
                <div class="flex flex-col">
                    <label class="mb-2" for="password">Password:</label>
                    <input class="border-2 px-2 py-1 border-[#59d460]" type="text" v-model="form.password">
                    <p class="text-sm text-red-500" v-if="form.errors.password">{{ form.errors.password }}</p>
                </div>
                <!-- submit button -->
                <div class="">
                    <button type="submit" :disabled="form.processing"
                        class="bg-[#59d460] p-3 rounded-lg px-6 text-white">Login</button>
                </div>
            </div>
        </form>
    </div>
</template>


<script>
import { useForm } from '@inertiajs/inertia-vue3';

export default {
    setup() {
        const form = useForm({
            email: null,
            password: null
        })

        function submit() {
            form.post('login')
        }

        return { form, submit }
    },
}
</script>
