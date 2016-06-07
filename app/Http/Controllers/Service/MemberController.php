<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\AppResult;
use App\Entity\Member;
use App\Entity\TempPhone;
use App\Entity\Addr;
use App\Entity\TempEmail;
use App\Models\AppMail;
use App\Tool\UUID;
use Mail;
use Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
  public function isPhoneExist(Request $request)
  {
    $app_result = new AppResult;
    $phone = $request->input('phone', '');
    $member = Member::where('phone',$phone)->first();
    if ($member !=''){   
      $app_result->status = 1;
       $app_result->message = '该手机号码已存在!!!';
      return $app_result->toJson();
    }
     $app_result->status = 0;
     return $app_result->toJson();
  }
    
  public function register(Request $request)
  {
    $email = $request->input('email', '');
    $phone = $request->input('phone', '');
    $password = $request->input('password', '');
    $confirm = $request->input('confirm', '');
    $phone_code = $request->input('phone_code', '');
    $validate_code = $request->input('validate_code', '');

    $app_result = new AppResult;

    if($email == '' && $phone == '') {
      $app_result->status = 1;
      $app_result->message = '手机号或邮箱不能为空';
      return $app_result->toJson();
    }
    if($password == '' || strlen($password) < 6) {
      $app_result->status = 2;
      $app_result->message = '密码不少于6位';
      return $app_result->toJson();
    }
    if($confirm == '' || strlen($confirm) < 6) {
      $app_result->status = 3;
      $app_result->message = '确认密码不少于6位';
      return $app_result->toJson();
    }
    if($password != $confirm) {
      $app_result->status = 4;
      $app_result->message = '两次密码不相同';
      return $app_result->toJson();
    }

    // 手机号注册
    if($phone != '') {
      if($phone_code == '' || strlen($phone_code) != 6) {
        $app_result->status = 5;
        $app_result->message = '手机验证码为6位';
        return $app_result->toJson();
      }

      $tempPhone = TempPhone::where('phone', $phone)->first();
      if($tempPhone->code == $phone_code) {
        if(time() > strtotime($tempPhone->deadline)) {
          $app_result->status = 7;
          $app_result->message = '手机验证码不正确';
          return $app_result->toJson();
        }

        $member = new Member;
        $member->phone = $phone;
        $member->password = md5('jqmkj' . $password);
        $member->save();

        $app_result->status = 0;
        $app_result->message = '注册成功';
        return $app_result->toJson();
      } else {
        $app_result->status = 7;
        $app_result->message = '手机验证码不正确';
        return $app_result->toJson();
      }

    // 邮箱注册
    } else {
      if($validate_code == '' || strlen($validate_code) != 4) {
        $app_result->status = 6;
        $app_result->message = '验证码为4位';
        return $app_result->toJson();
      }

      $validate_code_session = $request->session()->get('validate_code', '');
      if($validate_code_session != $validate_code) {
        $app_result->status = 8;
        $app_result->message = '验证码不正确';
        return $app_result->toJson();
      }

      $exist = Member::where('email',$email)->first();
      if($exist !=''){
        $app_result->status = 9;
        $app_result->message = '该邮箱已存在！';
        return $app_result->toJson();
      }


      $member = new Member;
      $member->email = $email;
      $member->password = md5('jqmkj' . $password);
      $member->save();

      $uuid = UUID::create();

      $app_mail = new AppMail;
      $app_mail->to = $email;
      $app_mail->cc = '295129789@qq.com';
      $app_mail->subject = '金钱猫科技验证';
      $app_mail->content = '请于24小时点击该链接完成验证. http://lacalhost/service/validate_email'
                        . '?member_id=' . $member->id
                        . '&code=' . $uuid;

      $tempEmail = new TempEmail;
      $tempEmail->member_id = $member->id;
      $tempEmail->code = $uuid;
      $tempEmail->deadline = date('Y-m-d H-i-s', time() + 24*60*60);
      $tempEmail->save();

      Mail::send('email_register', ['m3_email' => $app_mail], function ($m) use ($app_mail) {
          // $m->from('hello@app.com', 'Your Application');
          $m->to($app_mail->to, '尊敬的用户')
            ->cc($app_mail->cc)
            ->subject($app_mail->subject);
      });

      $app_result->status = 0;
      $app_result->message = '注册成功';
      return $app_result->toJson();
    }
  }

  public function login(Request $request) {
    $username = $request->get('username', '');
    $password = $request->get('password', '');
    $validate_code = $request->get('validate_code', '');

    $app_result = new AppResult;

    // 校验
    // ....

    // 判断
    // $validate_code_session = $request->session()->get('validate_code');
    // if($validate_code != $validate_code_session) {
    //   $app_result->status = 1;
    //   $app_result->message = '验证码不正确';
    //   return $app_result->toJson();
    // }

    $member = null;
    if(strpos($username, '@') == true) {
      $member = Member::where('email', $username)->first();
    } else {
      $member = Member::where('phone', $username)->first();
    }

    if($member == null) {
      $app_result->status = 2;
      $app_result->message = '该用户不存在';
      return $app_result->toJson();
    } else {
      if(md5('jqmkj' . $password) != $member->password) {
        $app_result->status = 3;
        $app_result->message = '密码不正确';
        return $app_result->toJson();
      }
    }
    Session::put('member_id', $member->id);
    $request->session()->put('member', $member);

    $member->last_login = Carbon::now();
    $member->login_count += 1;
    $member->save();

    Log::info("用户登录成功",['user_id'=>$member->id]);
    $app_result->status = 0;
    $app_result->message = '登录成功';
    return $app_result->toJson();
  }

  public function editaddress(Request $request)
  {

    $member = $request->session()->get('member', '');
    $member_id = $member->id;
    Log::info("用户编辑地址",['user_id'=>$member->id]);
    $addrs = Addr::where('member_id',$member_id)->get();
    foreach($addrs as $addr)
    {
        $addr->default = 0;
        $addr->save();
    }

    $realname = $request->input('realname', '');
    $phone = $request->input('phone', '');
    $s_province = $request->input('s_province', '');
    $s_city = $request->input('s_city', '');
    $s_county = $request->input('s_county', '');
    $street = $request->input('street', '');

    $address = new Addr;
    $address->member_id = $member_id;
    $address->realname = $realname;
    $address->phone = $phone;
    $address->province = $s_province;
    $address->city = $s_city;
    $address->county = $s_county;
    $address->street = $street;
    $address->save();

    $app_result = new AppResult;
    $app_result->status = 0;
    $app_result->message = '成功';
    return $app_result->toJson();
    }

  public function selectaddress(Request $request)
  {

    $id = $request->input('id', '');

    $addr =  Addr::where('default',1)->first();
    $addr->default = 0;
    $addr->save();

    $addrs = Addr::where('id',$id)->first();
    $addrs->default = 1;
    $addrs->save();



    $app_result = new AppResult;
    $app_result->status = 0;
    $app_result->message = '成功';
    return $app_result->toJson();
  }

  public function logout(Request $request)
  {
    $member = $request->session()->get('member', '');
    $request->session()->forget('member');
    Session::forget('member_id');
    Log::info("用户退出登录",['user_id'=>$member->id]);
    return redirect('/login');
  }




  }


