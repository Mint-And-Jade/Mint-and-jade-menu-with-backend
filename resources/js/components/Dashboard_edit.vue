<template>
    <div class="flex justify-start flex-col items-center" v-for="section in sections">
        <!-- overlay -->
        <div v-if="SectionModalIsOn && section.id === sectionId" @click.self="toggleSectionModal"
            class="fixed top-0 bottom-0 right-0 left-0 flex justify-center overlay cursor-pointer z-30">
            <!-- Modal -->
            <Dashboard_edit_section_modal @submitted="toggleSectionModal" :section="section"/>
        </div>
        <div class="flex items-center mb-8">
            <h2 class="text-3xl text-[#59d460] font-semibold">{{ section.name }}</h2>
            <Dashboard_edit_section_modal_btn @clickedEditSection="openSectionModal" :section="section" />
        </div>
        <div class="" v-for="category in categories">
            <div class="" v-if="category.section_id === section.id">
                <!-- overlay -->
                <div v-if="CategoryModalIsOn && category.id === categoryId" @click.self="toggleEditCategoryModal"
                    class="fixed top-0 bottom-0 right-0 left-0 flex justify-center overlay cursor-pointer z-30">
                    <!-- Modal -->
                    <Dashboard_Edit_category_modal @submitted="toggleEditCategoryModal" :category="category" />
                </div>
                <div class="w-[375px] h-full mb-6">
                    <div class="relative flex">
                        <h2 class="ml-1">{{ category.name }}</h2>
                        <Dashboard_Edit_category_modal_btn @clickedEditCategory="openCategoryModal"
                            :category="category" />
                    </div>
                    <Dashboard_card :category="category" :items="items" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Dashboard_card from './dashboard_card.vue';
import Dashboard_Edit_category_modal from './dashboard_Edit_category_modal.vue';
import Dashboard_Edit_category_modal_btn from './dashboard_Edit_category_modal_btn.vue';
import Dashboard_edit_section_modal from './dashboard_edit_section_modal.vue';
import Dashboard_edit_section_modal_btn from './dashboard_edit_section_modal_btn.vue';
export default {
    props: {
        sections: Array,
        items: Array,
        categories: Array
    },
    components: { Dashboard_card, Dashboard_Edit_category_modal, Dashboard_Edit_category_modal_btn, Dashboard_edit_section_modal, Dashboard_edit_section_modal_btn },
    data() {
        return {
            CategoryModalIsOn: false,
            categoryId: null,
            SectionModalIsOn: false,
            sectionId: null
        }
    },
    methods: {
        toggleEditCategoryModal() {
            this.CategoryModalIsOn = !this.CategoryModalIsOn

        },
        openCategoryModal(id) {
            this.toggleEditCategoryModal()
            this.categoryId = id
        },
        openSectionModal(id) {
            this.toggleSectionModal()
            this.sectionId = id
        },
        toggleSectionModal() {
            this.SectionModalIsOn = !this.SectionModalIsOn
        }
    },

}
</script>


<style scoped>
.overlay {
    background-color: rgba(0, 0, 0, 0.10);
}
</style>
