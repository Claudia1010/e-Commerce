<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                'id' => '1',
                'name' => 'POP ART',
                'description' => 'Desde finales del 50 hasta hoy, el Arte Pop tiene como propósito romper las barreras entre el arte y la vida. En este movimiento, nacido entre Nueva York y Londres, es común el uso de materiales y técnicas comerciales con el fin de mostrar los cambios culturales a los cuales estamos sujetos constantemente y por ende la realidad contemporánea.
                Artistas: Christo, Roy Lichtenstein, George Rodriguez, Andy Warhol'
            ]
        );

        DB::table('categories')->insert(
            [
                'id' => '2',
                'name' => 'CUBISMO',
                'description' => 'Desde 1905 hasta 1939, el Cubismo es una escuela de pintura en la cual predominaban las formas geométricas, así como la abstracción a costa del uso de otros elementos pictóricos. Este movimiento, nacido a principio del siglo 20, enfatizó en el uso de las superficies planas bidimensionales, rechazando con ello el tradicional manejo de la perspectiva, el claro-oscuro y el modelado entre otras teorías con el propósito de imitar la naturaleza. Los pintores cubistas no gustaban de copiar formas, texturas, colores o espacios, en su lugar preferían presentar una nueva realidad en la que los objetos pudieran ser vistos simultáneamente desde varios ángulos.
                    Artistas: Georges Braque, Pablo Picasso, Juan Gris, Fernand Leger'
            ]
        );

        DB::table('categories')->insert(
            [
                'id' => '3',
                'name' => 'IMPRESIONISMO',
                'description' => 'Desde 1870 a 1890, el Impresionismo se desarrolló mayormente en Francia durante las últimas décadas el siglo 19 e incluyó artistas tales como Monet, Cézanne, Degas y Pizarro. El estilo se caracterizaba por la impresión general producida por una escena o un objeto, así como por el uso de colores primarios y pequeños trazos para simular el reflejo real de la luz sobre una superficie.
                        Artistas: Frederic Bazille, Eugene Boudin, Gustave Caillebotte, Mary Cassatt, Paul Cézanne, Edgar Degas, Claude Monet, Camille Pissarro, Pierre-Auguste Renoir, Alfred Sisley'
            ]
        );

        DB::table('categories')->insert(
            [
                'id' => '4',
                'name' => 'EXPRESIONISMO',
                'description' => 'Desde 1890 a 1920, el Expresionismo fue una de las principales corrientes plásticas que se desarrolló durante finales del siglo 19 y principios del 20. Este movimiento artístico puntualizaba en las emociones y el tipo de reacciones que las mismas provocaban en el espectador. La distorsión, la exageración, el primitivismo, la fantasía y la aplicación dinámica y hasta violenta de los elementos formales eran las características más comunes de este movimiento que dejó atrás la imitación fiel de la naturaleza para dar paso al uso de colores vibrantes y provocativas formas abstractas con el fin de producir una reacción fuerte en el espectador.
                            Artistas: Max Beckmann, Wassily Kandinsky, Gustave Klimt, Edward Munch, Egon Shiele'
            ]
        );

        DB::table('categories')->insert(
            [
                'id' => '5',
                'name' => 'SURREALISMO',
                'description' => ' El Surrealismo es un movimiento de vanguardia artística creado en 1924 tras el Manifiesto Surrealista de André Breton, guía espiritual del mismo. Su tema principal era el mundo de los sueños. En técnicas usaban el automatismo, que consiste en dibujar o escribir sin aparente lógica, dejando a la mano libre; la desorientación reflexiva, por la que asociaban objetos extraños, surgidos libremente del subconsciente, en espacios lógicos y realistas.
                    Artistas: Marc Chagall, Salvador Dalí, Rene Magritte, Joan Miró, etc.'
            ]
        );
    }
}
