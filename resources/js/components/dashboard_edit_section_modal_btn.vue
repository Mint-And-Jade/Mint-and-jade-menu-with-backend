<template>
<p class="w-fit h-fit text-[#59d460] cursor-pointer ml-2" @click="clickedEdit">Edit</p>
</template>

<script>
export default {
    methods: {
        clickedEdit(){
            this.$emit('clickedEditSection', this.section.id)
        }
    },
    props: {
        section: Object
    }
}
</script>
