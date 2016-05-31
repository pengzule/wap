<?php

namespace App\Http\Controllers\View;

use App\Entity\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entity\Addr;
use App\Entity\PdtComments;
use App\Entity\PdtCollect;
use App\Entity\CommentImages;

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
    $comments = PdtComments::where('member_id',$member->id)->get();
    $wishes = PdtCollect::where('member_id',$member->id)->get();
    return view('personal')->with('member',$member)
        ->with('comments',$comments)
        ->with('wishes',$wishes);
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

  public function toMywish(Request $request)
  {
    $member = $request->session()->get('member', '');
    $wishes = PdtCollect::where('member_id',$member->id)->get();
    foreach ($wishes as $wish) {
      $product = Product::where('id', $wish->product_id)->first();
      $wish->product = $product;
    }
    return view('collectlist')->with('wishes',$wishes);
  }

  public function toMycomment(Request $request)
  {
    $member = $request->session()->get('member', '');
    $comments = PdtComments::where('member_id',$member->id)->get();
    foreach ($comments as $comment) {
      $product = Product::where('id', $comment->product_id)->first();
      $comment_images = CommentImages::where('member_id',$member->id)->where('product_id',$comment->product_id)->get();
      $comment->product = $product;
      $comment->comment_images = $comment_images;
    }
    return view('comments')->with('comments',$comments);
  }


}
