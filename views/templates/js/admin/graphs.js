let preguntas = {
    '3': 'Anote la cantidad total de personal que tenía la Administración Pública de su entidad federativa al cierre del año, especificando si se encontraba en instituciones de la Administración Central o Paraestatal.',
    '4': 'De acuerdo con la cantidad total de personal que registró en la respuesta de la pregunta anterior, anote el personal especificando el régimen de contratación y sexo.',
    '5': 'De acuerdo con la cantidad total de personal que registró en la respuesta de la pregunta 3, anote el personal especificando la institución de seguridad social en la que se encontraba registrado, según su sexo.',
    '6': 'De acuerdo con la cantidad total de personal que registró en la respuesta a la pregunta 3, anote el personal especificando el rango de edad y sexo.',
    '7': 'De acuerdo con la cantidad total de personal que registró en la respuesta de la pregunta 3, anote el personal especificando el rango de ingresos mensual y sexo.',
    '9': 'De acuerdo con la respuesta de la pregunta 3, en la siguiente tabla anote la cantidad de personal con el que contaron cada una de las instituciones de la Administración Pública de su entidad federativa para el ejercicio de sus funciones, especificando su sexo.',
    '15': 'Anote la cantidad total de bienes inmuebles que tenía la Administración Pública de la entidad federativa al cierre del año, especificando su tipo de posesión y si se encontraban asignados a instituciones de la Administración Central o Paraestatal.',
    '16': 'De acuerdo con la respuesta de la pregunta 15, en la siguiente tabla anote la cantidad total de bienes inmuebles con los que contaron cada una de las instituciones de la Administración Pública de su entidad federativa para el ejercicio de sus funciones, especificando el tipo de posesión.',
    '17': 'Anote la cantidad total de vehículos en funcionamiento, por tipo, que conformaron el parque vehicular de la Administración Pública de su entidad federativa al cierre del año, especificando si se encontraban asignados a instituciones de la Administración Central o Paraestatal.',
    '18': 'De acuerdo con la respuesta de la pregunta anterior, en la siguiente tabla anote la cantidad total de vehículos con los que contaron cada una de las instituciones de la Administración Pública de su entidad federativa para el ejercicio de sus funciones, especificando el tipo de  los mismos.',
    '19': 'Anote la cantidad total de líneas y aparatos telefónicos en funcionamiento que tenía la Administración Pública de su entidad federativa al cierre del año 2018, especificando si se encontraban asignados a instituciones de la Administración Central o Paraestatal.',
    '20': 'De acuerdo con la respuesta de la pregunta 19, en la siguiente tabla anote la cantidad total de líneas y aparatos telefónicos con los que contaron cada una de las instituciones de la Administración Pública de su entidad federativa para el ejercicio de sus funciones, especificando el tipo de  los mismos.',
    '21': 'Anote la cantidad total de computadoras por tipo, impresoras por tipo, multifuncionales, servidores y tabletas electrónicas en funcionamiento que tenía la Administración Pública de su entidad federativa, al cierre del año anterior, especificando si se encontraban asignadas a instituciones de la Administración Central o Paraestatal.',
    '22': 'De acuerdo con la respuesta de la pregunta 21, en la siguiente tabla anote la cantidad total de computadoras por tipo, impresoras por tipo, multifuncionales, servidores y tabletas electrónicas con las que contaron cada una de las instituciones de la Administración Pública de su entidad federativa para el ejercicio de sus funciones.'
},
    anios = [],
    registroAnios = [];

document.addEventListener('DOMContentLoaded', function () {
    verificarAnios();
    document.getElementById('preguntaGrafica').addEventListener('change', () => {
        document.getElementById('tablesContainer').innerHTML = '';

        verificarAnios();

        actualizarPopover(document.getElementById('preguntaGrafica').value);
    });
    document.getElementById('btnTabular').addEventListener('click', () => {
        // console.warn('Registro de años (Tabla ' + document.getElementById('preguntaGrafica').value + ')');
        // console.log(registroAnios); // Registro de años completo
        tabularDatos(document.getElementById('preguntaGrafica').value);
    });
});

verificarAnios = () => {
    anios = []

    for (let i = new Date().getFullYear(); i >= 2017; i--) {
        anios.push(i); // Crecion arreglo de años
    }

    crearSelectComparacionAnios()

    obtenerAnios().then((pregunta) => {
        redimensionarContenedores(pregunta);
        graficarDatos(pregunta);
    });
}

actualizarPopover = (pregunta) => {
    let popover = document.getElementById('popoverPreguntas');
    popover.setAttribute('data-original-title', ('Pregunta ' + pregunta));
    popover.setAttribute('data-content', preguntas[pregunta]);
}

redimensionarContenedores = (pregunta) => {
    if (pregunta == 9 || pregunta == 16 || pregunta == 18 || pregunta == 20 || pregunta == 22) {
        document.getElementById('container').style = 'height: 900vh; z-index: 1; box-shadow: 40px 0px 30px -20px rgba(236,238,239,1);';
        document.getElementById('container').classList.add('col-lg-6', 'col-md-6', 'border', 'border-bottom-0', 'border-left-0', 'rounded');
        document.getElementById('secondContainer').classList.remove('d-none');
    } else if (pregunta == 7) {
        document.getElementById('container').style = 'height: 90vh; z-index: 1; rgba(236,238,239,1); box-shadow: 0px 0px 0px 0px white;';
        document.getElementById('container').classList.remove('col-lg-6', 'col-md-6', 'border', 'border-bottom-0', 'border-left-0', 'rounded');
        document.getElementById('secondContainer').classList.add('d-none');
    } else {
        document.getElementById('container').style = 'height: 450px; z-index: 1; rgba(236,238,239,1); box-shadow: 0px 0px 0px 0px white;';
        document.getElementById('container').classList.remove('col-lg-6', 'col-md-6', 'border', 'border-bottom-0', 'border-left-0', 'rounded');
        document.getElementById('secondContainer').classList.add('d-none');
    }
}

async function obtenerAnios() {
    let pregunta = document.getElementById('preguntaGrafica').value;
    for (let i = 0; i < anios.length; i++) {
        await obtenerDatos(pregunta, anios[i]);
    }
    return pregunta;
}

async function obtenerDatos(pregunta, anio) {
    try {
        let res = await axios('controllers/questionController.php', {
            method: 'POST',
            data: {
                pregunta,
                anio
            }
        });
        // console.log(res.data); // Arreglos de datos
        registroAnios[anio] = res.data;
    } catch (error) {
        alertify.error('Imposible generar gráfico !');
        console.error(error);
    }
}

