<template>
    <section class="border-t pt-6">
        <div class="max-w-2xl mx-auto px-4">
            <header class="mb-3">
                <h3 class="text-3xl">{{ commentStats.total }} commentaire{{ commentStats.total > 1 ? 's' : '' }}</h3>
            </header>
            <div v-if="postId !== null">
                <CommentForm :postId="postId"></CommentForm>
                <CommentContainer :postId="postId"></CommentContainer>
            </div>
        </div>
    </section>
</template>

<script>
    import { mapState, mapActions } from 'pinia';
    import { useCommentStore } from '@/stores/comment.js';
    import CommentContainer from '@/components/CommentContainer.vue';
    import CommentForm from '@/components/CommentForm.vue';

    export default {
        name: 'Comment',

        components: {
            CommentContainer,
            CommentForm
        },

        props: {
            postId: Number
        },

        computed: {
            ...mapState(useCommentStore, ['commentStats'])
        },

        async mounted () {
            await this.getUser();
        },

        methods: {
            ...mapActions(useCommentStore, ['getUser']),
        },
    }
</script>
