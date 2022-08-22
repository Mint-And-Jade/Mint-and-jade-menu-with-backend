<template>
    <dashboard_main :categories="categories" :sections="sections" :items="items"/>
</template>

<script>

import dashboard_main from '../components/dashboard_main.vue'
export default {
    props: {
        items: Array,
        sections: Array,
        categories: Array
    },
    components: {
        dashboard_main
    }
}
</script>
