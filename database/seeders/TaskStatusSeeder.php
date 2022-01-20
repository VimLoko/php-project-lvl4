<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaskStatus;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'Новый', 'В работе', 'На тестировании', 'Завершен'
        ];
        foreach ($statuses as $status) {
            TaskStatus::create([
                'name' => $status,
            ]);
        }
//        TaskStatus::factory()->count(10)->create();
    }
}
