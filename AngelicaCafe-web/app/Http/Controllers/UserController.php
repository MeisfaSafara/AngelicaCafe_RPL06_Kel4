<?php

namespace App\Http\Controllers;
#tambahan
use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\OrderDetail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function profile(){
        $user = Auth::user();
        
        return view('profile/profile',[
            'user' => $user
        ]);
    }

    public function profileUpdate(Request $request){
        $validate = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required'
          ]);

        $user = Auth::user();
        
        $userSave = User::findOrFail($user->id);

        $password = $user->password;

        if ($request->password !== null && $request->confirm_password !== null) {
            $password =  bcrypt($request->password);
        } 

        $userSave->update([
            'first_name' => $validate['first_name'],
            'last_name' => $validate['last_name'],
            'phone_number' => $validate['phone'],
            'email' => $validate['email'],
            'password' => $password
        ]);

        return redirect()->back()->with('success','Profile berhasil di update !');
        

    }

    public function showAddress(){
        $user = auth()->user();
        $addresses = Address::with('user')
        ->where('user_id', $user->id)
        ->get();

        return view('profile.address', [
            'addresses' => $addresses
        ]);
    }


    public function editAddress($id){
        $address = Address::findOrFail($id);
        $user = auth()->user();


        if($user->id !== $address->user_id){
            return 'jangan iseng bro';
        }

        return view('profile.editAddress',[
            'address' => $address
        ]);
    }

    public function updateAddress(Request $request,$id){
        $address = Address::findOrFail($id);
        $address->update($request->all());

        return redirect()->route('address.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function addAddress(){
        return view('profile.addAddress');
    }

    public function storeAddress(Request $request){
        $request->validate([
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
        ]);

        $user = auth()->user();

        $address = Address::create([
            'user_id' => $user->id,
            'street' => $request->street,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code
        ]);

        return redirect()->route('address.index')->with('success', 'Address berhasil ditambah!');
    }

    public function updateProfilePicture(Request $request){

        $request->validate([
            'profilePicture' => 'image|mimes:jpeg,jpg,png|max:2048', // Maksimal 1MB
        ]);

        if ($request->file('profilePicture')) {
            $imagePath = $request->file('profilePicture')->store('img/profile', 'public');

            // Hapus gambar profil sebelumnya jika ada
            if (auth()->user()->profile_picture) {
                Storage::disk('public')->delete(auth()->user()->profile_picture);
            }

            // Simpan path gambar baru ke dalam database user
            User::find(auth()->user()->id)->update(['image' => $imagePath]);

            return redirect()->back()->with('success', 'Profile picture updated successfully.');
            
        }

        return redirect()->back()->with('failed', 'Profile picture updated failed.');
    
    }
    #tambahan 
    public function deleteAddress($id){
        $address = Address::findOrFail($id);
        $address->delete();
 
        return redirect()->back()->with('success', 'Address berhasil dihapus');
    }
    public function detailTransaction($id){
        $detailOrder = OrderDetail::where('order_id',$id)->get();
        $getUser = Order::findOrFail($id);
        
 
        $user = Address::where('user_id',$getUser->user_id)->first();
 
        return view('profile.transactionDetail',[
            'detailOrder' => $detailOrder,
            'users' => $user,
            'order' => $getUser
        ]);
    }
}