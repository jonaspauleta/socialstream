<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $categories = Category::factory(5)->create();

        $categories->each(function (Category $category) {
            $this->command->getOutput()->info(
                message: "Creating posts for category: [$category->name]",
            );

            $bar = $this->command->getOutput()->createProgressBar(500);

            for ($i = 0; $i < 500; $i++) {
                $bar->advance();
                Post::factory()->create();
            }

            $bar->finish();
        });
    }
}
