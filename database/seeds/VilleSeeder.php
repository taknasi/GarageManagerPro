<?php

use App\Models\Ville;
use Illuminate\Database\Seeder;

class VilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $villes = [
            'Agadir', 'Al Hoceima', 'Assilah', 'Azemmour', 'Azrou', 'Beni Mellal', 'Berkane', 'Berrechid',
            'Casablanca', 'Chefchaouen', 'Dakhla', 'El Jadida', 'Errachidia', 'Essaouira', 'Fès', 'Fnideq',
            'Guelmim', 'Ifrane', 'Kénitra', 'Khemisset', 'Khouribga', 'Ksar El Kebir', 'Laâyoune', 'Larache',
            'Marrakech', 'Martil', 'Meknès', 'Mohammedia', 'Nador', 'Ouarzazate', 'Oued Zem', 'Oujda',
            'Rabat', 'Safi', 'Salé', 'Sefrou', 'Settat', 'Sidi Bennour', 'Sidi Ifni', 'Sidi Kacem',
            'Sidi Slimane', 'Skhirat', 'Tan-Tan', 'Tanger', 'Taroudant', 'Taza', 'Témara', 'Tétouan',
            'Tiznit', 'Youssoufia', 'Zagora'
        ];

        foreach ($villes as $ville) {
            Ville::create([
                'ville' => $ville,
            ]);
        }
    }
}
