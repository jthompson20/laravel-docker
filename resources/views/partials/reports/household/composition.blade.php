@include('partials.charts.pie',array(
	'title'		=> 'Family Composition',
	'id'		=> 'household-composition-chart',
	'data'		=> array(
		'title'			=> 'Families (Un Duplicated)',
		'series'		=> array(
			array(
				'name'	=> 'Adults & Children',
				'y'		=> 2149
			),
			array(
				'name'	=> 'Children & Seniors',
				'y'		=> 98
			),
			array(
				'name'	=> 'Adults Only',
				'y'		=> 1548
			),
			array(
				'name'	=> 'Adults & Seniors',
				'y'		=> 456
			),
			array(
				'name'	=> 'Seniors Only',
				'y'		=> 619
			),
			array(
				'name'	=> 'Adults, Seniors & Children',
				'y'		=> 379
			),
		)
	)
))