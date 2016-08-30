<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\File\UploadedFile; 
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Buyingrequest;
use Flash;
use Mail;
use Crypt;
use App\User;

class BuyersController extends Controller
{
	public function index()
	{
		return view('buyers.request');
	}

    /**
     * Create a new request after a valid 
     * @param  array  $data
     */
	public function store(Request $request)
	{
        // validasi input dari user
        $this->validate($request, [
            'deskripsi' => 'required',
            'image' => 'mimes:jpg,jpeg,png|max:512000',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:9',
            'expired' => 'required|date',
            'deadline' => 'required|date',
        ]);		

		$data = $request->all(); // ambil data dari form request

        // check image upload 
        if ($request->hasFile('image')) {
            $data['image'] = $this->saveImage($request->file('image'));
        }

        // check create akun otomatis 
        $agree = $request->input('agree');        
        if ($agree == 1){
            $email = $request->input('email');

            // check email exist di database
            $email_user = User::where('email', $email)->first();

            // jika email belum terdaftar
            if (is_null($email_user)) {

                //enkripsi email address untuk parameter link verifikasi
                $email_encrypt = Crypt::encrypt($email); 
                Mail::send('buyers.email-verification', ['email' => $email_encrypt], function($message) use ($email){
                    $message->to($email, 'New Customer')->subject('Verifikasi pembuatan akun Ralali');
                });                
            } 
            session()->flash('msg','Request anda berhasil dikirim,silahkan cek email untuk melakukan verifikasi');
        }

        Buyingrequest::create($data); // simpan ke database
        session()->flash('msg','Request anda berhasil dikirim');        
        return redirect()->to('/');
	}

    /**
     * Save image from form request
     * @param  array  $data
     */
    protected function saveImage(UploadedFile $image)
    {
        $fileName = str_random(40) . '.' . $image->guessClientExtension();
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'image'; // mnentukan path image
        $image->move($destinationPath, $fileName); 
        return $fileName;
    }

    /**
     * Create a new user valid verification 
     * @param  array  $data
     */    	
    public function verifikasi(Request $request, $email_encrypt)
    {
        $password = 'rahasia'; // pasword default
        try {
            $email = Crypt::decrypt($email_encrypt); // dekripsi email
        } catch (DecryptException $e) {
            session()->flash('msg','Error');        
            return redirect()->to('/');        
        }

        // save into database
        $user = User::create([
            'email' => $email,
            'password' => bcrypt($password)
        ]);

        $user->role = 'buyer';
        $user->save();
                        
        return view('buyers.page-verification');
    }
}