<template>
	<div class="panel panel-default">
        <div class="panel-heading">
            {{ title }}
            <button class="btn btn-primary btn-sm pull-right" v-link="{path: '/user/create'}">Add user</button>
            <button class="btn btn-primary btn-sm pull-right" v-if="$route.name != 'userIndex'" style="margin-right: 5px" v-link="{path: '/user'}">Back to list</button>
        </div>
        <div class="panel-body">
			<router-view></router-view>
        </div>
    </div>
</template>
<script>

    import ListUser from './list.vue';
	import FormUser from './form.vue';

	export default {
		ready(){
			
		},

		data() {
			return {
				title: 'User Management'
			}
		},

		components: {
			ListUser,
			FormUser
		}
	}
</script>