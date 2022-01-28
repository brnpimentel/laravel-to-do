<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $todo = User::firstWhere('id', 3)->todos()->create([
            'title' => 'Website redesign',
        ]);

        $todo->items()->create(['title' => 'Daily triage of redesign feedback']);
        $todo->items()->create(['title' => 'Launch new home page']);

        $todo = User::firstWhere('id', 2)->todos()->create([
            'title' => 'Work',
        ]);

        $todo->items()->create(['title' => 'Send reminder to everyone']);
        $todo->items()->create(['title' => 'Get the coffee machine fixed']);

        $todo = User::firstWhere('id', 2)->todos()->create([
            'title' => 'To buy',
        ]);

        $todo->items()->create(['title' => 'Milk']);
        $todo->items()->create(['title' => 'Cookies']);
        $todo->items()->create(['title' => 'Beef']);
    }
}
