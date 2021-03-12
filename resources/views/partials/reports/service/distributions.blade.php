@include('partials.charts.column',array(
	'title'		=> 'Usage of Distribution Outlets',
	'subtitle'	=> '',
	'id'		=> 'service-distribution-chart',
	'data'		=> array(
		'title'			=> 'Usage of Distribution Outlets',
		'series'		=> array(
			array(
				'name'	=> 'Number of Sites Visited',
				'color'	=> '#28ce85',
				'data'	=> array(3155,1032,531,239,347)
			)
		),
		'xaxis'			=> array(
			'categories'	=> array('1','2','3','4','5'),
			'crosshair'		=> true
		),
		'yaxis'			=> array(
			'min'	=> 0,
			'title'	=> 'Number of Un Duplicated Families'
		)
	)
))