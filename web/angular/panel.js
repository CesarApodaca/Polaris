var panel = angular.module('panel', ['ngMaterial', 'ngMessages', 'material.svgAssetsCache','ng-fusioncharts']);


panel.controller('graficos', function($scope) {
  // chart data source
  $scope.dataSource = {
    "chart": {
        "caption": "Temperatura",
        "subcaption": "Ultimas 12 horas",
        "xaxisname": "Horas",
        "yaxisname": "Grados",
        "numberprefix": "C ",
        "theme": "carbon"
    },
    "categories": [
        {
            "category": [
                {
                    "label": "1:00"
                },
                {
                    "label": "2:00"
                },
                {
                    "label": "3:00"
                },
                {
                    "label": "4:00"
                },
                {
                    "label": "5:00"
                },
                {
                    "label": "6:00"
                },
                {
                    "label": "7:00"
                },
                {
                    "label": "8:00"
                },
                {
                    "label": "9:00"
                },
                {
                    "label": "10:00"
                },
                {
                    "label": "11:00"
                },
                {
                    "label": "12:00"
                }
            ]
        }
    ],
    "dataset": [
        {
            "seriesname": "Actual Revenue",
            "data": [
                {
                    "value": "16000"
                },
                {
                    "value": "20000"
                },
                {
                    "value": "18000"
                },
                {
                    "value": "19000"
                },
                {
                    "value": "15000"
                },
                {
                    "value": "21000"
                },
                {
                    "value": "16000"
                },
                {
                    "value": "20000"
                },
                {
                    "value": "17000"
                },
                {
                    "value": "25000"
                },
                {
                    "value": "19000"
                },
                {
                    "value": "23000"
                }
            ]
        },
        {
            "seriesname": "Projected Revenue",
            "renderas": "line",
            "showvalues": "0",
            "data": [
                {
                    "value": "15000"
                },
                {
                    "value": "16000"
                },
                {
                    "value": "17000"
                },
                {
                    "value": "18000"
                },
                {
                    "value": "19000"
                },
                {
                    "value": "19000"
                },
                {
                    "value": "19000"
                },
                {
                    "value": "19000"
                },
                {
                    "value": "20000"
                },
                {
                    "value": "21000"
                },
                {
                    "value": "22000"
                },
                {
                    "value": "23000"
                }
            ]
        },
        {
            "seriesname": "Profit",
            "renderas": "area",
            "showvalues": "0",
            "data": [
                {
                    "value": "4000"
                },
                {
                    "value": "5000"
                },
                {
                    "value": "3000"
                },
                {
                    "value": "4000"
                },
                {
                    "value": "1000"
                },
                {
                    "value": "7000"
                },
                {
                    "value": "1000"
                },
                {
                    "value": "4000"
                },
                {
                    "value": "1000"
                },
                {
                    "value": "8000"
                },
                {
                    "value": "2000"
                },
                {
                    "value": "7000"
                }
            ]
        }
    ]
};


//alert($scope.dataSource);
});




panel.controller('lineas', function($scope) {
    $scope.lineas = {
    "chart": {
        "caption": "Number of visitors last week",
        "subCaption": "Bakersfield Central vs Los Angeles Topanga",
        "captionFontSize": "14",
        "subcaptionFontSize": "14",
        "baseFontColor": "#333333",
        "baseFont": "Helvetica Neue,Arial",
        "subcaptionFontBold": "0",
        "xAxisName": "Day",
        "yAxisName": "No. of Visitor",
        "showValues": "0",
        "paletteColors": "#0075c2,#1aaf5d",
        "bgColor": "#ffffff",
        "showBorder": "0",
        "showShadow": "0",
        "showAlternateHGridColor": "0",
        "showCanvasBorder": "0",
        "showXAxisLine": "1",
        "xAxisLineThickness": "1",
        "xAxisLineColor": "#999999",
        "canvasBgColor": "#ffffff",
        "legendBorderAlpha": "0",
        "legendShadow": "0",
        "divlineAlpha": "100",
        "divlineColor": "#999999",
        "divlineThickness": "1",
        "divLineDashed": "1",
        "divLineDashLen": "1"
    },
    "categories": [
        {
            "category": [
                {
                    "label": "Mon"
                },
                {
                    "label": "Tue"
                },
                {
                    "label": "Wed"
                },
                {
                    "vline": "true",
                    "lineposition": "0",
                    "color": "#6baa01",
                    "labelHAlign": "right",
                    "labelPosition": "0",
                    "label": "National holiday"
                },
                {
                    "label": "Thu"
                },
                {
                    "label": "Fri"
                },
                {
                    "label": "Sat"
                },
                {
                    "label": "Sun"
                }
            ]
        }
    ],
    "dataset": [
        {
            "seriesname": "Bakersfield Central",
            "data": [
                {
                    "value": "15123"
                },
                {
                    "value": "14233"
                },
                {
                    "value": "25507"
                },
                {
                    "value": "9110"
                },
                {
                    "value": "15529"
                },
                {
                    "value": "20803"
                },
                {
                    "value": "19202"
                }
            ]
        },
        {
            "seriesname": "Los Angeles Topanga",
            "data": [
                {
                    "value": "13400"
                },
                {
                    "value": "12800"
                },
                {
                    "value": "22800"
                },
                {
                    "value": "12400"
                },
                {
                    "value": "15800"
                },
                {
                    "value": "19800"
                },
                {
                    "value": "21800"
                }
            ]
        }
    ]
}

});