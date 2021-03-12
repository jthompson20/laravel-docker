<?php

return array('reports'	 => array(
    array(
        'id'        => 1,
        'name'      => 'County',
        'reports'   => array(
            array(
                'id'    => 1,
                'name'  => 'Standard County Report Output',
                'requirements'  => array(
                    array(
                        'name'      => 'County',
                        'slug'      => 'county_id',
                        'options'   => array(
                            array(
                                'id'    => 123,
                                'name'  => 'Stark County, OH'
                            ),
                            array(
                                'id'    => 456,
                                'name'  => 'Franklin County, OH'
                            )
                        )
                    )
                )
            )
        )
    ),
    array(
        'id'        => 2,
        'name'      => 'Event',
        'reports'   => array(
            array(
                'id'    => 2,
                'name'  => 'Standard Event Report Output',
                'requirements'  => array(
                    array(
                        'name'      => 'Event',
                        'slug'      => 'event_id',
                        'options'   => array(
                            array(
                                'id'    => 123,
                                'name'  => 'Event #1'
                            ),
                            array(
                                'id'    => 456,
                                'name'  => 'Event #2'
                            ),
                            array(
                                'id'    => 789,
                                'name'  => 'Event #3'
                            ),
                            array(
                                'id'    => 012,
                                'name'  => 'Event #4'
                            )
                        )
                    )
                )
            ),
            array(
                'id'    => 5,
                'name'  => 'Standard Event Report Output - Location Drilldown',
                'requirements'  => array(
                    array(
                        'name'      => 'Event',
                        'slug'      => 'event_id',
                        'options'   => array(
                            array(
                                'id'    => 123,
                                'name'  => 'Event #1'
                            ),
                            array(
                                'id'    => 456,
                                'name'  => 'Event #2'
                            ),
                            array(
                                'id'    => 789,
                                'name'  => 'Event #3'
                            ),
                            array(
                                'id'    => 012,
                                'name'  => 'Event #4'
                            )
                        )
                    ),
                    array(
                        'name'      => 'Location',
                        'slug'      => 'location_id',
                        'options'   => array(
                            array(
                                'id'    => 123,
                                'name'  => 'Location #1'
                            ),
                            array(
                                'id'    => 456,
                                'name'  => 'Location #2'
                            ),
                            array(
                                'id'    => 789,
                                'name'  => 'Location #3'
                            ),
                        )
                    )
                )
            )
        )
    ),
    array(
        'id'        => 3,
        'name'      => 'Foodbank',
        'reports'   => array(
            array(
                'id'    => 3,
                'name'  => 'Standard Foodbank Report Output',
                'requirements'  => array(
                    array(
                        'name'      => 'Foodbank',
                        'slug'      => 'foodbank_id',
                        'options'   => array(
                            array(
                                'id'    => 123,
                                'name'  => 'Foodbank #1'
                            )
                        )
                    )
                )
            ),
            array(
                'id'    => 6,
                'name'  => 'Standard Foodbank Report Output - Location Drilldown',
                'requirements'  => array(
                    array(
                        'name'      => 'Foodbank',
                        'slug'      => 'foodbank_id',
                        'options'   => array(
                            array(
                                'id'    => 123,
                                'name'  => 'Foodbank #1'
                            )
                        )
                    ),
                    array(
                        'name'      => 'Location',
                        'slug'      => 'location_id',
                        'options'   => array(
                            array(
                                'id'    => 123,
                                'name'  => 'Location #1'
                            ),
                            array(
                                'id'    => 456,
                                'name'  => 'Location #2'
                            ),
                            array(
                                'id'    => 789,
                                'name'  => 'Location #3'
                            ),
                        )
                    )
                )
            )
        )
    ),
    array(
        'id'        => 4,
        'name'      => 'Location',
        'reports'   => array(
            array(
                'id'    => 4,
                'name'  => 'Standard Location Report Output',
                'requirements'  => array(
                    array(
                        'name'      => 'Location',
                        'slug'      => 'location_id',
                        'options'   => array(
                            array(
                                'id'    => 123,
                                'name'  => 'Location #1'
                            ),
                            array(
                                'id'    => 456,
                                'name'  => 'Location #2'
                            ),
                            array(
                                'id'    => 789,
                                'name'  => 'Location #3'
                            ),
                        )
                    )
                )
            ),
            array(
                'id'    => 7,
                'name'  => 'Standard Location Report Output #2',
                'requirements'  => array(
                    array(
                        'name'      => 'Location',
                        'slug'      => 'location_id',
                        'options'   => array(
                            array(
                                'id'    => 123,
                                'name'  => 'Location #1'
                            ),
                            array(
                                'id'    => 456,
                                'name'  => 'Location #2'
                            ),
                            array(
                                'id'    => 789,
                                'name'  => 'Location #3'
                            ),
                        )
                    )
                )
            )
        )
    ),
    array(
        'id'        => 5,
        'name'      => 'Organization',
        'reports'   => array(
            array(
                'id'    => 4,
                'name'  => 'Standard Organization Report',
                'requirements'  => array(
                    array(
                        'name'      => 'Organization',
                        'slug'      => 'organization_id',
                        'options'   => array(
                            array(
                                'id'    => 123,
                                'name'  => 'Organization #1'
                            )
                        )
                    )
                )
            )
        )
    ),
    array(
        'id'        => 6,
        'name'      => 'State',
        'reports'   => array(
            array(
                'id'    => 4,
                'name'  => 'Standard State Report Output',
                'requirements'  => array(
                    array(
                        'name'      => 'State',
                        'slug'      => 'state_id',
                        'options'   => array(
                            array(
                                'id'    => 123,
                                'name'  => 'Ohio (OH)'
                            ),
                            array(
                                'id'    => 456,
                                'name'  => 'Texas (TX)'
                            ),
                            array(
                                'id'    => 789,
                                'name'  => 'Vifginia (VA)'
                            ),
                        )
                    )
                )
            ),
            array(
                'id'    => 7,
                'name'  => 'Standard State Report Output - County Drilldown',
                'requirements'  => array(
                    array(
                        'name'      => 'State',
                        'slug'      => 'state_id',
                        'options'   => array(
                            array(
                                'id'    => 123,
                                'name'  => 'Ohio (OH)'
                            )
                        )
                    ),
                    array(
                        'name'      => 'County',
                        'slug'      => 'county_id',
                        'options'   => array(
                            array(
                                'id'    => 123,
                                'name'  => 'Stark County, OH'
                            ),
                            array(
                                'id'    => 456,
                                'name'  => 'Franklin County, OH'
                            )
                        )
                    )
                )
            )
        )
    ),
));