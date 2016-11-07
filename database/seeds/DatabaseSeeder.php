<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         $this->call('ThanhVienTableSeeder');
        
    }


}

class ProductsTableSeeder extends Seeder {

    public function run(){
        DB::table('Products')->insert([
            ['name'=>'Zenfone Go', 'price'=>2500000],
            ['name'=>'Sony M5', 'price'=>8000000],
            ['name'=>'Samsung Note 7', 'price'=>18000000],
        ]);
    }
}

class ImagesProductsTableSeeder extends Seeder {

    public function run(){
        DB::table('Images_products')->insert([
            ['images_src'=>'ZenfoneGo.jpg', 'products_id'=>1],
            ['images_src'=>'ZenfoneGo1.jpg', 'products_id'=>1],
            ['images_src'=>'ZenfoneGo2.jpg', 'products_id'=>1],
            ['images_src'=>'SamsungNote.jpg', 'products_id'=>3],
            ['images_src'=>'SamsungNote1.jpg', 'products_id'=>3],
            ['images_src'=>'SamsungNote2.jpg', 'products_id'=>3],
            ['images_src'=>'SonyM5.jpg', 'product_id'=>2],
            ['images_src'=>'SonyM5_1.jpg', 'product_id'=>2],
            ['images_src'=>'SonyM5_2.jpg', 'product_id'=>2]
        ]);
    }

}


class NewsTableSeeder extends Seeder {

    public function run(){
        DB::table('News')->insert([
            ['name'=>'The gioi'],
            ['name'=>'The thao'],
            ['name'=>'Nghe thuat']
        ]);
    }

}

class ThanhVienTableSeeder extends Seeder {

    public function run(){
        DB::table('thanh_viens')->insert([
            ['user'=>'admin','pass'=>Hash::make(20162017),'level'=>1],
            ['user'=>'thienan','pass'=>Hash::make(20162017),'level'=>2],
            ['user'=>'minhkhoi','pass'=>Hash::make(20162017),'level'=>2],
        ]);
    }

}
