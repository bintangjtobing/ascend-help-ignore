<template>
    <div>
        <div class="row">
            <div class="col-lg-8">
                <div class="customForm" style="border: 1px solid rgba(0,0,0,.2);padding: 2rem;border-radius: .35rem;">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5><b>ASCEND HR Helper</b></h5>
                            <span>Welcome <b>{{user.name}}</b>.</span>
                        </div>
                        <div class="col-lg-6 text-right mr-auto">
                            <a href="/sign-out" class="btn btn-danger">Sign Out</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4><b>Attendance Alter Request</b></h4>
                        </div>
                    </div>
                    <form @submit.prevent="handleSubmit">
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Employee Code</label>
                                <input type="number" class="form-control" v-model="employee.employee_code">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Alter request</label>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h6><b>Ignore Forget</b><br></h6>
                                        <input type="checkbox" id="signin" value="Sign In"
                                            v-model="employee.ignore.forgetSignIn">
                                        <label for="signin">Sign In</label> <br>
                                        <input type="checkbox" id="signout" value="Sign Out"
                                            v-model="employee.ignore.forgetSignOut">
                                        <label for="signout">Sign Out</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6><b>Ignore Late</b><br></h6>
                                        <input type="checkbox" id="signin" value="Sign In"
                                            v-model="employee.ignore.lateSignIn">
                                        <label for="signin">Sign In</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6><b>Ignore Early</b><br></h6>
                                        <input type="checkbox" id="signout" value="Sign In"
                                            v-model="employee.ignore.earlySignOut">
                                        <label for="signout">Sign Out</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-primary btn-default mx-2"
                                style="color: #fff;">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Swal from 'sweetalert2';

    export default {
        title() {
            return 'Getting Started';
        },
        data() {
            return {
                employee: {
                    ignore: {},
                },
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
            async handleSubmit() {
                const resp = await axios.post('/api/ignore-post', this.employee);
                Swal.fire({
                    icon: 'success',
                    title: 'Congratulations',
                    text: 'Success Update Attendance Alter Request.',
                });
                this.employee.employee_code = '';
                this.employee.ignore = {};
            }
        },

    }
</script>