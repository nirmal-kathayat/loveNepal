<?php

namespace App\Repo\activity;

use App\Models\Activity;

class ActivityRepo
{
      private $activity;

      public function __construct(Activity $activity)
      {
            $this->activity = $activity;
      }

      public function getAllActivity()
      {
            return Activity::all();
      }
      // public function getAll()
      // {
      //       $this->activity->all();
      // }

      public function storeActivity(array $data)
      {
            $data = [
                  'activity_name' => $data['activity_name']
            ];
            return $this->activity->create($data);
      }

      public function findActivity($id)
      {
            $activity =  $this->activity;
            if (!is_array($id)) {
                  return $activity->findOrFail($id);
            } else {
                  return $activity->whereIn('id', $id)->get();
            }
      }

      public function updateActivity(array $data, int $id)
      {
            $data = [
                  'activity_name' => $data['activity_name']
            ];

            return $this->activity->where(['id' => $id])->update($data);
      }

      public function deleteActivity($id)
      {
            return $this->activity->where(['id' => $id])->delete();
      }
}
