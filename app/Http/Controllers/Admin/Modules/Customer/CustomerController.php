<?php

namespace App\Http\Controllers\Admin\Modules\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Mail;
use App\Mail\Registration;
class CustomerController extends Controller
{
    protected $redirectTo = '/admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    public function index()
    {
		$data = [];
		$data['data'] = User::where('status','!=','D')->where('role','C')->orderBy('id','desc')->get();
		return view('admin.customer.list',$data);    	
    }

    public function addView(Request $request)
    {
        return view('admin.customer.add');
    }

    public function add(Request $request)
    {

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = \Hash::make($request->password);
        $user->address_one = $request->address_one;
        $user->address_two = $request->address_two;
        $user->pincode = $request->pincode;
        $user->landmark = $request->landmark;
        $user->house_no = $request->house_no;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->role = 'C';
        $user->save();

        $data = [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password,
                'type'=>'add',
                ];
        Mail::send(new Registration($data));


        return redirect()->back()->with('success','Customer Added Successfully');
    }

    public function checkEmail(Request $request)
    {

        if (@$request->id) {
          $checkEmail = User::whereIn('status', ['A', 'I', 'U'])->where('id','!=',$request->id)->where('email', $request->email)->count();
            if ($checkEmail > 0) {
                return response('false');
            } else {
                return response('true');
            }
        }else{
        if ($request->email) {
            $checkEmail = User::whereIn('status', ['A', 'I', 'U'])->where('email', $request->email)->count();
            if ($checkEmail > 0) {
                return response('false');
            } else {
                return response('true');
            }
        }
    }
        return response('no email');

    }


    public function delete($id)
    {
        User::where('id',$id)->update(['status'=>'D']);
        return redirect()->back()->with('success','Customer Deleted Successfully');
    }

    public function status($id)
    {
        $check = User::where('id',$id)->first();
        if (@$check->status=="A") {
             User::where('id',$id)->update(['status'=>'I']);
        }else{
            User::where('id',$id)->update(['status'=>'A']);
        }
        return redirect()->back()->with('success','Status Changed Successfully');
    }

    public function edit($id)
    {
        $data = [];
        $data['data'] = User::where('id',$id)->first();
        return view('admin.customer.edit',$data);
    }


    public function update(Request $request)
    {
        $check = User::where('id',$request->id)->first();
        $upd = [];
        $upd['name'] = $request->name;
        $upd['email'] = $request->email;
        $upd['mobile'] = $request->mobile;
        $upd['address_one'] = $request->address_one;
        $upd['address_two'] = $request->address_two;
        $upd['pincode'] = $request->pincode;
        $upd['landmark'] = $request->landmark;
        $upd['house_no'] = $request->house_no;
        $upd['state'] = $request->state;
        $upd['city'] = $request->city;
        User::where('id',$request->id)->update($upd);
        if ($check->email != $request->email) {
            $data = [
                'name'=>$request->name,
                'email'=>$request->email,
                'type'=>'edit',
                ];
        Mail::send(new Registration($data));
        }
        return redirect()->back()->with('success','Customer Details Updated Successfully');


    }


}
