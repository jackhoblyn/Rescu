<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Vendor;
use App\gmaps_geocache;
use Auth;
use Image;


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


    if($vendors = \DB::table('vendors')->where('email', $email)->exists())
    {
      return redirect()->back()->with('warning', 'Invalid Email or Password');
    }
    else
    {
      Vendor::create([
          'name'=>$request->name,
          'email'=>$request->email,
          'password'=>bcrypt($request->password),
          'type'=> $request->type
    ]);
    }
    
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
  

     if (Auth::guard('vendor')->attempt(['email'=> $email, 'password'=> $password], $remember))
      {
       return redirect()->intended('/vendor/home');
      }
      else 
      {
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

  public function clearNotifications(Vendor $vendor)
    { 
        $vendor = Auth('vendor')->user();

        foreach ($vendor->unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        return redirect('/vendor/home');
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

      $vendor->gcached = 'yes';
      $vendor->save();

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
    $id = Auth('vendor')->user()->id;
    $vendor = Vendor::find($id);

    $cache = \DB::table('gmaps_geocache')->where('address', $vendor->name)->first();
    
    $chached = $vendor->gcached;


    if ($vendor->gcached == 'yes')
    {
      $cLat = $cache->latitude;
      $cLng = $cache->longitude;

      $data = array([
        'cached' => $vendor->gcached,
        'cLat' => $cLat,
        'cLng' => $cLng
      ]);
    }

    if ($vendor->gcached == 'no')
    {

      $data = array([
        'cached' => 'no',
        'cLat' => null,
        'cLng' => null
      ]);
    }

    return view('map', compact('data'));
  }

  public function viewShops()
  {
    return view('map3');
  }

  public function profile()
  {
      return view('profiles.fixer');
  }

  public function editProfile()
  {
      return view('profiles.edit_vendor');
  }

  public function editPhoto(Request $request)
    {
       if($request->hasFile('avatar'))
       {  
          $avatar = $request->file('avatar');
          $filename = time() . '.' . $avatar->getClientOriginalExtension();
          Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars/' . $filename));

          $vendor = Auth('vendor')->user();
          $vendor->avatar = $filename;
          $vendor->save();
       }

       return redirect('/vendor/profile');
    }

     public function updateProfile(Request $request)
    {
       $attributes = request()->validate([
            'name' => 'required',
            'city' => 'required',
            'bio' => 'required',
            'phone' => 'required',
            'skill' => 'required'
        ]);

        $vendor = Auth('vendor')->user();

        $vendor->update($attributes);

        return redirect('/vendor/profile');
        
    }


}