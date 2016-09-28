<template>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Manager</th>
            </tr>
        </thead>
        <tbody>
            <tr v-if="users.length == 0">
                <td colspan="4" class="text-center">No data</td>
            </tr>
            <tr v-for="user in users">
                <td>{{ $index + 1 }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <button type="button" class="btn btn-success" v-link="{path: 'user/edit/' + user.id}">edit</button>
                        <button type="button" class="btn btn-danger" v-on:click="onDelete(user.id, $index)">delete</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>

    export default {
        ready(){
            this.$http.get('api/v1/user').then((response) => {
                this.$set('users', response.data);
            });
        },

        data() {
            return {
                title: 'List User',
                users: []
            }
        },

        methods: {
            onDelete(uid, index){
                this.$http.delete('api/v1/user/' + uid).then((response) => {
                    this.users.splice(index, 1);
                    this.$set('users', this.users);
                });
            }
        }
    }

</script>