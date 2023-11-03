<?php

namespace App\Http\Controllers;

use App\Category as AppCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

   public function index()
   {
      // $root = AppCategory::create(['name' => 'Batu']);

      // $child2 = AppCategory::create(['name' => 'Batu 1']);
      // $child2->makeChildOf($root);
    
      $tree = AppCategory::where('name', '=', 'Batu')->first()->getDescendantsAndSelf()->toHierarchy();
    
      // $categories = Category::whereNull('category_id')
      //    ->with('childrenCategories')
      //    ->get();
      return view('category.categories', compact('tree'));
   }
}
