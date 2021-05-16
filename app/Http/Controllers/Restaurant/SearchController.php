<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        // $result = Restaurant::where('name','like','%'.$keyword.'%')->paginate(5);
        // return $result;
        return RestaurantResource::collection(Restaurant::where('name', 'like', '%' . $keyword . '%')->paginate(5));

    }
}
