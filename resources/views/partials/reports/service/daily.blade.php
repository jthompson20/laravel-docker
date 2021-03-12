@include('partials.charts.line',array(
	'title'		=> 'Services by Day',
	'id'		=> 'service-trends-chart',
	'data'		=> array(
		'title'			=> 'Families Served By Day',
		'subtitle'		=> 'Source: PantryTrak.com',
		'series'		=> array(
			array(
				'name'	=> 'Services By Day',
				'color'	=> '#28ce85',
				'data'	=> array(52,68,57,45,61)
			)
		),
		'xaxis'			=> array(
			'categories'	=> array('01/01/2021','01/02/2021','01/03/2021','01/04/2021','01/05/2021',)
		),
		'yaxis'			=> array(
			'title'	=> 'Number of Families Served'
		)
	)
))