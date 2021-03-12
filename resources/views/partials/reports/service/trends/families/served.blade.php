@include('partials.charts.venn',array(
	'title'		=> 'Un-Duplicated Families Served',
	'id'		=> 'families-served-venn-chart',
	'data'		=> array(
		'title'			=> 'Families (Un Duplicated)',
		'series'		=> array(
			array(
				'sets'	=> array('Adults'),
				'value'	=> 87,
				'name'	=> 'Adults'
			),
			array(
				'sets'	=> array('Children'),
				'value'	=> 14,
				'name'	=> 'Children'
			),
			array(
				'sets'	=> array('Seniors'),
				'value'	=> 30,
				'name'	=> 'Seniors'
			),
			array(
				'sets'	=> array('Adults','Children'),
				'value'	=> 7,
				'name'	=> 'Adults & Children'
			),
			array(
				'sets'	=> array('Children','Seniors'),
				'value'	=> 2,
				'name'	=> 'Children & Seniors'
			),
			array(
				'sets'	=> array('Adults','Seniors'),
				'value'	=> 9,
				'name'	=> 'Adults & Seniors'
			),
			array(
				'sets'	=> array('Adults','Seniors','Children'),
				'value'	=> 7,
				'name'	=> 'Adults, Seniors & Children'
			)
		)
	)
))