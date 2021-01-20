$(document).ready(function() {
    var dom = document.getElementById("transactions");
    var myChart = echarts.init(dom);
    var app = {};
    option = null;
    app.title = 'Hellaplus';
    
    option = {
        tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b}: {c} ({d}%)"
        },
        color: ["#57BE65", "#ff1a1a", "#3EA4F1"],
        series: [
            {
                name:'Transactions',
                type:'pie',
                radius: ['50%', '70%'],
                avoidLabelOverlap: false,
                label: {
                    normal: {
                        show: false,
                        position: 'center'
                    },
                    emphasis: {
                        show: true,
                        textStyle: {
                            fontSize: '16',
                            fontWeight: 'bold'
                        }
                    }
                },
                labelLine: {
                    normal: {
                        show: false
                    }
                },
                data:[
                    {value:totalIncome, name:'Income'},
                    {value:totalExpenses, name:'Expenses'},
                    {value:totalSavings, name:'Savings'}
                ]
            }
        ]
    };
    ;
    if (option && typeof option === "object") {
        myChart.setOption(option, true);
    }
    
    graph(labels, currency, income, expenses);
});


function graph(labels, currency, income, expenses) {
    
    var dom = document.getElementById("monthly");
    var myChart = echarts.init(dom);
    var app = {};
    option = null;
    
    option = {
        legend: {
            data: ['Expenses ('+currency+')', 'Income ('+currency+')'],
            align: 'left'
        },
        tooltip: {},
        xAxis: {
            data: labels,
            silent: false,
            splitLine: {
                show: false
            }
        },
        yAxis: {
        },
        series: [{
            name: 'Expenses ('+currency+')',
            type: 'bar',
            stack: 'transactions',
            itemStyle: {
                    normal: {
                        barBorderRadius: 50,
                        color: "#ff1a1a"
                    }
                },
            data: expenses,
            animationDelay: function (idx) {
                return idx * 10;
            }
        }, {
            name: 'Income ('+currency+')',
            type: 'bar',
            stack: 'transactions',
            barMaxWidth: 10,
            itemStyle: {
                    normal: {
                        barBorderRadius: 50,
                        color: "#13A54E"
                    }
                },
            data: income,
            animationDelay: function (idx) {
                return idx * 10 + 100;
            }
        }],
        animationEasing: 'elasticOut',
        animationDelayUpdate: function (idx) {
            return idx * 5;
        }
    };
    if (option && typeof option === "object") {
        myChart.setOption(option, true);
    }
}

// grapgh

$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('.reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('.reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});


$('#reportrange').on('apply.daterangepicker', function(ev, picker) {
    $(".reports-title").text(picker.chosenLabel);
    server({
        url: reportsUrl,
        data: {
            "from": picker.startDate.format('YYYY-MM-DD'),
            "to": picker.endDate.format('YYYY-MM-DD'),
            "csrf-token": Cookies.get("CSRF-TOKEN")
        },
        loader: true
    });
});


function reports(reports) {
    log(reports);
    $(".reports-income").text(reports.income.total);
    $(".income-count").text(reports.income.count+" Trns.");
    $(".reports-expenses").text(reports.expenses.total);
    $(".expenses-count").text(reports.expenses.count+" Trns.");
    graph(reports.chart.label, currency, reports.chart.income, reports.chart.expenses);
    $(".top-expenses").empty();
    if (Object.keys(reports.expenses.top).length) {
        for (let expense of reports.expenses.top) {
            $(".top-expenses").append('<tr><td>'+expense.title+'</td><td class="text-right">'+expense.amount+'</td></tr>');
        }
    }else{
        $(".top-expenses").html("<tr><td class='text-center'>It's empty here!</td> </tr>");
    }
}


$(".skip-verification").click(function(){
    Cookies.set('verify', false, { expires: 2, path: '' });
    $("#verifyprofile").modal("hide");
})


;( function( $, window, document, undefined )
{
	$( '.inputfile' ).each( function()
	{
		var $input	 = $( this ),
			$label	 = $input.next( 'label' ),
			labelVal = $label.html();

		$input.on( 'change', function( e )
		{
			var fileName = '';

			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else if( e.target.value )
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				$label.find( 'span' ).html( fileName );
			else
				$label.html( labelVal );
		});

		// Firefox bug fix
		$input
		.on( 'focus', function(){ $input.addClass( 'has-focus' ); })
		.on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
	});
})( jQuery, window, document );