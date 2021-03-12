{!! App\Services\Assets::queue('js','https://code.highcharts.com/highcharts.js',						'highcharts') !!}
{!! App\Services\Assets::queue('js','https://code.highcharts.com/modules/exporting.js',					'highcharts-exporting') !!}
{!! App\Services\Assets::queue('js','https://code.highcharts.com/modules/offline-exporting.js',			'highcharts-exporting-offline') !!}

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
			        type: 'column'
			    },
			    
			    title: {
			        text: "{{ $data['title'] }}"
			    },
			    
			    subtitle: {
			    	text: 	"{{ $subtitle }}"
			    },

			    exporting: {
			        chartOptions: { // specific options for the exported image
			            plotOptions: {
			                series: {
			                    dataLabels: {
			                        enabled: true
			                    }
			                }
			            }
			        },
			        fallbackToExportServer: false,
			        csv: {
			        	itemDelimiter: ','
			        }
			    },
			    xAxis: {
			        categories: [
			        	<?php 
			        	$category_cnt 	= 0;
			        	foreach ($data['xaxis']['categories'] AS $key => $category) {
			        		$category_cnt++;
			        		echo $category;
			        		if ($category_cnt != count($data['xaxis']['categories'])){
			        			echo ",";
			        		}
			        	}
			        	?>
			        ],
			        crosshair: <?php echo (isset($data['xaxis']['crosshair']) && $data['xaxis']['crosshair'])? "true": "false"; ?>
			    },
			    yAxis: {
			        min: <?php echo (isset($data['yaxis']) && isset($data['yaxis']['min']) && $data['yaxis']['min'])? $data['yaxis']['min']: 0; ?>,
			        title: {
			            text: "{{ $data['yaxis']['title'] }}"
			        }
			    },
			    tooltip: {
			        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
			            '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
			        footerFormat: '</table>',
			        shared: true,
			        useHTML: true
			    },
			    plotOptions: {
			        column: {
			            pointPadding: 0.2,
			            borderWidth: 0
			        }
			    },
			    series: [
			    	<?php 
		        	$series_cnt 	= 0;
		        	foreach ($data['series'] AS $key => $series) {
		        		$series_cnt++;
		        		echo '
		        		{
		        			name: "'.@$series['name'].'",
		        			color: "'.@$series['color'].'",
		        			data: [';

		        			// iterate series data
		        			$sdata_cnt=0;
		        			foreach ($series['data'] AS $sdata){
		        				$sdata_cnt++;
		        				echo $sdata;
		        				if ($sdata_cnt != count($series['data'])){
		        					echo ",";
		        				}
		        			}
		        		echo ']
		        		}
		        		';
		        		if ($series_cnt != count($data['series'])){
		        			echo ",";
		        		}
		        	}
		        	?>
			    ]
			});

		});

	</script>
@endpush