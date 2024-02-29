<?php

namespace App\Repo\category;

use App\Models\Category;

class CategoryRepo
{
      private $category;
      public function __construct(Category $category)
      {
            $this->category = $category;
      }

      public function getAllCategory()
      {
            return Category::all();
      }

      // public function getCategory()
      // {
      //       return $this->category->all();
      // }

      public function storeCategory(array $data)
      {
            // dd($data);

            $data = [
                  'category_name' => $data['category_name'],
            ];
            return $this->category->create($data);
      }

      public function findCategory($id)
      {
            $category =  $this->category;
            if (!is_array($id)) {
                  return $category->findOrFail($id);
            } else {
                  return $category->whereIn('id', $id)->get();
            }
            
      }

      public function updateCategory(array $data, int $id)
      {
            $data = [
                  'category_name' => $data['category_name']
            ];
            return $this->category->where(['id' => $id])->update($data);
      }

      public function deleteCategory($id)
      {
            return $this->category->where(['id' => $id])->delete();
      }
}
