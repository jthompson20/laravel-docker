{!! App\Services\Assets::queue('js',	'https://code.highcharts.com/highcharts.js',			'highcharts') !!}
{!! App\Services\Assets::queue('js',	'https://code.highcharts.com/modules/venn.js',			'highcharts-venn') !!}
{!! App\Services\Assets::queue('js',	'https://code.highcharts.com/modules/exporting.js',		'highcharts-exporting') !!}
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
			    accessibility: {
			        point: {
			            descriptionFormatter: function (point) {
			                var intersection = point.sets.join(', '),
			                    name = point.name,
			                    ix = point.index + 1,
			                    val = point.value;
			                return ix + '. Intersection: ' + intersection + '. ' +
			                    (point.sets.length > 1 ? name + '. ' : '') + 'Value ' + val + '.';
			            }
			        }
			    },
			    series: [{
			        type: 'venn',
			        name: "{{ $data['title'] }}",
			        data: [
			        	<?php
						$series_cnt=0;
						foreach ($data['series'] AS $key => $series){
							$series_cnt++;

							echo '{';

							if (isset($series['name'])){
								echo 'name: 	\''.$series['name'].'\',';
							}

							echo '
			        		value: 	'.$series['value'].',
			        		sets: 	[';

			        		$set_cnt=0;
			        		foreach ($series['sets'] AS $set){
			        			$set_cnt++;
			        			echo "'".$set."'";
			        			if ($set_cnt != count($series['sets'])){
				        			echo ",";
				        		}
			        		}

			        		echo ']}';

							if ($series_cnt != count($data['series'])){
			        			echo ",";
			        		}
						}
						?>

				    ]
			    }],
			    title: {	
			        text: "{{ $data['title'] }}"
			    }
			});

		});
	</script>
@endpush