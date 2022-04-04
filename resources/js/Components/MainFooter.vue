<template>
    <!-- Main Footer -->
    <footer class="navbar shadow-lg font-small bg-white py-3">
        <div class="container">
            <strong>
                Copyright &copy; {{ currentYear() }} <a :href="homeUrl">GeekBrains</a>
            </strong>
        </div>
    </footer>
</template>

<script>
    import moment from "moment";

    export default {
        name: 'main-footer',
        props: ['homeUrl'],
        data() {
            return {
                labels: {
                    APP_NAME: process.env.MIX_APP_NAME
                },
            };
        },
        methods: {
            currentYear() {
                return moment().format('Y');
            },
        }
    }
</script>
