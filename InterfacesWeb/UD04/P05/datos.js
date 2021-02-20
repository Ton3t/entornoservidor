var dataBarProducto1_19 = [748, 149, 1590, 519];
var dataBarProducto2_19 = [1000, 900, 800, 700];
var dataBarProducto3_19 = [419, 219, 79, 2105];
var dataBarProducto1_20 = [133, 221, 783, 2478];
var dataBarProducto2_20 = [408, 547, 675, 734];
var dataBarProducto3_20 = [348, 264, 948, 3159];

var areaBarA_19 = [47, 16, 27, 94, 78];
var areaBarB_19 = [27, 98, 76, 87, 15];
var areaBarA_20 = [65, 75, 70, 80, 60];
var areaBarB_20 = [54, 65, 60, 70, 70];

var percentil25_DWEC = [4, 4, 4, 4];
var percentil25_DWES = [5.125, 5.125, 5.125, 5.125];
var percentil50_DWEC = [6.5, 6.5, 6.5, 6.5];
var percentil50_DWES = [6, 6, 6, 6];
var percentil75_DWEC = [9, 9, 9, 9];
var percentil75_DWES = [7.625, 7.625, 7.625, 7.625];
var notas_DWEC = [5.5, 7.5, 9.5, 3.5];
var notas_DWES = [8, 5, 5.5, 6.5];

var percentil25_DWEC_19 = [2.25, 2.25, 2.25, 2.25];
var percentil25_DWES_19 = [3.875, 3.875, 3.875, 3.875];
var percentil50_DWEC_19 = [5.75, 5.75, 5.75, 5.75];
var percentil50_DWES_19 = [6.5, 6.5, 6.5, 6.5];
var percentil75_DWEC_19 = [7.75, 7.75, 7.75, 7.75];
var percentil75_DWES_19 = [9.125, 9.125, 9.125, 9.125];
var notas_DWEC_19 = [7, 4.5, 8, 1.5];
var notas_DWES_19 = [5, 8, 9.5, 3.5];

var doughnut_19 = [1790, 7516, 1749, 320, 2791];
var doughnut_20 = [2478, 5267, 734, 784, 433];

document.getElementById("idanyo").addEventListener("change", anyo);




function anyo() {

    let estats = document.getElementById("idanyo");
    // Get the <ul> element with id="myList"
    




    if (estats.value == 2019) {
        comprobarChild();


        mapa1a();
        // Estadisticas 1 //
        mapa2a();
        mapa3a();
        mapa4a();

    } else if (estats.value == 2020) {

        comprobarChild();

        mapa1b();
        mapa2b();
        mapa3b();
        mapa4b();
    }
}

function mapa1a() {
    var ctx = document.getElementById('id1');

    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril'],
            datasets: [{
                    label: 'Producto 1',
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: dataBarProducto1_19
                },
                {
                    label: 'Producto 2',
                    backgroundColor: 'rgba(26, 66, 225, 0.5)',
                    borderColor: 'rgb(26, 66, 225)',
                    data: dataBarProducto2_19
                },
                {
                    label: 'Producto 3',
                    backgroundColor: 'rgba(144, 26, 225, 0.5)',
                    borderColor: 'rgb(144, 26, 225)',
                    data: dataBarProducto2_19
                }
            ]
        },
        // Configuration options go here
        options: {
            title: {
                display: true,
                text: 'Ventas de productos a grapallaes'
            }
        }
    });
}

function mapa1b() {
    var ctx = document.getElementById('id1');

    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril'],
            datasets: [{
                    label: 'Producto 1',
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: dataBarProducto1_20
                },
                {
                    label: 'Producto 2',
                    backgroundColor: 'rgba(26, 66, 225, 0.5)',
                    borderColor: 'rgb(26, 66, 225)',
                    data: dataBarProducto2_20
                },
                {
                    label: 'Producto 3',
                    backgroundColor: 'rgba(144, 26, 225, 0.5)',
                    borderColor: 'rgb(144, 26, 225)',
                    data: dataBarProducto3_20
                }
            ]
        },
        // Configuration options go here
        options: {
            title: {
                display: true,
                text: 'Ventas de productos a grapallaes'
            }
        }
    });
}

