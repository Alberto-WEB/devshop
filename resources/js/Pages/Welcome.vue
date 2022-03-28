<template>
    <app-layout>

    </app-layout>
</template>


<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import AppLayout from '@Layouts/AppLayout'

    export default defineComponent({
        props: ['products'],
        components: {
            Head,
            Link,
            AppLayout,
        },
    })
</script>
