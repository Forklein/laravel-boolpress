<?php

use Illuminate\Database\Seeder;
use App\Models\Category;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'HTML',
                'color' => 'secondary'
            ],
            [
                'name' => 'CSS',
                'color' => 'primary'
            ],
            [
                'name' => 'VUE',
                'color' => 'success'
            ],
            [
                'name' => 'JS',
                'color' => 'warning'
            ],
            [
                'name' => 'PYTHON',
                'color' => 'danger'
            ],
            [
                'name' => 'PHP',
                'color' => 'info'
            ],
        ];
        foreach ($categories as $category) {
            $categ = new Category();
            $categ->fill($category);
            $categ->save();
        }
    }
}
