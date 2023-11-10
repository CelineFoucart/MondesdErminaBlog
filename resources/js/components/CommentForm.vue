<template>
    <div>
        <p v-if="user === null" class="mb-3">
            Pour poster un commentaire, <a href="/login">connectez-vous</a> ou <a href="/register">inscrivez-vous</a>.
        </p>
        <div v-else>
            <form class="mb-6" method="post">
                <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <label for="comment" class="sr-only">Votre commentaire</label>
                    <textarea id="comment" rows="6" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Ecrire un commentaire..." required></textarea>
                </div>

                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Poster
                </button>
            </form>
        </div>
    </div>
</template>

<script>
    import { mapState } from 'pinia';
    import { useCommentStore } from '@/stores/comment.js';
    
    export default {
        name: 'CommentForm',

        props: {
            postId: Number
        },
        
        data() {
            return {
                canPostComment: false
            }
        },

        computed: {
            ...mapState(useCommentStore, ['user'])
        },
    }
</script>
