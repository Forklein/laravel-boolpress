<?php


use App\Models\Tag;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tagNames = ['FrontEnd', 'BackEnd', 'FullStack', 'UI/UX', 'Design', 'DevOps'];
        foreach ($tagNames as $tagName) {
            $newTag = new Tag();
            $newTag->name = $tagName;
            $newTag->color = $faker->safeHexColor();
            $newTag->save();
        }
    }
}
