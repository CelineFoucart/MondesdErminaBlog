<template>
    <div class="mt-6">
        <p class="text-center text-gray-500" v-if="commentStats.total === 0">Aucun commentaire n'a été publié sur cet article.</p>
        <CommentCard :comment="comment" v-for="comment in comments" @on-edit="onEditAction" @on-delete="onDeleteAction"></CommentCard>
        <Modal title="Modifier un commentaire" v-if="enableEdit" @on-close="onClose">
            <CommentForm :postId="postId" :commentId="commentId" :message="message" @on-save="onClose"></CommentForm>
        </Modal>
        <Modal title="Supprimer un commentaire" v-if="enableDelete" @on-close="onClose">
            <div v-if="errorDelete === true" class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                La suppression du commentaire a échoué.
            </div>

            <p class="text-red-600 font-bold">Voulez-vous vraiment supprimer ce commentaire ? Attention, toute suppression est définitive.</p>
            <button type="button" @click="onClose" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Annuler</button>
            <button type="button" @click="confirmDeleteComment" class="mt-4 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                Confirmer
            </button>
        </Modal>
    </div>

    <!--
    
    -->
</template>

<script>
    import { mapState, mapActions } from 'pinia';
    import { useCommentStore } from '@/stores/comment.js';
    import CommentCard from '@/components/CommentCard.vue';
    import Modal from '../Utility/Modal.vue';
    import CommentForm from '@/components/CommentForm.vue';
    

    export default {
        name: 'CommentContainer',

        components: {
            CommentCard,
            Modal,
            CommentForm
        },

        props: {
            postId: Number
        },

        data() {
            return {
                enableEdit: false,
                enableDelete: false,
                commentId: null,
                message: null,
                errorDelete: false
            }
        },

        computed: {
            ...mapState(useCommentStore, ['comments']),
            ...mapState(useCommentStore, ['commentStats'])
        },

        methods: {
            ...mapActions(useCommentStore, ["deleteComment"]),

            onEditAction(payload) {
                this.enableEdit = true;
                this.commentId = payload.id;
                this.message = payload.content;
            },

            onDeleteAction(payload) {
                this.commentId = payload.id;
                this.enableDelete = true;
            },

            async confirmDeleteComment() {
                const status = await this.deleteComment(this.commentId);
                if (status !== true) {
                    this.errorDelete = true;
                } else {
                    this.errorDelete = false;
                    this.commentId = null;
                    this.enableDelete = false;
                }
            },

            onClose() {
                this.enableEdit = false;
                this.enableDelete = false;
                this.errorDelete = false;
            }
        },
    }
</script>
