<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grade;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grades = [
            [
                "id" => "1",
                "grade" => "43",
                "thickness" => "16",
                "Py" => "275"
            ],
            [
                "id" => "2",
                "grade" => "43",
                "thickness" => "40",
                "Py" => "265"
            ],
            [
                "id" => "3",
                "grade" => "43",
                "thickness" => "63",
                "Py" => "255"
            ],
            [
                "id" => "4",
                "grade" => "43",
                "thickness" => "100",
                "Py" => "245"
            ],
            [
                "id" => "5",
                "grade" => "50",
                "thickness" => "16",
                "Py" => "355"
            ],
            [
                "id" => "6",
                "grade" => "50",
                "thickness" => "40",
                "Py" => "345"
            ],
            [
                "id" => "7",
                "grade" => "50",
                "thickness" => "63",
                "Py" => "340"
            ],
            [
                "id" => "8",
                "grade" => "50",
                "thickness" => "100",
                "Py" => "325"
            ],
            [
                "id" => "9",
                "grade" => "55",
                "thickness" => "16",
                "Py" => "450"
            ],
            [
                "id" => "10",
                "grade" => "55",
                "thickness" => "25",
                "Py" => "430"
            ],
            [
                "id" => "11",
                "grade" => "55",
                "thickness" => "40",
                "Py" => "415"
            ],
            [
                "id" => "12",
                "grade" => "55",
                "thickness" => "63",
                "Py" => "400"
            ]
        ];

        Grade::insert($grades);
    }
}
