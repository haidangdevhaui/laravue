<template>
    <form v-on:submit.prevent="onSubmit(user)" method="POST" class="form-horizontal" role="form">
        <div class="form-group">
            <div class="col-sm-2">
                Name
            </div>
            <div class="col-sm-10">
                <input type="text" class="form-control" v-model="user.name">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                Email
            </div>
            <div class="col-sm-10">
                <input type="text" class="form-control" v-model="user.email">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary">
                    <span v-if="$route.name == 'userCreate'">Create</span>
                    <span v-if="$route.name == 'userEdit'">Update</span>
                </button>
            </div>
        </div>
    </form>
</template>

<script>

    export default {
        ready() {
            if(this.$route.name == 'userEdit'){
                this.$http.get('api/v1/user/' + this.$route.params.uid).then((response) => {
                    this.$set('user', response.data);
                });
            }else{
                this.$set('user', {});
            }
        },

        data() {
            return {
                user: {}
            }
        },

        methods: {
            onSubmit (userData) {
                if(userData.id){
                    this.$http.put('api/v1/user/' + userData.id, userData);
                }else{
                    this.$http.post('api/v1/user', userData);
                }
                this.$set('user', {});
                this.$router.go('/user');
            },
        },
    }
</script>