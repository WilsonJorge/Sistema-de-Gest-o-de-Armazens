var echartElemPie = document.getElementById('echartPie');

async function dashboardPieGenero() {
    const response = await fetch("./app/ajax/dashboard/dashboard.php", {
            method: "GET"
        })
        .then((response) => {
            return response.json()
        })
        .then((genero) => {
            var echartPie = echarts.init(echartElemPie);
            echartPie.setOption({
                color: ['#3197ef', '#c41084c4'],
                tooltip: {
                    show: true,
                    backgroundColor: 'rgba(0, 0, 0, .8)'
                },
                series: [{
                    name: 'Total por genero',
                    type: 'pie',
                    radius: '60%',
                    center: ['50%', '50%'],
                    data: genero,
                    itemStyle: {
                        emphasis: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }]
            });
            $(window).on('resize', function() {
                setTimeout(function() {
                    echartPie.resize();
                }, 500);
            });
        })
        .catch((error) => {
            console.log({ error })
        })
    return response;
}
dashboardPieGenero()


async function dashboardBarVagas() {
    const response = await fetch("./app/ajax/dashboard/graficoBarDepartamento.php", {
            method: "GET"
        })
        .then((response) => {
            return response.json()
        })
        .then((vagas) => {
            console.log(vagas)
            var options = {
                chart: {
                    height: 350,
                    type: 'bar'
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        endingShape: 'rounded'
                    }
                },
                dataLabels: {
                    enabled: false
                },
                series: [{
                    data: vagas.total
                }],
                xaxis: {
                    categories: vagas.seccao
                }
            };
            var chart = new ApexCharts(document.querySelector("#basicBar-chart"), options);
            chart.render(); // Grouped Bar Chart

        })
        .catch((error) => {
            console.log({ error })
        })
    return response;
}
dashboardBarVagas()


async function dashboardLineData() {
    const response = await fetch("./app/ajax/dashboard/graficoBarData_Criacao.php", {
            method: "GET"
        })
        .then((response) => {
            return response.json()
        })
        .then((data_criacao) => {
            console.log(data_criacao)
            var options = {
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                        enabled: false
                    },
                    toolbar: {
                        show: true
                    }
                },
                tooltip: {
                    enabled: true,
                    shared: true,
                    followCursor: false,
                    intersect: false,
                    inverseOrder: false,
                    custom: undefined,
                    fillSeriesColor: false,
                    theme: false
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                series: [{
                    name: "Funcionario(s)",
                    data: data_criacao.total
                }],
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'],
                        // takes an array which will be repeated on columns
                        opacity: 0.5
                    }
                },
                xaxis: {
                    categories: data_criacao.data
                }
            };
            var chart = new ApexCharts(document.querySelector("#basicLine-chart"), options);
            chart.render(); // line chart with Data Label
        })
        .catch((error) => {
            console.log({ error })
        })
    return response;
}
dashboardLineData()



async function dashboardCards() {
    const response = await fetch("{./app/ajax/dashboard/graficoBarData_Criacao.php}", {
            method: "GET"
        })
        .then((response) => {
            return response.json()
        })
        .then((data_criacao) => {
            console.log(data_criacao)
            var options = {
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                        enabled: false
                    },
                    toolbar: {
                        show: true
                    }
                },
                tooltip: {
                    enabled: true,
                    shared: true,
                    followCursor: false,
                    intersect: false,
                    inverseOrder: false,
                    custom: undefined,
                    fillSeriesColor: false,
                    theme: false
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                series: [{
                    name: "Funcionario(s)",
                    data: data_criacao.total
                }],
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'],
                        // takes an array which will be repeated on columns
                        opacity: 0.5
                    }
                },
                xaxis: {
                    categories: data_criacao.data
                }
            };
            var chart = new ApexCharts(document.querySelector("#basicLine-chart"), options);
            chart.render(); // line chart with Data Label
        })
        .catch((error) => {
            console.log({ error })
        })
    return response;
}

dashboardCards();