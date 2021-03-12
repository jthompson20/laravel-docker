{!! App\Services\Assets::queue('js','https://code.highcharts.com/highcharts.js',						'highcharts') !!}
{!! App\Services\Assets::queue('js','https://code.highcharts.com/modules/series-label.js',				'highcharts-series-label') !!}
{!! App\Services\Assets::queue('js','https://code.highcharts.com/modules/exporting.js',					'highcharts-exporting') !!}
{!! App\Services\Assets::queue('js','https://code.highcharts.com/modules/export-data.js',				'highcharts-exporting-data') !!}
{!! App\Services\Assets::queue('js','https://code.highcharts.com/modules/accessibility.js',				'highcharts-accessibility') !!}

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

Highcharts.chart('{{ $id }}', {

    title: {
        text: "{{ $data['title'] }}"
    },

    subtitle: {
        text: "{{ $data['subtitle'] }}"
    },

    yAxis: {
        title: {
            text: "{{ $data['yaxis']['title'] }}"
        }
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

    /*
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
    */

    xAxis: {
        categories: [
        	<?php 
        	$category_cnt 	= 0;
        	foreach ($data['xaxis']['categories'] AS $key => $category) {
        		$category_cnt++;
        		echo '"'.$category.'"';
        		if ($category_cnt != count($data['xaxis']['categories'])){
        			echo ",";
        		}
        	}
        	?>
        ]
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

</script>

@endpush