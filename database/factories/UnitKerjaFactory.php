<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UnitKerja>
 */
class UnitKerjaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kodeWilayah' => fake()->numerify('##'),
            'kodeUnitKerja' => fake()->numerify('####'),
            'wilayah' => fake()->numberBetween(1, 3),
            'namaUnitKerja' => fake()->lexify('BPS ????'),
            'namaPIC' => fake()->name(),
            'noTelpPIC' => fake()->numerify('08##########'),
            'role' => 'BPS Kab/Kota',
            'kodeSatkerProv' => fake()->numerify('##00'),
            'ikuUnitKerja_id' => fake()->numerify('####')
        ];
    }
}
