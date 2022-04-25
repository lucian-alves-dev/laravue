<template>
    <div class="app-paginator">
        <div class="info"><span>{{ data.total }}</span> registros encontrados</div>
        <nav class="navigator">
            <div v-for="(link, index) in data.links" :key="index" class="display-contents">
                <span v-if="link.url" :class="'item ' + (link.active ? 'current' : '')" @click="onItemClicked(link)">

                    <span v-if="link.label == 'pagination.previous'" class="display-contents">&lsaquo;</span>
                    <span v-else-if="link.label == 'pagination.next'" class="display-contents">&rsaquo;</span>
                    <span v-else class="display-contents">{{ link.label }}</span>

                </span>
            </div>
        </nav>
    </div>
</template>

<script>
    export default {
        name: "AppPaginator",
        props: {
            data: Object,
        },
        emits: ['change'],
        methods: {
            onItemClicked(link) {
                let queryString = link.url.replace(/(.*)\?/, "");
                let searchParams = new URLSearchParams(queryString);
                let page = parseInt(searchParams.get('page')) || 1;
                this.$emit('change', page);
            }
        }
    };
</script>