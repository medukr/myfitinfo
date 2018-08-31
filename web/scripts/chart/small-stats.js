/*
|-------------------------
|      Small Stats
|-------------------------
*/

'use strict';

(function ($) {
    $(document).ready(function () {

        // Datasets
        // var boSmallStatsDatasets = [
        //     {
        //         backgroundColor: 'rgba(0, 184, 216, 0.2)',
        //         borderColor: 'rgb(0, 184, 216)',
        //         data: [77.5, 77.6, 78.3, 77.2, 76.6, 75.9, 75.8, 76, 75.7, 75.5, 76.3, 75.6, 76.2, 76,76.3]
        //     },
        //     {
        //         backgroundColor: 'rgba(23,198,113,0.2)',
        //         borderColor: 'rgb(23,198,113)',
        //         data: [77.5, 77.6, 78.3, 77.2, 76.6, 75.9, 75.8, 76, 75.7, 75.5, 76.3, 75.6, 76.2, 76,76.3]
        //     },
        //     {
        //         backgroundColor: 'rgba(255,180,0,0.2)',
        //         borderColor: 'rgb(255,180,0)',
        //         data: [2, 3, 3, 3, 4, 3, 3]
        //     },
        //     {
        //         backgroundColor: 'rgba(255,65,105,0.2)',
        //         borderColor: 'rgb(255,65,105)',
        //         data: [1, 7, 1, 3, 1, 4, 8]
        //     },
        //     {
        //         backgroundColor: 'rgb(0,123,255,0.2)',
        //         borderColor: 'rgb(0,123,255)',
        //         data: [3, 2, 3, 2, 4, 5, 4]
        //     }
        // ];

        // Options
        function boSmallStatsOptions(max) {
            return {
                maintainAspectRatio: true,
                responsive: true,
                // Uncomment the following line in order to disable the animations.
                // animation: false,
                legend: {
                    display: false,

                },
                tooltips: {
                    enabled: true,
                    callbacks: {
                        label: function(t,d){
                            return d['datasets'][0]['data'][t['index']];
                        },

                        title: function (a) {
                            return false;
                        },

                    },
                    displayColors: false,




                },
                elements: {
                    point: {
                        radius: 0
                    },
                    line: {
                        tension: 0.3,
                    }
                },
                scales: {

                    xAxes: [{
                        gridLines: false,
                        scaleLabel: false,
                        ticks: {
                            display: false,


                        },

                    }],
                    yAxes: [{
                        gridLines: false,
                        scaleLabel: false,
                        ticks: {
                            display: false,
                            // Avoid getting the graph line cut of at the top of the canvas.
                            // Chart.js bug link: https://github.com/chartjs/Chart.js/issues/4790
                            suggestedMax: max,

                        },
                        position: 'right',
                    }],
                },
            };
        }

        // Generate the small charts
        boSmallStatsDatasets.map(function (el, index) {
            var chartOptions = boSmallStatsOptions(Math.max.apply(Math, el.data) + 1);
            var ctx = document.getElementsByClassName('blog-overview-stats-small-' + (index + 1));
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: el.labels,
                    datasets: [{
                        label: 'chart',
                        fill: 'start',
                        data: el.data,

                        backgroundColor: el.backgroundColor,
                        borderColor: el.borderColor,
                        borderWidth: 1.5,
                        pointBackgroundColor:  el.borderColor,
                        pointRadius: 2,
                        pointHoverRadius: 8,
                        pointHitRadius: 10,
                    }],
                },
                options: chartOptions
            });
        });
    });
})(jQuery);



