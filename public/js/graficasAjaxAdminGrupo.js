// var myChart = null;
var myChart2 = null;
var myChart3 = null;

// var valueFilter = document.getElementById('filter');
var valueFilter2 = document.getElementById('filter2');
var valueFilter3 = document.getElementById('filter3');

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
    ajax.open('POST', 'sendDataGrupo', true);

    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('valueFilter2', valueFilter2.value);
    datasend.append('valueFilter3', valueFilter3.value);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            let response = JSON.parse(ajax.responseText);
            console.log(response);

            var date2 = [];
            var cantidad2 = [];
            var date3 = [];
            var cantidad3 = [];

            for (let i = 0; i < response[0].length; i++) {
                date2.push(response[0][i].estado) ;
                cantidad2.push(response[0][i].tarjetas) ;
            }

            for (let i = 0; i < response[1].length; i++) {
                date3.push(response[1][i].fecha);
                cantidad3.push(response[1][i].Tcafes);
            }

            // var ctx = document.getElementById('myChart').getContext('2d');
            var ctx2 = document.getElementById('myChart2').getContext('2d');
            var ctx3 = document.getElementById('myChart3').getContext('2d');

            console.log(myChart2);
            myChart2 = new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: date2,
                    datasets: [{
                        data: cantidad2, // Specify the data values array
                        fill: false,
                        borderColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgb(255,255,0,0.2)',
                        ], // Add custom color border (Line)
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgb(255,255,0,0.2)',
                        ], // Add custom color background (Points and Fill)
                        borderWidth: 1 // Specify bar border width
                    }]
                },

                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontSize: 14.5
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontSize: 14.5
                            }
                        }]
                    },
                    responsive: true,
                }
            });
            console.log(myChart3);
            myChart3 = new Chart(ctx3, {
                    type: 'bar',
                    data: {
                        labels: date3,
                        datasets: [{
                            label: "cafes consumidos", // Name the series
                            data: cantidad3, // Specify the data values array
                            backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
                        }]
                    },

                    options: {
                        responsive: true,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    fontSize: 14.5
                                }
                            }],
                            xAxes: [{
                                ticks: {
                                    fontSize: 14.5
                                }
                            }]
                        },

                    }
            });

            // console.log(response.datos);

        }
    }
    ajax.send(datasend);
}


valueFilter2.addEventListener('change', ()=>{
    myChart2.destroy();
    myChart3.destroy();
    callData();
});

valueFilter3.addEventListener('change', ()=>{
    myChart2.destroy();
    myChart3.destroy();
    callData();
});

callData();

