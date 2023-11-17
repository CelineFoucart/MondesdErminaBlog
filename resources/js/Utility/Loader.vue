<template>
    <div class="flex items-center justify-center" v-if="loading">
        <div class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-slate-400 border-t-transparent"></div>
    </div>
</template>

<script>
    export default {
        props: {
            loading: Boolean,
        },
    }
</script>
