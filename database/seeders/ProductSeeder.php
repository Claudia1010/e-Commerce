<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
                'id' => '1',
                'category_id' => '1',
                'name' => 'Study of Andy Warhol Marilyn',
                'artist' => 'Andy Warhol',
                'year' => '1964',
                'price' => '5000.00',
                'description' => 'Acrylic on canvas 73.5" x 41.25"; (187 x 105 cm)',
                'image' => 'https://media.mutualart.com/Images/2017_11/17/18/184807274/42abe8e2-e71b-44df-bc63-ec352cd6dea7_338.Jpeg', 
                'stock' => '10'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '2',
                'category_id' => '1',
                'name' => 'Study of Andy Warhol Marilyn Gold Version',
                'artist' => 'Andy Warhol',
                'year' => '1964',
                'price' => '6000.00',
                'description' => 'Oil on canvas 40" x 40"',
                'image' => 'https://media.mutualart.com/Images/2018_01/03/09/093721316/89367ea1-5c77-456a-8161-cb52a4230458_338.Jpeg', 
                'stock' => '10'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '3',
                'category_id' => '1',
                'name' => 'Study of Andy Warhol Marilyn Silver Version',
                'artist' => 'Andy Warhol',
                'year' => '1964',
                'price' => '4000.00',
                'description' => 'oil on canvas 40 x 40in',
                'image' => 'https://media.mutualart.com/Images/2011_04/19/18/185549582/60363b5b-6d99-4d67-bb1d-1e6638367bfe_338.Jpeg', 
                'stock' => '10'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '4',
                'category_id' => '2',
                'name' => 'Sueño',
                'artist' => 'Pablo Picasso',
                'year' => '1932',
                'price' => '55500.00',
                'description' => 'oleo sobre lienso, 130 x 97cm',
                'image' => 'https://imagenes.elpais.com/resizer/Cfc1_ZbvfwIAF2rqrOx5V_ufAYY=/980x0/arc-anglerfish-eu-central-1-prod-prisa.s3.amazonaws.com/public/K232RCZSNGXP4UHGG7ZMYR2BQI.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '5',
                'category_id' => '3',
                'name' => 'Mujer con sombrilla',
                'artist' => 'Claude Monet',
                'year' => '1875',
                'price' => '30500.00',
                'description' => 'Óleo sobre tela, 100 cm x 81 cm',
                'image' => 'https://elmuseodearteonline.com/wp-content/uploads/2020/03/Mujer-con-sombrilla.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '6',
                'category_id' => '4',
                'name' => 'Yellow-Red-Blue',
                'artist' => 'Wassily Kandinsky',
                'year' => '1925',
                'price' => '15500.00',
                'description' => 'Óleo sobre tela, 127 x 200 cm',
                'image' => 'https://i.pinimg.com/736x/fb/22/d2/fb22d2b4af880b0346497580407ac59b.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '7',
                'category_id' => '5',
                'name' => 'Crucifixión',
                'artist' => 'Salvador Dalí',
                'year' => '1954',
                'price' => '46500.00',
                'description' => 'óleo sobre lienzo, 194,5 cm x 124 cm',
                'image' => 'https://www.telesurtv.net/__export/1478108035399/sites/telesur/img/multimedia/2016/05/10/el-cristo-de-san-juan-de-la-cruz-de-dalx.jpg', 
                'stock' => '1'
            ]
        );
        
    }
}
