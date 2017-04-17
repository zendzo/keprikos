<template>
	<span>
		<a href="#" v-if="isFavorited" @click.prevent="unFavorite(kost)">
			<i class="fa fa-heart"></i>
		</a>
		<a href="#" v-else @click.prevent="favorite(kost)">
			<i class="fa fa-heart-o"></i>
		</a>
	</span>
</template>
<script>
	export default {
		props: ['kost','favorited'], //kost is the id of kost and favorited is to be true or false

		data: function() {
			return {
				isFavorited: '',
			}
		},

		mounted(){ //when component is mounted we set the value of isFavorited
			this.isFavorited = this.isFavorited ? true : false;
		},

		computed: {
			isFavorited(){
				return this.favorited; //binung ini apa ? x solve
			},
		},

		methods: {
			favorite(kost){
				axios.post('/favorite/'+kost) //set the value of isFavorited otherwise log error
					.then(response => this.isFavorited = true)
					.catch(response => console.log(response.data));
			},

			unFavorite(kost){
				axios.post('/unfavorite/'+kost)
					.then(response => this.isFavorited = false)
					.catch(response => console.log(response.data));
			}
		}
	}
</script>