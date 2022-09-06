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
                'description' => 'oleo on canvas 40" x 40"',
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
                'description' => 'oleo on canvas, 40 x 40',
                'image' => 'https://media.mutualart.com/Images/2011_04/19/18/185549582/60363b5b-6d99-4d67-bb1d-1e6638367bfe_338.Jpeg', 
                'stock' => '10'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '4',
                'category_id' => '1',
                'name' => "Campbell's Soup I",
                'artist' => 'Andy Warhol',
                'year' => '1968',
                'price' => '3000.00',
                'description' => 'Pintura de polímero sintético sobre lienzo, 50,80 cm x 40,60 cm',
                'image' => 'https://www.theartstory.org/images20/works/warhol_andy_1.jpg', 
                'stock' => '10'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '5',
                'category_id' => '1',
                'name' => "Brillo Box (Soap Pads)",
                'artist' => 'Andy Warhol',
                'year' => '1964',
                'price' => '2000.00',
                'description' => 'Acrílico Tinta Escultura, 43,3 x 43,2 x 36,5 cm. Pintura de polímero sintético y tinta serigráfica sobre madera.',
                'image' => 'https://www.moma.org/media/W1siZiIsIjIyOTQxOSJdLFsicCIsImNvbnZlcnQiLCItcXVhbGl0eSA5MCAtcmVzaXplIDIwMDB4MjAwMFx1MDAzZSJdXQ.jpg', 
                'stock' => '10'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '6',
                'category_id' => '1',
                'name' => "Mujer llorando",
                'artist' => 'Roy Lichtenstein',
                'year' => '1963',
                'price' => '3300.00',
                'description' => 'Pintura esmalte, 41 cm x 61 cm',
                'image' => 'https://totenart.com/noticias/wp-content/uploads/2021/10/mejores-obras-roy-Lichtenstein.jpg', 
                'stock' => '10'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '7',
                'category_id' => '1',
                'name' => "Mujer en el baño",
                'artist' => 'Roy Lichtenstein',
                'year' => '1963',
                'price' => '2500.00',
                'description' => 'óleo y magna sobre lienzo., 173.3 x 173.3 cm',
                'image' => 'https://totenart.com/noticias/wp-content/uploads/2021/10/mujer-en-el-bano-1963.jpg', 
                'stock' => '10'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '8',
                'category_id' => '1',
                'name' => "El beso V",
                'artist' => 'Roy Lichtenstein',
                'year' => '1964',
                'price' => '3000.00',
                'description' => 'óleo y magna sobre lienzo, 104 x 104cm',
                'image' => 'https://totenart.com/noticias/wp-content/uploads/2021/10/mejores-obras-roy-Lichtenstein-2.jpg', 
                'stock' => '10'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '9',
                'category_id' => '1',
                'name' => "Chica ahogándose",
                'artist' => 'Roy Lichtenstein',
                'year' => '1963',
                'price' => '1500.00',
                'description' => 'oleo y pintura esmalte, 171.6 cm x 169.5 cm',
                'image' => 'https://upload.wikimedia.org/wikipedia/en/d/df/Roy_Lichtenstein_Drowning_Girl.jpg', 
                'stock' => '10'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '10',
                'category_id' => '2',
                'name' => 'Las señoritas de Avignon',
                'artist' => 'Pablo Picasso',
                'year' => '1907',
                'price' => '85500.00',
                'description' => 'Óleo, 243.9 x 233.7 cm',
                'image' => 'https://farm3.static.flickr.com/2671/4210061809_789f666947.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '11',
                'category_id' => '2',
                'name' => 'Los músicos',
                'artist' => 'Pablo Picasso',
                'year' => '1921',
                'price' => '75500.00',
                'description' => 'Óleo, 200.7 x 222.9 cm',
                'image' => 'https://www.ifema.es/img/l/imagen-tres-musicos-pintado-picasso/imagen2.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '12',
                'category_id' => '2',
                'name' => "Casas de l'Estaque",
                'artist' => 'Georges Braque',
                'year' => '1908',
                'price' => '45500.00',
                'description' => 'Óleo sobre lienzo, 73 x 60 cm',
                'image' => 'https://i.cultureoeuvre.com/images/005/image-13428-7.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '13',
                'category_id' => '2',
                'name' => "Instrumentos musicales",
                'artist' => 'Georges Braque',
                'year' => '1908',
                'price' => '25500.00',
                'description' => 'Óleo sobre tela, 50,2 x 61 cm',
                'image' => 'https://www.faustoart.com/wp-content/uploads/2014/09/musical-instruments-1908.jpgBlog.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '14',
                'category_id' => '2',
                'name' => "Guitarra y mandolina",
                'artist' => 'Juan Gris',
                'year' => '1919',
                'price' => '15500.00',
                'description' => 'Óleo sobre tela, 92 x 65 cm',
                'image' => 'https://josemgghistoriadeldiseno.files.wordpress.com/2014/03/juan-gris-guitarra-y-mandolina-1919-galerie-beyeler-basilea.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '15',
                'category_id' => '2',
                'name' => "Retrato de Picasso",
                'artist' => 'Juan Gris',
                'year' => '1912',
                'price' => '20500.00',
                'description' => 'Óleo sobre tela, 92,3 x 74,4 cm',
                'image' => 'https://josemgghistoriadeldiseno.files.wordpress.com/2014/06/retrato-picasso-juan-gris.jpg?w=1400&h=', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '16',
                'category_id' => '2',
                'name' => "El colegial escribiendo",
                'artist' => 'Maria Blanchard',
                'year' => '1920',
                'price' => '11500.00',
                'description' => 'Óleo sobre tela, 81 x 60 cm',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/13/L%27%C3%89colier_%C3%A9cribant_%28c._1920%29%2C_de_Mar%C3%ADa_Blanchard.jpg/386px-L%27%C3%89colier_%C3%A9cribant_%28c._1920%29%2C_de_Mar%C3%ADa_Blanchard.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '17',
                'category_id' => '2',
                'name' => "La merienda",
                'artist' => 'Jean Metzinger',
                'year' => '1911',
                'price' => '28500.00',
                'description' => 'Óleo sobre tela,  271 x 295 cm',
                'image' => 'https://www.aulafacil.com/uploads/cursos/162/editor/14.es.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '18',
                'category_id' => '2',
                'name' => "El colegial",
                'artist' => 'Albert Gleizes',
                'year' => '1924',
                'price' => '31250.00',
                'description' => 'Óleo sobre tela, 68 x 48 cm',
                'image' => 'https://www.buscabiografias.com/img/people/Albert-Gleizes-The-Schoolboy.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '19',
                'category_id' => '3',
                'name' => 'Impresión, sol naciente',
                'artist' => 'Claude Monet',
                'year' => '1872',
                'price' => '54500.00',
                'description' => 'Óleo sobre tela, 47 cm x 64 cm',
                'image' => 'https://todoestaennuestracabeza.files.wordpress.com/2012/06/impresion_sol_naciente11.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '20',
                'category_id' => '3',
                'name' => 'Mujer con sombrilla',
                'artist' => 'Claude Monet',
                'year' => '1875',
                'price' => '48500.00',
                'description' => 'Óleo sobre tela, 100 cm x 81 cm',
                'image' => 'https://elmuseodearteonline.com/wp-content/uploads/2020/03/Mujer-con-sombrilla.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '21',
                'category_id' => '3',
                'name' => 'La Grenouillére',
                'artist' => 'Pierre-Auguste Renoir',
                'year' => '1869',
                'price' => '68500.00',
                'description' => 'Óleo sobre tela, 81 x 66 cm',
                'image' => 'https://www.reprodart.com/kunst/pierre_auguste_renoir/La-Grenouillere.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '22',
                'category_id' => '3',
                'name' => 'La Lechera de Burdeos',
                'artist' => 'Francisco de Goya',
                'year' => '1827',
                'price' => '34500.00',
                'description' => 'Óleo sobre tela, 74 x 68 cm',
                'image' => 'https://fundaciongoyaenaragon.es/files/resize/800x600/files/images/488_7.2.13.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '23',
                'category_id' => '3',
                'name' => 'Corriendo por la playa',
                'artist' => 'Joaquin Sorolla',
                'year' => '1908',
                'price' => '48500.00',
                'description' => 'Óleo sobre tela, 90 x 166,5 cm',
                'image' => 'https://www.ederlabores.com/2236-thickbox_default/corriendo-por-la-playa-sorolla.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '24',
                'category_id' => '3',
                'name' => 'Paseo a orillas del mar',
                'artist' => 'Joaquin Sorolla',
                'year' => '1909',
                'price' => '58500.00',
                'description' => 'Óleo sobre tela, 205 x 200 cm',
                'image' => 'https://www.ecured.cu/images/4/4e/Paseo_a_orillas_del_mar.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '25',
                'category_id' => '4',
                'name' => 'Retrato de Paul Guillaume',
                'artist' => 'Amedeo Modigliani',
                'year' => '1916',
                'price' => '23600.00',
                'description' => 'Óleo sobre tela, 81 x 54 cm ',
                'image' => 'http://www.compradarte.com/images/phocagallery/modigliani-amadeo/modigliani-ritratto-di-paul-guillaume-1916-milano.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '26',
                'category_id' => '4',
                'name' => 'Ansiedad',
                'artist' => 'Edvard Munch',
                'year' => '1894',
                'price' => '53500.00',
                'description' => 'Óleo sobre tela, 94 x 74 cm',
                'image' => 'http://3.bp.blogspot.com/_7x8JjpaRQBI/S6uC2D7xsHI/AAAAAAAAB_I/F7KFYYSR8-4/s1600/z+Ansiedad.+Edvard+Munch.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '27',
                'category_id' => '4',
                'name' => 'El Grito',
                'artist' => 'Edvard Munch',
                'year' => '1893',
                'price' => '84500.00',
                'description' => 'Óleo sobre tela, 91 cm x 74 cm',
                'image' => 'https://www.aparences.net/wp-content/uploads/2015/10/munch-le-cri.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '28',
                'category_id' => '4',
                'name' => 'Autoretrato en Bergen',
                'artist' => 'Edvard Munch',
                'year' => '1916',
                'price' => '46500.00',
                'description' => 'Óleo sobre tela, 80 x 120 cm',
                'image' => 'https://www.aparences.net/wp-content/uploads/2015/10/munch-autoportrait-a-bergen.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '29',
                'category_id' => '4',
                'name' => 'Máscara de miedo',
                'artist' => 'Paul Klee',
                'year' => '1932',
                'price' => '43600.00',
                'description' => 'Óleo sobre tela, 100.4 x 57.1 cm',
                'image' => 'https://www.historiadelarte.us/wp-content/uploads/2018/04/Mascara-del-miedo.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '30',
                'category_id' => '4',
                'name' => 'El jinete azul',
                'artist' => 'Wassily Kandinsky',
                'year' => '1903',
                'price' => '53700.00',
                'description' => 'Óleo sobre tela, 52,1 x 54,6 cm',
                'image' => 'https://image.posterlounge.ch/img/products/520000/511162/511162_poster_l.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '31',
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
        
        DB::table('products')->insert(
            [
                'id' => '32',
                'category_id' => '5',
                'name' => 'Lo que el agua me dió',
                'artist' => 'Frida Kahlo',
                'year' => '1939',
                'price' => '66500.00',
                'description' => 'óleo sobre lienzo, 91 x 70.5 cm',
                'image' => 'https://www.poeuvreart.com/cdn-cgi/image/format=auto/https://www.poeuvreart.com/couch/uploads/image/reproduction-espagnol/kahlo_frida_lo_que_el_agua_me_dio.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '33',
                'category_id' => '5',
                'name' => 'La Fortune',
                'artist' => 'Man Ray',
                'year' => '1938',
                'price' => '36500.00',
                'description' => 'óleo sobre lienzo, 60.2 x 73.2 cm',
                'image' => 'https://artcritical.com/app/uploads/2010/02/ManRay-Fortune.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '34',
                'category_id' => '5',
                'name' => 'La Persistencia de la memoria',
                'artist' => 'Salvador Dalí',
                'year' => '1931',
                'price' => '73500.00',
                'description' => 'óleo sobre lienzo, 24 x 33 cm',
                'image' => 'https://cdn.culturagenial.com/es/imagenes/dali-la-persistencia-de-la-memoria-cke.jpg', 
                'stock' => '1'
            ]
        );
        
        DB::table('products')->insert(
            [
                'id' => '35',
                'category_id' => '5',
                'name' => 'El falso espejo',
                'artist' => 'René Magritte',
                'year' => '1928',
                'price' => '41500.00',
                'description' => 'óleo sobre lienzo, 54 x 81 cm',
                'image' => 'https://1.bp.blogspot.com/-DZzE5RfItmI/UsIecXORI1I/AAAAAAAAC1g/nHDmZMbZFKk/s1600/MagritteFauxMiroir.jpg', 
                'stock' => '1'
            ]
        );

        DB::table('products')->insert(
            [
                'id' => '36',
                'category_id' => '5',
                'name' => 'La condicion humana',
                'artist' => 'René Magritte',
                'year' => '1935',
                'price' => '46500.00',
                'description' => 'óleo sobre lienzo, 100 x 81 cm',
                'image' => 'https://f4.bcbits.com/img/a1043369472_10.jpg', 
                'stock' => '1'
            ]
        );

    }
}
