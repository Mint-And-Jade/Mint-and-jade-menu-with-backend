<template>
    <div class="w-full h-fit py-10 px-20 flex justify-start flex-col items-center">
        <div class="flex justify-start flex-col items-center" v-for="section in sections">

            <h2 class=" mb-8 text-3xl text-[#59d460] font-semibold">{{ section.name }}</h2>
            <div class="" v-for="category in categories">
                <div v-if="category.section_id === section.id" class="">

                    <Card class="mb-14" :note="category.note" :category="category" :items="items" />
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import Card from './Card.vue'
export default {
    components: {
        Card
    },
    props: {
        sections: Array,
        categories: Array,
        items: Array,
    },
}
</script>
