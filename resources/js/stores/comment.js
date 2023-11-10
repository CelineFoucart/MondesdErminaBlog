import generate from '../helpers/routing';
import { defineStore } from 'pinia';

export const useCommentStore = defineStore('comments', {
    state: () => ({ 
        comments: [],
        commentStats: { limit: 10, offset: 0, total: 0 },
        user: null
    }),

    actions: {
        async getComments(postId) {
            try {
                const route = generate('commentIndex', {postId: postId, limit: this.commentStats.limit, offset: this.commentStats.offset});
                const response = await window.axios.get(route);

                if (response.status === 200) {
                    this.comments = [...response.data.data];
                    this.commentStats = response.data.meta;
                }

                return true;
            } catch (error) {
                return false;
            }
        },

        async getUser() {
            try {
                const response = await window.axios.get('/api/user');
                this.user = response.data;
            } catch (error) {
                return false;
            }
        }
    }
});