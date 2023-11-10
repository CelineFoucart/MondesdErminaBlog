<template>
    <div>
        <p class="text-center text-gray-500" v-if="commentStats.total === 0">Aucun commentaire n'a été publié sur cet article.</p>
        <CommentCard :comment="comment" v-for="comment in comments"></CommentCard>
    </div>

    <!--
    <div class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-white">
            <div class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-primary border-t-transparent"></div>
        </div>
    -->
</template>

<script>
    import { mapState, mapActions } from 'pinia';
    import { useCommentStore } from '@/stores/comment.js';
    import CommentCard from '@/components/CommentCard.vue';

    export default {
        name: 'CommentContainer',

        components: {
            CommentCard,
        },

        props: {
            postId: Number
        },

        computed: {
            ...mapState(useCommentStore, ['comments']),
            ...mapState(useCommentStore, ['commentStats'])
        },

        async mounted () {
            await this.getComments(this.postId);
        },

        methods: {
            ...mapActions(useCommentStore, ['getComments']),
        },
    }
</script>
