<?php

namespace App\Repo\wildlifelist;

use App\Models\WildLifeList;

class WildLifeListRepo
{
    private $wildlife;

    public function __construct(WildLifeList $wildlife)
    {
        $this->wildlife = $wildlife;
    }

    public function getWildLifeForSelect()
    {
        return WildlifeList::pluck('title', 'id')->toArray();
    }

    public function getAllWildLifeList()
    {
        return WildLifeList::all();
    }

    public function storeWildLife(array $data)
    {

        $imagePaths = [];

        if (isset($data['images'])) {
            foreach ($data['images'] as $image) {
                $imagePaths[] = $this->storeImage($image);
            }
        }

        $wildlifeData = [
            'title' => $data['title'],
            'image' => implode(',', $imagePaths) 
        ];

        return $this->wildlife->create($wildlifeData);
    }

    public function updateWildLifeList(array $data, int $id)
    {
        $wildlife = $this->findWildLifeList($id);

        if (isset($data['images'])) {
            $imagePaths = [];
            foreach ($data['images'] as $image) {
                $imagePaths[] = $this->storeImage($image);
            }
            $wildlife->image = implode(',', $imagePaths);
        }

        $wildlife->title = $data['title'];

        return $wildlife->save();
    }

    public function deleteWildLifeList($id)
    {
        return $this->wildlife->where('id', $id)->delete();
    }

    private function storeImage($image)
    {
        $imageName = time() . '.' . $image->getClientOriginalName();
        $image->move(public_path('uploads/wildlife'), $imageName);
        return 'uploads/wildlife/' . $imageName;
    }

    public function findWildLifeList($id)
    {
        return $this->wildlife->findOrFail($id);
    }
}
