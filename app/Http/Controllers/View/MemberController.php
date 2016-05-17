<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entity\Addr;

class MemberController extends Controller
{
  public function toLogin(Request $request)
  {
    $return_url = $request->input('return_url', '');
    return view('login')->with('return_url', urldecode($return_url));
  }

  public function toRegister($value='')
  {
    return view('register');
  }

  public function toMyhome(Request $request)
  {
    $member = $request->session()->get('member', '');
    return view('personal')->with('member',$member);
  }
  
    public function toUserInfo(Request $request)
  {
    $member = $request->session()->get('member', '');
    return view('userinfo')->with('member',$member);
  }

  public function toMydev(Request $request)
  {
    return view('mydev');
  }

  public function toMyaddress(Request $request)
  {
    $member = $request->session()->get('member', '');
    $addresses = Addr::where('member_id',$member->id)->get();
    return view('myaddress')->with('addresses',$addresses);
  }

  public function toselectaddress(Request $request)
  {
    $member = $request->session()->get('member', '');
    $addresses = Addr::where('member_id',$member->id)->get();
    return view('selectaddress')->with('addresses',$addresses);
  }

}
