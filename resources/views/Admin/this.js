var BarsChart = (function() {
    var $chart = $('#chart-bars');

    $.ajax({
        method: 'GET',
        url: '/dashboard/getDashboardMemberChartsData',
        success: function(response) {
            var data = Object.keys(response).map(function(x) {
                return response[x]
            })
            var membersChart = new Chart($chart, {
                type: 'bar',
                data: {
                    labels: Object.keys(response),
                    datasets: [{
                        label: 'Members',
                        data: data
                    }]
                }
            });
            $chart.data('chart', membersChart);
        }
    });

})();