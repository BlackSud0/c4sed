<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Eangle;

class EanglesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eangles = [
          [
            "id" => 1,
            "designation" => "200x200x24",
            "B" => 200,
            "t" => 24,
            "mass" => 71.3,
            "r1" => 18,
            "r2" => 4.8,
            "Cx" => 5.85,
            "Ix" => 3356,
            "Iu" => 5322,
            "Iv" => 1391,
            "rx" => 6.08,
            "ru" => 7.65,
            "rv" => 3.91,
            "Sx" => 237,
            "A" => 90.8
          ],
          [
            "id" => 2,
            "designation" => "200x200x20",
            "B" => 200,
            "t" => 20,
            "mass" => 60.1,
            "r1" => 18,
            "r2" => 4.8,
            "Cx" => 5.7,
            "Ix" => 2877,
            "Iu" => 4569,
            "Iv" => 1185,
            "rx" => 6.13,
            "ru" => 7.72,
            "rv" => 3.93,
            "Sx" => 201,
            "A" => 76.6
          ],
          [
            "id" => 3,
            "designation" => "200x200x18",
            "B" => 200,
            "t" => 18,
            "mass" => 54.4,
            "r1" => 18,
            "r2" => 4.8,
            "Cx" => 5.62,
            "Ix" => 2627,
            "Iu" => 4174,
            "Iv" => 1080,
            "rx" => 6.15,
            "ru" => 7.76,
            "rv" => 3.95,
            "Sx" => 183,
            "A" => 69.4
          ],
          [
            "id" => 4,
            "designation" => "200x200x16",
            "B" => 200,
            "t" => 16,
            "mass" => 48.7,
            "r1" => 18,
            "r2" => 4.8,
            "Cx" => 5.54,
            "Ix" => 2369,
            "Iu" => 3765,
            "Iv" => 973,
            "rx" => 6.18,
            "ru" => 7.79,
            "rv" => 3.96,
            "Sx" => 164,
            "A" => 62
          ],
          [
            "id" => 5,
            "designation" => "150x150x18",
            "B" => 150,
            "t" => 18,
            "mass" => 40.2,
            "r1" => 16,
            "r2" => 4.8,
            "Cx" => 4.38,
            "Ix" => 1060,
            "Iu" => 1680,
            "Iv" => 440,
            "rx" => 4.55,
            "ru" => 5.73,
            "rv" => 2.93,
            "Sx" => 99.8,
            "A" => 51.2
          ],
          [
            "id" => 6,
            "designation" => "150x150x15",
            "B" => 150,
            "t" => 15,
            "mass" => 33.9,
            "r1" => 16,
            "r2" => 4.8,
            "Cx" => 4.26,
            "Ix" => 909,
            "Iu" => 1442,
            "Iv" => 375,
            "rx" => 4.59,
            "ru" => 5.78,
            "rv" => 2.95,
            "Sx" => 84.6,
            "A" => 43.2
          ],
          [
            "id" => 7,
            "designation" => "150x150x12",
            "B" => 150,
            "t" => 12,
            "mass" => 27.5,
            "r1" => 16,
            "r2" => 4.8,
            "Cx" => 4.14,
            "Ix" => 748,
            "Iu" => 1187,
            "Iv" => 308,
            "rx" => 4.62,
            "ru" => 5.82,
            "rv" => 2.97,
            "Sx" => 68.9,
            "A" => 35
          ],
          [
            "id" => 8,
            "designation" => "150x150x10",
            "B" => 150,
            "t" => 10,
            "mass" => 23.1,
            "r1" => 16,
            "r2" => 4.8,
            "Cx" => 4.06,
            "Ix" => 635,
            "Iu" => 1008,
            "Iv" => 262,
            "rx" => 4.64,
            "ru" => 5.85,
            "rv" => 2.98,
            "Sx" => 58,
            "A" => 29.5
          ],
          [
            "id" => 9,
            "designation" => "120x120x15",
            "B" => 120,
            "t" => 15,
            "mass" => 26.7,
            "r1" => 13,
            "r2" => 4.8,
            "Cx" => 3.52,
            "Ix" => 448,
            "Iu" => 710,
            "Iv" => 186,
            "rx" => 3.63,
            "ru" => 4.57,
            "rv" => 2.34,
            "Sx" => 52.8,
            "A" => 34
          ],
          [
            "id" => 10,
            "designation" => "120x120x12",
            "B" => 120,
            "t" => 12,
            "mass" => 21.7,
            "r1" => 13,
            "r2" => 4.8,
            "Cx" => 3.41,
            "Ix" => 371,
            "Iu" => 588,
            "Iv" => 153,
            "rx" => 3.66,
            "ru" => 4.62,
            "rv" => 2.35,
            "Sx" => 43.1,
            "A" => 27.6
          ],
          [
            "id" => 11,
            "designation" => "120x120x10",
            "B" => 120,
            "t" => 10,
            "mass" => 18.3,
            "r1" => 13,
            "r2" => 4.8,
            "Cx" => 3.32,
            "Ix" => 316,
            "Iu" => 502,
            "Iv" => 130,
            "rx" => 3.69,
            "ru" => 4.64,
            "rv" => 2.37,
            "Sx" => 36.4,
            "A" => 23.3
          ],
          [
            "id" => 12,
            "designation" => "120x120x8",
            "B" => 120,
            "t" => 8,
            "mass" => 14.8,
            "r1" => 13,
            "r2" => 4.8,
            "Cx" => 3.24,
            "Ix" => 259,
            "Iu" => 411,
            "Iv" => 107,
            "rx" => 3.71,
            "ru" => 4.67,
            "rv" => 2.38,
            "Sx" => 29.5,
            "A" => 18.8
          ],
          [
            "id" => 13,
            "designation" => "100x100x15",
            "B" => 100,
            "t" => 15,
            "mass" => 21.9,
            "r1" => 12,
            "r2" => 4.8,
            "Cx" => 3.02,
            "Ix" => 250,
            "Iu" => 395,
            "Iv" => 105,
            "rx" => 2.99,
            "ru" => 3.76,
            "rv" => 1.94,
            "Sx" => 35.8,
            "A" => 28
          ],
          [
            "id" => 14,
            "designation" => "100x100x12",
            "B" => 100,
            "t" => 12,
            "mass" => 17.9,
            "r1" => 12,
            "r2" => 4.8,
            "Cx" => 2.91,
            "Ix" => 208,
            "Iu" => 330,
            "Iv" => 86.4,
            "rx" => 3.02,
            "ru" => 3.81,
            "rv" => 1.95,
            "Sx" => 29.3,
            "A" => 22.8
          ],
          [
            "id" => 15,
            "designation" => "100x100x10",
            "B" => 100,
            "t" => 10,
            "mass" => 15.1,
            "r1" => 12,
            "r2" => 4.8,
            "Cx" => 2.83,
            "Ix" => 178,
            "Iu" => 283,
            "Iv" => 73.7,
            "rx" => 3.05,
            "ru" => 3.84,
            "rv" => 1.96,
            "Sx" => 24.8,
            "A" => 19.2
          ],
          [
            "id" => 16,
            "designation" => "100x100x8",
            "B" => 100,
            "t" => 8,
            "mass" => 12.2,
            "r1" => 12,
            "r2" => 4.8,
            "Cx" => 2.75,
            "Ix" => 146,
            "Iu" => 232,
            "Iv" => 60.5,
            "rx" => 3.07,
            "ru" => 3.86,
            "rv" => 1.97,
            "Sx" => 20.2,
            "A" => 15.6
          ],
          [
            "id" => 17,
            "designation" => "90x90x12",
            "B" => 90,
            "t" => 12,
            "mass" => 16,
            "r1" => 11,
            "r2" => 4.8,
            "Cx" => 2.66,
            "Ix" => 149,
            "Iu" => 235,
            "Iv" => 62,
            "rx" => 2.7,
            "ru" => 3.4,
            "rv" => 1.75,
            "Sx" => 23.5,
            "A" => 20.3
          ],
          [
            "id" => 18,
            "designation" => "90x90x10",
            "B" => 90,
            "t" => 10,
            "mass" => 13.5,
            "r1" => 11,
            "r2" => 4.8,
            "Cx" => 2.58,
            "Ix" => 128,
            "Iu" => 202,
            "Iv" => 52.9,
            "rx" => 2.73,
            "ru" => 3.43,
            "rv" => 1.76,
            "Sx" => 19.9,
            "A" => 17.2
          ],
          [
            "id" => 19,
            "designation" => "90x90x8",
            "B" => 90,
            "t" => 8,
            "mass" => 10.9,
            "r1" => 11,
            "r2" => 4.8,
            "Cx" => 2.5,
            "Ix" => 105,
            "Iu" => 167,
            "Iv" => 43.4,
            "rx" => 2.75,
            "ru" => 3.46,
            "rv" => 1.77,
            "Sx" => 16.2,
            "A" => 13.9
          ],
          [
            "id" => 20,
            "designation" => "90x90x7",
            "B" => 90,
            "t" => 7,
            "mass" => 9.6,
            "r1" => 11,
            "r2" => 4.8,
            "Cx" => 2.46,
            "Ix" => 93.2,
            "Iu" => 148,
            "Iv" => 38.6,
            "rx" => 2.76,
            "ru" => 3.47,
            "rv" => 1.77,
            "Sx" => 14.2,
            "A" => 12.3
          ],
          [
            "id" => 21,
            "designation" => "90x90x6",
            "B" => 90,
            "t" => 6,
            "mass" => 8.3,
            "r1" => 11,
            "r2" => 4.8,
            "Cx" => 2.41,
            "Ix" => 81,
            "Iu" => 128,
            "Iv" => 33.6,
            "rx" => 2.76,
            "ru" => 3.48,
            "rv" => 1.78,
            "Sx" => 12.3,
            "A" => 10.6
          ],
          [
            "id" => 22,
            "designation" => "80x80x10+",
            "B" => 80,
            "t" => 10,
            "mass" => 11.9,
            "r1" => 10,
            "r2" => 4.8,
            "Cx" => 2.33,
            "Ix" => 87.7,
            "Iu" => 139,
            "Iv" => 36.5,
            "rx" => 2.4,
            "ru" => 3.03,
            "rv" => 1.55,
            "Sx" => 15.5,
            "A" => 15.2
          ],
          [
            "id" => 23,
            "designation" => "80x80x8+",
            "B" => 80,
            "t" => 8,
            "mass" => 9.7,
            "r1" => 10,
            "r2" => 4.8,
            "Cx" => 2.25,
            "Ix" => 72.4,
            "Iu" => 115,
            "Iv" => 30.1,
            "rx" => 2.42,
            "ru" => 3.05,
            "rv" => 1.56,
            "Sx" => 12.6,
            "A" => 12.3
          ],
          [
            "id" => 24,
            "designation" => "80x80x6+",
            "B" => 80,
            "t" => 6,
            "mass" => 7.4,
            "r1" => 10,
            "r2" => 4.8,
            "Cx" => 2.16,
            "Ix" => 56,
            "Iu" => 88.7,
            "Iv" => 23.3,
            "rx" => 2.44,
            "ru" => 3.07,
            "rv" => 1.58,
            "Sx" => 9.6,
            "A" => 9.4
          ],
          [
            "id" => 25,
            "designation" => "70x70x10+",
            "B" => 70,
            "t" => 10,
            "mass" => 10.3,
            "r1" => 9,
            "r2" => 2.4,
            "Cx" => 2.08,
            "Ix" => 57.1,
            "Iu" => 90.3,
            "Iv" => 24,
            "rx" => 2.08,
            "ru" => 2.62,
            "rv" => 1.35,
            "Sx" => 11.6,
            "A" => 13.2
          ],
          [
            "id" => 26,
            "designation" => "70x70x8+",
            "B" => 70,
            "t" => 8,
            "mass" => 8.4,
            "r1" => 9,
            "r2" => 2.4,
            "Cx" => 2,
            "Ix" => 47.4,
            "Iu" => 75,
            "Iv" => 19.7,
            "rx" => 2.1,
            "ru" => 2.65,
            "rv" => 1.36,
            "Sx" => 9.49,
            "A" => 10.7
          ],
          [
            "id" => 27,
            "designation" => "70x70x6+",
            "B" => 70,
            "t" => 6,
            "mass" => 6.4,
            "r1" => 9,
            "r2" => 2.4,
            "Cx" => 1.92,
            "Ix" => 36.8,
            "Iu" => 58.2,
            "Iv" => 15.4,
            "rx" => 2.12,
            "ru" => 2.67,
            "rv" => 1.37,
            "Sx" => 7.24,
            "A" => 8.2
          ],
          [
            "id" => 28,
            "designation" => "60x60x8+",
            "B" => 60,
            "t" => 8,
            "mass" => 7.2,
            "r1" => 8,
            "r2" => 2.4,
            "Cx" => 1.76,
            "Ix" => 28.9,
            "Iu" => 45.7,
            "Iv" => 12.1,
            "rx" => 1.78,
            "ru" => 2.24,
            "rv" => 1.15,
            "Sx" => 6.82,
            "A" => 9.12
          ],
          [
            "id" => 29,
            "designation" => "60x60x6+",
            "B" => 60,
            "t" => 6,
            "mass" => 5.5,
            "r1" => 8,
            "r2" => 2.4,
            "Cx" => 1.67,
            "Ix" => 22.6,
            "Iu" => 35.7,
            "Iv" => 9.45,
            "rx" => 1.8,
            "ru" => 2.26,
            "rv" => 1.16,
            "Sx" => 5.21,
            "A" => 7
          ],
          [
            "id" => 30,
            "designation" => "60x60x5+",
            "B" => 60,
            "t" => 5,
            "mass" => 4.6,
            "r1" => 8,
            "r2" => 2.4,
            "Cx" => 1.62,
            "Ix" => 19.2,
            "Iu" => 30.2,
            "Iv" => 8.06,
            "rx" => 1.8,
            "ru" => 2.26,
            "rv" => 1.17,
            "Sx" => 4.37,
            "A" => 5.91
          ],
          [
            "id" => 31,
            "designation" => "60x60x10+",
            "B" => 60,
            "t" => 10,
            "mass" => 8.8,
            "r1" => 8,
            "r2" => 2.4,
            "Cx" => 1.84,
            "Ix" => 34.7,
            "Iu" => 54.7,
            "Iv" => 14.7,
            "rx" => 1.76,
            "ru" => 2.21,
            "rv" => 1.15,
            "Sx" => 8.33,
            "A" => 11.2
          ],
          [
            "id" => 32,
            "designation" => "50x50x8+",
            "B" => 50,
            "t" => 8,
            "mass" => 5.9,
            "r1" => 7,
            "r2" => 2.4,
            "Cx" => 1.51,
            "Ix" => 16,
            "Iu" => 25.3,
            "Iv" => 6.78,
            "rx" => 1.46,
            "ru" => 1.83,
            "rv" => 0.949,
            "Sx" => 4.59,
            "A" => 7.52
          ],
          [
            "id" => 33,
            "designation" => "50x50x6+",
            "B" => 50,
            "t" => 6,
            "mass" => 4.6,
            "r1" => 7,
            "r2" => 2.4,
            "Cx" => 1.42,
            "Ix" => 12.6,
            "Iu" => 19.9,
            "Iv" => 5.28,
            "rx" => 1.47,
            "ru" => 1.85,
            "rv" => 0.954,
            "Sx" => 3.52,
            "A" => 5.8
          ],
          [
            "id" => 34,
            "designation" => "50x50x5+",
            "B" => 50,
            "t" => 5,
            "mass" => 3.9,
            "r1" => 7,
            "r2" => 2.4,
            "Cx" => 1.37,
            "Ix" => 10.7,
            "Iu" => 16.9,
            "Iv" => 4.51,
            "rx" => 1.48,
            "ru" => 1.86,
            "rv" => 0.958,
            "Sx" => 2.95,
            "A" => 4.91
          ],
          [
            "id" => 35,
            "designation" => "50x50x4+",
            "B" => 50,
            "t" => 4,
            "mass" => 3.1,
            "r1" => 7,
            "r2" => 2.4,
            "Cx" => 1.32,
            "Ix" => 8.72,
            "Iu" => 13.7,
            "Iv" => 3.71,
            "rx" => 1.48,
            "ru" => 1.85,
            "rv" => 0.963,
            "Sx" => 2.37,
            "A" => 4
          ],
          [
            "id" => 36,
            "designation" => "50x50x3+",
            "B" => 50,
            "t" => 3,
            "mass" => 2.4,
            "r1" => 7,
            "r2" => 2.4,
            "Cx" => 1.25,
            "Ix" => 6.6,
            "Iu" => 10.3,
            "Iv" => 2.88,
            "rx" => 1.47,
            "ru" => 1.83,
            "rv" => 0.968,
            "Sx" => 1.76,
            "A" => 3.07
          ],
          [
            "id" => 37,
            "designation" => "45x45x6+",
            "B" => 45,
            "t" => 6,
            "mass" => 4.1,
            "r1" => 7,
            "r2" => 2.4,
            "Cx" => 1.3,
            "Ix" => 8.95,
            "Iu" => 14.1,
            "Iv" => 3.76,
            "rx" => 1.31,
            "ru" => 1.65,
            "rv" => 0.851,
            "Sx" => 2.8,
            "A" => 5.2
          ],
          [
            "id" => 38,
            "designation" => "45x45x5+",
            "B" => 45,
            "t" => 5,
            "mass" => 3.5,
            "r1" => 7,
            "r2" => 2.4,
            "Cx" => 1.25,
            "Ix" => 7.63,
            "Iu" => 12,
            "Iv" => 3.21,
            "rx" => 1.32,
            "ru" => 1.65,
            "rv" => 0.853,
            "Sx" => 2.35,
            "A" => 4.41
          ],
          [
            "id" => 39,
            "designation" => "45x45x4+",
            "B" => 45,
            "t" => 4,
            "mass" => 2.8,
            "r1" => 7,
            "r2" => 2.4,
            "Cx" => 1.2,
            "Ix" => 6.22,
            "Iu" => 9.79,
            "Iv" => 2.65,
            "rx" => 1.31,
            "ru" => 1.65,
            "rv" => 0.857,
            "Sx" => 1.88,
            "A" => 3.6
          ],
          [
            "id" => 40,
            "designation" => "45x45x3+",
            "B" => 45,
            "t" => 3,
            "mass" => 2.2,
            "r1" => 7,
            "r2" => 2.4,
            "Cx" => 1.13,
            "Ix" => 4.71,
            "Iu" => 7.37,
            "Iv" => 2.05,
            "rx" => 1.3,
            "ru" => 1.63,
            "rv" => 0.86,
            "Sx" => 1.4,
            "A" => 2.77
          ],
          [
            "id" => 41,
            "designation" => "40x40x6+",
            "B" => 40,
            "t" => 6,
            "mass" => 3.6,
            "r1" => 6,
            "r2" => 2.4,
            "Cx" => 1.18,
            "Ix" => 6.1,
            "Iu" => 9.63,
            "Iv" => 2.57,
            "rx" => 1.15,
            "ru" => 1.45,
            "rv" => 0.747,
            "Sx" => 2.16,
            "A" => 4.6
          ],
          [
            "id" => 42,
            "designation" => "40x40x5+",
            "B" => 40,
            "t" => 5,
            "mass" => 3.1,
            "r1" => 6,
            "r2" => 2.4,
            "Cx" => 1.13,
            "Ix" => 5.21,
            "Iu" => 8.22,
            "Iv" => 2.19,
            "rx" => 1.15,
            "ru" => 1.45,
            "rv" => 0.748,
            "Sx" => 1.81,
            "A" => 3.91
          ],
          [
            "id" => 43,
            "designation" => "40x40x4+",
            "B" => 40,
            "t" => 4,
            "mass" => 2.5,
            "r1" => 6,
            "r2" => 2.4,
            "Cx" => 1.08,
            "Ix" => 4.25,
            "Iu" => 6.7,
            "Iv" => 1.8,
            "rx" => 1.15,
            "ru" => 1.45,
            "rv" => 0.75,
            "Sx" => 1.45,
            "A" => 3.2
          ],
          [
            "id" => 44,
            "designation" => "40x40x3+",
            "B" => 40,
            "t" => 3,
            "mass" => 1.9,
            "r1" => 6,
            "r2" => 2.4,
            "Cx" => 1.01,
            "Ix" => 3.22,
            "Iu" => 5.04,
            "Iv" => 1.4,
            "rx" => 1.14,
            "ru" => 1.43,
            "rv" => 0.752,
            "Sx" => 1.08,
            "A" => 2.47
          ],
          [
            "id" => 45,
            "designation" => "30x30x5+",
            "B" => 30,
            "t" => 5,
            "mass" => 2.3,
            "r1" => 5,
            "r2" => 2.4,
            "Cx" => 0.89,
            "Ix" => 2.02,
            "Iu" => 3.19,
            "Iv" => 0.846,
            "rx" => 0.832,
            "ru" => 1.05,
            "rv" => 0.539,
            "Sx" => 0.956,
            "A" => 2.91
          ],
          [
            "id" => 46,
            "designation" => "30x30x4+",
            "B" => 30,
            "t" => 4,
            "mass" => 1.9,
            "r1" => 5,
            "r2" => 2.4,
            "Cx" => 0.84,
            "Ix" => 1.65,
            "Iu" => 2.61,
            "Iv" => 0.691,
            "rx" => 0.829,
            "ru" => 1.04,
            "rv" => 0.536,
            "Sx" => 0.764,
            "A" => 2.4
          ],
          [
            "id" => 47,
            "designation" => "30x30x3+",
            "B" => 30,
            "t" => 3,
            "mass" => 1.5,
            "r1" => 5,
            "r2" => 2.4,
            "Cx" => 0.78,
            "Ix" => 1.25,
            "Iu" => 1.96,
            "Iv" => 0.53,
            "rx" => 0.816,
            "ru" => 1.02,
            "rv" => 0.532,
            "Sx" => 0.561,
            "A" => 1.87
          ],
          [
            "id" => 48,
            "designation" => "25x25x5+",
            "B" => 25,
            "t" => 5,
            "mass" => 1.9,
            "r1" => 3.5,
            "r2" => 2.4,
            "Cx" => 0.78,
            "Ix" => 1.09,
            "Iu" => 1.72,
            "Iv" => 0.462,
            "rx" => 0.673,
            "ru" => 0.846,
            "rv" => 0.438,
            "Sx" => 0.634,
            "A" => 2.41
          ],
          [
            "id" => 49,
            "designation" => "25x25x4+",
            "B" => 25,
            "t" => 4,
            "mass" => 1.6,
            "r1" => 3.5,
            "r2" => 2.4,
            "Cx" => 0.73,
            "Ix" => 0.894,
            "Iu" => 1.42,
            "Iv" => 0.372,
            "rx" => 0.668,
            "ru" => 0.841,
            "rv" => 0.431,
            "Sx" => 0.504,
            "A" => 2
          ],
          [
            "id" => 50,
            "designation" => "25x25x3+",
            "B" => 25,
            "t" => 3,
            "mass" => 1.2,
            "r1" => 3.5,
            "r2" => 2.4,
            "Cx" => 0.67,
            "Ix" => 0.672,
            "Iu" => 1.06,
            "Iv" => 0.281,
            "rx" => 0.654,
            "ru" => 0.823,
            "rv" => 0.423,
            "Sx" => 0.367,
            "A" => 1.57
          ]
        ];

        Eangle::insert($eangles);
    }
}
