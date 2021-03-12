{!! App\Services\Assets::queue('js',	'https://code.highcharts.com/highcharts.js',			'highcharts') !!}
{!! App\Services\Assets::queue('js',	'https://code.highcharts.com/modules/exporting.js',		'highcharts-exporting') !!}
{!! App\Services\Assets::queue('js',	'https://code.highcharts.com/modules/export-data.js',	'highcharts-exporting-data') !!}
{!! App\Services\Assets::queue('js',	'https://code.highcharts.com/modules/accessibility.js',	'highcharts-accessibility') !!}

<div class="card">

	<a data-toggle="collapse" href="#{{ $id }}-id" aria-expanded="true" aria-controls="{{ $id }}-id">
	
		<div class="card-header">

			{{ $title }}

		</div>

	</a>

	<div id="{{ $id }}-id" class="card-body collapse show">

		<div id="{{ $id }}"></div>

	</div>

</div>

@push('js')
	<script type="text/javascript">

		$(document).ready(function(){

			Highcharts.chart('{{ $id }}', {
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					type: 'pie'
				},
				title: {
					text: "{{ $data['title'] }}"
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				accessibility: {
					point: {
						valueSuffix: '%'
					}
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							format: '<b>{point.name}</b>: {point.percentage:.1f} %'
						}
					}
				},
				series: [{
					name: "{{ $data['title'] }}",
					colorByPoint: true,
					data: [
						<?php
						$series_cnt=0;
						foreach ($data['series'] AS $key => $series){
							$series_cnt++;
							echo '
			        		{
			        			name: "'.$series['name'].'",
			        			y: '.$series['y'].'
			        		}
			        		';
			        		if ($series_cnt != count($data['series'])){
			        			echo ",";
			        		}
						}
						?>
					]
				}]
			});

		});
	</script>
@endpush