function mapa2a() {
    var ctx = document.getElementById('id2');
    var myRadarChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: ['HTML', 'CSS', 'JS', 'PHP', 'MySQL'],
            datasets: [{
                    label: 'Candidato 1',
                    backgroundColor: 'rgba(144, 26, 225, 0.5)',
                    borderColor: 'rgb(144, 26, 225)',
                    data: areaBarA_19
                },
                {
                    label: 'Candidato 2',
                    backgroundColor: 'rgba(26, 66, 225, 0.5)',
                    borderColor: 'rgb(26, 66, 225)',
                    data: areaBarB_19

                }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Ventas de productos a grapallaes'
            },
            scale: {
                angleLines: {
                    display: false
                },
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 100,
                    stepSize: 20
                }
            }
        }
    });
}

function mapa2b() {
    var ctx = document.getElementById('id2');
    var myRadarChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: ['HTML', 'CSS', 'JS', 'PHP', 'MySQL'],
            datasets: [{
                    label: 'Candidato 1',
                    backgroundColor: 'rgba(144, 26, 225, 0.5)',
                    borderColor: 'rgb(144, 26, 225)',
                    data: areaBarA_20
                },
                {
                    label: 'Candidato 2',
                    backgroundColor: 'rgba(26, 66, 225, 0.5)',
                    borderColor: 'rgb(26, 66, 225)',
                    data: areaBarB_20

                }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Ventas de productos a grapallaes'
            },
            scale: {
                angleLines: {
                    display: false
                },
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 100,
                    stepSize: 20
                }
            }
        }
    });
}

function mapa3a() {
    var ctx = document.getElementById('id3');
    var mixedChart = new Chart(ctx, {
        type: 'bar',
        data: {
            datasets: [{
                    label: 'DWEC 25',
                    data: percentil25_DWEC,
                    backgroundColor: 'rgba(26, 66, 225, 0.5)',
                    // this dataset is drawn below
                    order: 1
                }, {
                    label: 'DWEC 25',
                    data: percentil25_DWEC,
                    borderColor: 'rgba(225, 149, 26, 0.5)',
                    type: 'line',
                    fill: false,
                    // this dataset is drawn on top
                    order: 2
                }, {
                    label: 'DWES 50',
                    data: percentil50_DWEC,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    order: 3
                }, {
                    label: 'DWES 50',
                    data: percentil50_DWES,
                    borderColor: 'rgba(26, 225, 218, 0.5)',
                    type: 'line',
                    fill: false,
                    order: 4
                }, {
                    label: 'DWES 75',
                    data: percentil75_DWEC,
                    backgroundColor: 'rgba(167, 129, 152, 0.5)',
                    order: 5
                }, {
                    label: 'DWES 75',
                    data: percentil75_DWES,
                    borderColor: 'rgba(114, 72, 156, 0.5)',
                    type: 'line',
                    fill: false,
                    order: 6
                }, {
                    label: 'NOTAS DWEC',
                    data: notas_DWEC,
                    backgroundColor: 'rgba(26, 110, 225, 0.5)',
                    order: 7
                }, {
                    label: 'NOTAS DWES',
                    data: notas_DWES,
                    borderColor: 'rgba(206, 66, 154, 0.5)',
                    fill: false,
                    type: 'line',
                    order: 8
                }


            ],
            labels: ['Alumno 1', 'Alumno 2', 'Alumno 3', 'Alumno 4']
        },
        options: {
            title: {
                display: true,
                text: 'Distribución de notas por asignatura',
            },
            legend: {
                position: 'bottom'
            },

        }
    });
}

