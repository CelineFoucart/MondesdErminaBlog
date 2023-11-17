<template>
    <div>
        <p v-if="user === null" class="mb-3">
            Pour poster ou modifier un commentaire, <a href="/login">connectez-vous</a> ou <a href="/register">inscrivez-vous</a>.
        </p>
        <div v-else>
            <form method="post">
                <div v-if="status === false" class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    L'enregistrement du commentaire a échoué.
                </div>
                <div v-if="status === true" class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    Votre commentaire a bien été enregistré et est en attente de validation par l'administrateur.
                </div>

                <div class="py-2 px-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <label for="comment" class="sr-only">Votre commentaire</label>
                    <textarea id="comment" v-model="commentContent" rows="6" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Ecrire un commentaire..." required></textarea>
                </div>
                <p v-if="error" class="text-red-600">
                    Un commentaire doit être compris entre 4 et 15000 caractères. 
                    Votre commentaire comprend <strong>{{ commentLength }}</strong> caractère{{ commentLength > 1 ? 's' : '' }}.
                </p>

                <button type="button" @click="submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Poster
                </button>
            </form>
        </div>
    </div>
</template>

<script>
    import { mapState, mapActions } from 'pinia';
    import { useCommentStore } from '@/stores/comment.js';
    
    export default {
        name: 'CommentForm',

        props: {
            postId: Number,
            commentId: {
                type: Number,
                default: null
            },
            message: {
                type: String, 
                default: null
            }
        },
        
        data() {
            return {
                commentContent: null,
                error: false,
                status: null
            }
        },

        computed: {
            ...mapState(useCommentStore, ['user']),

            commentLength() {
                if (this.commentContent === null) {
                    return 0;
                }

                return this.commentContent.length;
            },

            canPostComment() {
                return this.user !== null;
            }
        },

        mounted () {
            if (this.message !== null) {
                this.commentContent = this.message;
            };
        },

        methods: {
            ...mapActions(useCommentStore, ['postComment', 'putComment']),

            validate() {
                this.error = false;

                if (this.commentContent === null ) {
                    this.error = true;
                } else if(this.commentContent.length < 4 || this.commentContent.length > 15000) {
                    this.error = true;
                }
            },

            async submit() {
                this.validate();
                this.status = null;

                if (this.error === true || this.canPostComment === false) {
                    return true;
                }

                const data = { content: this.commentContent };

                if (this.commentId === null) {
                    this.status = await this.postComment(data, this.postId);
                } else {
                    this.status = await this.putComment(data, this.commentId);
                }
                
                if (this.status === true) {
                    this.commentContent = null;
                    this.$emit('on-save');
                }

                return this.status;
            }
        },
    }
</script>
