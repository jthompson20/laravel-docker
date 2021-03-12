<?php 

namespace App\Services\Sources\ReportingEngine;

use App\Services\Sources;

class Report extends ReportingEngine
{

	/**
	* Function that gets report data for a report based on filters passed
    *
    * @param array  $filters    An array of filters to be used to pull report information
	**/
	public function get($filters=array()) {

		return $this->_test_data();

	}

    /**
    * Function that grabs a report by id
    **/
    public function get_by_id($report_id=0) {

        return $this->_test_data();

    }

	/**
	* Function that gets a list of reports
	**/
	public function list() {

		// get reports
		$reports 	= app()->make('config')->get('reports.reports'); // grab from config for now

		return $reports;
	}

	/**
	* Function that gets a list of jobs ran
	**/
	public function jobs() {

		// get list of previously executed jobs
		$jobs   = array(
            array(
                'type'  => 'County',
                'name'  => 'Served Members',
                'start' => '2021-03-01',
                'end'   => '2021-03-31',
                'user'  => 'John Thompson (RE)'
            ),
            array(
                'id'    => 124,
                'type'  => 'County',
                'name'  => 'Served Members',
                'start' => '2021-02-01',
                'end'   => '2021-02-28',
                'user'  => 'John Thompson (RE)'
            ),
            array(
                'id'    => 123,
                'type'  => 'Foodbank',
                'name'  => 'Served Families',
                'start' => '2021-01-01',
                'end'   => '2021-01-31',
                'user'  => 'Mark Mollenkopf (RE)'
            )
        );
        //$jobs   = array();

		return $jobs;

	}

    /**
    * TESTING ONLY - function that returns test data (i.e. example API output)
    **/
    private function _test_data() {

        return array(
            'big_numbers'   => array(
                'all_service_events'        => 115475,
                'households_served'         => 26122,
                'people_served'             => 88767,
                'average_visits_per_family' => 4.42
            ),
            'statistical'   => array(
                'number_of_households'      => array(
                    'with_minor_children'       => 7379,
                    'without_minor_children'    => 10925
                ),
                'number_of_seniors_served'  => array(
                    'with_minor_children'       => 2337,
                    'without_minor_children'    => 7893
                ),
                'number_of_adults_served'  => array(
                    'with_minor_children'       => 14936,
                    'without_minor_children'    => 11553
                ),
                'number_of_children_served'  => array(
                    'with_minor_children'       => 15694,
                    'without_minor_children'    => 0
                )
            ),
            'service_summaries'     => array(
                'services'  => array(
                    array(
                        'service'           => 'Pantry - Prepack - 3 day',
                        'families_served'   => 17271,
                        'people_served'     => 49743,
                        'meals_provided'    => 447687
                    ),
                    array(
                        'service'           => 'Emergency - Prepack - 1 day',
                        'families_served'   => 105,
                        'people_served'     => 229,
                        'meals_provided'    => 687
                    ),
                    array(
                        'service'           => 'Emergency - Prepack - 3 day',
                        'families_served'   => 566,
                        'people_served'     => 1434,
                        'meals_provided'    => 12906
                    ),
                    array(
                        'service'           => 'Home Delivered Food',
                        'families_served'   => 361,
                        'people_served'     => 960,
                        'meals_provided'    => 8820
                    ),
                    array(
                        'service'           => 'Water',
                        'families_served'   => 1,
                        'people_served'     => 24,
                        'meals_provided'    => 0
                    ),
                ),
                'total_meals_provided'      => 470100,
                'average_meals_per_person'  => 8.97
            ),
            'service_distributions'     => array(
                array(
                    'number_sites_visited'  => 1,
                    'number_families'       => 3155
                ),
                array(
                    'number_sites_visited'  => 2,
                    'number_families'       => 1032
                ),
                array(
                    'number_sites_visited'  => 3,
                    'number_families'       => 531
                ),
                array(
                    'number_sites_visited'  => 4,
                    'number_families'       => 239
                ),
                array(
                    'number_sites_visited'  => 5,
                    'number_families'       => 347
                ),
            ),
            'household_size_distribution'   => array(
                array(
                    'number_of_patients'        => 1,
                    'patient_household_size'    => 1807
                ),
                array(
                    'number_of_patients'        => 2,
                    'patient_household_size'    => 1355
                ),
                array(
                    'number_of_patients'        => 3,
                    'patient_household_size'    => 1278
                ),
                array(
                    'number_of_patients'        => 4,
                    'patient_household_size'    => 1265
                ),
                array(
                    'number_of_patients'        => 5,
                    'patient_household_size'    => 1119
                ),
                array(
                    'number_of_patients'        => 6,
                    'patient_household_size'    => 684
                ),
                array(
                    'number_of_patients'        => 7,
                    'patient_household_size'    => 365
                ),
                array(
                    'number_of_patients'        => 8,
                    'patient_household_size'    => 197
                ),
                array(
                    'number_of_patients'        => 9,
                    'patient_household_size'    => 105
                ),
                array(
                    'number_of_patients'        => 10,
                    'patient_household_size'    => 80
                )
            ),
            'household_composition'     => array(
                'test'
            ),
            'families_served'     => array(
                'test'
            ),
            'service_trends'        => array(
                'test'
            ),
            'family_statistics'         => array(

            ),
            'service_frequency'         => array(

            ),
        );

    }

}

