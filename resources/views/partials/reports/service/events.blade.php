<div class="row text-center">

	<div class="col-md-3 mt-3">

		<div class="card h-100">

			<div class="card-header">

				{{__('All Service Events')}}

			</div>

			<div class="card-body">

				{{ number_format($data['all_service_events'],0) }}

			</div>

		</div>

	</div>

	<div class="col-md-3 mt-3">

		<div class="card h-100">

			<div class="card-header">

				{{__('Households Served')}}

			</div>

			<div class="card-body">

				{{ number_format($data['households_served'],0) }}

			</div>

		</div>

	</div>

	<div class="col-md-3 mt-3">

		<div class="card h-100">

			<div class="card-header">

				{{__('People Served')}}

			</div>

			<div class="card-body">

				{{ number_format($data['people_served'],0) }}

			</div>

		</div>

	</div>

	<div class="col-md-3 mt-3">

		<div class="card h-100">

			<div class="card-header">

				{{__('Average Visits per Family')}}

			</div>

			<div class="card-body">

				{{ number_format($data['average_visits_per_family'],2) }}

			</div>

		</div>

	</div>

</div>
