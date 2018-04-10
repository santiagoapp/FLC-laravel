
// var app = new Vue({
// 	el: '#app',
// 	created: function() {
// 		this.getOTs();
// 	},
// 	data: {
// 		ots: [],
// 		items: [],
// 	},
// 	methods:{
// 		getOTs: function(page) {
// 			var url = 'test';
// 			axios.get(url).then(response => {
// 				this.ots = response.data.data
// 			});
// 		},

// 	}
// });
var app = new Vue({
	el: '#app',
	created: function() {
		this.getOTs();
	},
	data: {
		ots: [],
		items: [],
	},
	methods:{
		getOTs: function(page) {
			var url = 'test';
			axios.get(url).then(response => {
				this.ots = response.data.data
			});
		},
	}
});