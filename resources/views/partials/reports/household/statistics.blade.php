{!! App\Services\Assets::queue('css',	'https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css',	'datatables') !!}
{!! App\Services\Assets::queue('js',	'https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js',	'datatables') !!}

<!-- Plugins needed for exporting datatables -->
{!! App\Services\Assets::queue('js',	'https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js', 	'datatables-buttons') !!}
{!! App\Services\Assets::queue('js',	'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',			'datatables-export-zip') !!}
{!! App\Services\Assets::queue('js',	'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js',		'datatables-export-pdf') !!}
{!! App\Services\Assets::queue('js',	'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js',		'datatables-export-pdf-font') !!}
{!! App\Services\Assets::queue('js',	'https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js', 		'datatables-buttons-html5') !!}
{!! App\Services\Assets::queue('js',	'https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js',			'datatables-buttons-print') !!}

<div class="card">

	<a data-toggle="collapse" href="#statistical-reporting"  aria-expanded="true" aria-controls="statistical-reporting">

		<div class="card-header">

			{{ __('Statistical Report') }}

		</div>

	</a>

	<div id="statistical-reporting" class="card-body collapse show">

		<div class="table-responseive">
			
			<table id="statistical-reporting-table" class="table table-striped">

				<thead>
					<tr>
						<th>Basic Data</th>
						<th>With Minor Children</th>
						<th>Without Minor Children</th>
						<th>Totals</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td>Number of Households</td>
						<td>{{ number_format($data['number_of_households']['with_minor_children'],0) }}</td>
						<td>{{ number_format($data['number_of_households']['without_minor_children'],0) }}</td>
						<td>{{ number_format(($data['number_of_households']['with_minor_children'] + $data['number_of_households']['without_minor_children']),0) }}</td>
					</tr>
					<tr>
						<td>Number of Seniors Served (age 60+)</td>
						<td>{{ number_format($data['number_of_seniors_served']['with_minor_children'],0) }}</td>
						<td>{{ number_format($data['number_of_seniors_served']['without_minor_children'],0) }}</td>
						<td>{{ number_format(($data['number_of_seniors_served']['with_minor_children'] + $data['number_of_seniors_served']['without_minor_children']),0) }}</td>
					</tr>
					<tr>
						<td>Number of Adults Served (age 18-59)</td>
						<td>{{ number_format($data['number_of_adults_served']['with_minor_children'],0) }}</td>
						<td>{{ number_format($data['number_of_adults_served']['without_minor_children'],0) }}</td>
						<td>{{ number_format(($data['number_of_adults_served']['with_minor_children'] + $data['number_of_adults_served']['without_minor_children']),0) }}</td>
					</tr>
					<tr>
						<td>Number of Children Served (0-17)</td>
						<td>{{ number_format($data['number_of_children_served']['with_minor_children'],0) }}</td>
						<td>{{ number_format($data['number_of_children_served']['without_minor_children'],0) }}</td>
						<td>{{ number_format(($data['number_of_children_served']['with_minor_children'] + $data['number_of_children_served']['without_minor_children']),0) }}</td>
					</tr>
					<tr>
						<td>Total Number of People Served</td>
						<td>{{ number_format(($data['number_of_seniors_served']['with_minor_children']+$data['number_of_adults_served']['with_minor_children']+$data['number_of_children_served']['with_minor_children']),0) }}</td>
						<td>{{ number_format(($data['number_of_seniors_served']['without_minor_children']+$data['number_of_adults_served']['without_minor_children']+$data['number_of_children_served']['without_minor_children']),0) }}</td>
						<td>{{ number_format(( ($data['number_of_seniors_served']['with_minor_children'] + $data['number_of_seniors_served']['without_minor_children']) + ($data['number_of_adults_served']['with_minor_children'] + $data['number_of_adults_served']['without_minor_children']) + ($data['number_of_children_served']['with_minor_children'] + $data['number_of_children_served']['without_minor_children']) ),0) }}</td>
					</tr>

				</tbody>

			</table>

		</div>

	</div>

</div>

@push('js')

	<script type="text/javascript">

		$(document).ready(function(){

			$("#statistical-reporting-table").DataTable({
				"ordering": 	false,
				dom: 'lfBrtip',
		        buttons: [
		            {
		        		extend: 	'csv',
		        		filename: 	function() {
		        			return 'statistical-reporting-csv';
		        		}
		        	},
		        	{
		        		extend: 	'excel',
		        		filename: 	function() {
		        			return 'statistical-reporting-excel';
		        		}
		        	},
		        	{
		        		extend: 	'pdf',
		        		filename: 	function() {
		        			return 'statistical-reporting-pdf';
		        		}
		        	},
		            'print'
		        ]
			});

		});

	</script>

@endpush


