<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Object_;

class UsersController extends Controller
{
    public function register()
    {
        return view('users.register');
    }
    public function login()
    {
        return view('users.login');
    }
    public function logout()
    {
      \Auth::logout();
      return redirect('/');
    }
    public function signin(UserLoginRequest $request)
    {
      if(\Auth::attempt([
          'email'=>$request->get('email'),
          'password'=>$request->get('password'),
      ])){
          return redirect('/');
      }
      \Session::flash('user_login_failed','邮箱或者密码不正确');
      return redirect('/user/login')->withInput();
    }
    public function store(UserRegisterRequest $request)
    {

        User::create(array_merge($request->all(),['avatar'=>'/images/1.png']));
        return redirect('/');
    }
    public function avatar()
    {
        return view('users/avatar');
    }
    public function changeAvatar(Request $request)
    {
       $file = $request->file('avatar');
       $destinationPath = 'uploads/';
       $filename = time().$file->getClientOriginalName();
       $file->move($destinationPath,$filename);
       $user = User::find(\Auth::user()->id);
       $user->avatar = '/'.$destinationPath.$filename;
       $user->save();
       return redirect('/user/avatar');
     }
     public function my_discussions()
     {
         $id = \Auth::user()->id;
         $discussions = \App\Discussion::where('user_id',$id)->get();


         return view('users.my_discussions',compact('discussions'));
     }
    public function my_comments()
    {
        $id = \Auth::user()->id;
        $comments = \App\Comment::where('user_id',$id)->get();
//        foreach ($comments as $value){
//            $id = $value->discussion_id;
//            $discussions = \App\Discussion::where('user_id',$id)->get();
//        }
//        $comments=json_decode( json_encode( $comments ), true );//将一个对象数组转换成普通数组
//        $a = array();
//        foreach ($comments as $key => $value){
//
//            foreach ($value as $key=> $item){
//                if($key=='discussion_id'){
//                    $discussions = \App\Discussion::where('user_id',$item)->get();
//                    $b = json_decode( json_encode( $discussions ), true );
//                    break;
//                }
//            }
//        }
        return view('users.my_comments',compact('comments'));
    }
}
