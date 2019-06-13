<template>
    <article>
        <img :src="item.image_url" :alt="item.title">
        <span v-text="item.title"></span>
        <span class="text-muted font-italy" v-text="item.description"></span>
    </article>
</template>
<script>
export default {

    props: {
        item: Object,
    }
}

</script>