function mapa3b() {
    var ctx = document.getElementById('id3');
    var mixedChart = new Chart(ctx, {
        type: 'bar',
        data: {
            datasets: [{
                label: 'DWEC 25',
                data: percentil25_DWEC_19,
                backgroundColor: 'rgba(26, 66, 225, 0.5)',
                // this dataset is drawn below
                order: 1
            }, {
                label: 'DWES 25',
                data: percentil25_DWES_19,
                borderColor: 'rgba(225, 149, 26, 0.5)',
                type: 'line',
                fill: false,
                // this dataset is drawn on top
                order: 2
            }, {
                label: 'DWES 50',
                data: percentil50_DWEC_19,
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                order: 3
            }, {
                label: 'DWES 50',
                data: percentil50_DWES_19,
                borderColor: 'rgba(26, 225, 218, 0.5)',
                type: 'line',
                fill: false,
                order: 4
            }, {
                label: 'DWES 75',
                data: percentil75_DWEC_19,
                backgroundColor: 'rgba(167, 129, 152, 0.5)',
                order: 5
            }, {
                label: 'DWES 75',
                data: percentil75_DWES_19,
                borderColor: 'rgba(114, 72, 156, 0.5)',
                type: 'line',
                fill: false,
                order: 6
            }, {
                label: 'NOTAS DWEC',
                data: notas_DWEC_19,
                backgroundColor: 'rgba(26, 110, 225, 0.5)',
                order: 7
            }, {
                label: 'NOTAS DWES',
                data: notas_DWES_19,
                borderColor: 'rgba(206, 66, 154, 0.5)',
                fill: false,
                type: 'line',
                order: 8
            }],
            labels: ['Alumno 1', 'Alumno 2', 'Alumno 3', 'Alumno 4']
        },
        options: {
            title: {
                display: true,
                text: 'Distribución de notas por asignatura',
            },
            legend: {
                position: 'bottom'
            },

        }
    });
}

function mapa4a() {
    var ctx = document.getElementById("id4");


    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: doughnut_20,
                backgroundColor: ['rgba(206, 66, 154, 05)', 'rgba(244, 185, 11, 05)', 'rgba(244, 11, 11, 05)', 'rgba(118, 206, 66, 05)', 'rgba(66, 121, 206, 05)', ]
            }],
            labels: ['Java', 'PHP', 'Node', 'Python', 'Asp.NET'],


        },
        options: {
            title: {
                display: true,
                text: 'Número de usuarios (miles)',
            },
            legend: {
                position: 'bottom'
            }
        },

    });

}

function mapa4b() {
    var ctx = document.getElementById("id4");


    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: doughnut_19,
                backgroundColor: ['rgba(206, 66, 154, 05)', 'rgba(244, 185, 11, 05)', 'rgba(244, 11, 11, 05)', 'rgba(118, 206, 66, 05)', 'rgba(66, 121, 206, 05)', ]
            }],
            labels: ['Java', 'PHP', 'Node', 'Python', 'Asp.NET'],


        },
        options: {
            title: {
                display: true,
                text: 'Número de usuarios (miles)',
            },
            legend: {
                position: 'bottom'
            }
        },

    });

}

function comprobarChild() {
    var id1 = document.getElementById("id1");

    // If the <ul> element has any child nodes, remove its first child node
    if (id1) {
        id1.remove();
        let nCanvas = document.createElement("canvas");
        nCanvas.setAttribute("id", "id1");
        let clase = document.getElementsByClassName("container")[0];
        clase.appendChild(nCanvas);
    }

    var id2 = document.getElementById("id2");

    // If the <ul> element has any child nodes, remove its first child node
    if (id2) {
        id2.remove();
        let nCanvas2 = document.createElement("canvas");
        nCanvas2.setAttribute("id", "id2");
        let clase2 = document.getElementsByClassName("container")[1];
        clase2.appendChild(nCanvas2);
    }
    var id3 = document.getElementById("id3");

    // If the <ul> element has any child nodes, remove its first child node
    if (id3) {
        id3.remove();
        let nCanvas3 = document.createElement("canvas");
        nCanvas3.setAttribute("id", "id3");
        let clase3 = document.getElementsByClassName("container")[2];
        clase3.appendChild(nCanvas3);
    }
    var id4 = document.getElementById("id4");

    // If the <ul> element has any child nodes, remove its first child node
    if (id4) {
        id4.remove();
        let nCanvas4 = document.createElement("canvas");
        nCanvas4.setAttribute("id", "id4");
        let clase4 = document.getElementsByClassName("container")[3];
        clase4.appendChild(nCanvas4);
    }

}


function borrarTabla() {
    let dataTabla = document.getElementById("id1");
    dataTabla.removeChild(dataTabla.childNodes[0]);
}

anyo();