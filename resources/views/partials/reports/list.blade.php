<div class="card">

    <div class="card-header">{{__('Report Job List') }}</div>

    <div class="card-body">

        <table class="table table-striped">

            <thead>
                <tr>
                    <th>Report ID</th>
                    <th>Report Type</th>
                    <th>Report Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>By</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($jobs AS $job)

                    <tr>
                        <td>
                            <?php
                            echo (isset($job['id']))? "<a href=\"/report/".$job['id']."\">".$job['id']."</a>": "<img src=\"https://bison.usgs.gov/images/spinner2.gif\" height=\"23\" />"; 
                            ?>
                        </td>
                        <td>{{ $job['type'] }}</td>
                        <td>{{ $job['name'] }}</td>
                        <td>{{ date("m/d/Y",strtotime($job['start'])) }}</td>
                        <td>{{ date("m/d/Y",strtotime($job['end'])) }}</td>
                        <td>{{ $job['user'] }}</td>
                    </tr>

                @endforeach

            </tbody>

        </table>


    </div>

</div>