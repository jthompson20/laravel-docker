@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">

        <div class="col">

            @include('partials.reports.builder',array('filters' => $filters, 'reports' => $reports))

        </div>

    </div>

    @if (isset($jobs) && is_array($jobs) && ! empty($jobs))

        <div class="row mt-5">

            <div class="col">

                @include('partials.reports.list',array('jobs' => $jobs))

            </div>

        </div>

    @endif

    @if (isset($report) && is_array($report) && ! empty($report))

        <div class="row mt-5">

            <div class="col">

                <?php 
                print "<pre>";
                print_r($report);
                print "</pre>";
                ?>

            </div>

        </div>

    @endif

</div>
@endsection
