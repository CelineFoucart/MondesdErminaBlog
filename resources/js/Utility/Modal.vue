<template>
    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 modal-backdrop"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex h-full items-end justify-center text-center sm:items-center sm:p-0">
                <div
                    class="relative overflow-hidden rounded-lg bg-white text-left shadow-xl w-96">
                    <div class="bg-white p-6">
                        <h3 class="text-3xl text-gray-900 flex items-center" id="modal-title" v-if="title !== null">
                            <span>{{ title }}</span>
                            <button type="button" class="btn-close text-3xl" aria-label="Close" @click="onClose">&times;</button>
                        </h3>
                        
                        <div class="mt-2">
                            <slot></slot>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Modal',

    props: {
        title: {
            type: String,
            default: null 
        },
    },

    methods: {
        onClose() {
            this.$emit('on-close');
        }
    },
}
</script>

<style scoped>
.modal-backdrop {
    opacity: 0.5;
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: #000;
}

@media (min-width: 800px) {
    .w-96 {
        width: 800px;
    }
}

.btn-close {
    box-sizing: content-box;
    padding: 0.25em 0.25em;
    color: #000;
    border: 0;
    border-radius: 0.375rem;
    margin-left: auto;
}

.btn-close:hover {
    opacity: 0.75;
}

.btn-close:focus {
    opacity: 1;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}
</style>