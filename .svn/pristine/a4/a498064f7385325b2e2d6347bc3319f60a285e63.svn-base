<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppResult;
use App\Entity\Admin;

class IndexController extends Controller
{
  public function login(Request $request)
  {
    $username = $request->input('username', '');
    $password = $request->input('password', '');

    $app_result = new AppResult;

    if($username == '' || $password == '') {
      $app_result->status = 1;
      $app_result->message = "帐号或密码不能为空!";
      return $app_result->toJson();
    }

    $admin = Admin::where('username', $username)->where('password', md5('jqmkj'. $password))->first();
    if(!$admin) {
      $app_result->status = 2;
      $app_result->message = "帐号或密码错误!";
    } else {
      $app_result->status = 0;
      $app_result->message = "登录成功!";

      $request->session()->put('admin', $admin);
    }

    return $app_result->toJson();
  }

  public function toLogin()
  {
    return view('admin.login');
  }

  public function toExit(Request $request)
  {
    $request->session()->forget('admin');
    return view('admin.login');
  }

  public function toIndex(Request $request)
  {
    $admin = $request->session()->get('admin');
    return view('admin.index')->with('admin', $admin);
  }

}
