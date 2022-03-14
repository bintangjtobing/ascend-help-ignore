<template>
    <div id="app">
        <div class="main-content col-8 bg-light-dark">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                user: {},
            }
        },
        beforeMount() {
            this.userGet();
        },
        methods: {
            async userGet() {
                const resp = await axios.get('/getUserLoggedIn');
                this.user = resp.data;
            },
            logout() {
                axios.get('/sign-out');
                this.$router.go();
            }
        }
    }
</script>