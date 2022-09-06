<template>
    <div>
        <Header :isAuth="isAuth" />
        <Main :Categories="Categories" :Sections="Sections"/>
    </div>
</template>


<script>
import Header from "../components/Header.vue";
import Main from '../components/Main.vue'
export default {
    components: {
        Header,
        Main,
    },
    props: {
        sections: Array,
        categories: Array,
        items: Array,
        isAuth: Boolean,
    },
    data() {
        return {
            Sections: null,
            Categories: null
        }
    },
    methods: {
        Objects() {
            let sections = [];
            this.sections.forEach(section => {
                let categories = []
                this.categories.forEach(category => {
                    if (category.section_id === section.id) {
                        categories.push(category)
                    }
                })
                let sectionId = section.id
                let sectionName = section.name
                sections.push({ sectionId,sectionName, categories })
            });

            let categories = [];
            this.categories.forEach(category => {
                let items = []
                this.items.forEach(item => {
                    if (item.category_id === category.id) {
                        items.push(item)
                    }
                })
                let categoryId = category.id
                categories.push({ categoryId, items })
            });
            this.Sections = sections
            this.Categories = categories
        }
    },
    mounted() {
        this.Objects()
    },
}


</script>
