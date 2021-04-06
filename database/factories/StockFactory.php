<?php

namespace Database\Factories;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stock::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'name' => 'JT BB SQUARE',
            'stockprofile_id' => NULL,
            'tally' => 'IB'.$this->faker->ean8,
            'size' => '24',
            'height' => '4',
            'width' => '3',
            'length' => '2',
            'height' => '4',
            'pcs' => '4',
            'confirm_status' => 'confirmed',
            'status' => 'stored at GUDANG P BASAH',
            'sawmillrun_id' => '42',
            'type_id' => '3',
            'unit_measure_id' => '1',
            'origin' => '1',
            'warehouse_id' => '2',
            
        ];
    }
}