graficarDatos = (pregunta) => {
    let dataPrev = {},
        data = {};

    for (let i = 0; i < anios.length - 1; i++) {
        data[anios[i]] = registroAnios[anios[i]];
    }

    for (let i = 0; i < anios.length - 1; i++) {
        dataPrev[anios[i]] = registroAnios[anios[i + 1]];
    }

    // console.warn('DataPrev');
    // console.log(dataPrev);
    // console.warn('Data');
    // console.log(data);

    crearSelectComparacionAnios()

    if (pregunta == 3) {
        getData = (data) => {
            return data.map((category, i) => {
                return {
                    name: category[0],
                    y: category[1],
                    gender: category[2],
                    color: category[2] == 'Hombres' ? '#14587A' : '#E0B61D',
                };
            });
        }

        getDataPrev = (data) => {
            return data.map((category, i) => {
                return {
                    name: category[0],
                    y: category[1],
                    gender: category[2],
                };
            });
        }

        let chart = Highcharts.chart('container', {
            chart: {
                type: 'column',
            },
            title: {
                text: 'Cantidad de personal, ' + anios[0],
            },
            subtitle: {
                text:
                    'Representación por sexo y tipo de institución, comparación de cantidades con el ' + anios[1],
            },
            loading: {
                hideDuration: 1000,
                showDuration: 0
            },
            lang: {
                noData: 'No existen resultados. Restablezca los parámetros de búsqueda'
            },
            noData: {
                style: {
                    fontWeight: 'bold',
                    fontSize: '14px',
                    color: '#b91926',
                    opacity: '.7'
                }
            },
            plotOptions: {
                series: {
                    grouping: false,
                    borderWidth: 0,
                },
            },
            legend: {
                enabled: false,
            },
            tooltip: {
                headerFormat: '<span style="font-size:12px" class="font-weight-bold w-100 text-left">{point.point.name}</span><table style="width: 100%;">',
                pointFormat: '<tr class="d-flex justify-content-between">' +
                    '<td style="color:{point.color};padding:0" class="text-left">' +
                    '<span style="color:{point.color}">\u25CF</span> {series.name}: ' +
                    '</td>' +
                    '<td style="padding:0" class="text-right">' +
                    '<span class="font-weight-bold px-1">{point.y} </span><span style="color:{point.color}">{point.gender}</span>' +
                    '</td>' +
                    '</tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            xAxis: {
                type: "category",
            },
            yAxis: [
                {
                    title: {
                        text: 'Cantidad de personal'
                    },
                    showFirstLabel: false,
                },
            ],
            series: [
                {
                    color: 'rgb(158, 159, 163)',
                    pointPlacement: -0.2,
                    linkedTo: 'main',
                    data: getDataPrev(dataPrev[anios[0]]).slice(),
                    name: anios[1],
                    dataLabels: [
                        {
                            enabled: true,
                            inside: true,
                            align: 'left',
                            color: 'black',
                            style: {
                                fontSize: '9px',
                            },
                        },
                    ],
                },
                {
                    name: anios[0],
                    id: 'main',
                    dataSorting: {
                        enabled: true,
                        matchByName: true,
                    },
                    dataLabels: [
                        {
                            enabled: true,
                            inside: true,
                            style: {
                                fontSize: '12px',
                            },
                        },
                    ],
                    data: getData(data[anios[0]]).slice(),
                },
            ],
            exporting: {
                allowHTML: true,
            },
        });

        document.getElementById('anioGrafica').addEventListener('change', function () {
            alertify.success('change')
            chart.showLoading('<i class="fas fa-lg fa-spin fa-spinner"></i>');
            chart.update(
                {
                    title: {
                        text:
                            'Cantidad de personal, ' + this.value,
                    },
                    subtitle: {
                        text:
                            'Representación por sexo y tipo de institución, comparación de cantidades con el ' + (this.value - 1),
                    },
                    series: [
                        {
                            name: this.value - 1,
                            data: getDataPrev(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getData(data[this.value]).slice(),
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 800,
                }
            );
            chart.hideLoading();
        });
    } else if (pregunta == 4) {
        getData = (data) => {
            return data.map((category, i) => {
                return {
                    name: category[0],
                    y: category[1],
                    gender: category[2],
                    color: category[2] == 'Hombres' ? '#14587A' : '#E0B61D',
                };
            });
        }

        getDataPrev = (data) => {
            return data.map((category, i) => {
                return {
                    name: category[0],
                    y: category[1],
                    gender: category[2],
                };
            });
        }

        let chart = Highcharts.chart('container', {
            chart: {
                type: 'column',
            },
            title: {
                text: 'Cantidad de personal, ' + anios[0],
            },
            subtitle: {
                text:
                    'Representación por sexo y régimen de contratación, comparación de cantidades con el ' + anios[1],
            },
            loading: {
                hideDuration: 1000,
                showDuration: 0
            },
            lang: {
                noData: 'No existen resultados. Restablezca los parámetros de búsqueda'
            },
            noData: {
                style: {
                    fontWeight: 'bold',
                    fontSize: '14px',
                    color: '#b91926',
                    opacity: '.7'
                }
            },
            plotOptions: {
                series: {
                    grouping: false,
                    borderWidth: 0,
                },
            },
            legend: {
                enabled: false,
            },
            tooltip: {
                headerFormat: '<span style="font-size:12px" class="font-weight-bold w-100 text-left">{point.point.name}</span><table style="width: 100%;">',
                pointFormat: '<tr class="d-flex justify-content-between">' +
                    '<td style="color:{point.color};padding:0" class="text-left">' +
                    '<span style="color:{point.color}">\u25CF</span> {series.name}: ' +
                    '</td>' +
                    '<td style="padding:0" class="text-right">' +
                    '<span class="font-weight-bold px-1">{point.y} </span><span style="color:{point.color}">{point.gender}</span>' +
                    '</td>' +
                    '</tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            xAxis: {
                type: "category",
            },
            yAxis: [
                {
                    title: {
                        text: 'Cantidad de personal'
                    },
                    showFirstLabel: false,
                },
            ],
            series: [
                {
                    color: 'rgb(158, 159, 163)',
                    pointPlacement: -0.4,
                    linkedTo: 'main',
                    data: getDataPrev(dataPrev[anios[0]]).slice(),
                    name: anios[1],
                    dataLabels: [
                        {
                            enabled: true,
                            inside: true,
                            align: 'left',
                            color: 'black',
                            style: {
                                fontSize: '8px',
                            },
                        },
                    ],
                },
                {
                    name: anios[0],
                    id: 'main',
                    dataSorting: {
                        enabled: true,
                        matchByName: true,
                    },
                    dataLabels: [
                        {
                            enabled: true,
                            inside: true,
                            style: {
                                fontSize: '10px',
                            },
                        },
                    ],
                    data: getData(data[anios[0]]).slice(),
                },
            ],
            exporting: {
                allowHTML: true,
            },
        });

        document.getElementById('anioGrafica').addEventListener('change', function () {
            alertify.success('change')
            chart.showLoading('<i class="fas fa-lg fa-spin fa-spinner"></i>');
            chart.update(
                {
                    title: {
                        text:
                            'Cantidad de personal, ' + this.value,
                    },
                    subtitle: {
                        text:
                            'Representación por sexo y régimen de contratación, comparación de cantidades con el ' + (this.value - 1),
                    },
                    series: [
                        {
                            name: this.value - 1,
                            data: getDataPrev(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getData(data[this.value]).slice(),
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 800,
                }
            );
            chart.hideLoading();
        });
    } else if (pregunta == 5) {
        getData = (data) => {
            return data.map((category, i) => {
                return {
                    name: category[0],
                    y: category[1],
                    gender: category[2],
                    color: category[2] == 'Hombres' ? '#14587A' : '#E0B61D',
                };
            });
        }

        getDataPrev = (data) => {
            return data.map((category, i) => {
                return {
                    name: category[0],
                    y: category[1],
                    gender: category[2],
                };
            });
        }

        let chart = Highcharts.chart('container', {
            chart: {
                type: 'column',
            },
            title: {
                text: 'Cantidad de personal, ' + anios[0],
            },
            subtitle: {
                text:
                    'Representación por sexo e institución de seguridad social, comparación de cantidades con el ' + anios[1],
            },
            loading: {
                hideDuration: 1000,
                showDuration: 0
            },
            lang: {
                noData: 'No existen resultados. Restablezca los parámetros de búsqueda'
            },
            noData: {
                style: {
                    fontWeight: 'bold',
                    fontSize: '14px',
                    color: '#b91926',
                    opacity: '.7'
                }
            },
            plotOptions: {
                series: {
                    grouping: false,
                    borderWidth: 0,
                },
            },
            legend: {
                enabled: false,
            },
            tooltip: {
                headerFormat: '<span style="font-size:12px" class="font-weight-bold w-100 text-left">{point.point.name}</span><table style="width: 100%;">',
                pointFormat: '<tr class="d-flex justify-content-between">' +
                    '<td style="color:{point.color};padding:0" class="text-left">' +
                    '<span style="color:{point.color}">\u25CF</span> {series.name}: ' +
                    '</td>' +
                    '<td style="padding:0" class="text-right">' +
                    '<span class="font-weight-bold px-1">{point.y} </span><span style="color:{point.color}">{point.gender}</span>' +
                    '</td>' +
                    '</tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            xAxis: {
                type: "category",
            },
            yAxis: [
                {
                    title: {
                        text: 'Cantidad de personal'
                    },
                    showFirstLabel: false,
                },
            ],
            series: [
                {
                    color: 'rgb(158, 159, 163)',
                    pointPlacement: -0.4,
                    linkedTo: 'main',
                    data: getDataPrev(dataPrev[anios[0]]).slice(),
                    name: anios[1],
                    dataLabels: [
                        {
                            enabled: true,
                            inside: true,
                            align: 'left',
                            color: 'black',
                            style: {
                                fontSize: '8px',
                            },
                        },
                    ],
                },
                {
                    name: anios[0],
                    id: 'main',
                    dataSorting: {
                        enabled: true,
                        matchByName: true,
                    },
                    dataLabels: [
                        {
                            enabled: true,
                            inside: true,
                            style: {
                                fontSize: '10px',
                            },
                        },
                    ],
                    data: getData(data[anios[0]]).slice(),
                },
            ],
            exporting: {
                allowHTML: true,
            },
        });

        document.getElementById('anioGrafica').addEventListener('change', function () {
            alertify.success('change')
            chart.showLoading('<i class="fas fa-lg fa-spin fa-spinner"></i>');
            chart.update(
                {
                    title: {
                        text:
                            'Cantidad de personal, ' + this.value,
                    },
                    subtitle: {
                        text:
                            'Representación por sexo e institución de seguridad social, comparación de cantidades con el ' + (this.value - 1),
                    },
                    series: [
                        {
                            name: this.value - 1,
                            data: getDataPrev(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getData(data[this.value]).slice(),
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 800,
                }
            );
            chart.hideLoading();
        });
    } else if (pregunta == 6) {
        getData = (data) => {
            return data.map((category, i) => {
                return {
                    name: category[0],
                    y: category[2] == 'Hombres' ? category[1] : -category[1],
                    gender: category[2],
                    color: category[2] == 'Hombres' ? '#14587A' : '#E0B61D',
                };
            });
        }

        getDataPrev = (data) => {
            return data.map((category, i) => {
                return {
                    name: category[0],
                    y: category[2] == 'Hombres' ? category[1] : -category[1],
                    gender: category[2],
                };
            });
        }

        let categories = [
            '18-24',
            '25-29',
            '30-34',
            '35-39',
            '40-44',
            '45-49',
            '50-54',
            '55-59',
            '60 +',
        ];

        let chart = Highcharts.chart('container', {
            chart: {
                type: 'bar',
            },
            title: {
                text: 'Cantidad de personal, ' + anios[0]
            },
            subtitle: {
                text: 'Representación por sexo y rango de edad, comparación de cantidades con el ' + anios[1],
            },
            loading: {
                hideDuration: 1000,
                showDuration: 0
            },
            lang: {
                noData: 'No existen resultados. Restablezca los parámetros de búsqueda'
            },
            noData: {
                style: {
                    fontWeight: 'bold',
                    fontSize: '14px',
                    color: '#b91926',
                    opacity: '.7'
                }
            },
            accessibility: {
                point: {
                    valueDescriptionFormat: '{index}. Edad {xDescription}, {value}.',
                },
            },
            plotOptions: {
                series: {
                    grouping: false,
                    borderWidth: 0,
                },
            },
            legend: {
                enabled: false,
            },
            tooltip: {
                formatter: function () {
                    return (
                        '<b>' +
                        this.series.name +
                        ', edad ' +
                        this.point.category +
                        '</b><br/>' +
                        '<span class="font-weight-bold px-1" style="color:' + this.point.color + '">' +
                        '\u25CF ' +
                        Highcharts.numberFormat(Math.abs(this.point.y), 0) +
                        '</span>' +
                        '<span style="color:' + this.point.color + '"> ' + this.point.gender + '</span>'
                    );
                },
            },
            xAxis: [
                {
                    title: {
                        text: 'Rangos de edad',
                    },
                    opposite: false,
                    reversed: false,
                    type: "category",
                    categories: categories,
                    labels: {
                        step: 1,
                    },
                    accessibility: {
                        description: 'Edad (Hombres)',
                    },
                },
                {
                    title: {
                        text: 'Rangos de edad',
                    },
                    opposite: true,
                    reversed: false,
                    type: "category",
                    categories: categories,
                    linkedTo: 0,
                    labels: {
                        step: 1,
                    },
                    accessibility: {
                        description: 'Edad (Mujeres)',
                    },
                },
            ],
            yAxis: {
                title: {
                    text: 'Cantidad de personal',
                },
                labels: {
                    formatter: function () {
                        return Math.abs(this.value);
                    },
                },
                accessibility: {
                    description: 'Cantidad de personal',
                    rangeDescription: 'Rango: 18-60+',
                },
            },
            series: [
                {
                    color: 'rgb(158, 159, 163)',
                    pointPlacement: -0.2,
                    linkedTo: 'main',
                    data: getDataPrev(dataPrev[anios[0]]).slice(),
                    name: anios[1],
                },
                {
                    name: anios[0],
                    id: 'main',
                    // dataSorting: {
                    //     enabled: true,
                    //     matchByName: true,
                    // },
                    dataLabels: [
                        {
                            formatter: function () {
                                return (
                                    Highcharts.numberFormat(Math.abs(this.point.y), 0)
                                );
                            },
                            enabled: true,
                            inside: true,
                            style: {
                                fontSize: '12px',
                            },
                        },
                    ],
                    data: getData(data[anios[0]]).slice(),
                },
            ],
            exporting: {
                allowHTML: true,
            },
        });

        document.getElementById('anioGrafica').addEventListener('change', function () {
            alertify.success('change')
            chart.showLoading('<i class="fas fa-lg fa-spin fa-spinner"></i>');
            chart.update(
                {
                    title: {
                        text: 'Cantidad de personal, ' + this.value
                    },
                    subtitle: {
                        text: 'Representación por sexo y rango de edad, comparación de cantidades con el ' + (this.value - 1),
                    },
                    series: [
                        {
                            name: this.value - 1,
                            data: getDataPrev(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getData(data[this.value]).slice(),
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 800,
                }
            );
            chart.hideLoading();
        });
    } else if (pregunta == 7) {
        getData = (data) => {
            return data.map((category, i) => {
                return {
                    name: category[0],
                    y: category[2] == 'Hombres' ? category[1] : -category[1],
                    gender: category[2],
                    color: category[2] == 'Hombres' ? '#14587A' : '#E0B61D',
                };
            });
        }

        getDataPrev = (data) => {
            return data.map((category, i) => {
                return {
                    name: category[0],
                    y: category[2] == 'Hombres' ? category[1] : -category[1],
                    gender: category[2],
                };
            });
        }

        var categories = [
            'Sin paga',
            '$1-$5,000',
            '$5,001-$10,000',
            '$10,001-$15,000',
            '$15,001-$20,000',
            '$20,001-$25,000',
            '$25,001-$30,000',
            '$30,001-$35,000',
            '$35,001-$40,000',
            '$40,001-$45,000',
            '$45,001-$50,000',
            '$50,001-$55,000',
            '$55,001-$60,000',
            '$60,001-$65,000',
            '$65,001-$70,000',
            '$70,000 +',
        ];

        let chart = Highcharts.chart('container', {
            chart: {
                type: 'bar',
            },
            title: {
                text: 'Cantidad de personal, ' + anios[0]
            },
            subtitle: {
                text: 'Representación por sexo y rango de ingresos mensual, comparación de cantidades con el ' + anios[1],
            },
            loading: {
                hideDuration: 1000,
                showDuration: 0
            },
            lang: {
                noData: 'No existen resultados. Restablezca los parámetros de búsqueda'
            },
            noData: {
                style: {
                    fontWeight: 'bold',
                    fontSize: '14px',
                    color: '#b91926',
                    opacity: '.7'
                }
            },
            accessibility: {
                point: {
                    valueDescriptionFormat: '{index}. Edad {xDescription}, {value}.',
                },
            },
            plotOptions: {
                series: {
                    grouping: false,
                    borderWidth: 0,
                },
            },
            legend: {
                enabled: false,
            },
            tooltip: {
                formatter: function () {
                    return (
                        '<b>' +
                        this.series.name +
                        ', edad ' +
                        this.point.category +
                        '</b><br/>' +
                        '<span class="font-weight-bold px-1" style="color:' + this.point.color + '">' +
                        '\u25CF ' +
                        Highcharts.numberFormat(Math.abs(this.point.y), 0) +
                        '</span>' +
                        '<span style="color:' + this.point.color + '"> ' + this.point.gender + '</span>'
                    );
                },
            },
            xAxis: [
                {
                    title: {
                        text: 'Rangos de ingresos',
                    },
                    opposite: false,
                    reversed: false,
                    type: "category",
                    categories: categories,
                    labels: {
                        step: 1,
                    },
                    accessibility: {
                        description: 'Ingresos (Hombres)',
                    },
                },
                {
                    title: {
                        text: 'Rangos de ingresos',
                    },
                    opposite: true,
                    reversed: false,
                    type: "category",
                    categories: categories,
                    linkedTo: 0,
                    labels: {
                        step: 1,
                    },
                    accessibility: {
                        description: 'Ingresos (Mujeres)',
                    },
                },
            ],
            yAxis: {
                title: {
                    text: 'Cantidad de personal',
                },
                labels: {
                    formatter: function () {
                        return Math.abs(this.value);
                    },
                },
                accessibility: {
                    description: 'Cantidad de personal',
                    rangeDescription: 'Rango: $0-$70,000 +',
                },
            },
            series: [
                {
                    color: 'rgb(158, 159, 163)',
                    pointPlacement: -0.2,
                    linkedTo: 'main',
                    data: getDataPrev(dataPrev[anios[0]]).slice(),
                    name: anios[1],
                },
                {
                    name: anios[0],
                    id: 'main',
                    dataLabels: [
                        {
                            formatter: function () {
                                return (
                                    Highcharts.numberFormat(Math.abs(this.point.y), 0)
                                );
                            },
                            enabled: true,
                            inside: false,
                            style: {
                                fontSize: '12px',
                            },
                        },
                    ],
                    data: getData(data[anios[0]]).slice(),
                },
            ],
            exporting: {
                allowHTML: true,
            },
        });

        document.getElementById('anioGrafica').addEventListener('change', function () {
            alertify.success('change')
            chart.showLoading('<i class="fas fa-lg fa-spin fa-spinner"></i>');
            chart.update(
                {
                    title: {
                        text: 'Cantidad de personal, ' + this.value
                    },
                    subtitle: {
                        text: 'Representación por sexo y rango de ingresos mensual, comparación de cantidades con el ' + (this.value - 1),
                    },
                    series: [
                        {
                            name: this.value - 1,
                            data: getDataPrev(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getData(data[this.value]).slice(),
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 800,
                }
            );
            chart.hideLoading();
        });
    } else if (pregunta == 9) {
        getDataMen = (data) => {
            return data.map((category, i) => {
                return {
                    name: category['nombre'].toUpperCase(),
                    y: parseInt(category['totalH']),
                    gender: 'Hombres',
                    color: '#14587A',
                };
            });
        }

        getDataPrevMen = (dataPrev) => {
            return dataPrev.map((category, i) => {
                return {
                    name: category['nombre'].toUpperCase(),
                    y: parseInt(category['totalH']),
                    gender: 'Hombres',
                    color: '#14587A',
                };
            });
        }

        getDataWomen = (data) => {
            return data.map((category, i) => {
                return {
                    name: category['nombre'].toUpperCase(),
                    y: parseInt(category['totalM']),
                    gender: 'Mujeres',
                    color: '#E0B61D',
                };
            });
        }

        getDataPrevWomen = (dataPrev) => {
            return dataPrev.map((category, i) => {
                return {
                    name: category['nombre'].toUpperCase(),
                    y: parseInt(category['totalM']),
                    gender: 'Mujeres',
                    color: '#E0B61D',
                };
            });
        }

        let chart = Highcharts.chart('container', {
            chart: {
                type: 'bar',
            },
            title: {
                text: 'Cantidad de personal, ' + anios[0],
            },
            subtitle: {
                text:
                    'Representación por sexo e institución (' + registroAnios[anios[0]].length + ' dependencias)',
            },
            loading: {
                hideDuration: 2000,
                showDuration: 0,
                labelStyle: {
                    top: '1%',
                }
            },
            lang: {
                noData: 'No existen resultados.<br> Restablezca los parámetros de búsqueda'
            },
            noData: {
                position: {
                    verticalAlign: 'top',
                    align: 'center',
                },
                style: {
                    fontWeight: 'bold',
                    fontSize: '13px',
                    color: '#b91926',
                    opacity: '.7'
                }
            },
            plotOptions: {
                series: {
                    grouping: true,
                    borderWidth: 0,
                },
            },
            legend: {
                enabled: false,
            },
            tooltip: {
                headerFormat: '<span style="font-size:12px" class="font-weight-bold w-100 text-left">{point.point.name}</span><table style="width: 100%;">',
                pointFormat: '<tr class="d-flex justify-content-between" style="color:{point.color}">' +
                    '<td class="text-left p-0">' +
                    '<span>\u25CF</span> <span class="font-weight-bold">{point.y}</span>' +
                    '</td>' +
                    '<td class="text-right p-0">' +
                    '<span class="font-weight-light px-1">{point.gender} </span>' +
                    '</td>' +
                    '</tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            xAxis: {
                type: 'category',
            },
            yAxis: [
                {
                    title: {
                        text: 'Cantidad de personal'
                    },
                    showFirstLabel: false,
                },
            ],
            series: [
                {
                    name: anios[0],
                    data: getDataMen(data[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#14587A',
                        },
                    ],
                },
                {
                    name: anios[0],
                    data: getDataWomen(data[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#E0B61D',
                        },
                    ],
                },
            ],
            exporting: {
                allowHTML: true,
            },
        });

        let secondChart = Highcharts.chart('secondContainer', {
            chart: {
                type: 'bar',
            },
            title: {
                text: 'Cantidad de personal, ' + anios[1],
            },
            subtitle: {
                text:
                    'Representación por sexo e institución (' + registroAnios[anios[1]].length + ' dependencias)',
            },
            loading: {
                hideDuration: 2000,
                showDuration: 0,
                labelStyle: {
                    top: '1%',
                }
            },
            lang: {
                noData: 'No existen resultados.<br> Restablezca los parámetros de búsqueda'
            },
            noData: {
                position: {
                    verticalAlign: 'top',
                    align: 'center',
                },
                style: {
                    fontWeight: 'bold',
                    fontSize: '13px',
                    color: '#b91926',
                    opacity: '.7'
                }
            },
            plotOptions: {
                series: {
                    grouping: true,
                    borderWidth: 0,
                },
            },
            legend: {
                enabled: false,
            },
            tooltip: {
                headerFormat: '<span style="font-size:12px" class="font-weight-bold w-100 text-left">{point.point.name}</span><table style="width: 100%;">',
                pointFormat: '<tr class="d-flex justify-content-between" style="color:{point.color}">' +
                    '<td class="text-left p-0">' +
                    '<span>\u25CF</span> <span class="font-weight-bold">{point.y}</span>' +
                    '</td>' +
                    '<td class="text-right p-0">' +
                    '<span class="font-weight-light px-1">{point.gender} </span>' +
                    '</td>' +
                    '</tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            xAxis: {
                type: 'category',
            },
            yAxis: [
                {
                    title: {
                        text: 'Cantidad de personal'
                    },
                    showFirstLabel: false,
                },
            ],
            series: [
                {
                    name: anios[1],
                    data: getDataPrevMen(dataPrev[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#14587A',
                        },
                    ],
                },
                {
                    name: anios[1],
                    data: getDataPrevWomen(dataPrev[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#E0B61D',
                        },
                    ],
                },
            ],
            exporting: {
                allowHTML: true,
            },
        });

        document.getElementById('anioGrafica').addEventListener('change', function () {
            alertify.success('change')
            chart.update(
                {
                    series: [
                        {
                            name: this.value,
                            data: [],
                        },
                        {
                            name: this.value,
                            data: [],
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 100,
                }
            );
            secondChart.update(
                {
                    series: [
                        {
                            name: this.value - 1,
                            data: [],
                        },
                        {
                            name: this.value - 1,
                            data: [],
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 100,
                }
            );

            chart.showLoading('<i class="fas fa-lg fa-spin fa-spinner"></i>');
            secondChart.showLoading('<i class="fas fa-lg fa-spin fa-spinner"></i>');

            chart.update(
                {
                    title: {
                        text:
                            'Cantidad de personal, ' + this.value,
                    },
                    subtitle: {
                        text:
                            'Representación por sexo e institución (' + registroAnios[this.value].length + ' dependencias)',
                    },
                    series: [
                        {
                            name: this.value,
                            data: getDataMen(data[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getDataWomen(data[this.value]).slice(),
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 800,
                }
            );
            secondChart.update(
                {
                    title: {
                        text:
                            'Cantidad de personal, ' + (this.value - 1),
                    },
                    subtitle: {
                        text:
                            'Representación por sexo e institución (' + registroAnios[this.value - 1].length + ' dependencias)',
                    },
                    series: [
                        {
                            name: this.value - 1,
                            data: getDataPrevMen(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value - 1,
                            data: getDataPrevWomen(dataPrev[this.value]).slice(),
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 800,
                }
            );

            chart.hideLoading();
            secondChart.hideLoading();
        });
    } else if (pregunta == 15) {
        getData = (data) => {
            return data.map((category, i) => {
                return {
                    name: category[2],
                    y: category[1],
                    gender: category[0],
                    color: category[2] == 'Propios' ? '#14587A' : category[2] == 'Rentados' ? '#E0B61D' : '#E63C4D',
                };
            });
        }

        getDataPrev = (data) => {
            return data.map((category, i) => {
                return {
                    name: category[2],
                    y: category[1],
                    gender: category[0],
                };
            });
        }

        let chart = Highcharts.chart('container', {
            chart: {
                type: 'column',
            },
            title: {
                text: 'Cantidad de bienes inmuebles, ' + anios[0],
            },
            subtitle: {
                text:
                    'Representación por tipo de institución y tipo de posesión, comparación de cantidades con el ' + anios[1],
            },
            loading: {
                hideDuration: 1000,
                showDuration: 0
            },
            lang: {
                noData: 'No existen resultados. Restablezca los parámetros de búsqueda'
            },
            noData: {
                style: {
                    fontWeight: 'bold',
                    fontSize: '14px',
                    color: '#b91926',
                    opacity: '.7'
                }
            },
            plotOptions: {
                series: {
                    grouping: false,
                    borderWidth: 0,
                },
            },
            legend: {
                enabled: false,
            },
            tooltip: {
                headerFormat: '<span style="font-size:12px" class="font-weight-bold w-100 text-left">Instituciones {point.point.gender}</span><table style="width: 100%;">',
                pointFormat: '<tr class="d-flex justify-content-between">' +
                    '<td style="color:{point.color};padding:0" class="text-left">' +
                    '<span style="color:{point.color}">\u25CF</span> {series.name} ' +
                    '</td>' +
                    '<td style="padding:0" class="text-right">' +
                    '<span class="font-weight-bold px-1">{point.y} </span><span style="color:{point.color}"> inmuebles</span>' +
                    '</td>' +
                    '</tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            xAxis: {
                type: "category",
            },
            yAxis: [
                {
                    title: {
                        text: 'Cantidad de bienes inmuebles'
                    },
                    showFirstLabel: false,
                },
            ],
            series: [
                {
                    color: 'rgb(158, 159, 163)',
                    pointPlacement: -0.2,
                    linkedTo: 'main',
                    data: getDataPrev(dataPrev[anios[0]]).slice(),
                    name: anios[1],
                    dataLabels: [
                        {
                            enabled: true,
                            inside: true,
                            align: 'left',
                            color: 'black',
                            style: {
                                fontSize: '9px',
                            },
                        },
                    ],
                },
                {
                    name: anios[0],
                    id: 'main',
                    dataSorting: {
                        enabled: true,
                        matchByName: true,
                    },
                    dataLabels: [
                        {
                            enabled: true,
                            inside: true,
                            style: {
                                fontSize: '12px',
                            },
                        },
                    ],
                    data: getData(data[anios[0]]).slice(),
                },
            ],
            exporting: {
                allowHTML: true,
            },
        });

        document.getElementById('anioGrafica').addEventListener('change', function () {
            alertify.success('change')
            chart.showLoading('<i class="fas fa-lg fa-spin fa-spinner"></i>');
            chart.update(
                {
                    title: {
                        text:
                            'Cantidad de bienes inmuebles, ' + this.value,
                    },
                    subtitle: {
                        text:
                            'Representación por tipo de institución y tipo de posesión, comparación de cantidades con el ' + (this.value - 1),
                    },
                    series: [
                        {
                            name: this.value - 1,
                            data: getDataPrev(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getData(data[this.value]).slice(),
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 800,
                }
            );
            chart.hideLoading();
        });
    } else if (pregunta == 16) {
        getDataPropios = (data) => {
            return data.map((category, i) => {
                return {
                    name: category['nombreIns'].toUpperCase(),
                    y: parseInt(category['propio']),
                    gender: 'Propios',
                    color: '#14587A',
                };
            });
        }

        getDataPrevPropios = (dataPrev) => {
            return dataPrev.map((category, i) => {
                return {
                    name: category['nombreIns'].toUpperCase(),
                    y: parseInt(category['propio']),
                    gender: 'Propios',
                    color: '#14587A',
                };
            });
        }

        getDataRentados = (data) => {
            return data.map((category, i) => {
                return {
                    name: category['nombreIns'].toUpperCase(),
                    y: parseInt(category['renta']),
                    gender: 'Rentados',
                    color: '#E0B61D',
                };
            });
        }

        getDataPrevRentados = (dataPrev) => {
            return dataPrev.map((category, i) => {
                return {
                    name: category['nombreIns'].toUpperCase(),
                    y: parseInt(category['renta']),
                    gender: 'Rentados',
                    color: '#E0B61D',
                };
            });
        }

        getDataOtros = (data) => {
            return data.map((category, i) => {
                return {
                    name: category['nombreIns'].toUpperCase(),
                    y: parseInt(category['otro']),
                    gender: 'Otros',
                    color: '#e63c4d',
                };
            });
        }

        getDataPrevOtros = (dataPrev) => {
            return dataPrev.map((category, i) => {
                return {
                    name: category['nombreIns'].toUpperCase(),
                    y: parseInt(category['otro']),
                    gender: 'Otros',
                    color: '#e63c4d',
                };
            });
        }

        let chart = Highcharts.chart('container', {
            chart: {
                type: 'bar',
            },
            title: {
                text: 'Cantidad de bienes inmuebles, ' + anios[0],
            },
            subtitle: {
                text:
                    'Representación por institución y tipo de posesión (' + registroAnios[anios[0]].length + ' dependencias)',
            },
            loading: {
                hideDuration: 2000,
                showDuration: 0,
                labelStyle: {
                    top: '1%',
                }
            },
            lang: {
                noData: 'No existen resultados.<br> Restablezca los parámetros de búsqueda'
            },
            noData: {
                position: {
                    verticalAlign: 'top',
                    align: 'center',
                },
                style: {
                    fontWeight: 'bold',
                    fontSize: '13px',
                    color: '#b91926',
                    opacity: '.7'
                }
            },
            plotOptions: {
                series: {
                    grouping: true,
                    borderWidth: 0,
                },
            },
            legend: {
                enabled: false,
            },
            tooltip: {
                headerFormat: '<span style="font-size:12px" class="font-weight-bold w-100 text-left">{point.point.name}</span><table style="width: 100%;">',
                pointFormat: '<tr class="d-flex justify-content-between" style="color:{point.color}">' +
                    '<td class="text-left p-0">' +
                    '<span>\u25CF</span> <span class="font-weight-bold">{point.y}</span>' +
                    '</td>' +
                    '<td class="text-right p-0">' +
                    '<span class="font-weight-light px-1">{point.gender} </span>' +
                    '</td>' +
                    '</tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            xAxis: {
                type: 'category',
            },
            yAxis: [
                {
                    title: {
                        text: 'Cantidad de bienes inmuebles'
                    },
                    showFirstLabel: false,
                    allowDecimals: false,
                },
            ],
            series: [
                {
                    name: anios[0],
                    data: getDataPropios(data[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#14587A',
                        },
                    ],
                },
                {
                    name: anios[0],
                    data: getDataRentados(data[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#E0B61D',
                        },
                    ],
                },
                {
                    name: anios[0],
                    data: getDataOtros(data[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#e63c4d',
                        },
                    ],
                },
            ],
            exporting: {
                allowHTML: true,
            },
        });

        let secondChart = Highcharts.chart('secondContainer', {
            chart: {
                type: 'bar',
            },
            title: {
                text: 'Cantidad de bienes inmuebles, ' + anios[1],
            },
            subtitle: {
                text:
                    'Representación por institución y tipo de posesión (' + registroAnios[anios[1]].length + ' dependencias)',
            },
            loading: {
                hideDuration: 2000,
                showDuration: 0,
                labelStyle: {
                    top: '1%',
                }
            },
            lang: {
                noData: 'No existen resultados.<br> Restablezca los parámetros de búsqueda'
            },
            noData: {
                position: {
                    verticalAlign: 'top',
                    align: 'center',
                },
                style: {
                    fontWeight: 'bold',
                    fontSize: '13px',
                    color: '#b91926',
                    opacity: '.7'
                }
            },
            plotOptions: {
                series: {
                    grouping: true,
                    borderWidth: 0,
                },
            },
            legend: {
                enabled: false,
            },
            tooltip: {
                headerFormat: '<span style="font-size:12px" class="font-weight-bold w-100 text-left">{point.point.name}</span><table style="width: 100%;">',
                pointFormat: '<tr class="d-flex justify-content-between" style="color:{point.color}">' +
                    '<td class="text-left p-0">' +
                    '<span>\u25CF</span> <span class="font-weight-bold">{point.y}</span>' +
                    '</td>' +
                    '<td class="text-right p-0">' +
                    '<span class="font-weight-light px-1">{point.gender} </span>' +
                    '</td>' +
                    '</tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            xAxis: {
                type: 'category',
            },
            yAxis: [
                {
                    title: {
                        text: 'Cantidad de bienes inmuebles'
                    },
                    showFirstLabel: false,
                    allowDecimals: false,
                },
            ],
            series: [
                {
                    name: anios[1],
                    data: getDataPrevPropios(dataPrev[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#14587A',
                        },
                    ],
                },
                {
                    name: anios[1],
                    data: getDataPrevRentados(dataPrev[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#E0B61D',
                        },
                    ],
                },
                {
                    name: anios[1],
                    data: getDataPrevOtros(dataPrev[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#e63c4d',
                        },
                    ],
                },
            ],
            exporting: {
                allowHTML: true,
            },
        });

        document.getElementById('anioGrafica').addEventListener('change', function () {
            alertify.success('change')
            chart.update(
                {
                    series: [
                        {
                            name: this.value,
                            data: [],
                        },
                        {
                            name: this.value,
                            data: [],
                        },
                        {
                            name: this.value,
                            data: [],
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 100,
                }
            );
            secondChart.update(
                {
                    series: [
                        {
                            name: this.value - 1,
                            data: [],
                        },
                        {
                            name: this.value - 1,
                            data: [],
                        },
                        {
                            name: this.value - 1,
                            data: [],
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 100,
                }
            );

            chart.showLoading('<i class="fas fa-lg fa-spin fa-spinner"></i>');
            secondChart.showLoading('<i class="fas fa-lg fa-spin fa-spinner"></i>');

            chart.update(
                {
                    title: {
                        text:
                            'Cantidad de bienes inmuebles, ' + this.value,
                    },
                    subtitle: {
                        text:
                            'Representación por institución y tipo de posesión (' + registroAnios[this.value].length + ' dependencias)',
                    },
                    series: [
                        {
                            name: this.value,
                            data: getDataPropios(data[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getDataRentados(data[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getDataOtros(data[this.value]).slice(),
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 800,
                }
            );
            secondChart.update(
                {
                    title: {
                        text:
                            'Cantidad de bienes inmuebles, ' + (this.value - 1),
                    },
                    subtitle: {
                        text:
                            'Representación por institución y tipo de posesión (' + registroAnios[this.value - 1].length + ' dependencias)',
                    },
                    series: [
                        {
                            name: this.value - 1,
                            data: getDataPrevPropios(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value - 1,
                            data: getDataPrevRentados(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value - 1,
                            data: getDataPrevOtros(dataPrev[this.value]).slice(),
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 800,
                }
            );

            chart.hideLoading();
            secondChart.hideLoading();
        });
    } else if (pregunta == 17) {
        getData = (data) => {
            return data.map((category, i) => {
                return {
                    name: category[2],
                    y: category[1],
                    gender: category[0],
                    color: category[2] == 'Automoviles' ? '#14587A' : category[2] == 'Camiones y camionetas' ? '#E0B61D' : category[2] == 'Motocicletas' ? '#006F3E' : '#E63C4D',
                };
            });
        }

        getDataPrev = (data) => {
            return data.map((category, i) => {
                return {
                    name: category[2],
                    y: category[1],
                    gender: category[0],
                };
            });
        }

        let chart = Highcharts.chart('container', {
            chart: {
                type: 'column',
            },
            title: {
                text: 'Cantidad de vehículos en funcionamiento, ' + anios[0],
            },
            subtitle: {
                text:
                    'Representación por tipo de institución y tipo de vehículo, comparación de cantidades con el ' + anios[1],
            },
            loading: {
                hideDuration: 1000,
                showDuration: 0
            },
            lang: {
                noData: 'No existen resultados. Restablezca los parámetros de búsqueda'
            },
            noData: {
                style: {
                    fontWeight: 'bold',
                    fontSize: '14px',
                    color: '#b91926',
                    opacity: '.7'
                }
            },
            plotOptions: {
                series: {
                    grouping: false,
                    borderWidth: 0,
                },
            },
            legend: {
                enabled: false,
            },
            tooltip: {
                headerFormat: '<span style="font-size:12px" class="font-weight-bold w-100 text-left">Instituciones {point.point.gender}</span><table style="width: 100%;">',
                pointFormat: '<tr class="d-flex justify-content-between">' +
                    '<td style="color:{point.color};padding:0" class="text-left">' +
                    '<span style="color:{point.color}">\u25CF</span> {series.name} ' +
                    '</td>' +
                    '<td style="padding:0" class="text-right">' +
                    '<span class="font-weight-bold px-1">{point.y} </span><span style="color:{point.color}"> vehículos</span>' +
                    '</td>' +
                    '</tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            xAxis: {
                type: "category",
            },
            yAxis: [
                {
                    title: {
                        text: 'Cantidad de vehículos'
                    },
                    showFirstLabel: false,
                },
            ],
            series: [
                {
                    color: 'rgb(158, 159, 163)',
                    pointPlacement: -0.2,
                    linkedTo: 'main',
                    data: getDataPrev(dataPrev[anios[0]]).slice(),
                    name: anios[1],
                    dataLabels: [
                        {
                            enabled: true,
                            inside: true,
                            align: 'left',
                            color: 'black',
                            style: {
                                fontSize: '9px',
                            },
                        },
                    ],
                },
                {
                    name: anios[0],
                    id: 'main',
                    dataSorting: {
                        enabled: true,
                        matchByName: true,
                    },
                    dataLabels: [
                        {
                            enabled: true,
                            inside: true,
                            style: {
                                fontSize: '12px',
                            },
                        },
                    ],
                    data: getData(data[anios[0]]).slice(),
                },
            ],
            exporting: {
                allowHTML: true,
            },
        });

        document.getElementById('anioGrafica').addEventListener('change', function () {
            alertify.success('change')
            chart.showLoading('<i class="fas fa-lg fa-spin fa-spinner"></i>');
            chart.update(
                {
                    title: {
                        text:
                            'Cantidad de vehículos en funcionamiento, ' + this.value,
                    },
                    subtitle: {
                        text:
                            'Representación por tipo de institución y tipo de vehículo, comparación de cantidades con el ' + (this.value - 1),
                    },
                    series: [
                        {
                            name: this.value - 1,
                            data: getDataPrev(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getData(data[this.value]).slice(),
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 800,
                }
            );
            chart.hideLoading();
        });
    } else if (pregunta == 18) {
        getDataAutomoviles = (data) => {
            return data.map((category, i) => {
                return {
                    name: category['nombreIns'].toUpperCase(),
                    y: parseInt(category['automoviles']),
                    gender: 'Automóviles',
                    color: '#14587A',
                };
            });
        }

        getDataPrevAutomoviles = (dataPrev) => {
            return dataPrev.map((category, i) => {
                return {
                    name: category['nombreIns'].toUpperCase(),
                    y: parseInt(category['automoviles']),
                    gender: 'Automóviles',
                    color: '#14587A',
                };
            });
        }

        getDataCamionesCamionetas = (data) => {
            return data.map((category, i) => {
                return {
                    name: category['nombreIns'].toUpperCase(),
                    y: parseInt(category['camionesCamionetas']),
                    gender: 'Camiones y camionetas',
                    color: '#E0B61D',
                };
            });
        }

        getDataPrevCamionesCamionetas = (dataPrev) => {
            return dataPrev.map((category, i) => {
                return {
                    name: category['nombreIns'].toUpperCase(),
                    y: parseInt(category['camionesCamionetas']),
                    gender: 'Camiones y camionetas',
                    color: '#E0B61D',
                };
            });
        }

        getDataMotocicletas = (data) => {
            return data.map((category, i) => {
                return {
                    name: category['nombreIns'].toUpperCase(),
                    y: parseInt(category['motocicletas']),
                    gender: 'Motocicletas',
                    color: '#006F3E',
                };
            });
        }

        getDataPrevMotocicletas = (dataPrev) => {
            return dataPrev.map((category, i) => {
                return {
                    name: category['nombreIns'].toUpperCase(),
                    y: parseInt(category['motocicletas']),
                    gender: 'Motocicletas',
                    color: '#006F3E',
                };
            });
        }

        getDataOtros = (data) => {
            return data.map((category, i) => {
                return {
                    name: category['nombreIns'].toUpperCase(),
                    y: parseInt(category['otros']),
                    gender: 'Otros',
                    color: '#E63C4D',
                };
            });
        }

        getDataPrevOtros = (dataPrev) => {
            return dataPrev.map((category, i) => {
                return {
                    name: category['nombreIns'].toUpperCase(),
                    y: parseInt(category['otros']),
                    gender: 'Otros',
                    color: '#E63C4D',
                };
            });
        }

        let chart = Highcharts.chart('container', {
            chart: {
                type: 'bar',
            },
            title: {
                text: 'Cantidad de vehículos en funcionamiento, ' + anios[0],
            },
            subtitle: {
                text:
                    'Representación por institución y tipo de vehículo (' + registroAnios[anios[0]].length + ' dependencias)',
            },
            loading: {
                hideDuration: 2000,
                showDuration: 0,
                labelStyle: {
                    top: '1%',
                }
            },
            lang: {
                noData: 'No existen resultados.<br> Restablezca los parámetros de búsqueda'
            },
            noData: {
                position: {
                    verticalAlign: 'top',
                    align: 'center',
                },
                style: {
                    fontWeight: 'bold',
                    fontSize: '13px',
                    color: '#b91926',
                    opacity: '.7'
                }
            },
            plotOptions: {
                series: {
                    grouping: true,
                    borderWidth: 0,
                },
            },
            legend: {
                enabled: false,
            },
            tooltip: {
                headerFormat: '<span style="font-size:12px" class="font-weight-bold w-100 text-left">{point.point.name}</span><table style="width: 100%;">',
                pointFormat: '<tr class="d-flex justify-content-between" style="color:{point.color}">' +
                    '<td class="text-left p-0">' +
                    '<span>\u25CF</span> <span class="font-weight-bold">{point.y}</span>' +
                    '</td>' +
                    '<td class="text-right p-0">' +
                    '<span class="font-weight-light px-1">{point.gender} </span>' +
                    '</td>' +
                    '</tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            xAxis: {
                type: 'category',
            },
            yAxis: [
                {
                    title: {
                        text: 'Cantidad de vehículos'
                    },
                    showFirstLabel: false,
                },
            ],
            series: [
                {
                    name: anios[0],
                    data: getDataAutomoviles(data[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#14587A',
                        },
                    ],
                },
                {
                    name: anios[0],
                    data: getDataCamionesCamionetas(data[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#E0B61D',
                        },
                    ],
                },
                {
                    name: anios[0],
                    data: getDataMotocicletas(data[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#006F3E',
                        },
                    ],
                },
                {
                    name: anios[0],
                    data: getDataOtros(data[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#E63C4D',
                        },
                    ],
                },
            ],
            exporting: {
                allowHTML: true,
            },
        });

        let secondChart = Highcharts.chart('secondContainer', {
            chart: {
                type: 'bar',
            },
            title: {
                text: 'Cantidad de vehículos en funcionamiento, ' + anios[1],
            },
            subtitle: {
                text:
                    'Representación por institución y tipo de vehículo (' + registroAnios[anios[1]].length + ' dependencias)',
            },
            loading: {
                hideDuration: 2000,
                showDuration: 0,
                labelStyle: {
                    top: '1%',
                }
            },
            lang: {
                noData: 'No existen resultados.<br> Restablezca los parámetros de búsqueda'
            },
            noData: {
                position: {
                    verticalAlign: 'top',
                    align: 'center',
                },
                style: {
                    fontWeight: 'bold',
                    fontSize: '13px',
                    color: '#b91926',
                    opacity: '.7'
                }
            },
            plotOptions: {
                series: {
                    grouping: true,
                    borderWidth: 0,
                },
            },
            legend: {
                enabled: false,
            },
            tooltip: {
                headerFormat: '<span style="font-size:12px" class="font-weight-bold w-100 text-left">{point.point.name}</span><table style="width: 100%;">',
                pointFormat: '<tr class="d-flex justify-content-between" style="color:{point.color}">' +
                    '<td class="text-left p-0">' +
                    '<span>\u25CF</span> <span class="font-weight-bold">{point.y}</span>' +
                    '</td>' +
                    '<td class="text-right p-0">' +
                    '<span class="font-weight-light px-1">{point.gender} </span>' +
                    '</td>' +
                    '</tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            xAxis: {
                type: 'category',
            },
            yAxis: [
                {
                    title: {
                        text: 'Cantidad de vehículos'
                    },
                    showFirstLabel: false,
                },
            ],
            series: [
                {
                    name: anios[1],
                    data: getDataPrevAutomoviles(dataPrev[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#14587A',
                        },
                    ],
                },
                {
                    name: anios[1],
                    data: getDataPrevCamionesCamionetas(dataPrev[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#E0B61D',
                        },
                    ],
                },
                {
                    name: anios[1],
                    data: getDataPrevMotocicletas(dataPrev[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#006F3E',
                        },
                    ],
                },
                {
                    name: anios[1],
                    data: getDataPrevOtros(dataPrev[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#E63C4D',
                        },
                    ],
                },
            ],
            exporting: {
                allowHTML: true,
            },
        });

        document.getElementById('anioGrafica').addEventListener('change', function () {
            alertify.success('change')
            chart.update(
                {
                    series: [
                        {
                            name: this.value,
                            data: [],
                        },
                        {
                            name: this.value,
                            data: [],
                        },
                        {
                            name: this.value,
                            data: [],
                        },
                        {
                            name: this.value,
                            data: [],
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 100,
                }
            );
            secondChart.update(
                {
                    series: [
                        {
                            name: this.value - 1,
                            data: [],
                        },
                        {
                            name: this.value - 1,
                            data: [],
                        },
                        {
                            name: this.value - 1,
                            data: [],
                        },
                        {
                            name: this.value - 1,
                            data: [],
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 100,
                }
            );

            chart.showLoading('<i class="fas fa-lg fa-spin fa-spinner"></i>');
            secondChart.showLoading('<i class="fas fa-lg fa-spin fa-spinner"></i>');

            chart.update(
                {
                    title: {
                        text:
                            'Cantidad de vehículos en funcionamiento, ' + this.value,
                    },
                    subtitle: {
                        text:
                            'Representación por institución y tipo de vehículo (' + registroAnios[this.value].length + ' dependencias)',
                    },
                    series: [
                        {
                            name: this.value,
                            data: getDataAutomoviles(data[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getDataCamionesCamionetas(data[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getDataMotocicletas(data[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getDataOtros(data[this.value]).slice(),
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 800,
                }
            );
            secondChart.update(
                {
                    title: {
                        text:
                            'Cantidad de vehículos en funcionamiento, ' + (this.value - 1),
                    },
                    subtitle: {
                        text:
                            'Representación por institución y tipo de vehículo (' + registroAnios[this.value - 1].length + ' dependencias)',
                    },
                    series: [
                        {
                            name: this.value - 1,
                            data: getDataPrevAutomoviles(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value - 1,
                            data: getDataPrevCamionesCamionetas(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value - 1,
                            data: getDataPrevMotocicletas(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value - 1,
                            data: getDataPrevOtros(dataPrev[this.value]).slice(),
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 800,
                }
            );

            chart.hideLoading();
            secondChart.hideLoading();
        });
    } else if (pregunta == 19) {
        getData = (data) => {
            return data.map((category, i) => {
                return {
                    name: category[2],
                    y: category[1],
                    gender: category[0],
                    color: category[2] == 'Aparatos fijos' ? '#14587A' : category[2] == 'Aparatos móviles' ? '#E0B61D' : category[2] == 'Líneas fijas' ? '#006F3E' : '#E63C4D',
                };
            });
        }

        getDataPrev = (data) => {
            return data.map((category, i) => {
                return {
                    name: category[2],
                    y: category[1],
                    gender: category[0],
                };
            });
        }

        let chart = Highcharts.chart('container', {
            chart: {
                type: 'column',
            },
            title: {
                text: 'Cantidad de líneas y aparatos telefónicos en funcionamiento, ' + anios[0],
            },
            subtitle: {
                text:
                    'Representación por tipo de institución, tipo de línea y aparato telefónico, comparación de cantidades con el ' + anios[1],
            },
            loading: {
                hideDuration: 1000,
                showDuration: 0
            },
            lang: {
                noData: 'No existen resultados. Restablezca los parámetros de búsqueda'
            },
            noData: {
                style: {
                    fontWeight: 'bold',
                    fontSize: '14px',
                    color: '#b91926',
                    opacity: '.7'
                }
            },
            plotOptions: {
                series: {
                    grouping: false,
                    borderWidth: 0,
                },
            },
            legend: {
                enabled: false,
            },
            tooltip: {
                headerFormat: '<span style="font-size:12px" class="font-weight-bold w-100 text-left">Instituciones {point.point.gender}</span><table style="width: 100%;">',
                pointFormat: '<tr class="d-flex justify-content-between">' +
                    '<td style="color:{point.color};padding:0" class="text-left">' +
                    '<span style="color:{point.color}">\u25CF</span> {series.name} ' +
                    '</td>' +
                    '<td style="padding:0" class="text-right">' +
                    '<span class="font-weight-bold px-1">{point.y} </span><span style="color:{point.color}"> {point.name}</span>' +
                    '</td>' +
                    '</tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            xAxis: {
                type: "category",
            },
            yAxis: [
                {
                    title: {
                        text: 'Cantidad de líneas y aparatos telefónicos'
                    },
                    showFirstLabel: false,
                },
            ],
            series: [
                {
                    color: 'rgb(158, 159, 163)',
                    pointPlacement: -0.2,
                    linkedTo: 'main',
                    data: getDataPrev(dataPrev[anios[0]]).slice(),
                    name: anios[1],
                    dataLabels: [
                        {
                            enabled: true,
                            inside: true,
                            align: 'left',
                            color: 'black',
                            style: {
                                fontSize: '9px',
                            },
                        },
                    ],
                },
                {
                    name: anios[0],
                    id: 'main',
                    dataSorting: {
                        enabled: true,
                        matchByName: true,
                    },
                    dataLabels: [
                        {
                            enabled: true,
                            inside: true,
                            style: {
                                fontSize: '12px',
                            },
                        },
                    ],
                    data: getData(data[anios[0]]).slice(),
                },
            ],
            exporting: {
                allowHTML: true,
            },
        });

        document.getElementById('anioGrafica').addEventListener('change', function () {
            alertify.success('change')
            chart.showLoading('<i class="fas fa-lg fa-spin fa-spinner"></i>');
            chart.update(
                {
                    title: {
                        text:
                            'Cantidad de líneas y aparatos telefónicos en funcionamiento, ' + this.value,
                    },
                    subtitle: {
                        text:
                            'Representación por tipo de institución, tipo de línea y aparato telefónico, comparación de cantidades con el ' + (this.value - 1),
                    },
                    series: [
                        {
                            name: this.value - 1,
                            data: getDataPrev(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getData(data[this.value]).slice(),
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 800,
                }
            );
            chart.hideLoading();
        });
    } else if (pregunta == 20) {
        getDataAparatosF = (data) => {
            return data.map((category, i) => {
                return {
                    name: category['institucion'].toUpperCase(),
                    y: parseInt(category['aparatosFijos']),
                    gender: 'Aparatos fijos',
                    color: '#14587A',
                };
            });
        }

        getDataPrevAparatosF = (dataPrev) => {
            return dataPrev.map((category, i) => {
                return {
                    name: category['institucion'].toUpperCase(),
                    y: parseInt(category['aparatosFijos']),
                    gender: 'Aparatos fijos',
                    color: '#14587A',
                };
            });
        }

        getDataAparatosM = (data) => {
            return data.map((category, i) => {
                return {
                    name: category['institucion'].toUpperCase(),
                    y: parseInt(category['aparatosMoviles']),
                    gender: 'Aparatos moviles',
                    color: '#E0B61D',
                };
            });
        }

        getDataPrevAparatosM = (dataPrev) => {
            return dataPrev.map((category, i) => {
                return {
                    name: category['institucion'].toUpperCase(),
                    y: parseInt(category['aparatosMoviles']),
                    gender: 'Aparatos moviles',
                    color: '#E0B61D',
                };
            });
        }

        getDataLineasF = (data) => {
            return data.map((category, i) => {
                return {
                    name: category['institucion'].toUpperCase(),
                    y: parseInt(category['lineasFijas']),
                    gender: 'Líneas fijas',
                    color: '#006F3E',
                };
            });
        }

        getDataPrevLineasF = (dataPrev) => {
            return dataPrev.map((category, i) => {
                return {
                    name: category['institucion'].toUpperCase(),
                    y: parseInt(category['lineasFijas']),
                    gender: 'Líneas fijas',
                    color: '#006F3E',
                };
            });
        }

        getDataLineasM = (data) => {
            return data.map((category, i) => {
                return {
                    name: category['institucion'].toUpperCase(),
                    y: parseInt(category['lineasMoviles']),
                    gender: 'Líneas móviles',
                    color: '#E63C4D',
                };
            });
        }

        getDataPrevLineasM = (dataPrev) => {
            return dataPrev.map((category, i) => {
                return {
                    name: category['institucion'].toUpperCase(),
                    y: parseInt(category['lineasMoviles']),
                    gender: 'Líneas móviles',
                    color: '#E63C4D',
                };
            });
        }

        let chart = Highcharts.chart('container', {
            chart: {
                type: 'bar',
            },
            title: {
                text: 'Cantidad de líneas y aparatos telefónicos en funcionamiento, ' + anios[0],
            },
            subtitle: {
                text:
                    'Representación por institución, tipo de línea y aparato telefónico (' + registroAnios[anios[0]].length + ' dependencias)',
            },
            loading: {
                hideDuration: 2000,
                showDuration: 0,
                labelStyle: {
                    top: '1%',
                }
            },
            lang: {
                noData: 'No existen resultados.<br> Restablezca los parámetros de búsqueda'
            },
            noData: {
                position: {
                    verticalAlign: 'top',
                    align: 'center',
                },
                style: {
                    fontWeight: 'bold',
                    fontSize: '13px',
                    color: '#b91926',
                    opacity: '.7'
                }
            },
            plotOptions: {
                series: {
                    grouping: true,
                    borderWidth: 0,
                },
            },
            legend: {
                enabled: false,
            },
            tooltip: {
                headerFormat: '<span style="font-size:12px" class="font-weight-bold w-100 text-left">{point.point.name}</span><table style="width: 100%;">',
                pointFormat: '<tr class="d-flex justify-content-between" style="color:{point.color}">' +
                    '<td class="text-left p-0">' +
                    '<span>\u25CF</span> <span class="font-weight-bold">{point.y}</span>' +
                    '</td>' +
                    '<td class="text-right p-0">' +
                    '<span class="font-weight-light px-1">{point.gender} </span>' +
                    '</td>' +
                    '</tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            xAxis: {
                type: 'category',
            },
            yAxis: [
                {
                    title: {
                        text: 'Cantidad de líneas y aparatos telefónicos'
                    },
                    showFirstLabel: false,
                },
            ],
            series: [
                {
                    name: anios[0],
                    data: getDataAparatosF(data[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#14587A',
                        },
                    ],
                },
                {
                    name: anios[0],
                    data: getDataAparatosM(data[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#E0B61D',
                        },
                    ],
                },
                {
                    name: anios[0],
                    data: getDataLineasF(data[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#006F3E',
                        },
                    ],
                },
                {
                    name: anios[0],
                    data: getDataLineasM(data[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#E63C4D',
                        },
                    ],
                },
            ],
            exporting: {
                allowHTML: true,
            },
        });

        let secondChart = Highcharts.chart('secondContainer', {
            chart: {
                type: 'bar',
            },
            title: {
                text: 'Cantidad de líneas y aparatos telefónicos en funcionamiento, ' + anios[1],
            },
            subtitle: {
                text:
                    'Representación por institución, tipo de línea y aparato telefónico (' + registroAnios[anios[1]].length + ' dependencias)',
            },
            loading: {
                hideDuration: 2000,
                showDuration: 0,
                labelStyle: {
                    top: '1%',
                }
            },
            lang: {
                noData: 'No existen resultados.<br> Restablezca los parámetros de búsqueda'
            },
            noData: {
                position: {
                    verticalAlign: 'top',
                    align: 'center',
                },
                style: {
                    fontWeight: 'bold',
                    fontSize: '13px',
                    color: '#b91926',
                    opacity: '.7'
                }
            },
            plotOptions: {
                series: {
                    grouping: true,
                    borderWidth: 0,
                },
            },
            legend: {
                enabled: false,
            },
            tooltip: {
                headerFormat: '<span style="font-size:12px" class="font-weight-bold w-100 text-left">{point.point.name}</span><table style="width: 100%;">',
                pointFormat: '<tr class="d-flex justify-content-between" style="color:{point.color}">' +
                    '<td class="text-left p-0">' +
                    '<span>\u25CF</span> <span class="font-weight-bold">{point.y}</span>' +
                    '</td>' +
                    '<td class="text-right p-0">' +
                    '<span class="font-weight-light px-1">{point.gender} </span>' +
                    '</td>' +
                    '</tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            xAxis: {
                type: 'category',
            },
            yAxis: [
                {
                    title: {
                        text: 'Cantidad de líneas y aparatos telefónicos'
                    },
                    showFirstLabel: false,
                },
            ],
            series: [
                {
                    name: anios[1],
                    data: getDataPrevAparatosF(dataPrev[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#14587A',
                        },
                    ],
                },
                {
                    name: anios[1],
                    data: getDataPrevAparatosM(dataPrev[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#E0B61D',
                        },
                    ],
                },
                {
                    name: anios[1],
                    data: getDataPrevLineasF(dataPrev[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#006F3E',
                        },
                    ],
                },
                {
                    name: anios[1],
                    data: getDataPrevLineasM(dataPrev[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#E63C4D',
                        },
                    ],
                },
            ],
            exporting: {
                allowHTML: true,
            },
        });

        document.getElementById('anioGrafica').addEventListener('change', function () {
            alertify.success('change')
            chart.update(
                {
                    series: [
                        {
                            name: this.value,
                            data: [],
                        },
                        {
                            name: this.value,
                            data: [],
                        },
                        {
                            name: this.value,
                            data: [],
                        },
                        {
                            name: this.value,
                            data: [],
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 100,
                }
            );
            secondChart.update(
                {
                    series: [
                        {
                            name: this.value - 1,
                            data: [],
                        },
                        {
                            name: this.value - 1,
                            data: [],
                        },
                        {
                            name: this.value - 1,
                            data: [],
                        },
                        {
                            name: this.value - 1,
                            data: [],
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 100,
                }
            );

            chart.showLoading('<i class="fas fa-lg fa-spin fa-spinner"></i>');
            secondChart.showLoading('<i class="fas fa-lg fa-spin fa-spinner"></i>');

            chart.update(
                {
                    title: {
                        text:
                            'Cantidad de líneas y aparatos telefónicos en funcionamiento, ' + this.value,
                    },
                    subtitle: {
                        text:
                            'Representación por institución, tipo de línea y aparato telefónico (' + registroAnios[this.value].length + ' dependencias)',
                    },
                    series: [
                        {
                            name: this.value,
                            data: getDataAparatosF(data[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getDataAparatosM(data[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getDataLineasF(data[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getDataLineasM(data[this.value]).slice(),
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 800,
                }
            );
            secondChart.update(
                {
                    title: {
                        text:
                            'Cantidad de líneas y aparatos telefónicos en funcionamiento, ' + (this.value - 1),
                    },
                    subtitle: {
                        text:
                            'Representación por institución, tipo de línea y aparato telefónico (' + registroAnios[this.value - 1].length + ' dependencias)',
                    },
                    series: [
                        {
                            name: this.value - 1,
                            data: getDataPrevAparatosF(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value - 1,
                            data: getDataPrevAparatosM(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value - 1,
                            data: getDataPrevLineasF(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value - 1,
                            data: getDataPrevLineasM(dataPrev[this.value]).slice(),
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 800,
                }
            );

            chart.hideLoading();
            secondChart.hideLoading();
        });
    } else if (pregunta == 21) {
        getData = (data) => {
            return data.map((category, i) => {
                return {
                    name: category[2],
                    y: category[1],
                    gender: category[0],
                    color: category[2] == 'Computadoras de escritorio' ? '#14587A' : category[2] == 'Computadoras portatiles' ? '#E0B61D' : category[2] == 'Impresoras personales' ? '#006F3E' : category[2] == 'Impresoras compartidas' ? '#E63C4D' : category[2] == 'Multifuncionales' ? '#6f42c1' : category[2] == 'Servidores' ? '#fd7e14' : '#1f9bcf',
                };
            });
        }

        getDataPrev = (data) => {
            return data.map((category, i) => {
                return {
                    name: category[2],
                    y: category[1],
                    gender: category[0],
                };
            });
        }

        let chart = Highcharts.chart('container', {
            chart: {
                type: 'column',
            },
            title: {
                text: 'Cantidad de computadoras, impresoras, multifuncionales, servidores y tabletas en funcionamiento, ' + anios[0],
            },
            subtitle: {
                text:
                    'Representación por tipo de institución, tipo de computadora, impresora, multifuncional, servidor y tableta, comparación de cantidades con el ' + anios[1],
            },
            loading: {
                hideDuration: 1000,
                showDuration: 0
            },
            lang: {
                noData: 'No existen resultados. Restablezca los parámetros de búsqueda'
            },
            noData: {
                style: {
                    fontWeight: 'bold',
                    fontSize: '14px',
                    color: '#b91926',
                    opacity: '.7'
                }
            },
            plotOptions: {
                series: {
                    grouping: false,
                    borderWidth: 0,
                },
            },
            legend: {
                enabled: false,
            },
            tooltip: {
                headerFormat: '<span style="font-size:12px" class="font-weight-bold w-100 text-left">Instituciones {point.point.gender}</span><table style="width: 100%;">',
                pointFormat: '<tr class="d-flex justify-content-between">' +
                    '<td style="color:{point.color};padding:0" class="text-left">' +
                    '<span style="color:{point.color}">\u25CF</span> {series.name} ' +
                    '</td>' +
                    '<td style="padding:0" class="text-right">' +
                    '<span class="font-weight-bold px-1">{point.y} </span><span style="color:{point.color}"> {point.name}</span>' +
                    '</td>' +
                    '</tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            xAxis: {
                type: "category",
            },
            yAxis: [
                {
                    title: {
                        text: 'Cantidad de computadoras, impresoras, multifuncionales, servidores y tabletas'
                    },
                    showFirstLabel: false,
                },
            ],
            series: [
                {
                    color: 'rgb(158, 159, 163)',
                    pointPlacement: -0.4,
                    linkedTo: 'main',
                    data: getDataPrev(dataPrev[anios[0]]).slice(),
                    name: anios[1],
                    dataLabels: [
                        {
                            enabled: true,
                            inside: true,
                            align: 'left',
                            color: 'black',
                            style: {
                                fontSize: '8px',
                            },
                        },
                    ],
                },
                {
                    name: anios[0],
                    id: 'main',
                    dataSorting: {
                        enabled: true,
                        matchByName: true,
                    },
                    dataLabels: [
                        {
                            enabled: true,
                            inside: true,
                            style: {
                                fontSize: '10px',
                            },
                        },
                    ],
                    data: getData(data[anios[0]]).slice(),
                },
            ],
            exporting: {
                allowHTML: true,
            },
        });

        document.getElementById('anioGrafica').addEventListener('change', function () {
            alertify.success('change')
            chart.showLoading('<i class="fas fa-lg fa-spin fa-spinner"></i>');
            chart.update(
                {
                    title: {
                        text:
                            'Cantidad de computadoras, impresoras, multifuncionales, servidores y tabletas en funcionamiento, ' + this.value,
                    },
                    subtitle: {
                        text:
                            'Representación por tipo de institución, tipo de computadora, impresora, multifuncional, servidor y tableta, comparación de cantidades con el ' + (this.value - 1),
                    },
                    series: [
                        {
                            name: this.value - 1,
                            data: getDataPrev(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getData(data[this.value]).slice(),
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 800,
                }
            );
            chart.hideLoading();
        });
    } else if (pregunta == 22) {
        getDataCompuEscritorio = (data) => {
            return data.map((category, i) => {
                return {
                    name: category['institucion'].toUpperCase(),
                    y: parseInt(category['compuEscritorio']),
                    gender: 'Computadoras de escritorio',
                    color: '#14587A',
                };
            });
        }

        getDataPrevCompuEscritorio = (dataPrev) => {
            return dataPrev.map((category, i) => {
                return {
                    name: category['institucion'].toUpperCase(),
                    y: parseInt(category['compuEscritorio']),
                    gender: 'Computadoras de escritorio',
                    color: '#14587A',
                };
            });
        }

        getDataCompuPortatil = (data) => {
            return data.map((category, i) => {
                return {
                    name: category['institucion'].toUpperCase(),
                    y: parseInt(category['compuPortatil']),
                    gender: 'Computadoras portátiles',
                    color: '#E0B61D',
                };
            });
        }

        getDataPrevCompuPortatil = (dataPrev) => {
            return dataPrev.map((category, i) => {
                return {
                    name: category['institucion'].toUpperCase(),
                    y: parseInt(category['compuPortatil']),
                    gender: 'Computadoras portátiles',
                    color: '#E0B61D',
                };
            });
        }

        getDataImpresoraCompartida = (data) => {
            return data.map((category, i) => {
                return {
                    name: category['institucion'].toUpperCase(),
                    y: parseInt(category['impresoraCompartida']),
                    gender: 'Impresoras compartidas',
                    color: '#006F3E',
                };
            });
        }

        getDataPrevImpresoraCompartida = (dataPrev) => {
            return dataPrev.map((category, i) => {
                return {
                    name: category['institucion'].toUpperCase(),
                    y: parseInt(category['impresoraCompartida']),
                    gender: 'Impresoras compartidas',
                    color: '#006F3E',
                };
            });
        }

        getDataImpresoraPersonal = (data) => {
            return data.map((category, i) => {
                return {
                    name: category['institucion'].toUpperCase(),
                    y: parseInt(category['impresoraPersonal']),
                    gender: 'Impresoras personales',
                    color: '#E63C4D',
                };
            });
        }

        getDataPrevImpresoraPersonal = (dataPrev) => {
            return dataPrev.map((category, i) => {
                return {
                    name: category['institucion'].toUpperCase(),
                    y: parseInt(category['impresoraPersonal']),
                    gender: 'Impresoras personales',
                    color: '#E63C4D',
                };
            });
        }

        getDataMultifuncionales = (data) => {
            return data.map((category, i) => {
                return {
                    name: category['institucion'].toUpperCase(),
                    y: parseInt(category['multifuncionales']),
                    gender: 'Multifuncionales',
                    color: '#6f42c1',
                };
            });
        }

        getDataPrevMultifuncionales = (dataPrev) => {
            return dataPrev.map((category, i) => {
                return {
                    name: category['institucion'].toUpperCase(),
                    y: parseInt(category['multifuncionales']),
                    gender: 'Multifuncionales',
                    color: '#6f42c1',
                };
            });
        }

        getDataServidores = (data) => {
            return data.map((category, i) => {
                return {
                    name: category['institucion'].toUpperCase(),
                    y: parseInt(category['servidores']),
                    gender: 'Servidores',
                    color: '#fd7e14',
                };
            });
        }

        getDataPrevServidores = (dataPrev) => {
            return dataPrev.map((category, i) => {
                return {
                    name: category['institucion'].toUpperCase(),
                    y: parseInt(category['servidores']),
                    gender: 'Servidores',
                    color: '#fd7e14',
                };
            });
        }

        getDataTabletas = (data) => {
            return data.map((category, i) => {
                return {
                    name: category['institucion'].toUpperCase(),
                    y: parseInt(category['tabletas']),
                    gender: 'Tabletas',
                    color: '#1f9bcf',
                };
            });
        }

        getDataPrevTabletas = (dataPrev) => {
            return dataPrev.map((category, i) => {
                return {
                    name: category['institucion'].toUpperCase(),
                    y: parseInt(category['tabletas']),
                    gender: 'Tabletas',
                    color: '#1f9bcf',
                };
            });
        }

        let chart = Highcharts.chart('container', {
            chart: {
                type: 'bar',
            },
            title: {
                text: 'Cantidad de computadoras, impresoras, multifuncionales, servidores y tabletas en funcionamiento, ' + anios[0],
            },
            subtitle: {
                text: 'Representación por institución, tipo de computadora, impresora, multifuncional, servidor y tableta (' + registroAnios[anios[0]].length + ' dependencias)',
            },
            loading: {
                hideDuration: 2000,
                showDuration: 0,
                labelStyle: {
                    top: '1%',
                }
            },
            lang: {
                noData: 'No existen resultados.<br> Restablezca los parámetros de búsqueda'
            },
            noData: {
                position: {
                    verticalAlign: 'top',
                    align: 'center',
                },
                style: {
                    fontWeight: 'bold',
                    fontSize: '13px',
                    color: '#b91926',
                    opacity: '.7'
                }
            },
            plotOptions: {
                series: {
                    grouping: true,
                    borderWidth: 0,
                },
            },
            legend: {
                enabled: false,
            },
            tooltip: {
                headerFormat: '<span style="font-size:12px" class="font-weight-bold w-100 text-left">{point.point.name}</span><table style="width: 100%;">',
                pointFormat: '<tr class="d-flex justify-content-between" style="color:{point.color}">' +
                    '<td class="text-left p-0">' +
                    '<span>\u25CF</span> <span class="font-weight-bold">{point.y}</span>' +
                    '</td>' +
                    '<td class="text-right p-0">' +
                    '<span class="font-weight-light px-1">{point.gender} </span>' +
                    '</td>' +
                    '</tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            xAxis: {
                type: 'category',
            },
            yAxis: [
                {
                    title: {
                        text: 'Cantidad de computadoras, impresoras, multifuncionales, servidores y tabletas'
                    },
                    showFirstLabel: false,
                },
            ],
            series: [
                {
                    name: anios[0],
                    data: getDataCompuEscritorio(data[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#14587A',
                        },
                    ],
                },
                {
                    name: anios[0],
                    data: getDataCompuPortatil(data[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#E0B61D',
                        },
                    ],
                },
                {
                    name: anios[0],
                    data: getDataImpresoraCompartida(data[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#006F3E',
                        },
                    ],
                },
                {
                    name: anios[0],
                    data: getDataImpresoraPersonal(data[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#E63C4D',
                        },
                    ],
                },
                {
                    name: anios[0],
                    data: getDataMultifuncionales(data[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#6f42c1',
                        },
                    ],
                },
                {
                    name: anios[0],
                    data: getDataServidores(data[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#fd7e14',
                        },
                    ],
                },
                {
                    name: anios[0],
                    data: getDataTabletas(data[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#1f9bcf',
                        },
                    ],
                },
            ],
            exporting: {
                allowHTML: true,
            },
        });

        let secondChart = Highcharts.chart('secondContainer', {
            chart: {
                type: 'bar',
            },
            title: {
                text: 'Cantidad de computadoras, impresoras, multifuncionales, servidores y tabletas en funcionamiento, ' + anios[1],
            },
            subtitle: {
                text: 'Representación por institución, tipo de computadora, impresora, multifuncional, servidor y tableta (' + registroAnios[anios[1]].length + ' dependencias)',
            },
            loading: {
                hideDuration: 2000,
                showDuration: 0,
                labelStyle: {
                    top: '1%',
                }
            },
            lang: {
                noData: 'No existen resultados.<br> Restablezca los parámetros de búsqueda'
            },
            noData: {
                position: {
                    verticalAlign: 'top',
                    align: 'center',
                },
                style: {
                    fontWeight: 'bold',
                    fontSize: '13px',
                    color: '#b91926',
                    opacity: '.7'
                }
            },
            plotOptions: {
                series: {
                    grouping: true,
                    borderWidth: 0,
                },
            },
            legend: {
                enabled: false,
            },
            tooltip: {
                headerFormat: '<span style="font-size:12px" class="font-weight-bold w-100 text-left">{point.point.name}</span><table style="width: 100%;">',
                pointFormat: '<tr class="d-flex justify-content-between" style="color:{point.color}">' +
                    '<td class="text-left p-0">' +
                    '<span>\u25CF</span> <span class="font-weight-bold">{point.y}</span>' +
                    '</td>' +
                    '<td class="text-right p-0">' +
                    '<span class="font-weight-light px-1">{point.gender} </span>' +
                    '</td>' +
                    '</tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            xAxis: {
                type: 'category',
            },
            yAxis: [
                {
                    title: {
                        text: 'Cantidad de computadoras, impresoras, multifuncionales, servidores y tabletas'
                    },
                    showFirstLabel: false,
                },
            ],
            series: [
                {
                    name: anios[1],
                    data: getDataPrevCompuEscritorio(dataPrev[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#14587A',
                        },
                    ],
                },
                {
                    name: anios[1],
                    data: getDataPrevCompuPortatil(dataPrev[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#E0B61D',
                        },
                    ],
                },
                {
                    name: anios[1],
                    data: getDataPrevImpresoraCompartida(dataPrev[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#006F3E',
                        },
                    ],
                },
                {
                    name: anios[1],
                    data: getDataPrevImpresoraPersonal(dataPrev[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#E63C4D',
                        },
                    ],
                },
                {
                    name: anios[1],
                    data: getDataPrevMultifuncionales(dataPrev[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#6f42c1',
                        },
                    ],
                },
                {
                    name: anios[1],
                    data: getDataPrevServidores(dataPrev[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#fd7e14',
                        },
                    ],
                },
                {
                    name: anios[1],
                    data: getDataPrevTabletas(dataPrev[anios[0]]).slice(),
                    dataLabels: [
                        {
                            enabled: true,
                            color: '#1f9bcf',
                        },
                    ],
                },
            ],
            exporting: {
                allowHTML: true,
            },
        });

        document.getElementById('anioGrafica').addEventListener('change', function () {
            alertify.success('change')
            chart.update(
                {
                    series: [
                        {
                            name: this.value,
                            data: [],
                        },
                        {
                            name: this.value,
                            data: [],
                        },
                        {
                            name: this.value,
                            data: [],
                        },
                        {
                            name: this.value,
                            data: [],
                        },
                        {
                            name: this.value,
                            data: [],
                        },
                        {
                            name: this.value,
                            data: [],
                        },
                        {
                            name: this.value,
                            data: [],
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 100,
                }
            );
            secondChart.update(
                {
                    series: [
                        {
                            name: this.value - 1,
                            data: [],
                        },
                        {
                            name: this.value - 1,
                            data: [],
                        },
                        {
                            name: this.value - 1,
                            data: [],
                        },
                        {
                            name: this.value - 1,
                            data: [],
                        },
                        {
                            name: this.value - 1,
                            data: [],
                        },
                        {
                            name: this.value - 1,
                            data: [],
                        },
                        {
                            name: this.value - 1,
                            data: [],
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 100,
                }
            );

            chart.showLoading('<i class="fas fa-lg fa-spin fa-spinner"></i>');
            secondChart.showLoading('<i class="fas fa-lg fa-spin fa-spinner"></i>');

            chart.update(
                {
                    title: {
                        text:
                            'Cantidad de computadoras, impresoras, multifuncionales, servidores y tabletas en funcionamiento, ' + this.value,
                    },
                    subtitle: {
                        text:
                            'Representación por institución, tipo de computadora, impresora, multifuncional, servidor y tableta (' + registroAnios[this.value].length + ' dependencias)',
                    },
                    series: [
                        {
                            name: this.value,
                            data: getDataCompuEscritorio(data[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getDataCompuPortatil(data[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getDataImpresoraCompartida(data[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getDataImpresoraPersonal(data[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getDataMultifuncionales(data[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getDataServidores(data[this.value]).slice(),
                        },
                        {
                            name: this.value,
                            data: getDataTabletas(data[this.value]).slice(),
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 800,
                }
            );
            secondChart.update(
                {
                    title: {
                        text:
                            'Cantidad de computadoras, impresoras, multifuncionales, servidores y tabletas en funcionamiento, ' + (this.value - 1),
                    },
                    subtitle: {
                        text:
                            'Representación por institución, tipo de computadora, impresora, multifuncional, servidor y tableta (' + registroAnios[this.value - 1].length + ' dependencias)',
                    },
                    series: [
                        {
                            name: this.value - 1,
                            data: getDataPrevCompuEscritorio(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value - 1,
                            data: getDataPrevCompuPortatil(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value - 1,
                            data: getDataPrevImpresoraCompartida(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value - 1,
                            data: getDataPrevImpresoraPersonal(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value - 1,
                            data: getDataPrevMultifuncionales(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value - 1,
                            data: getDataPrevServidores(dataPrev[this.value]).slice(),
                        },
                        {
                            name: this.value - 1,
                            data: getDataPrevTabletas(dataPrev[this.value]).slice(),
                        },
                    ],
                },
                true,
                false,
                {
                    duration: 800,
                }
            );

            chart.hideLoading();
            secondChart.hideLoading();
        });
    } else {
        alertify.error('Sin graficar !');
    }
}

crearSelectComparacionAnios = () => {
    document.getElementById('contenedorAnioGrafica').innerHTML = ''
    select = document.createElement('select')
    select.className = 'custom-select'
    select.id = 'anioGrafica'

    for (let i = 0; i < anios.length - 1; i++) {
        let option = document.createElement('option')
        option.value = anios[i]
        option.appendChild(document.createTextNode(anios[i]))
        select.append(option);
    }

    document.getElementById('contenedorAnioGrafica').append(select)
}

tabularDatos = (pregunta) => {
    // Creacion de elementos
    let container = document.getElementById('tablesContainer'),
        label = document.createElement('label'),
        div = document.createElement('div'),
        table = document.createElement('table'),
        head = document.createElement('thead'),
        body = document.createElement('tbody'),
        tr = document.createElement('tr'),
        th = document.createElement('th'),
        td = document.createElement('td');

    // Contenedor de tabla vacio
    container.innerHTML = '';

    // Titulo de la tabla
    div.className += 'dropdown-divider';
    container.append(div);
    div = document.createElement('div');
    div.className = 'd-flex justify-content-center align-items-center';
    label.className += 'text-dark h4 font-weight-light';
    label.innerHTML = 'Pregunta ' + pregunta;
    div.append(label);
    label = document.createElement('label');
    label.className += 'text-primary ml-3';
    label.innerHTML = '(Tabla de comparación anual)';
    div.append(label);
    container.append(div);

    // Configuracion de la tabla y su cabecera
    table.id = 'tablaComparaciones';
    table.className += 'table table-sm table-hover';
    table.style.width = '100%';
    head.className += 'text-dark';
    head.style.backgroundColor = '#F7F7F9';

    // Llenado de la tabla
    if (pregunta == 3) {
        th.scope = 'col';
        th.appendChild(document.createTextNode('Género'));
        tr.append(th);
        th = document.createElement('th');
        th.scope = 'col';
        th.appendChild(document.createTextNode('Categoría'));
        tr.append(th);

        for (let i = anios.length - 1; i >= 0; i--) {
            th = document.createElement('th');
            th.scope = 'col';
            th.className = 'text-center';
            th.appendChild(document.createTextNode(anios[i]));
            tr.append(th);
        }
        head.append(tr);

        for (let i = 0; i < registroAnios[anios[0]].length; i++) {
            for (let j = 2017; j < registroAnios.length; j++) {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = registroAnios[j][i][2];
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = registroAnios[j][i][0];
                tr.append(td);
                for (let m = 2017; m < registroAnios.length; m++) {
                    td = document.createElement('td');
                    td.className = 'text-right';
                    td.innerHTML = registroAnios[m][i] != undefined ? registroAnios[m][i][1] : '-';
                    tr.append(td);
                }
            }
            body.append(tr);
        }
    } else if (pregunta == 4) {
        th.scope = 'col';
        th.appendChild(document.createTextNode('Género'));
        tr.append(th);
        th = document.createElement('th');
        th.scope = 'col';
        th.appendChild(document.createTextNode('Categoría'));
        tr.append(th);

        for (let i = anios.length - 1; i >= 0; i--) {
            th = document.createElement('th');
            th.scope = 'col';
            th.className = 'text-center';
            th.appendChild(document.createTextNode(anios[i]));
            tr.append(th);
        }
        head.append(tr);

        for (let i = 0; i < registroAnios[anios[0]].length; i++) {
            for (let j = 2017; j < registroAnios.length; j++) {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = registroAnios[j][i][2];
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = registroAnios[j][i][0];
                tr.append(td);
                for (let m = 2017; m < registroAnios.length; m++) {
                    td = document.createElement('td');
                    td.className = 'text-right';
                    td.innerHTML = registroAnios[m][i] != undefined ? registroAnios[m][i][1] : '-';
                    tr.append(td);
                }
            }
            body.append(tr);
        }
    } else if (pregunta == 5) {
        th.scope = 'col';
        th.appendChild(document.createTextNode('Género'));
        tr.append(th);
        th = document.createElement('th');
        th.scope = 'col';
        th.appendChild(document.createTextNode('Categoría'));
        tr.append(th);

        for (let i = anios.length - 1; i >= 0; i--) {
            th = document.createElement('th');
            th.scope = 'col';
            th.className = 'text-center';
            th.appendChild(document.createTextNode(anios[i]));
            tr.append(th);
        }
        head.append(tr);

        for (let i = 0; i < registroAnios[anios[0]].length; i++) {
            for (let j = 2017; j < registroAnios.length; j++) {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = registroAnios[j][i][2];
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = registroAnios[j][i][0];
                tr.append(td);
                for (let m = 2017; m < registroAnios.length; m++) {
                    td = document.createElement('td');
                    td.className = 'text-right';
                    td.innerHTML = registroAnios[m][i] != undefined ? registroAnios[m][i][1] : '-';
                    tr.append(td);
                }
            }
            body.append(tr);
        }
    } else if (pregunta == 6) {
        th.scope = 'col';
        th.appendChild(document.createTextNode('Género'));
        tr.append(th);
        th = document.createElement('th');
        th.scope = 'col';
        th.appendChild(document.createTextNode('Categoría'));
        tr.append(th);

        for (let i = anios.length - 1; i >= 0; i--) {
            th = document.createElement('th');
            th.scope = 'col';
            th.className = 'text-center';
            th.appendChild(document.createTextNode(anios[i]));
            tr.append(th);
        }
        head.append(tr);

        for (let i = 0; i < registroAnios[anios[0]].length; i++) {
            for (let j = 2017; j < registroAnios.length; j++) {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = registroAnios[j][i][2];
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = registroAnios[j][i][0];
                tr.append(td);
                for (let m = 2017; m < registroAnios.length; m++) {
                    td = document.createElement('td');
                    td.className = 'text-right';
                    td.innerHTML = registroAnios[m][i] != undefined ? registroAnios[m][i][1] : '-';
                    tr.append(td);
                }
            }
            body.append(tr);
        }
    } else if (pregunta == 7) {
        th.scope = 'col';
        th.appendChild(document.createTextNode('Género'));
        tr.append(th);
        th = document.createElement('th');
        th.scope = 'col';
        th.appendChild(document.createTextNode('Categoría'));
        tr.append(th);

        for (let i = anios.length - 1; i >= 0; i--) {
            th = document.createElement('th');
            th.scope = 'col';
            th.className = 'text-center';
            th.appendChild(document.createTextNode(anios[i]));
            tr.append(th);
        }
        head.append(tr);

        for (let i = 0; i < registroAnios[anios[0]].length; i++) {
            for (let j = 2017; j < registroAnios.length; j++) {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = registroAnios[j][i][2];
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = registroAnios[j][i][0];
                tr.append(td);
                for (let m = 2017; m < registroAnios.length; m++) {
                    td = document.createElement('td');
                    td.className = 'text-right';
                    td.innerHTML = registroAnios[m][i] != undefined ? registroAnios[m][i][1] : '-';
                    tr.append(td);
                }
            }
            body.append(tr);
        }
    } else if (pregunta == 9) {
        th.scope = 'col';
        th.appendChild(document.createTextNode('Género'));
        tr.append(th);
        th = document.createElement('th');
        th.scope = 'col';
        th.appendChild(document.createTextNode('Institución'));
        tr.append(th);

        for (let i = anios.length - 1; i >= 0; i--) {
            th = document.createElement('th');
            th.scope = 'col';
            th.className = 'text-center';
            th.appendChild(document.createTextNode(anios[i]));
            tr.append(th);
        }
        head.append(tr);

        let comparacionAnual = [],
            maximoRegistros = 0;

        for (let i = 0; i < anios.length; i++) {
            if (registroAnios[anios[i]].length > maximoRegistros) {
                maximoRegistros = registroAnios[anios[i]].length
            }
        }

        for (let z = 0; z < maximoRegistros; z++) {
            let c = 2017;
            for (let i = 2017; i < registroAnios.length; i++) {
                if (registroAnios[i][z] != undefined) {
                    c++;
                }
            }

            if (c != 2017) {
                for (let i = 2017; i < registroAnios.length; i++) {
                    if (registroAnios[i][z] != undefined) {
                        for (let j = 2017; j < registroAnios.length; j++) {
                            if (j != i) {
                                registroAnios[j].forEach((dependencia) => {
                                    if (comparacionAnual[quitarEspacios(quitarAcentos(dependencia.nombre)).toLowerCase()] != undefined) {
                                        comparacionAnual[quitarEspacios(quitarAcentos(dependencia.nombre)).toLowerCase()][j] = {
                                            dependencia: dependencia.nombre,
                                            hombres: dependencia.totalH,
                                            mujeres: dependencia.totalM
                                        };
                                    } else {
                                        comparacionAnual[quitarEspacios(quitarAcentos(dependencia.nombre)).toLowerCase()] = [];
                                        comparacionAnual[quitarEspacios(quitarAcentos(dependencia.nombre)).toLowerCase()][j] = {
                                            dependencia: dependencia.nombre,
                                            hombres: dependencia.totalH,
                                            mujeres: dependencia.totalM
                                        };
                                    }
                                })
                            }
                        }
                    }
                }
            }
        }

        console.log(comparacionAnual); // Datos ordenados

        let years = anios.reverse();

        for (const dependencia in comparacionAnual) {
            comparacionAnual[dependencia].forEach((anio) => {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = 'Hombres';
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = anio.dependencia.toUpperCase();
                tr.append(td);
                for (let i = 0; i < years.length; i++) {
                    if (comparacionAnual[dependencia][years[i]] != undefined) {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = comparacionAnual[dependencia][years[i]].hombres;
                        tr.append(td);
                    } else {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = '-';
                        tr.append(td);
                    }
                }
            })
            body.append(tr);
            comparacionAnual[dependencia].forEach((anio) => {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = 'Mujeres';
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = anio.dependencia.toUpperCase();
                tr.append(td);
                for (let i = 0; i < years.length; i++) {
                    if (comparacionAnual[dependencia][years[i]] != undefined) {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = comparacionAnual[dependencia][years[i]].mujeres;
                        tr.append(td);
                    } else {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = '-';
                        tr.append(td);
                    }
                }
            })
            body.append(tr);
        }
    } else if (pregunta == 15) {
        th.scope = 'col';
        th.appendChild(document.createTextNode('Tipo de posesión'));
        tr.append(th);
        th = document.createElement('th');
        th.scope = 'col';
        th.appendChild(document.createTextNode('Tipo de institución'));
        tr.append(th);

        for (let i = anios.length - 1; i >= 0; i--) {
            th = document.createElement('th');
            th.scope = 'col';
            th.className = 'text-center';
            th.appendChild(document.createTextNode(anios[i]));
            tr.append(th);
        }
        head.append(tr);

        for (let i = 0; i < registroAnios[anios[0]].length; i++) {
            for (let j = 2017; j < registroAnios.length; j++) {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = registroAnios[j][i][2];
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = registroAnios[j][i][0];
                tr.append(td);
                for (let m = 2017; m < registroAnios.length; m++) {
                    td = document.createElement('td');
                    td.className = 'text-right';
                    td.innerHTML = registroAnios[m][i] != undefined ? registroAnios[m][i][1] : '-';
                    tr.append(td);
                }
            }
            body.append(tr);
        }
    } else if (pregunta == 16) {
        th.scope = 'col';
        th.appendChild(document.createTextNode('Tipo de posesión'));
        tr.append(th);
        th = document.createElement('th');
        th.scope = 'col';
        th.appendChild(document.createTextNode('Institución'));
        tr.append(th);

        for (let i = anios.length - 1; i >= 0; i--) {
            th = document.createElement('th');
            th.scope = 'col';
            th.className = 'text-center';
            th.appendChild(document.createTextNode(anios[i]));
            tr.append(th);
        }
        head.append(tr);

        let comparacionAnual = [],
            maximoRegistros = 0;

        for (let i = 0; i < anios.length; i++) {
            if (registroAnios[anios[i]].length > maximoRegistros) {
                maximoRegistros = registroAnios[anios[i]].length
            }
        }

        for (let z = 0; z < maximoRegistros; z++) {
            let c = 2017;
            for (let i = 2017; i < registroAnios.length; i++) {
                if (registroAnios[i][z] != undefined) {
                    c++;
                }
            }

            if (c != 2017) {
                for (let i = 2017; i < registroAnios.length; i++) {
                    if (registroAnios[i][z] != undefined) {
                        for (let j = 2017; j < registroAnios.length; j++) {
                            if (j != i) {
                                registroAnios[j].forEach((dependencia) => {
                                    if (comparacionAnual[quitarEspacios(quitarAcentos(dependencia.nombreIns)).toLowerCase()] != undefined) {
                                        comparacionAnual[quitarEspacios(quitarAcentos(dependencia.nombreIns)).toLowerCase()][j] = {
                                            dependencia: dependencia.nombreIns,
                                            propios: dependencia.propio,
                                            rentados: dependencia.renta,
                                            otros: dependencia.otro
                                        };
                                    } else {
                                        comparacionAnual[quitarEspacios(quitarAcentos(dependencia.nombreIns)).toLowerCase()] = [];
                                        comparacionAnual[quitarEspacios(quitarAcentos(dependencia.nombreIns)).toLowerCase()][j] = {
                                            dependencia: dependencia.nombreIns,
                                            propios: dependencia.propio,
                                            rentados: dependencia.renta,
                                            otros: dependencia.otro
                                        };
                                    }
                                })
                            }
                        }
                    }
                }
            }
        }

        console.log(comparacionAnual); // Datos ordenados

        let years = anios.reverse();

        for (const dependencia in comparacionAnual) {
            comparacionAnual[dependencia].forEach((anio) => {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = 'Propios';
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = anio.dependencia.toUpperCase();
                tr.append(td);
                for (let i = 0; i < years.length; i++) {
                    if (comparacionAnual[dependencia][years[i]] != undefined) {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = comparacionAnual[dependencia][years[i]].propios;
                        tr.append(td);
                    } else {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = '-';
                        tr.append(td);
                    }
                }
            })
            body.append(tr);
            comparacionAnual[dependencia].forEach((anio) => {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = 'Rentados';
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = anio.dependencia.toUpperCase();
                tr.append(td);
                for (let i = 0; i < years.length; i++) {
                    if (comparacionAnual[dependencia][years[i]] != undefined) {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = comparacionAnual[dependencia][years[i]].rentados;
                        tr.append(td);
                    } else {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = '-';
                        tr.append(td);
                    }
                }
            })
            body.append(tr);
            comparacionAnual[dependencia].forEach((anio) => {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = 'Otros';
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = anio.dependencia.toUpperCase();
                tr.append(td);
                for (let i = 0; i < years.length; i++) {
                    if (comparacionAnual[dependencia][years[i]] != undefined) {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = comparacionAnual[dependencia][years[i]].otros;
                        tr.append(td);
                    } else {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = '-';
                        tr.append(td);
                    }
                }
            })
            body.append(tr);
        }
    } else if (pregunta == 17) {
        th.scope = 'col';
        th.appendChild(document.createTextNode('Tipo de vehículo'));
        tr.append(th);
        th = document.createElement('th');
        th.scope = 'col';
        th.appendChild(document.createTextNode('Tipo de institución'));
        tr.append(th);

        for (let i = anios.length - 1; i >= 0; i--) {
            th = document.createElement('th');
            th.scope = 'col';
            th.className = 'text-center';
            th.appendChild(document.createTextNode(anios[i]));
            tr.append(th);
        }
        head.append(tr);

        for (let i = 0; i < registroAnios[anios[0]].length; i++) {
            for (let j = 2017; j < registroAnios.length; j++) {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = registroAnios[j][i][2];
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = registroAnios[j][i][0];
                tr.append(td);
                for (let m = 2017; m < registroAnios.length; m++) {
                    td = document.createElement('td');
                    td.className = 'text-right';
                    td.innerHTML = registroAnios[m][i] != undefined ? registroAnios[m][i][1] : '-';
                    tr.append(td);
                }
            }
            body.append(tr);
        }
    } else if (pregunta == 18) {
        th.scope = 'col';
        th.appendChild(document.createTextNode('Tipo de vehículo'));
        tr.append(th);
        th = document.createElement('th');
        th.scope = 'col';
        th.appendChild(document.createTextNode('Institución'));
        tr.append(th);

        for (let i = anios.length - 1; i >= 0; i--) {
            th = document.createElement('th');
            th.scope = 'col';
            th.className = 'text-center';
            th.appendChild(document.createTextNode(anios[i]));
            tr.append(th);
        }
        head.append(tr);

        let comparacionAnual = [],
            maximoRegistros = 0;

        for (let i = 0; i < anios.length; i++) {
            if (registroAnios[anios[i]].length > maximoRegistros) {
                maximoRegistros = registroAnios[anios[i]].length
            }
        }

        for (let z = 0; z < maximoRegistros; z++) {
            let c = 2017;
            for (let i = 2017; i < registroAnios.length; i++) {
                if (registroAnios[i][z] != undefined) {
                    c++;
                }
            }

            if (c != 2017) {
                for (let i = 2017; i < registroAnios.length; i++) {
                    if (registroAnios[i][z] != undefined) {
                        for (let j = 2017; j < registroAnios.length; j++) {
                            if (j != i) {
                                registroAnios[j].forEach((dependencia) => {
                                    if (comparacionAnual[quitarEspacios(quitarAcentos(dependencia.nombreIns)).toLowerCase()] != undefined) {
                                        comparacionAnual[quitarEspacios(quitarAcentos(dependencia.nombreIns)).toLowerCase()][j] = {
                                            dependencia: dependencia.nombreIns,
                                            automoviles: dependencia.automoviles,
                                            camionesCamionetas: dependencia.camionesCamionetas,
                                            motocicletas: dependencia.motocicletas,
                                            otros: dependencia.otros,
                                        };
                                    } else {
                                        comparacionAnual[quitarEspacios(quitarAcentos(dependencia.nombreIns)).toLowerCase()] = [];
                                        comparacionAnual[quitarEspacios(quitarAcentos(dependencia.nombreIns)).toLowerCase()][j] = {
                                            dependencia: dependencia.nombreIns,
                                            automoviles: dependencia.automoviles,
                                            camionesCamionetas: dependencia.camionesCamionetas,
                                            motocicletas: dependencia.motocicletas,
                                            otros: dependencia.otros,
                                        };
                                    }
                                })
                            }
                        }
                    }
                }
            }
        }

        console.log(comparacionAnual); // Datos ordenados

        let years = anios.reverse();

        for (const dependencia in comparacionAnual) {
            comparacionAnual[dependencia].forEach((anio) => {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = 'Automóviles';
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = anio.dependencia.toUpperCase();
                tr.append(td);
                for (let i = 0; i < years.length; i++) {
                    if (comparacionAnual[dependencia][years[i]] != undefined) {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = comparacionAnual[dependencia][years[i]].automoviles;
                        tr.append(td);
                    } else {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = '-';
                        tr.append(td);
                    }
                }
            })
            body.append(tr);
            comparacionAnual[dependencia].forEach((anio) => {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = 'Camiones y camionetas';
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = anio.dependencia.toUpperCase();
                tr.append(td);
                for (let i = 0; i < years.length; i++) {
                    if (comparacionAnual[dependencia][years[i]] != undefined) {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = comparacionAnual[dependencia][years[i]].camionesCamionetas;
                        tr.append(td);
                    } else {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = '-';
                        tr.append(td);
                    }
                }
            })
            body.append(tr);
            comparacionAnual[dependencia].forEach((anio) => {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = 'Motocicletas';
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = anio.dependencia.toUpperCase();
                tr.append(td);
                for (let i = 0; i < years.length; i++) {
                    if (comparacionAnual[dependencia][years[i]] != undefined) {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = comparacionAnual[dependencia][years[i]].motocicletas;
                        tr.append(td);
                    } else {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = '-';
                        tr.append(td);
                    }
                }
            })
            body.append(tr);
            comparacionAnual[dependencia].forEach((anio) => {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = 'Otros';
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = anio.dependencia.toUpperCase();
                tr.append(td);
                for (let i = 0; i < years.length; i++) {
                    if (comparacionAnual[dependencia][years[i]] != undefined) {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = comparacionAnual[dependencia][years[i]].otros;
                        tr.append(td);
                    } else {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = '-';
                        tr.append(td);
                    }
                }
            })
            body.append(tr);
        }
    } else if (pregunta == 19) {
        th.scope = 'col';
        th.appendChild(document.createTextNode('Tipo de línea o aparato telefónico'));
        tr.append(th);
        th = document.createElement('th');
        th.scope = 'col';
        th.appendChild(document.createTextNode('Tipo de institución'));
        tr.append(th);

        for (let i = anios.length - 1; i >= 0; i--) {
            th = document.createElement('th');
            th.scope = 'col';
            th.className = 'text-center';
            th.appendChild(document.createTextNode(anios[i]));
            tr.append(th);
        }
        head.append(tr);

        for (let i = 0; i < registroAnios[anios[0]].length; i++) {
            for (let j = 2017; j < registroAnios.length; j++) {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = registroAnios[j][i][2];
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = registroAnios[j][i][0];
                tr.append(td);
                for (let m = 2017; m < registroAnios.length; m++) {
                    td = document.createElement('td');
                    td.className = 'text-right';
                    td.innerHTML = registroAnios[m][i] != undefined ? registroAnios[m][i][1] : '-';
                    tr.append(td);
                }
            }
            body.append(tr);
        }
    } else if (pregunta == 20) {
        th.scope = 'col';
        th.appendChild(document.createTextNode('Tipo de línea o aparato telefónico'));
        tr.append(th);
        th = document.createElement('th');
        th.scope = 'col';
        th.appendChild(document.createTextNode('Institución'));
        tr.append(th);

        for (let i = anios.length - 1; i >= 0; i--) {
            th = document.createElement('th');
            th.scope = 'col';
            th.className = 'text-center';
            th.appendChild(document.createTextNode(anios[i]));
            tr.append(th);
        }
        head.append(tr);

        let comparacionAnual = [],
            maximoRegistros = 0;

        for (let i = 0; i < anios.length; i++) {
            if (registroAnios[anios[i]].length > maximoRegistros) {
                maximoRegistros = registroAnios[anios[i]].length
            }
        }

        for (let z = 0; z < maximoRegistros; z++) {
            let c = 2017;
            for (let i = 2017; i < registroAnios.length; i++) {
                if (registroAnios[i][z] != undefined) {
                    c++;
                }
            }

            if (c != 2017) {
                for (let i = 2017; i < registroAnios.length; i++) {
                    if (registroAnios[i][z] != undefined) {
                        for (let j = 2017; j < registroAnios.length; j++) {
                            if (j != i) {
                                registroAnios[j].forEach((dependencia) => {
                                    if (comparacionAnual[quitarEspacios(quitarAcentos(dependencia.institucion)).toLowerCase()] != undefined) {
                                        comparacionAnual[quitarEspacios(quitarAcentos(dependencia.institucion)).toLowerCase()][j] = {
                                            dependencia: dependencia.institucion,
                                            aparatosFijos: dependencia.aparatosFijos,
                                            aparatosMoviles: dependencia.aparatosMoviles,
                                            lineasFijas: dependencia.lineasFijas,
                                            lineasMoviles: dependencia.lineasMoviles,
                                        };
                                    } else {
                                        comparacionAnual[quitarEspacios(quitarAcentos(dependencia.institucion)).toLowerCase()] = [];
                                        comparacionAnual[quitarEspacios(quitarAcentos(dependencia.institucion)).toLowerCase()][j] = {
                                            dependencia: dependencia.institucion,
                                            aparatosFijos: dependencia.aparatosFijos,
                                            aparatosMoviles: dependencia.aparatosMoviles,
                                            lineasFijas: dependencia.lineasFijas,
                                            lineasMoviles: dependencia.lineasMoviles,
                                        };
                                    }
                                })
                            }
                        }
                    }
                }
            }
        }

        console.log(comparacionAnual); // Datos ordenados

        let years = anios.reverse();

        for (const dependencia in comparacionAnual) {
            comparacionAnual[dependencia].forEach((anio) => {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = 'Aparatos fijos';
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = anio.dependencia.toUpperCase();
                tr.append(td);
                for (let i = 0; i < years.length; i++) {
                    if (comparacionAnual[dependencia][years[i]] != undefined) {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = comparacionAnual[dependencia][years[i]].aparatosFijos;
                        tr.append(td);
                    } else {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = '-';
                        tr.append(td);
                    }
                }
            })
            body.append(tr);
            comparacionAnual[dependencia].forEach((anio) => {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = 'Aparatos móviles';
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = anio.dependencia.toUpperCase();
                tr.append(td);
                for (let i = 0; i < years.length; i++) {
                    if (comparacionAnual[dependencia][years[i]] != undefined) {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = comparacionAnual[dependencia][years[i]].aparatosMoviles;
                        tr.append(td);
                    } else {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = '-';
                        tr.append(td);
                    }
                }
            })
            body.append(tr);
            comparacionAnual[dependencia].forEach((anio) => {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = 'Líneas fijas';
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = anio.dependencia.toUpperCase();
                tr.append(td);
                for (let i = 0; i < years.length; i++) {
                    if (comparacionAnual[dependencia][years[i]] != undefined) {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = comparacionAnual[dependencia][years[i]].lineasFijas;
                        tr.append(td);
                    } else {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = '-';
                        tr.append(td);
                    }
                }
            })
            body.append(tr);
            comparacionAnual[dependencia].forEach((anio) => {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = 'Líneas móviles';
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = anio.dependencia.toUpperCase();
                tr.append(td);
                for (let i = 0; i < years.length; i++) {
                    if (comparacionAnual[dependencia][years[i]] != undefined) {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = comparacionAnual[dependencia][years[i]].lineasMoviles;
                        tr.append(td);
                    } else {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = '-';
                        tr.append(td);
                    }
                }
            })
            body.append(tr);
        }
    } else if (pregunta == 21) {
        th.scope = 'col';
        th.appendChild(document.createTextNode('Tipo de computadora, impresora, multifuncionales, servidores o tabletas'));
        tr.append(th);
        th = document.createElement('th');
        th.scope = 'col';
        th.appendChild(document.createTextNode('Tipo de institución'));
        tr.append(th);

        for (let i = anios.length - 1; i >= 0; i--) {
            th = document.createElement('th');
            th.scope = 'col';
            th.className = 'text-center';
            th.appendChild(document.createTextNode(anios[i]));
            tr.append(th);
        }
        head.append(tr);

        for (let i = 0; i < registroAnios[anios[0]].length; i++) {
            for (let j = 2017; j < registroAnios.length; j++) {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = registroAnios[j][i][2];
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = registroAnios[j][i][0];
                tr.append(td);
                for (let m = 2017; m < registroAnios.length; m++) {
                    td = document.createElement('td');
                    td.className = 'text-right';
                    td.innerHTML = registroAnios[m][i] != undefined ? registroAnios[m][i][1] : '-';
                    tr.append(td);
                }
            }
            body.append(tr);
        }
    } else if (pregunta == 22) {
        th.scope = 'col';
        th.appendChild(document.createTextNode('Tipo de computadora, impresora, multifuncionales, servidores o tabletas'));
        tr.append(th);
        th = document.createElement('th');
        th.scope = 'col';
        th.appendChild(document.createTextNode('Institución'));
        tr.append(th);

        for (let i = anios.length - 1; i >= 0; i--) {
            th = document.createElement('th');
            th.scope = 'col';
            th.className = 'text-center';
            th.appendChild(document.createTextNode(anios[i]));
            tr.append(th);
        }
        head.append(tr);

        let comparacionAnual = [],
            maximoRegistros = 0;

        for (let i = 0; i < anios.length; i++) {
            if (registroAnios[anios[i]].length > maximoRegistros) {
                maximoRegistros = registroAnios[anios[i]].length
            }
        }

        for (let z = 0; z < maximoRegistros; z++) {
            let c = 2017;
            for (let i = 2017; i < registroAnios.length; i++) {
                if (registroAnios[i][z] != undefined) {
                    c++;
                }
            }

            if (c != 2017) {
                for (let i = 2017; i < registroAnios.length; i++) {
                    if (registroAnios[i][z] != undefined) {
                        for (let j = 2017; j < registroAnios.length; j++) {
                            if (j != i) {
                                registroAnios[j].forEach((dependencia) => {
                                    if (comparacionAnual[quitarEspacios(quitarAcentos(dependencia.institucion)).toLowerCase()] != undefined) {
                                        comparacionAnual[quitarEspacios(quitarAcentos(dependencia.institucion)).toLowerCase()][j] = {
                                            dependencia: dependencia.institucion,
                                            compuEscritorio: dependencia.compuEscritorio,
                                            compuPortatil: dependencia.compuPortatil,
                                            impresoraCompartida: dependencia.impresoraCompartida,
                                            impresoraPersonal: dependencia.impresoraPersonal,
                                            multifuncionales: dependencia.multifuncionales,
                                            servidores: dependencia.servidores,
                                            tabletas: dependencia.tabletas,
                                        };
                                    } else {
                                        comparacionAnual[quitarEspacios(quitarAcentos(dependencia.institucion)).toLowerCase()] = [];
                                        comparacionAnual[quitarEspacios(quitarAcentos(dependencia.institucion)).toLowerCase()][j] = {
                                            dependencia: dependencia.institucion,
                                            compuEscritorio: dependencia.compuEscritorio,
                                            compuPortatil: dependencia.compuPortatil,
                                            impresoraCompartida: dependencia.impresoraCompartida,
                                            impresoraPersonal: dependencia.impresoraPersonal,
                                            multifuncionales: dependencia.multifuncionales,
                                            servidores: dependencia.servidores,
                                            tabletas: dependencia.tabletas,
                                        };
                                    }
                                })
                            }
                        }
                    }
                }
            }
        }

        console.log(comparacionAnual); // Datos ordenados

        let years = anios.reverse();

        for (const dependencia in comparacionAnual) {
            comparacionAnual[dependencia].forEach((anio) => {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = 'Computadora de escritorio';
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = anio.dependencia.toUpperCase();
                tr.append(td);
                for (let i = 0; i < years.length; i++) {
                    if (comparacionAnual[dependencia][years[i]] != undefined) {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = comparacionAnual[dependencia][years[i]].compuEscritorio;
                        tr.append(td);
                    } else {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = '-';
                        tr.append(td);
                    }
                }
            })
            body.append(tr);
            comparacionAnual[dependencia].forEach((anio) => {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = 'Computadora portátil';
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = anio.dependencia.toUpperCase();
                tr.append(td);
                for (let i = 0; i < years.length; i++) {
                    if (comparacionAnual[dependencia][years[i]] != undefined) {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = comparacionAnual[dependencia][years[i]].compuPortatil;
                        tr.append(td);
                    } else {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = '-';
                        tr.append(td);
                    }
                }
            })
            body.append(tr);
            comparacionAnual[dependencia].forEach((anio) => {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = 'Impresora compartida';
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = anio.dependencia.toUpperCase();
                tr.append(td);
                for (let i = 0; i < years.length; i++) {
                    if (comparacionAnual[dependencia][years[i]] != undefined) {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = comparacionAnual[dependencia][years[i]].impresoraCompartida;
                        tr.append(td);
                    } else {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = '-';
                        tr.append(td);
                    }
                }
            })
            body.append(tr);
            comparacionAnual[dependencia].forEach((anio) => {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = 'Impresora personal';
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = anio.dependencia.toUpperCase();
                tr.append(td);
                for (let i = 0; i < years.length; i++) {
                    if (comparacionAnual[dependencia][years[i]] != undefined) {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = comparacionAnual[dependencia][years[i]].impresoraPersonal;
                        tr.append(td);
                    } else {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = '-';
                        tr.append(td);
                    }
                }
            })
            body.append(tr);
            comparacionAnual[dependencia].forEach((anio) => {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = 'Multifuncionales';
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = anio.dependencia.toUpperCase();
                tr.append(td);
                for (let i = 0; i < years.length; i++) {
                    if (comparacionAnual[dependencia][years[i]] != undefined) {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = comparacionAnual[dependencia][years[i]].multifuncionales;
                        tr.append(td);
                    } else {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = '-';
                        tr.append(td);
                    }
                }
            })
            body.append(tr);
            comparacionAnual[dependencia].forEach((anio) => {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = 'Servidores';
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = anio.dependencia.toUpperCase();
                tr.append(td);
                for (let i = 0; i < years.length; i++) {
                    if (comparacionAnual[dependencia][years[i]] != undefined) {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = comparacionAnual[dependencia][years[i]].servidores;
                        tr.append(td);
                    } else {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = '-';
                        tr.append(td);
                    }
                }
            })
            body.append(tr);
            comparacionAnual[dependencia].forEach((anio) => {
                tr = document.createElement('tr');
                td = document.createElement('td');
                td.innerHTML = 'Tabletas';
                tr.append(td);
                td = document.createElement('td');
                td.innerHTML = anio.dependencia.toUpperCase();
                tr.append(td);
                for (let i = 0; i < years.length; i++) {
                    if (comparacionAnual[dependencia][years[i]] != undefined) {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = comparacionAnual[dependencia][years[i]].tabletas;
                        tr.append(td);
                    } else {
                        td = document.createElement('td');
                        td.className = 'text-right';
                        td.innerHTML = '-';
                        tr.append(td);
                    }
                }
            })
            body.append(tr);
        }
    } else {
        alertify.error('Sin tabular');
    }

    // Construccion de la tabla y agregarla al contenedor
    table.append(head);
    table.append(body);
    container.append(table);

    // Aplicar estilos y funciones DataTable
    aplicarDataTable('tablaGraficas');

    // Scroll hacia el fin del contenedor general
    document
        .getElementById('generalContainer')
        .scrollIntoView({ block: 'end', behavior: 'smooth' });
}

quitarAcentos = (cadena) => {
    const acentos = { 'á': 'a', 'é': 'e', 'í': 'i', 'ó': 'o', 'ú': 'u', 'Á': 'A', 'É': 'E', 'Í': 'I', 'Ó': 'O', 'Ú': 'U' };
    return cadena.split('').map(letra => acentos[letra] || letra).join('').toString();
}

quitarEspacios = (i) => {
    let ii = i.split('');
    let iiSinEspacios = '';

    for (let i = 0; i < ii.length; i++) {
        if (ii[i] != ' ') {
            iiSinEspacios += ii[i];
        }
    }

    return iiSinEspacios;
}