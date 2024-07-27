const api = "http://localhost/pastel/controller/ingredientes.php";

const app = Vue.createApp({
			data() {
				return {
					ingredientes:[],
					modalCreate: false,
					modalUpdate: false,
					modalDelete: false,
					currentIngrediente:{},
					message : "hola mundo"
				}
			},
			mounted() {
				this.getIngredientes()
			},
			methods:{
				getIngredientes() {
					axios.get(api+"?accion=list")
					.then(function(response){
						console.log(response.data.ingredientes)
						app.ingredientes = response.data.ingredientes
					})
				},
				insertIngrediente() {
					let fd = new FormData()
					fd.append('nombre',document.getElementById('nombre').value)
					fd.append('descripcion',document.getElementById('descripcion').value)
					fd.append('fecha_ingreso',document.getElementById('date_ingreso').value)
					fd.append('fecha_vencimiento',document.getElementById('date_vencimiento').value)

					axios.post(api+"?accion=new", fd)
					.then(function(response) {
						console.log(response.data)
						app.getIngredientes()
					})
				},
				selectIngrediente(pst) {
					app.currentIngrediente = pst
				},
				updateIngrediente() {
					let fd = new FormData()
					fd.append('id_ingrediete',app.currentIngrediente.id_ingrediete)
					fd.append('nombre',document.getElementById('nombre').value)
					fd.append('descripcion',document.getElementById('descripcion').value)
					fd.append('fecha_ingreso',document.getElementById('date_ingreso').value)
					fd.append('fecha_vencimiento',document.getElementById('date_vencimiento').value)

					axios.post(api+"?accion=update", fd)
					.then(function(response) {
						console.log(response.data)
						app.currentIngrediente = {}
						app.getIngredientes()
					})
				},
				delIngrediente() {
					let fd = new FormData()
					fd.append('id_ingrediete',app.currentIngrediente.id_ingrediete)
					
					axios.post(api+"?accion=delete", fd)
					.then(function(response) {
						if(response.data.success){
							console.log(response.data)
							app.currentIngrediente = {}
							app.getIngredientes()	
						}else {
							//
						}
					})
				},
				btnIndex() {
					window.location.href = 'index.html'
				},
				btnIngred() {
					window.location.href = 'ingredientes.html'
				}
			}
		}).mount("#app")