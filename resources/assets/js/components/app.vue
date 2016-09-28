<template>
	<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ title }}
                        <button class="btn btn-primary btn-sm pull-right" v-link="{path: '/user'}">User Management</button>
                    </div>
                </div>
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>

	import UserComponent from './user/user.vue';

	export default {
		data(){
			return {
				title: 'Apps. Vuejs and Laravel 5.3'
			}
		},

		components: {
			UserComponent
		}
	}
</script>