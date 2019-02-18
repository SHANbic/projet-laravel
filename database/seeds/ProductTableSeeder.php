<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::create([
            'title' => 'Femme'
        ]);

        App\Category::create([
            'title' => 'Homme'
        ]);

        //Storage::disk('local')->delete(Storage::allFiles());
        Storage::disk('local')->delete(Storage::allFiles());

        factory(App\Product::class, 45)->create()->each(function ($product){
            $category = App\Category::find(rand(1,2));
            $product->category()->associate($category);
            $link = str_random(10) . '.jpg';
            $file = file_get_contents('https://picsum.photos/400/400/?random');
            Storage::disk('local')->put($link, $file);
            
          
            $product->update([
                'url_image' => $link
            ]);   
            $product->save();
        
        });       
        
    }

}
