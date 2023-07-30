<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Faker\Factory as Faker;


class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create(); 
        $file = UploadedFile::fake()->image('contact.png', 600, 600);

	    \DB::table('contact')->insert(array(
			'name_proprietary' => 'Tirso Mazabuel',
			'name_enterprise' => 'TirSolutions',
			'name_headquarter' => 'Principal',
			'description' => $faker->paragraph,
			'cover' => $file->getFilename() . '.'. $file->getClientOriginalExtension(),
			'address' => 'Calle 75 # 45 - 45, Popayán - Cauca - Colombia',
			'e_mail' => 'email123@gmail.com',
			'telephone_number_1' => '(092) 8 245785',
			'telephone_number_2' => '(+57) 316 548 6594',
			'telephone_number_3' => '(+57) 312 457 6823',
			'profile_facebook' => 'https://www.facebook.com/InnovacionUNAM',
			'profile_twitter' => 'https://www.twitter.com',
			'profile_youtube' => 'https://www.youtube.com',
			'profile_mercadolibre' => 'https://www.mercadolibre.com.co',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
		    ));
    }
}
