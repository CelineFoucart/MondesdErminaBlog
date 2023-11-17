<template>
    <section class="border-t pt-6">
        <div class="max-w-2xl mx-auto px-4">
            <header class="mb-3">
                <h3 class="text-3xl">{{ commentStats.total }} commentaire{{ commentStats.total > 1 ? 's' : '' }}</h3>
            </header>
            <div v-if="postId !== null && loading === false">
                <CommentForm :postId="postId"></CommentForm>
                <CommentContainer :postId="postId"></CommentContainer>
            </div>
            <Loader :loading="loading"></Loader>
        </div>
    </section>
</template>

<script>
    import { mapState, mapActions } from 'pinia';
    import { useCommentStore } from '@/stores/comment.js';
    import CommentContainer from '@/components/CommentContainer.vue';
    import CommentForm from '@/components/CommentForm.vue';
    import Loader from '@/Utility/Loader.vue';

    export default {
        name: 'Comment',

        components: {
            CommentContainer,
            CommentForm,
            Loader
        },

        props: {
            postId: Number
        },
        
        data() {
            return {
                loading: true
            }
        },

        computed: {
            ...mapState(useCommentStore, ['commentStats'])
        },

        async mounted () {
            this.loading = true;
            await this.getUser();
            await this.getComments(this.postId);
            this.loading = false;
        },

        methods: {
            ...mapActions(useCommentStore, ['getComments', 'getUser']),
        },
    }
</script>
