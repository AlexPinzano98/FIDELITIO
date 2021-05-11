var myChart = null;
var myChart2 = null;
var myChart3 = null;
var myChart4 = null;

function objetoAjax() {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function callData() {
    var ajax = new objetoAjax();
    var token = document.getElementById('token').getAttribute('content');
    // Obtener la instancia del objeto XMLHttpRequest
    ajax.open('POST', 'sendData', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    // datasend.append('id_promo', id_promo);
    // datasend.append('id_camarero', id_camarero);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            let response = JSON.parse(ajax.responseText);
            console.log(response);

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
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontSize: 16
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontSize: 16
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
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontSize: 16
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontSize: 16
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
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontSize: 16
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontSize: 16
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
                        backgroundColor: [
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
                                beginAtZero: true,
                                fontSize: 16
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontSize: 16
                            }
                        }]
                    },
                    responsive: true,
                }
            });
            console.log(response.datos);

        }
    }
    ajax.send(datasend);
}


callData();
// 	function muestraContenido() {
// 		if (peticion_http.readyState == 4) {
// 			if (peticion_http.status == 200) {
// 				let response = JSON.parse(peticion_http.responseText);
//                 console.log(response);

//                 var ctx = document.getElementById('myChart');
//                 var ctx2 = document.getElementById('myChart2');
//                 var ctx3 = document.getElementById('myChart3');
//                 var ctx4 = document.getElementById('myChart4');

//                     myChart = new Chart(ctx, {
//                         type: 'line',
//                         data: {
//                             labels: response[0],
//                             datasets: [{
//                                 label: 'Series 1', // Name the series
//                                 data: response[1], // Specify the data values array
//                                 fill: false,
//                                 borderColor: '#2196f3', // Add custom color border (Line)
//                                 backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
//                                 tension: 0.1 // Specify bar border width
//                             }, {
//                                 label: 'Series 2', // Name the series
//                                 data: [128, 889, 445, 7588, 99, 242, 1417, 550, 75,
//                                     457
//                                 ], // Specify the data values array
//                                 fill: false,
//                                 borderColor: '#4CAF50', // Add custom color border (Line)
//                                 backgroundColor: '#4CAF50', // Add custom color background (Points and Fill)
//                                 tension: 0.1 // Specify bar border width
//                             }]
//                         },

//                         options: {
//                             borderAlign: 'center',
//                             scales: {
//                                 yAxes: [{
//                                     ticks: {
//                                         beginAtZero: true
//                                     }
//                                 }]
//                             },
//                             responsive: true,
//                         }
//                     });

//                     myChart2 = new Chart(ctx2, {
//                         type: 'bar',
//                         data: {
//                             labels: response[0],
//                             datasets: [{
//                                 label: 'Series 1', // Name the series
//                                 data: response[1], // Specify the data values array
//                                 fill: false,
//                                 borderColor: '#2196f3', // Add custom color border (Line)
//                                 backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
//                                 borderWidth: 1 // Specify bar border width
//                             }, {
//                                 label: 'Series 2', // Name the series
//                                 data: [128, 889, 445, 7588, 99, 242, 1417, 550, 75,
//                                     457
//                                 ], // Specify the data values array
//                                 fill: false,
//                                 borderColor: '#4CAF50', // Add custom color border (Line)
//                                 backgroundColor: '#4CAF50', // Add custom color background (Points and Fill)
//                                 borderWidth: 1 // Specify bar border width
//                             }]
//                         },

//                         options: {
//                             borderAlign: 'center',
//                             scales: {
//                                 yAxes: [{
//                                     ticks: {
//                                         beginAtZero: true
//                                     }
//                                 }]
//                             },
//                             responsive: true,
//                         }
//                     });

//                     myChart3 = new Chart(ctx3, {
//                         type: 'pie',
//                         data: {
//                             labels: response[0],
//                             datasets: [{
//                                 label: 'Series 1', // Name the series
//                                 data: response[1], // Specify the data values array
//                                 fill: false,
//                                 borderColor: [
//                                     'rgba(255, 99, 132, 0.2)',
//                                     'rgba(54, 162, 235, 0.2)',
//                                     'rgb(255,255,0,0.2)',
//                                     'rgba(75, 192, 192, 0.2)',
//                                 ], // Add custom color border (Line)
//                                 backgroundColor: [
//                                     'rgba(255, 99, 132, 0.2)',
//                                     'rgba(54, 162, 235, 0.2)',
//                                     'rgb(255,255,0,0.2)',
//                                     'rgba(75, 192, 192, 0.2)',
//                                 ], // Add custom color background (Points and Fill)
//                                 borderWidth: 1 // Specify bar border width
//                             }]
//                         },

//                         options: {
//                             borderAlign: 'center',
//                             scales: {
//                                 yAxes: [{
//                                     ticks: {
//                                         beginAtZero: true
//                                     }
//                                 }]
//                             },
//                             responsive: true,
//                         }
//                     });

//                     myChart4 = new Chart(ctx4, {
//                         type: 'polarArea',
//                         data: {
//                             labels: response[0],
//                             datasets: [{
//                                 label: 'Series 1', // Name the series
//                                 data: response[1], // Specify the data values array
//                                 fill: false,
//                                 borderColor: [
//                                     'rgba(255, 99, 132, 0.2)',
//                                     'rgba(54, 162, 235, 0.2)',
//                                     'rgb(255,255,0,0.2)',
//                                     'rgba(75, 192, 192, 0.2)',
//                                 ], // Add custom color border (Line)
//                                 backgroundColor:  [
//                                     'rgba(255, 99, 132, 0.2)',
//                                     'rgba(54, 162, 235, 0.2)',
//                                     'rgb(255,255,0,0.2)',
//                                     'rgba(75, 192, 192, 0.2)',
//                                 ], // Add custom color background (Points and Fill)
//                                 tension: 0.1 // Specify bar border width
//                             }]
//                         },

//                         options: {
//                             borderAlign: 'center',
//                             scales: {
//                                 yAxes: [{
//                                     ticks: {
//                                         beginAtZero: true
//                                     }
//                                 }]
//                             },
//                             responsive: true,
//                         }
//                     });
//                      console.log(response.datos);

// 			}

// 		}
// 	}
// }



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