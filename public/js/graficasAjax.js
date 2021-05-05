

var myChart = null;
var myChart2 = null;
var myChart3 = null;
var myChart4 = null;

function callData() {
	// Obtener la instancia del objeto XMLHttpRequest
	var peticion_http = new XMLHttpRequest();

	// Preparar la funcion de respuesta
	peticion_http.onreadystatechange = muestraContenido;

	// Realizar peticion HTTP
	peticion_http.open('GET', 'sendData', true);
	peticion_http.send();

	function muestraContenido() {
		if (peticion_http.readyState == 4) {
			if (peticion_http.status == 200) {
				let response = JSON.parse(peticion_http.responseText);
                console.log(response[0]);

                var ctx = document.getElementById('myChart');
                var ctx2 = document.getElementById('myChart2');
                var ctx3 = document.getElementById('myChart3');
                var ctx4 = document.getElementById('myChart4');

                    myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: response[0],
                            datasets: [{
                                label: 'Series 1', // Name the series
                                data: response[1], // Specify the data values array
                                fill: false,
                                borderColor: '#2196f3', // Add custom color border (Line)
                                backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
                                tension: 0.1 // Specify bar border width
                            }, {
                                label: 'Series 2', // Name the series
                                data: [128, 889, 445, 7588, 99, 242, 1417, 550, 75,
                                    457
                                ], // Specify the data values array
                                fill: false,
                                borderColor: '#4CAF50', // Add custom color border (Line)
                                backgroundColor: '#4CAF50', // Add custom color background (Points and Fill)
                                tension: 0.1 // Specify bar border width
                            }]
                        },

                        options: {
                            borderAlign: 'center',
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            },
                            responsive: true,
                        }
                    });

                    myChart2 = new Chart(ctx2, {
                        type: 'bar',
                        data: {
                            labels: response[0],
                            datasets: [{
                                label: 'Series 1', // Name the series
                                data: response[1], // Specify the data values array
                                fill: false,
                                borderColor: '#2196f3', // Add custom color border (Line)
                                backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
                                borderWidth: 1 // Specify bar border width
                            }, {
                                label: 'Series 2', // Name the series
                                data: [128, 889, 445, 7588, 99, 242, 1417, 550, 75,
                                    457
                                ], // Specify the data values array
                                fill: false,
                                borderColor: '#4CAF50', // Add custom color border (Line)
                                backgroundColor: '#4CAF50', // Add custom color background (Points and Fill)
                                borderWidth: 1 // Specify bar border width
                            }]
                        },

                        options: {
                            borderAlign: 'center',
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            },
                            responsive: true,
                        }
                    });

                    myChart3 = new Chart(ctx3, {
                        type: 'pie',
                        data: {
                            labels: response[0],
                            datasets: [{
                                label: 'Series 1', // Name the series
                                data: response[1], // Specify the data values array
                                fill: false,
                                borderColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgb(255,255,0,0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                ], // Add custom color border (Line)
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgb(255,255,0,0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                ], // Add custom color background (Points and Fill)
                                borderWidth: 1 // Specify bar border width
                            }]
                        },

                        options: {
                            borderAlign: 'center',
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            },
                            responsive: true,
                        }
                    });

                    myChart4 = new Chart(ctx4, {
                        type: 'polarArea',
                        data: {
                            labels: response[0],
                            datasets: [{
                                label: 'Series 1', // Name the series
                                data: response[1], // Specify the data values array
                                fill: false,
                                borderColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgb(255,255,0,0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                ], // Add custom color border (Line)
                                backgroundColor:  [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgb(255,255,0,0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                ], // Add custom color background (Points and Fill)
                                tension: 0.1 // Specify bar border width
                            }]
                        },

                        options: {
                            borderAlign: 'center',
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            },
                            responsive: true,
                        }
                    });
                     console.log(response.datos);

			}

		}
	}
}

callData();

