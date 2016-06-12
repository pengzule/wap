<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Entity\Category;
use App\Models\AppResult;

class GoodsController extends Controller
{
  public function getCategoryByParentId($parent_id)
  {
    $categorys = Category::where('parent_id', $parent_id)->get();

    $app_result = new AppResult();
    $app_result->status = 0;
    $app_result->message = '返回成功';
    $app_result->categorys = $categorys;

    return $app_result->toJson();
  }

}
