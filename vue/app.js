const api = "../controller/api.php";

const app = Vue.createApp({
			data() {
				return {
					pasteles:[],
					modalCreate: false,
					modalUpdate: false,
					modalDelete: false,
					modalReporte: false,
					ingrediente_pastel:[],
					currentPastel:{},
					ingredientes:[],
					selectedIngrediente: '',
					message : "hola mundo"
				}
			},
			mounted() {
				this.getPasteles()
			},
			methods:{
				getPasteles() {
					axios.get(api+"?accion=list")
					.then(function(response){
						//console.log(response.data.pasteles)
						app.pasteles = response.data.pasteles
					})
				},
				getReporte() {
					//window.location.href = 'reporte.html'
					let fd = new FormData()
					fd.append('id_pastel',app.currentPastel.id_pastel)
					
					axios.post(api+"?accion=reporte",fd)
					.then(function(response){
						if(response.data.success){
							console.log(response.data)
							app.ingrediente_pastel = response.data.reportes
							//app.currentPastel = {}
							app.getPasteles()	
						}
					})
				},
				btnCerrar() {
					app.ingrediente_pastel = null
				},
				insertPastel() {
					let fd = new FormData()
					fd.append('nombre',document.getElementById('nombre').value)
					fd.append('descripcion',document.getElementById('descripcion').value)
					fd.append('preparado_por',document.getElementById('repostero').value)
					fd.append('fecha_creacion',document.getElementById('date_creacion').value)
					fd.append('fecha_vencimiento',document.getElementById('date_vencimiento').value)

					axios.post(api+"?accion=new", fd)
					.then(function(response) {
						console.log(response.data)
						app.getPasteles()
					})
				},
				selectPastel(pst) {
					app.currentPastel = pst
				},
				updatePastel() {
					let fd = new FormData()
					fd.append('id_pastel',app.currentPastel.id_pastel)
					fd.append('nombre',document.getElementById('nombre').value)
					fd.append('descripcion',document.getElementById('descripcion').value)
					fd.append('preparado_por',document.getElementById('repostero').value)
					fd.append('fecha_creacion',document.getElementById('date_creacion').value)
					fd.append('fecha_vencimiento',document.getElementById('date_vencimiento').value)

					axios.post(api+"?accion=update", fd)
					.then(function(response) {
						//console.log("updatePastel de app.js")
						//console.log(response.data)
						app.currentPastel = {}
						app.getPasteles()
					})
				},
				delPastel() {
					let fd = new FormData()
					fd.append('id_pastel',app.currentPastel.id_pastel)
					
					axios.post(api+"?accion=delete", fd)
					.then(function(response) {
						if(response.data.success){
							console.log(response.data)
							app.currentPastel = {}
							app.getPasteles()	
						}else {
							//
						}
					})
				},
				getIngredientes() {
					axios.get(api+"?accion=list_ingredientes")
					.then(function(response){
						console.log(response.data.ingredientes)
						app.ingredientes = response.data.ingredientes
					})
				},
				saveIng() {
					let fd = new FormData()
					fd.append('id_pastel',app.currentPastel.id_pastel)
					fd.append('id_ingrediente', this.selectedIngrediente) 
					console.log("SAVE ING")
					console.log(fd.append('id_ingrediente', this.selectedIngrediente) )
					console.log("________________________________________________")

					axios.post(api+"?accion=addIngred", fd)
					.then(function(response) {
						console.log(response.data)
						app.getIngredientes()
						app.getReporte()
						app.getPasteles()
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