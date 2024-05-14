(function($) {
    "use strict"


    var data = {
        labels: ['facebook', 'twitter', 'youtube', 'google plus'],
        series: [{
                    value: 20,
                    className: "bg-facebook"
                },
                {
                    value: 10,
                    className: "bg-twitter"
                },
                {
                    value: 30,
                    className: "bg-youtube"
                },
                {
                    value: 40,
                    className: "bg-google-plus"
                }
            ]
           
    };

    var options = {
        labelInterpolationFnc: function(value) {
            return value[0]
        }
    };

    var responsiveOptions = [
        ['screen and (min-width: 640px)', {
            chartPadding: 30,
            labelOffset: 100,
            labelDirection: 'explode',
            labelInterpolationFnc: function(value) {
                return value;
            }
        }],
        ['screen and (min-width: 1024px)', {
            labelOffset: 80,
            chartPadding: 20
        }]
    ];

    new Chartist.Pie('.ct-pie-chart', data, options, responsiveOptions);


    /*----------------------------------*/

    var data = {
        labels: _lebels,
        series: [
            _data,
        ]
    };

    var options = {
        seriesBarDistance: 10
    };

    var responsiveOptions = [
        ['screen and (max-width: 640px)', {
            seriesBarDistance: 5,
            axisX: {
                labelInterpolationFnc: function(value) {
                    return value[0];
                }
            }
        }]
    ];

    new Chartist.Bar('.ct-bar-chart', data, options, responsiveOptions);


    $('.year-calendar').pignoseCalendar({
        theme: 'blue' // light, dark, blue
    });






})(jQuery);


const wt2 = new PerfectScrollbar('.widget-todo2');