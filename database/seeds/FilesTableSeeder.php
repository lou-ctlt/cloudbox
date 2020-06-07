<?php

use Illuminate\Database\Seeder;

class FilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('files')->insert([ //Ajout d'un seed
                [
                    "box_id" => 1,
                    "user_id" => 1,
                    "name" => "pic1",
                    "description" => "NULL",
                    "file_path" => "pic1.pdf",
                    "extension" => "pdf"
                ],
                [
                    "box_id" => 1,
                    "user_id" => 1,
                    "name" => "pic2",
                    "description" => "NULL",
                    "file_path" => "pic2.pdf",
                    "extension" => "pdf"
                ],
                [
                    "box_id" => 1,
                    "user_id" => 1,
                    "name" => "pic3",
                    "description" => "NULL",
                    "file_path" => "pic3.pdf",
                    "extension" => "pdf"
                ],
                [
                    "box_id" => 2,
                    "user_id" => 2,
                    "name" => "pic1",
                    "description" => "NULL",
                    "file_path" => "pic1.jpg",
                    "extension" => "jpg"
                ],
                [
                    "box_id" => 2,
                    "user_id" => 2,
                    "name" => "pic2",
                    "description" => "NULL",
                    "file_path" => "pic2.jpg",
                    "extension" => "jpg"
                ],
                [
                    "box_id" => 2,
                    "user_id" => 2,
                    "name" => "pic3",
                    "description" => "NULL",
                    "file_path" => "pic3.jpg",
                    "extension" => "jpg"
                ],
                [
                    "box_id" => 3,
                    "user_id" => 1,
                    "name" => "pic1",
                    "description" => "NULL",
                    "file_path" => "pic1.jpg",
                    "extension" => "jpg"
                ],
                [
                    "box_id" => 3,
                    "user_id" => 1,
                    "name" => "pic2",
                    "description" => "NULL",
                    "file_path" => "pic2.jpg",
                    "extension" => "jpg"
                ],
                [
                    "box_id" => 3,
                    "user_id" => 1,
                    "name" => "pic3",
                    "description" => "NULL",
                    "file_path" => "pic3.jpg",
                    "extension" => "jpg"
                ],
            ]);
    }
}
