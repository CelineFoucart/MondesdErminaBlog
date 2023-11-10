<template>
    <div class="border-gray-200 dark:border-gray-700 pt-6 comment-card">
        <h4 class="text-gray-900 dark:text-white font-semibold">{{ comment.user.name }}</h4>
        <p>
            <span class="text-sm text-gray-600 pr-2"><time datetime="2022-02-08">{{ formatDatetime(comment.created_at) }}</time></span>
            <button type="button" class="text-green-700 hover:text-green-800 mr-1">
                <i class="bi bi-pencil-fill"></i> <span class="sr-only">Editer</span> 
            </button>
            <button type="button" class="text-red-700 hover:text-red-800">
                <i class="bi bi-trash-fill"></i> <span class="sr-only">Supprimer</span>
            </button>
        </p>
        <p class="text-gray-500 dark:text-gray-400 mt-4 mb-4">
            {{ comment.content }}
        </p>
    </div>
</template>

<script>
    import { mapState } from 'pinia';
    import { useCommentStore } from '@/stores/comment.js';
    import dayjs from 'dayjs';
    import 'dayjs/locale/fr';
    dayjs.locale('fr');

    export default {
        props: {
            comment: Object,
        },

        computed: {
            ...mapState(useCommentStore, ['user'])
        },
        
        methods: {
            formatDatetime(datetime) {
                return dayjs(datetime).format('DD MMMM YYYY, HH:mm')
            }
        },
    }
</script>

<style scoped>
.comment-card + .comment-card {
    border-top-width: 1px;
}
</style>
