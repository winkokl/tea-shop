
(function($) {
    /* "use strict" */


 var dzChartlist = function(){

	var screenWidth = $(window).width();


	var revenueChart = function(){
		var options = {
          series: [{
          name: 'series1',
          data: [10, 20, 30, 40]
        },
		{
          name: 'series2',
          data: [12, 15, 25, 30]
        }],
          chart: {
          type: 'area',
          height: 200,
			toolbar: {
				show: false,
			},
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
			curve: 'smooth',
			width:3
        },
		colors:["#FFAB2D","#00ADA3"],
		dataLabels: {
          enabled: false
        },
		grid: {
			show: true,
			borderColor: '#eee',
			strokeDashArray: 0,
			position: 'back',
			xaxis: {
				lines: {
					show: false
				}
			},
		},
        xaxis: {
			categories: ['Jan', 'Fab', 'Mar', 'Apr'],
			labels: {
				show: true,
				minHeight: 25,
				maxHeight: 0,
				style: {
					colors: 'var(--title)',
					fontSize: '12px',
					fontFamily: 'poppins',
					fontWeight: 100,
					cssClass: 'apexcharts-xaxis-label',
				},
			},
			axisTicks: {
				show: false,
			},
			crosshairs: {
				show: false,
			},
		},
		yaxis: {
			labels: {
			show: true,
				offsetX:-5,
				style: {
					colors: 'var(--title)',
					fontSize: '12px',
					fontFamily: 'poppins',
					fontWeight: 100,
					cssClass: 'apexcharts-xaxis-label',
				},
				formatter: function (value) {
				  return value + "k";
				}
			},
		},
		legend: {
			show: false,
		},
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
        };

        var revenueChart = new ApexCharts(document.querySelector("#revenueChart"), options);
        revenueChart.render();

		$(".revenue-chart .nav-link").on('click',function(){
			var seriesType = $(this).attr('data-series');
			var columnData = [];
			var columnData2 = [];
			switch(seriesType) {
				case "week":
					columnData = [20, 25, 35, 40];
					columnData2 = [5, 10, 30, 20];
					break;
				case "month":
					columnData = [10, 15, 25, 30];
					columnData2 = [5, 10, 30, 20];
					break;
				case "today":
					columnData = [15, 20, 10, 25];
					columnData2 = [10, 15, 20, 30];
					break;
				default:
					columnData = [10, 20, 30, 40];
					columnData2 = [10, 20, 30, 40];
			}
			revenueChart.updateSeries([
				{
					name: "series1",
					data: columnData
				},{
					name: 'series2',
					data: columnData2
				}
			]);
		})
	}

	/* Function ============ */
		return {
			init:function(){
    		},

			load:function(){
       			revenueChart();
			},

			resize:function(){

			}
		}

	}();

	jQuery(document).ready(function(){
	});

	jQuery(window).on('load',function(){
		setTimeout(function(){
			dzChartlist.load();
		}, 1000);

	});

	jQuery(window).on('resize',function(){


	});

})(jQuery);
