if( Object.keys(chart).length > 0 )
{
	var chart_data = [];
	for (var key in chart) {
		if( chart.hasOwnProperty(key) ) {
			row = [ key, parseFloat(chart[key].avg_score), parseFloat(chart[key].avg_health) ];
			chart_data.push( row );
		}
	}

	google.load('visualization', '1.1', {packages: ['corechart']});
	google.setOnLoadCallback( drawChart );
	
}
else
{
	if( document.getElementById('seops_audit_chart_content') !== null )
	{
		document.getElementById('seops_audit_chart_content').innerHTML( 'There is no auditing report yet.' );
	}
}

function drawChart() {

	var data = new google.visualization.DataTable();
	data.addColumn('string', 'Months');
	data.addColumn('number', 'Score');
	data.addColumn('number', 'Health');
	
	data.addRows(chart_data);

	var options = {
		'chartArea': {
			'top' : '5%',
			'width': '85%', 
			'height': '70%'
		},
		'legend': {
			'position': 'bottom'
		},
		colors: ['#0b77b1', '#4caf50'],
		'pointSize' : 5,
		'width' : 410,
		'height' : 180
	};

	var chart = new google.visualization.LineChart( document.getElementById('seops_audit_chart_content') );
	chart.draw(data, options);
	
}
