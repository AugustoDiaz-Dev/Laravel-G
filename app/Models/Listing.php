<?php

namespace App\Models;

class Listing
{
    public static function all()
    {
        return  [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'Some description in here',

            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => 'Some description in here',

            ],
        ];
    }
    public static function find($id)
    {
        $listings = self::all();
        foreach ($listings as $listing) {
            if ($listing['id'] == $id) {
                return $listing;
            }
        }
    }
}
