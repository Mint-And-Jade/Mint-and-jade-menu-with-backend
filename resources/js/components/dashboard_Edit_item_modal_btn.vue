<template>
<p class="w-fit h-fit text-[#59d460] cursor-pointer" @click="clickedEdit">Edit</p>
</template>

<script>
export default {
    methods: {
        clickedEdit(){
            this.$emit('clickedEdit', this.item.id)
        }
    },
    props: {
        item: Object
    }
}
</script>
