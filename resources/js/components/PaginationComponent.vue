<template>
    <div>
        <nav aria-label="" class="">
            <ul class="pagination text-center">
                <li class="page-item disabled">
                </li>
                <li
                    class="page-item"
                    v-for="page in meta.last_page"
                    :key="page.id"
                >

                    <a class="page-link" href="#" @click.prevent="changePage(page)">{{ page }}</a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    props: ["meta"],
    methods : {
        changePage(page){
            this.$emit('pagination' , page)
        }
    }
};
</script>
