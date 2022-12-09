<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models as Models;

class post_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 1;
        $sudject_id = Models\Subjects::where("name", "test title create by seeder")->first()->id;
        for ($i; $i < 11; $i++)
        {
            $data = new Models\Post;
            $data->content = "this data is made by seeder No.". $i ;
            $data->Subjects_id = $sudject_id;
            $data->save();
        };
    }
}
?>