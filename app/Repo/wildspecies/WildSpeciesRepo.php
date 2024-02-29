<?php

namespace App\Repo\wildspecies;

use Illuminate\Support\Facades\File;
use App\Models\WildSpecies;
use App\Models\WildlifeList;

class WildSpeciesRepo
{
    private $wildspecies;
    public function __construct(WildSpecies $wildspecies)
    {
        $this->wildspecies = $wildspecies;
    }

    public function getAllSpecies()
    {
        return WildSpecies::leftJoin('wildlife_lists', 'wildlife_lists.id', '=', 'wild_species.wildlifetype_id')
            ->select('wild_species.*', 'wildlife_lists.title as wildlife_type')
            ->get();
    }


    public function storeWildSpecies(array $data)
    {

        $imagePath = $this->storeImage($data['image']);
        $speciesData = [
            'name' => $data['name'],
            'wildlifetype_id' => $data['wildlifetype_id'],
            'image' => $imagePath
        ];

        return $this->wildspecies->create($speciesData);
    }



    public function updateWildSpecies(array $data, int $id)
    {

        $wildspecies = $this->findWildSpecies($id);

        if (isset($data['image'])) {
            $imagePath = $this->storeImage($data['image']);
            if (File::exists($wildspecies->image)) {
                File::delete($wildspecies->image);
            }
            $wildspecies->image = $imagePath;
        }

        $wildspecies->name = $data['name'];
        $wildspecies->wildlifetype_id = $data['wildlifetype_id'];

        return $wildspecies->save();
    }


    public function deleteWildSpecies($id)
    {
        return $this->wildspecies->where('id', $id)->delete();
    }

    private function storeImage($image)
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/wildspecies'), $imageName);
        return 'uploads/wildspecies/' . $imageName;
    }

    public function findWildSpecies($id)
    {
        return $this->wildspecies->findOrFail($id);
    }
}
