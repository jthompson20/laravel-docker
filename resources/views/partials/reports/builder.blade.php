{!! App\Services\Assets::queue('js','/js/partials/reports/builder.js') !!}

<div class="card">

    <div class="card-header">{{ __('Report Builder') }}</div>

    <div class="card-body">

        <form action="{{ route('home') }}" method="POST">

            @csrf

            <div class="form-row">

                <div class="form-group col">

                    <label for="report_type">Report Type</label>
                    <select id="report_type" name="report_type" class="form-control">
                        <option value="">Please Select Report Type</option>

                        @foreach ($reports AS $report)

                            <option value="{{ $report['id'] }}" data-reports="{{ json_encode($report['reports']) }}" >{{ $report['name'] }}</option>

                        @endforeach

                    </select>

                </div>

            </div>

            <div class="form-row">

                <div class="form-group col">

                    <label for="report_name">Report Name</label>
                    <select id="report_name" name="report_name" class="form-control" disabled>
                        <option value="" data-requirements="">Please Select Report Name</option>
                    </select>

                </div>

            </div>

            <div id="requirements"></div>

            <!--
            <div class="row">

                <div class="col">

                    <div id="accordion">

                        <div class="row mb-3">

                            <div class="col">

                                <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Advanced Filters</a>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col">

                                <div id="collapseOne" class="collapse" data-parent="#accordion">

                                    <div class="row mb-3">

                                        <div class="col">

                                            <div class="form-row">

                                                <div class="form-group col-md-6">

                                                    <label for="start_date">Start Date</label>
                                                    <input type="date" id="start_date" name="start_date" value="" class="form-control" />

                                                </div>

                                                <div class="form-group col-md-6">

                                                    <label for="end_date">End Date</label>
                                                    <input type="date" id="end_date" name="end_date" value="" class="form-control" />

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
            -->

            <div class="row">

                <div class="col">

                    <input type="submit" name="submit" class="btn btn-primary" value="Run Report" disabled />

                </div>

                <div class="col">

                    <a class="btn btn-danger reset float-right">Reset</a>

                </div>

            </div>

        </form>

    </div>

</div>

@push('js')
    <script type="text/javascript">
        $(document).ready(function(){

            /**
            * Function to prebuild the report_builder with submitted values
            **/
            function prebuild(filters) {

                // init vars
                var type    = filters['report_type'];

                if (type == ""){

                    // no report_type yet chosen, do nothing

                } else {

                    // set report_type
                    $("select[name=report_type]").val(filters['report_type']).trigger("change");

                    // make sure report_name is enabled
                    $("select[name=report_name]").prop("disabled",false);

                    // set report_name and trigger change
                    $("select[name=report_name]").val(filters['report_name']).trigger("change");

                    // grab selected value requirements
                    var requirements    = $("select[name=report_name]").find(":selected").data("requirements");

                    // if no requirements
                    if (requirements.length == 0){

                        // no other requirements to set

                        // enable submit button
                        $("input[type=submit]").prop('disabled',false);

                    } else {

                        // we need to set required field values
                        // iterate requirements
                        for (var i = 0; i < requirements.length; i++) {

                            // set field value and trigger change
                            var field   = "select[name=" + requirements[i]['slug'] + "]";
                            $(field).val(filters[requirements[i]['slug']]).trigger("change");

                        }

                    }


                }

            }

            // prebuild report builder
            prebuild(JSON.parse('<?php echo json_encode($filters); ?>'));

        });
    </script>
@endpush