// var scatterChart = new Chart(ctx, {
//     type: 'line',
//     data: {
//         labels: ["Tokyo", "Mumbai", "Mexico City", "Shanghai", "Sao Paulo", "New York", "Karachi",
//             "Buenos Aires", "Delhi", "Moscow"
//         ],
//         datasets: [{
//             label: 'Series 1', // Name the series
//             data: [500, 50, 242, 1404, 1414, 411, 454, 47, 555,
//                 681
//             ], // Specify the data values array
//             fill: false,
//             borderColor: '#2196f3', // Add custom color border (Line)
//             // backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
//             tension: 0.1 // Specify bar border width
//         }, {
//             label: 'Series 2', // Name the series
//             data: [128, 889, 445, 7588, 99, 242, 1417, 550, 75,
//                 457
//             ], // Specify the data values array
//             fill: false,
//             borderColor: '#4CAF50', // Add custom color border (Line)
//             // backgroundColor: '#4CAF50', // Add custom color background (Points and Fill)
//             tension: 0.1 // Specify bar border width
//         }]
//     },

//     options: {
//         borderAlign: 'center',
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     beginAtZero: true
//                 }
//             }]
//         },
//         responsive: true,
//     }
// });

// var scatterChart = new Chart(ctx2, {
//     type: 'line',
//     data: {
//         labels: ["Tokyo", "Mumbai", "Mexico City", "Shanghai", "Sao Paulo", "New York", "Karachi",
//             "Buenos Aires", "Delhi", "Moscow"
//         ],
//         datasets: [{
//             label: 'Series 1', // Name the series
//             data: [500, 50, 242, 1404, 1414, 411, 454, 47, 555,
//                 681
//             ], // Specify the data values array
//             fill: false,
//             borderColor: '#2196f3', // Add custom color border (Line)
//             // backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
//             tension: 0.1 // Specify bar border width
//         }, {
//             label: 'Series 2', // Name the series
//             data: [128, 889, 445, 7588, 99, 242, 1417, 550, 75,
//                 457
//             ], // Specify the data values array
//             fill: false,
//             borderColor: '#4CAF50', // Add custom color border (Line)
//             // backgroundColor: '#4CAF50', // Add custom color background (Points and Fill)
//             tension: 0.1 // Specify bar border width
//         }]
//     },

//     options: {
//         borderAlign: 'center',
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     beginAtZero: true
//                 }
//             }]
//         },
//         responsive: true,
//     }
// });

// var scatterChart = new Chart(ctx3, {
//     type: 'line',
//     data: {
//         labels: ["Tokyo", "Mumbai", "Mexico City", "Shanghai", "Sao Paulo", "New York", "Karachi",
//             "Buenos Aires", "Delhi", "Moscow"
//         ],
//         datasets: [{
//             label: 'Series 1', // Name the series
//             data: [500, 50, 242, 1404, 1414, 411, 454, 47, 555,
//                 681
//             ], // Specify the data values array
//             fill: false,
//             borderColor: '#2196f3', // Add custom color border (Line)
//             // backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
//             tension: 0.1 // Specify bar border width
//         }, {
//             label: 'Series 2', // Name the series
//             data: [128, 889, 445, 7588, 99, 242, 1417, 550, 75,
//                 457
//             ], // Specify the data values array
//             fill: false,
//             borderColor: '#4CAF50', // Add custom color border (Line)
//             // backgroundColor: '#4CAF50', // Add custom color background (Points and Fill)
//             tension: 0.1 // Specify bar border width
//         }]
//     },

//     options: {
//         borderAlign: 'center',
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     beginAtZero: true
//                 }
//             }]
//         },
//         responsive: true,
//     }
// });

// var scatterChart = new Chart(ctx4, {
//     type: 'line',
//     data: {
//         labels: ["Tokyo", "Mumbai", "Mexico City", "Shanghai", "Sao Paulo", "New York", "Karachi",
//             "Buenos Aires", "Delhi", "Moscow"
//         ],
//         datasets: [{
//             label: 'Series 1', // Name the series
//             data: [500, 50, 242, 1404, 1414, 411, 454, 47, 555,
//                 681
//             ], // Specify the data values array
//             fill: false,
//             borderColor: '#2196f3', // Add custom color border (Line)
//             // backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
//             tension: 0.1 // Specify bar border width
//         }, {
//             label: 'Series 2', // Name the series
//             data: [128, 889, 445, 7588, 99, 242, 1417, 550, 75,
//                 457
//             ], // Specify the data values array
//             fill: false,
//             borderColor: '#4CAF50', // Add custom color border (Line)
//             // backgroundColor: '#4CAF50', // Add custom color background (Points and Fill)
//             tension: 0.1 // Specify bar border width
//         }]
//     },

//     options: {
//         borderAlign: 'center',
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     beginAtZero: true
//                 }
//             }]
//         },
//         responsive: true,
//     }
// });
