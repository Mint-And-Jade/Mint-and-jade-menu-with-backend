<template>
    <!-- wrapper -->
    <div class=" w-[375px]">
        <Dashboard_add_item class="mb-12" :categories="categories"/>
        <Dashboard_add_category class="mb-12" :sections="sections"/>
        <Dashboard_add_section />
    </div>
</template>

<script>
import Dashboard_add_item from "./dashboard_add_item.vue";
import Dashboard_add_category from "./dashboard_add_category.vue";
import Dashboard_add_section from "./dashboard_add_section.vue";


export default {
    components: { Dashboard_add_item, Dashboard_add_category, Dashboard_add_section },
    props: {
        sections: Array,
        categories: Array
    }
}
</script>
