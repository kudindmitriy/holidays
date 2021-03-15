<?php

namespace App\Services;

use DateTime;

class HolidayService {

    public $holidays = [];

    public function __construct()
    {
        $this->holidays = [
        [
            'name' => 'Thanksgiving',
            'till' => [
                'day' => 1,
                'month' => 11
            ],
            'from' => [
                'day' => 1,
                'month' => 11
            ],
            'is_calculated' => true,
            'week_num' => 4,
            'day_num' => 3,
            'description' => 'Thursday of the 4th week of November'
        ],
        [
            'name' => 'New year',
            'till' => [
                'day' => 1,
                'month' => 1
            ],
            'from' => [
                'day' => 1,
                'month' => 1
            ],
            'is_calculated' => false,
            'description' => '1st of January'
        ],
        [
            'name' => 'Orthodox Christmas',
            'till' => [
                'day' => 7,
                'month' => 1
            ],
            'from' => [
                'day' => 7,
                'month' => 1
            ],
            'is_calculated' => false,
            'description' => '7th of January'
        ],
        [
            'name' => 'May holidays',
            'till' => [
                'day' => 1,
                'month' => 5
            ],
            'from' => [
                'day' => 7,
                'month' => 5
            ],
            'is_calculated' => false,
            'description' => 'From 1st of May till 7th of May'
        ],
        [
            'name' => 'Birthday of Martin Luther King',
            'till' => [
                'day' => 1,
                'month' => 1
            ],
            'from' => [
                'day' => 1,
                'month' => 1
            ],
            'week_num' => 3,
            'day_num' => 2,
            'is_calculated' => true,
            'description' => 'Monday of the 3rd week of January'
        ],
        [
            'name' => 'World Water Day',
            'till' => [
                'day' => 1,
                'month' => 3
            ],
            'from' => [
                'day' => 1,
                'month' => 3
            ],
            'week_num' => 4,
            'day_num' => 2,
            'is_calculated' => true,
            'description' => 'Monday of the last week of March'
        ]
    ];
    }

    /**
     * @param $date
     * @return array
     */
    public function getHolidays($date): array
    {
        return array_filter($this->holidays, function ($item) use ($date) {
            $year = $this->getYear($date);

            $from = $item['is_calculated'] ?
                $this->calculateTimeStamp($year, $item['from']['month'], $item['week_num'], $item['day_num'] ) :
                strtotime($item['from']['month'] .'/'. $item['from']['day'] .'/'. $year);

            $till = $item['is_calculated'] ?
                $this->calculateTimeStamp($year, $item['till']['month'], $item['week_num'], $item['day_num']) :
                strtotime($item['till']['month'] .'/'. $item['till']['day'] .'/'. $year);

            return $from >= strtotime($date) && $till <= strtotime($date);
        });
    }


    /**
     * @param int $year
     * @param int $month
     * @param int $weekNum
     * @param int $dayNumber
     * @return int
     */
    private function calculateTimeStamp($year = 1, $month = 1, $weekNum = 1, $dayNumber = 1): int
    {
        $weekLength = 7;
        $number = $dayNumber + ($weekNum - 1) * $weekLength;

        $firstDayWeekIndex = (new DateTime("$year-$month-1 0:0:0"))->format('w');

        return strtotime((new DateTime)->setDate($year, $month, $number - $firstDayWeekIndex)->format('d-m-Y'));
    }

    /**
     * @param $date
     * @return string
     */
    private function getYear($date): string
    {
        return explode('.', $date)[2];
    }
}
