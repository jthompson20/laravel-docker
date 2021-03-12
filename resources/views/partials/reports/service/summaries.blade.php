{!! App\Services\Assets::queue('css',	'https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css',	'datatables') !!}
{!! App\Services\Assets::queue('js',	'https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js',	'datatables') !!}

<!-- Plugins needed for exporting datatables -->
{!! App\Services\Assets::queue('js',	'https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js', 	'datatables-buttons') !!}
{!! App\Services\Assets::queue('js',	'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',			'datatables-export-zip') !!}
{!! App\Services\Assets::queue('js',	'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js',		'datatables-export-pdf') !!}
{!! App\Services\Assets::queue('js',	'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js',		'datatables-export-pdf-font') !!}
{!! App\Services\Assets::queue('js',	'https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js', 		'datatables-buttons-html5') !!}
{!! App\Services\Assets::queue('js',	'https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js',			'datatables-buttons-print') !!}

<!-- custom datatable css -->
{!! App\Services\Assets::queue('css',	'/css/datatables/buttons.css',	'datatables-buttons-custom') !!}


<div class="card">

	<a data-toggle="collapse" href="#service-summaries" aria-expanded="true" aria-controls="service-summaries">
	
		<div class="card-header">

			{{__('Service Summaries')}}

		</div>

	</a>

	<div id="service-summaries" class="card-body collapse show">

		<div class="table-responsive">

			<table id="service-summaries-table" class="table table-striped">

				<thead>
					<tr>
						<th>Service</th>
						<th>Families Served</th>
						<th>People Served</th>
						<th>Meals Provided</th>
					</tr>
				</thead>

				<tbody>
					
					@foreach ($data['services'] AS $service)

						<tr>
							<td>{{ $service['service'] }}</td>
							<td>{{ number_format($service['families_served'],0) }}</td>
							<td>{{ number_format($service['people_served'],0) }}</td>
							<td>{{ number_format($service['meals_provided'],0) }}</td>
						</tr>

					@endforeach

					<tr class="table-success">
						<td><strong>Total Meals Provided</strong></td>
						<td>{{ number_format($data['total_meals_provided'],0) }}</td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table-success">
						<td><strong>Average Meals Per Person</strong></td>
						<td>{{ number_format($data['average_meals_per_person'],2) }}</td>
						<td></td>
						<td></td>
					</tr>

				</tbody>

			</table>

		</div>

	</div>

</div>

@push('js')

	<script type="text/javascript">

		$(document).ready(function(){

			$("#service-summaries-table").DataTable({
				"ordering": 	false,
				dom: 'lfBrtip',
		        buttons: [
		        	{
		        		extend: 	'csv',
		        		filename: 	function() {
		        			return 'service-summaries-csv';
		        		}
		        	},
		        	{
		        		extend: 	'excel',
		        		filename: 	function() {
		        			return 'service-summaries-excel';
		        		}
		        	},
		        	{
		        		extend: 	'pdf',
		        		filename: 	function() {
		        			return 'service-summaries-pdf';
		        		}
		        	},
		            'print'
		        ]
			});

		});

	</script>

@endpush
