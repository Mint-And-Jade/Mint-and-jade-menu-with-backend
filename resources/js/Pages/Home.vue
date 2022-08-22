<template>
    <div>
        <Header />
        <Main :items="items" :sections="sections" :categories="categories"/>
    </div>
</template>


<script>
import Header from "../components/Header.vue";
import Main from '../components/Main.vue'
export default {
    components: {
        Header,
        Main
    },
    props: {
        sections: Array,
        categories: Array,
        items: Array,
    }
}
</script>
