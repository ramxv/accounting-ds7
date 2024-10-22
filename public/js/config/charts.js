// Sales Bar Chart (Bar)
const salesCtx = document.getElementById('myChart');

new Chart(salesCtx, {
	type: 'bar',
	data: {
		labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre'],
		datasets: [{
			label: 'Ventas (in USD)',
			data: [1500, 2300, 800, 1200, 1000, 900, 1800, 2200, 1400, 1600, 2100],
			backgroundColor: [
				'rgba(255, 99, 132, 0.2)',
				'rgba(54, 162, 235, 0.2)',
				'rgba(255, 206, 86, 0.2)',
				'rgba(75, 192, 192, 0.2)',
				'rgba(153, 102, 255, 0.2)',
				'rgba(255, 159, 64, 0.2)',
				'rgba(255, 99, 132, 0.2)',
				'rgba(54, 162, 235, 0.2)',
				'rgba(255, 206, 86, 0.2)',
				'rgba(75, 192, 192, 0.2)',
				'rgba(153, 102, 255, 0.2)'
			],
			borderColor: [
				'rgba(255, 99, 132, 1)',
				'rgba(54, 162, 235, 1)',
				'rgba(255, 206, 86, 1)',
				'rgba(75, 192, 192, 1)',
				'rgba(153, 102, 255, 1)',
				'rgba(255, 159, 64, 1)',
				'rgba(255, 99, 132, 1)',
				'rgba(54, 162, 235, 1)',
				'rgba(255, 206, 86, 1)',
				'rgba(75, 192, 192, 1)',
				'rgba(153, 102, 255, 1)'
			],
			borderWidth: 1
		}]
	},
	options: {
		scales: {
			y: {
				beginAtZero: true
			}
		}
	}
});


const buyingCtx = document.getElementById("otherChart").getContext('2d');
new Chart(buyingCtx, {
	type: 'line',
	data: {
		labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre'],
		datasets: [{
			label: 'Compras (in USD)',
			data: [200, 300, 500, 700, 600, 550, 650, 700, 800, 750, 900],
			borderColor: 'rgba(0, 123, 255, 1)', 
			backgroundColor: 'rgba(0, 123, 255, 0.2)', 
			borderWidth: 2,
			fill: true
		}]
	},
	options: {
		scales: {
			y: {
				beginAtZero: true
			}
		},
		responsive: true,
		plugins: {
			legend: {
				display: true
			},
			tooltip: {
				enabled: true
			}
		}
	}
});
