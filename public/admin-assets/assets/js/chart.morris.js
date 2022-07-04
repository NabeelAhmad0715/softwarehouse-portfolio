$(function(){

	/* Morris Area Chart */

	window.mA = Morris.Area({
	    element: 'morrisArea',
	    data: [
	        { y: '2015', a: 100, b: 30, c:49},
	        { y: '2016', a: 20,  b: 60, c:37},
	        { y: '2017', a: 90,  b: 120, c:79},
	        { y: '2018', a: 50,  b: 80, c:69},
	        { y: '2019', a: 120,  b: 150, c:89},
	    ],
	    xkey: 'y',
	    ykeys: ['a', 'b', 'c'],
	    labels: ['2 Months or more', 'Next Month', 'Expired'],
	    lineColors: ['#1b5a90','#ff9d00','red'],
	    lineWidth: 2,

     	fillOpacity: 0.5,
	    gridTextSize: 10,
	    hideHover: 'auto',
	    resize: true,
		redraw: true
	});

	/* Morris Line Chart */

	window.mL = Morris.Line({
	    element: 'morrisLine',
	    data: [
	        { y: '2015', a: 100, b: 30, c:49},
	        { y: '2016', a: 20,  b: 60, c:37},
	        { y: '2017', a: 90,  b: 120, c:79},
	        { y: '2018', a: 50,  b: 80, c:69},
	        { y: '2019', a: 120,  b: 150, c:89},
	    ],
	    xkey: 'y',
	    ykeys: ['a', 'b', 'c'],
	    labels: ['2 Months or more', 'Next Month', 'Expired'],
	    lineColors: ['#1b5a90','#ff9d00','red'],
	    lineWidth: 1,
	    gridTextSize: 10,
	    hideHover: 'auto',
	    resize: true,
		redraw: true
	});
	$(window).on("resize", function(){
		mA.redraw();
		mL.redraw();
	});

});
