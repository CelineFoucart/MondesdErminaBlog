import generate from '../helpers/routing';
import { defineStore } from 'pinia';

export const useCommentStore = defineStore('comments', {
    state: () => ({ 
        comments: [],
        commentStats: { limit: 10, offset: 0, total: 0 },
        user: null,
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
                if (response.data !== "") {
                    this.user = response.data;
                }
            } catch (error) {
                return false;
            }
        },

        async postComment(data, postId) {
            try {
                const route = generate('commentStore', {postId: postId});
                const response = await window.axios.post(route, data);
                const comment = response.data.data;

                if (comment.is_validated === true) {
                    this.comments.push(comment);
                    this.commentStats.total += 1
                }

                return true;
            } catch (error) {
                return false;
            }
        },

        async putComment(data, commentId) {
            try {
                const route = generate('commentEdit', {commentId: commentId});
                const response = await window.axios.put(route, data);
                const index = this.comments.findIndex(element => element.id === commentId);
                if (index !== -1) {
                    this.comments[index] = response.data.data;
                }

                return true;
            } catch (error) {
                return false;
            }
        },

        async deleteComment(commentId) {
            try {
                const route = generate('commentDelete', {commentId: commentId});
                await window.axios.delete(route);
                const comments = this.comments.filter(element => element.id !== commentId);
                this.comments = comments;

                return true;
            } catch (error) {
                return false;
            }
        }
    }
});