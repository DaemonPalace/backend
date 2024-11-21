<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();
                $menuItems = [
                    [
                        'category' => 'Entrada',
                        'name' => 'Ceviche',
                        'description' => 'Entradita de ceviche fresco con mariscos y cítricos',
                        'price' => 49990,
                        'index' => 0,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/RRYKEoKyvWsXvaveD-800-x.webp'
                    ],
                    [
                        'category' => 'Entrada',
                        'name' => 'Tuna Tartar',
                        'description' => 'Entrada de tuna tartar con aguacate y aderezo de sésamo',
                        'price' => 49990,
                        'index' => 1,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/54REoXvJLYrLPWTGf-800-x.webp'
                    ],
                    [
                        'category' => 'Plato Fuerte',
                        'name' => 'Acevichado Bowl',
                        'description' => 'Bowl de ceviche con arroz, palta y aderezo especial',
                        'price' => 24990,
                        'index' => 2,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/cwCKdQonMwW5octTq-800-x.webp'
                    ],
                    [
                        'category' => 'Plato Fuerte',
                        'name' => 'Buddha Bowl',
                        'description' => 'Bowl con pescado marinado, aguacate, y verduras frescas',
                        'price' => 24990,
                        'index' => 3,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/CjBnwbHwSWrZNC3fG-800-x.webp'
                    ],
                    [
                        'category' => 'Plato Fuerte',
                        'name' => 'De Origen Bowl',
                        'description' => 'Bowl vegetariano con quinoa, vegetales y hummus',
                        'price' => 25990,
                        'index' => 4,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/GDfs9429BWtLWEMvB-800-x.webp'
                    ],
                    [
                        'category' => 'Plato Fuerte',
                        'name' => 'Ebi Bowl',
                        'description' => 'Bowl con pescado fresco, arroz, y verduras',
                        'price' => 24990,
                        'index' => 5,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/s9ozp2BcjJeaoLeuK-800-x.webp'
                    ],
                    [
                        'category' => 'Plato Fuerte',
                        'name' => 'Alii Bowl',
                        'description' => 'Bowl de arroz de sushi, atún, cebolla crunch, repollo morado, ajonjolí y sriracha mayo',
                        'price' => 24990,
                        'index' => 6,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/sTq5ZxnsYH2v34hpB-800-x.webp'
                    ],
                    [
                        'category' => 'Plato Fuerte',
                        'name' => 'Luau Bowl',
                        'description' => 'Bowl con pollo a la parrilla, piña asada y arroz integral',
                        'price' => 24990,
                        'index' => 7,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/pvbtbde3AEoE9FEAo-800-x.webp'
                    ],
                    [
                        'category' => 'Plato Fuerte',
                        'name' => 'Maui Bowl',
                        'description' => 'Bowl con salmón marinado, arroz, y algas',
                        'price' => 24990,
                        'index' => 8,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/fffkLFu4uTPTqKsDj-800-x.webp'
                    ],
                    [
                        'category' => 'Plato Fuerte',
                        'name' => 'Ono Bowl',
                        'description' => 'Bowl con atún fresco, arroz de sushi, y salsa ponzu',
                        'price' => 24990,
                        'index' => 9,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/3RC2LaaA4GyLdjBLT-800-x.webp'
                    ],
                    [
                        'category' => 'Plato Fuerte',
                        'name' => 'Palenq Bowl',
                        'description' => 'Bowl con cerdo desmechado, arroz, y ensalada fresca',
                        'price' => 24990,
                        'index' => 10,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/weLEowdGcthBE2Zuw-800-x.webp'
                    ],
                    [
                        'category' => 'Plato Fuerte',
                        'name' => 'Pollo Crispy Bowl',
                        'description' => 'Bowl con pollo crujiente, arroz y ensalada',
                        'price' => 24990,
                        'index' => 11,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/kJhhXwkMcne4CCAp6-800-x.webp'
                    ],
                    [
                        'category' => 'Plato Fuerte',
                        'name' => 'Pulled Pork Bowl',
                        'description' => 'Bowl con cerdo desmechado, coleslaw y arroz',
                        'price' => 24990,
                        'index' => 12,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/YKDdHdaFyRwzjAyr8-800-x.webp'
                    ],
                    [
                        'category' => 'Plato Fuerte',
                        'name' => 'Shaka Bowl',
                        'description' => 'Bowl con tofu marinado, verduras frescas y arroz',
                        'price' => 24990,
                        'index' => 13,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/jDgFuy9X92rYsNW5N-800-x.webp'
                    ],
                    [
                        'category' => 'Plato Fuerte',
                        'name' => 'Arma tu Bowl',
                        'description' => 'Bowl con ingredientes a tu gusto',
                        'price' => 30000,
                        'index' => 14,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/XmNNCbnNEN6GSgLSy-800-x.webp'
                    ],
                    [
                        'category' => 'Combo',
                        'name' => 'De Origen Bowl+CocaCola',
                        'description' => 'Bowl vegetariano con quinoa, vegetales y hummus con Coca Cola',
                        'price' => 34990,
                        'index' => 15,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/h23w6FgashECtKSCX-800-x.webp'
                    ],
                    [
                        'category' => 'Combo',
                        'name' => 'De Origen Bowl+Hatsu',
                        'description' => 'Bowl vegetariano con quinoa, vegetales y hummus con Hatsu',
                        'price' => 34990,
                        'index' => 16,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/h23w6FgashECtKSCX-800-x.webp'
                    ],
                    [
                        'category' => 'Combo',
                        'name' => 'Ebi Bowl+Hatsu',
                        'description' => 'Bowl con pescado fresco, arroz, y verduras con Hatsu',
                        'price' => 34990,
                        'index' => 17,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/s9ozp2BcjJeaoLeuK-800-x.webp'
                    ],
                    [
                        'category' => 'Combo',
                        'name' => 'Maikai Bowl+MrTea',
                        'description' => 'Combo de Maikai Bowl con MR Tea',
                        'price' => 34990,
                        'index' => 18,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/v62FCCvNyNnjLt57y-800-x.webp'
                    ],
                    [
                        'category' => 'Combo',
                        'name' => 'Palenq Bowl+Hatsu',
                        'description' => 'Bowl con cerdo desmechado, arroz, y ensalada fresca con Hatsu',
                        'price' => 34990,
                        'index' => 19,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/weLEowdGcthBE2Zuw-800-x.webp'
                    ],
                    [
                        'category' => 'Combo',
                        'name' => 'Palenq Bowl+MrTea',
                        'description' => 'Bowl con cerdo desmechado, arroz, y ensalada fresca con MR Tea',
                        'price' => 34990,
                        'index' => 20,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/W5MgxEKpC87jk5cSN-800-x.webp'
                    ],
                    [
                        'category' => 'Combo',
                        'name' => 'Pollo Crispy Bowl+Cocacola',
                        'description' => 'Combo de Pollo Crispy Bowl con Cocacola',
                        'price' => 34990,
                        'index' => 21,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/L43RKmkG5z5GbrsW7-800-x.webp'
                    ],
                    [
                        'category' => 'Combo',
                        'name' => 'Pulled Pork Bowl+Hatsu',
                        'description' => 'Bowl con cerdo desmechado, coleslaw y arroz con Hatsu',
                        'price' => 34990,
                        'index' => 22,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/W5MgxEKpC87jk5cSN-800-x.webp'
                    ],
                    [
                        'category' => 'Combo',
                        'name' => 'Shaka Bowl+Hatsu',
                        'description' => 'Bowl con tofu marinado, verduras frescas y arroz con Hatsu',
                        'price' => 34990,
                        'index' => 23,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/W5MgxEKpC87jk5cSN-800-x.webp'
                    ],
                    [
                        'category' => 'Combo',
                        'name' => 'Arma tu Bowl+Hatsu',
                        'description' => 'Bowl con ingredientes a tu gusto con Hatsu',
                        'price' => 34990,
                        'index' => 23,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/W5MgxEKpC87jk5cSN-800-x.webp'
                    ],
                    [
                        'category' => 'Poke Kids',
                        'name' => 'Pescado Bowl',
                        'description' => 'Bowl de arroz y pescado para niños',
                        'price' => 20990,
                        'index' => 24,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/umAs4zBrSnPJzP9LK-800-x.webp'
                    ],
                    [
                        'category' => 'Poke Kids',
                        'name' => 'Pollo Bowl',
                        'description' => 'Bowl de arroz y pollo para niños',
                        'price' => 20990,
                        'index' => 25,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/YZ3pGyj5Nza5rsWFy-800-x.webp'
                    ],
                    [
                        'category' => 'Postres',
                        'name' => 'Brownie de Milo',
                        'description' => 'Brownie de chocolate con milo en polvo',
                        'price' => 10990,
                        'index' => 26,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/aoxAby6CaLtffcZYz-800-x.webp'
                    ],
                    [
                        'category' => 'Postres',
                        'name' => 'Helado de Dulce de Leche',
                        'description' => 'Helado sabor a dulce de leche',
                        'price' => 10990,
                        'index' => 27,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/aRjxjDfaBcRjkvnWE-800-x.webp'
                    ],
                    [
                        'category' => 'Postres',
                        'name' => 'Helado de Pistacho',
                        'description' => 'Helado sabor a pistacho',
                        'price' => 10990,
                        'index' => 28,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/R4c4TJ9p5Z9pxzjue-800-x.webp'
                    ],
                    [
                        'category' => 'Postres',
                        'name' => 'Helado de Chocolate',
                        'description' => 'Helado sabor a chocolate',
                        'price' => 10990,
                        'index' => 29,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/EYdSXs7nBMP7C2guK-800-x.webp'
                    ],
                    [
                        'category' => 'Bebidas',
                        'name' => 'Coca Cola',
                        'description' => 'Gaseosa Refrigerada Coca Cola',
                        'price' => 7990,
                        'index' => 30,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/r6P3X2ANtLqwq6kcC-800-x.webp'
                    ],
                    [
                        'category' => 'Bebidas',
                        'name' => 'Agua Hatsu',
                        'description' => 'Agua refrigerada marca Hatsu',
                        'price' => 7990,
                        'index' => 31,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/fZnrFuxT4hSojLk7R-800-x.webp'
                    ],
                    [
                        'category' => 'Bebidas',
                        'name' => 'Te Hatsu',
                        'description' => 'Te refrigerado marca Hatsu',
                        'price' => 7990,
                        'index' => 32,
                        'imagen' => 'https://tofuu.getjusto.com/orioneat-local/resized2/rDyJdPeqW8pLHCpRn-800-x.webp'
                    ]
                ];
        
                // Insert the menu items
                DB::table('products')->insert($menuItems);
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            
            }
        }