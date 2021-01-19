<?php

namespace Database\Factories;

use App\Models\VirtualOffice;
use Illuminate\Database\Eloquent\Factories\Factory;

class VirtualOfficeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VirtualOffice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => 1,
            'pic' => $this->faker->name(),
            'telepon' =>  $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail,
            'harga_vo' => 20000,
            'tanggal_aggrement' => date('Y-m-d H:i:s'),
            'tanggal_selesai' => date('Y-m-d H:i:s'),
            'fasilitas_meeting_room' => 20000,
            'fasilitas_konsultasi_pajak' => 20000,
            'fasilitas_private_office' => 20000,
            'papan_nama_perusahaan' => 1,
        ];
    }
}
