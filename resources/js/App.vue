<template>
    <div>
        <Comment :postId="postId"></Comment>
    </div>
</template>

<script>
    import Comment from '@/views/Comment.vue';

    export default {
        name: 'BlogRoot',

        data() {
            return {
                postId: null
            }
        },

        components: {
            Comment,
        },

        mounted () {
            const element = document.getElementById('app');

            if (element !== null) {
                this.postId = parseInt(element.dataset.post);
            }
        },
    }
</script>