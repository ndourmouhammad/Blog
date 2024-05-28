<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Le nom du modèle correspondant à cette fabrique.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Définition du modèle.
     *
     * @return array
     */
    public function definition()
    {
        // Générer une image temporaire et la stocker localement
        $imageUrl = $this->faker->imageUrl(640, 480, 'food', true, 'Faker');
        $imageContents = file_get_contents($imageUrl);
        $imageNom = Str::random(10) . '.jpg';
        $imagePath = 'public/blog/' . $imageNom;

        // Stocker l'image dans le répertoire public/blog
        Storage::put($imagePath, $imageContents);

        return [
            'nom' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'url_image' => $imageNom,
            'a_la_une' => $this->faker->boolean,
        ];
    }
}
