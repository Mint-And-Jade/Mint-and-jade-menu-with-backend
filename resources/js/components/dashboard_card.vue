<template>

    <div class="mt-1 border-2 rounded-md p-4 border-[#59d460]">
        <div class="grid grid-rows-1 grid-cols-[50%_30%_1fr]">
            <p>Items</p>
            <p>Price</p>
            <p>Edit Item</p>
        </div>
        <hr class="my-4">
        <div class="flex flex-col leading-7">
            <div v-for="item in items">
                <div class="grid grid-rows-1 grid-cols-[50%_30%_1fr] mb-4" v-if="item.category_id === category.id">
                    <div class="relative">
                        <img src="../../../public/img/dot.svg" alt="" class="w-[8px] rounded-full absolute top-[.6rem]">
                        <p class="ml-5"> {{  item.name  }}</p>
                    </div>
                    <div class="">
                        {{  item.price  }}&nbsp;LL
                    </div>
                    <div class="flex justify-center">
                        <Dashboard_Edit_modal_btn @clickedEdit="clickedEdit" :item="item" />
                    </div>
                    <!-- overlay -->
                    <div v-if="modalOn === true && item.id === itemId"
                        class="fixed top-0 bottom-0 right-0 left-0 flex justify-center overlay cursor-pointer z-30"
                        @click.self="toggleEditModal">
                        <!-- Modal -->
                        <Dashboard_Edit_modal @submitted="toggleEditModal()" :item="item" />
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 italic" v-if="category.note">
            Note: {{  category.note  }}
        </div>
    </div>
</template>

<script>
import Dashboard_Edit_modal from './Dashboard_Edit_item_modal.vue';
import Dashboard_Edit_modal_btn from './dashboard_Edit_item_modal_btn.vue';

export default {
    props: {
        items: Array,
        category: Object
    },
    data() {
        return {
            modalOn: false,
            itemId: null,
        };
    },
    methods: {
        clickedEdit(id) {
            this.toggleEditModal();
            this.itemId = id
        },
        toggleEditModal() {
            this.modalOn = !this.modalOn;
        },
    },
    components: { Dashboard_Edit_modal, Dashboard_Edit_modal_btn, }
}
</script>

<style scoped>
.overlay {
    background-color: rgba(0, 0, 0, 0.50);
}
</style>
