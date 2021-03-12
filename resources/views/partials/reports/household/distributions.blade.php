@include('partials.charts.column',array(
	'title'		=> 'Patient Household Size Distribution',
	'subtitle'	=> 'Any Households larger than 10 were rounded down to 10',
	'id'		=> 'household-size-chart',
	'data'		=> array(
		'title'			=> 'Patient Household Size Distribution',
		'series'		=> array(
			array(
				'name'	=> 'Patient household Size',
				'color'	=> '#28ce85',
				'data'	=> array(1807,1355,1278,1265,1119,684,365,197,105,80)
			)
		),
		'xaxis'			=> array(
			'categories'	=> array('1','2','3','4','5','6','7','8','9','10'),
			'crosshair'		=> true
		),
		'yaxis'			=> array(
			'min'	=> 0,
			'title'	=> 'Number of Patients'
		)
	)
))