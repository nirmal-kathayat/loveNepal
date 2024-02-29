<?php

namespace App\Repo\nationalpark;

use Illuminate\Support\Facades\File;
use App\Models\NationalPark;

class NationalParkRepo
{
    private $nationalPark;

    public function __construct(NationalPark $nationalPark)
    {
        $this->nationalPark = $nationalPark;
    }

    public function getAllNationalPark()
    {
        return NationalPark::all();
    }

    public function storeNationalPark(array $data)
    {
        $imagePath = $this->storeImage($data['image']);
        $nationalParkData = [
            'title' => $data['title'],
            'image' => $imagePath
        ];

        return $this->nationalPark->create($nationalParkData);
    }

    public function updateNationalPark(array $data, int $id)
    {
        $nationalPark = $this->findNationalPark($id);

        if (isset($data['image'])) {
            $imagePath = $this->storeImage($data['image']);
            if (File::exists($nationalPark->image)) {
                File::delete($nationalPark->image);
            }
            $nationalPark->image = $imagePath;
        }

        $nationalPark->title = $data['title'];

        return $nationalPark->save();
    }

    public function deleteNationalPark($id)
    {
        return $this->nationalPark->where('id', $id)->delete();
    }

    private function storeImage($image)
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/nationalPark'), $imageName);
        return 'uploads/nationalPark/' . $imageName;
    }

    public function findNationalPark($id)
    {
        return $this->nationalPark->findOrFail($id);
    }
}
