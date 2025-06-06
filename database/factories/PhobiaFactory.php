<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Phobia>
 */
class PhobiaFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => 1,
            'title' => "test phobia with a test title",
            'md' => "# This is a heading this is a paragraph
 <br/> [A Link](https://laravel.com)
## also this is a heading just 
lower this is a paragraph2 <br/>
![Tux, the Linux mascot](https://mdg.imgix.net/assets/images/tux.png)
^Images work lets goo",
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}
