function cargarPagina(page) {
  fetch(page)
    .then((response) => response.text())
    .then((data) => {
      document.getElementById("content").innerHTML = data;
    })
    .catch((error) => console.error("Error al cargar la página:", error));
}


document.querySelectorAll("#dd-oc .dropdown-item").forEach(item => {
	item.addEventListener("click", function(event){
		let textItem = this.textContent.trim();
		
		switch (textItem) {
			case "Ingresos y Gastos":
				document.getElementById("table-ingresos").style.display = "contents"
				break;
			case "Compras":
				document.getElementById("table-compras").style.display = "contents"
				break;
			case "Ventas":
				document.getElementById("table-ventas").style.display = "contents"
				break;
			default:
				break;
		}
	});
});

document.querySelectorAll("#dd-oc-limpiar .dropdown-item").forEach(item => {
	item.addEventListener("click", function(event){
		let textItem = this.textContent.trim();
		switch (textItem) {
			case "Ingresos y Gastos":
				document.getElementById("table-ingresos").style.display = "none"
				break;
			case "Compras":
				document.getElementById("table-compras").style.display = "none"
				break;
			case "Ventas":
				document.getElementById("table-ventas").style.display = "none"
				break;
			default:
				break;
		}
	});
});