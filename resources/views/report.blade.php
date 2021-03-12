@extends('layouts.app')

@section('content')

<div class="container">

	@if(isset($report['big_numbers']) && is_array($report['big_numbers']) && ! empty($report['big_numbers']))

		<div class="row mt-3">

			<div class="col">

					@include('partials.reports.service.events',array('data' => $report['big_numbers']))

			</div>

		</div>

	@endif

	@if(isset($report['service_distributions']) && is_array($report['service_distributions']) && ! empty($report['service_distributions']) && isset($report['household_size_distribution']) && is_array($report['household_size_distribution']) && ! empty($report['household_size_distribution']))

		<div class="row">

			<div class="col-md-6 mt-3">

				@include('partials.reports.service.distributions',array('data' => $report['service_distributions']))

			</div>

			<div class="col-md-6 mt-3">

				@include('partials.reports.household.distributions',array('data' => $report['household_size_distribution']))

			</div>

		</div>

	@endif

	@if(isset($report['service_summaries']) && is_array($report['service_summaries']) && ! empty($report['service_summaries']))

		<div class="row mt-3">

			<div class="col">

				@include('partials.reports.service.summaries',array('data' => $report['service_summaries']))

			</div>

		</div>

	@endif
	
	@if(isset($report['household_composition']) && is_array($report['household_composition']) && ! empty($report['household_composition']) && isset($report['families_served']) && is_array($report['families_served']) && ! empty($report['families_served']))

		<div class="row">

			<div class="col-md-6 mt-3">

				@include('partials.reports.household.composition',array('data' => $report['household_composition']))

			</div>

			<div class="col-md-6 mt-3">

				@include('partials.reports.service.trends.families.served',array('data' => $report['families_served']))

			</div>

		</div>

	@endif

	@if(isset($report['service_trends']) && is_array($report['service_trends']) && ! empty($report['service_trends']))

		<div class="row mt-3">

			<div class="col">

				@include('partials.reports.service.daily',array('data' => $report['service_trends']))

			</div>

		</div>

	@endif

	@if(isset($report['statistical']) && is_array($report['statistical']) && ! empty($report['statistical']))

		<div class="row mt-3">

			<div class="col">

				@include('partials.reports.household.statistics',array('data' => $report['statistical']))

			</div>

		</div>

	@endif

</div>

@endsection



