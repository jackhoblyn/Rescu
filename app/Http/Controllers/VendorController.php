<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Vendor;
use Auth;
class VendorController extends Controller
{
    public function create()
    {
        return view('vendor.register');
    }
    public function registerVendor(Request $request)
    {
      $this->validate($request, [
       'email'=> 'required|unique:users|email|max:255',
       'name'=>  'required',
       'password'=> 'required|min:6|confirmed'
    ]); 
    
    
     Vendor::create([
          'name'=>$request->name,
          'email'=>$request->email,
          'password'=>bcrypt($request->password),
          'type'=> $request->type
    ]);
      return redirect()->intended('/home/vendor');
    }
    public function loginVendor()
    {
        return view('vendor.login');
    }
    public function vendorAuth(Request $request)
   {
   	    $this->validate($request, [
        'email'=>'required|email',
        'password'=>'required'
   ]);
     $email = $request->email;
     $password = $request->password;
     $remember = $request->remember;
     $type = $request->type;

     if(Auth::guard('vendor')->attempt(['email'=> $email, 'password'=> $password], $remember, $type)){
       return redirect()->intended('/home/vendor');
      } else {
     	return redirect()->back()->with('warning', 'Invalid Email or Password');
      }
    }
  public function home()
  {
    return view('vendor');
  }
  public function logout()
  {
    Auth::guard('vendor')->logout();
    return redirect('/login/vendor'); 
  }
}