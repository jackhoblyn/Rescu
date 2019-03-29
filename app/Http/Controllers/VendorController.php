<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Vendor;
use App\gmaps_geocache;
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

     $email = $request->email;
     $password = $request->password;
    
    
     Vendor::create([
          'name'=>$request->name,
          'email'=>$request->email,
          'password'=>bcrypt($request->password),
          'type'=> $request->type
    ]);
      // return redirect()->intended('/vendor/home');
     if(Auth::guard('vendor')->attempt(['email'=> $email, 'password'=> $password]))
     {
       return redirect()->intended('/vendor/home');
      } 
      else 
      {
      return redirect()->back()->with('warning', 'Invalid Email or Password');
      }
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
     $type = $request->type;
     $remember = $request->remember;
  

     if(Auth::guard('vendor')->attempt(['email'=> $email, 'password'=> $password], $remember)){
       return redirect()->intended('/vendor/home');
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

    return redirect('/');
  }

    public function location(Request $request, Vendor $vendor)
    {

       $id = Auth('vendor')->user()->id;
       $vendor = Vendor::find($id);

       $vendor->lat = $request->lat;
       $vendor->long = $request->lng;

       $vendor->save();
       return redirect('/map');
    }

    public function locationMake(Request $request, Vendor $vendor)
    {

      $id = Auth('vendor')->user()->id;
      $vendor = Vendor::find($id);

        gmaps_geocache::updateOrCreate([
            'vendor_id' => $vendor->id],
            ['address' => $vendor->name,
            'latitude' => $request->lat,
            'longitude' => $request->lng,
        ]);

        return redirect('/vendor/map');
    
    }

  public function map()
  {
    return view('map');
  }

  public function viewShops()
  {
    return view('map3');
  }


}