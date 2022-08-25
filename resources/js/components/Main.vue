<template>
    <div class="w-full h-fit py-10 px-20 flex justify-start flex-col items-center">
        <div class="flex justify-start flex-col items-center" v-for="section in Sections">

            <h2 class=" mb-8 text-3xl text-[#59d460] font-semibold">{{ section.sectionName }}</h2>
            <div class="" v-for="category in section.categories">
                <div v-for="Category in Categories" class="">
                    <div v-if="Category.categoryId === category.id" class="">

                        <Card class="mb-14" :note="category.note" :category="category" :items="Category.items" />
                    </div>
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
        Sections: Array,
        Categories: Array
    },
}
</script>
