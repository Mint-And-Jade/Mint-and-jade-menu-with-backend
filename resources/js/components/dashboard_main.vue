<template>
    <main class="w-full h-fit py-10 flex items-center flex-col">
        <!-- nav -->
        <nav class="mb-16 h-fit w-[375px] border-2 rounded-md p-4 border-[#59d460]">
            <!-- wrapper -->
            <div class="flex justify-around">
                <p :class="editStyle" @click="clickedEdit">Edit</p>
                <p :class="addStyle" @click="clickedAdd">Add</p>
            </div>
        </nav>
        <!-- main -->
        <Dashboard_edit v-if="currentTab === 'edit'" :sections="sections" :items="items" :categories="categories" />
        <Dashboard_add  v-if="currentTab === 'add'" :sections="sections" :categories="categories"/>
    </main>
</template>

<script>
import Dashboard_edit from './Dashboard_edit.vue';
import Dashboard_add from './dashboard_add.vue';
export default {
    props: {
        sections: Array,
        items: Array,
        categories: Array,
    },
    methods: {
        clickedAdd(){
            this.currentTab = 'add'
            this.editStyle = 'cursor-pointer'
            this.addStyle = 'cursor-pointer text-[#59d460]'
        },
        clickedEdit(){
            this.currentTab = 'edit'
            this.addStyle = 'cursor-pointer'
            this.editStyle = 'cursor-pointer text-[#59d460]'
        }
    },
    components: { Dashboard_edit, Dashboard_add },
    data() {
        return {
            currentTab: 'edit',
            addStyle: 'cursor-pointer',
            editStyle: 'cursor-pointer text-[#59d460]'
        }
    },
}
</script>

<style>
input:focus {
    border: none;
}
</style>


