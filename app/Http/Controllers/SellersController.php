<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Buyingrequest;
use App\Managerequest;
use Mail;

class SellersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get all data request 
     */
    public function allRequest()
    {
		$allrequests = Buyingrequest::where('status',0)->get();
		return view('sellers.allrequests', compact('allrequests'));    	
    }

    /**
     * Get data detail request 
     */
    public function showRequest($id)
    {
        $showrequest = Buyingrequest::findOrFail($id);
        return view('sellers.showrequest', compact('showrequest'));
    }    

    /**
     * Get data report request 
     */
    public function reportRequest($id)
    {
        $showrequest = Buyingrequest::findOrFail($id);
        $showrequest->status = '2'; // set permintaan di laporkan
        $showrequest->save();
        
        $email = $showrequest->email;
        Mail::send('sellers.request-not-approved', ['deskripsi' => $showrequest->deskripsi], function($message) use ($email){
            $message->to($email, 'Not Approved Request')->subject('Permintaan ditolak');
        });                                

        session()->flash('msg','Pesan permintaan ditolak berhasil dikirim');                
        return redirect()->to('/all-request');        
    }    

    /**
     * Get all data request from buyer
     */
    public function allReportRequest()
    {
        $allrequests = Buyingrequest::where('status',2)->get();
        return view('sellers.allreportrequests', compact('allrequests'));     
    }    

    /**
     * Get data request not reported
     */
    public function negoRequest($id)
    {
        $showrequest = Buyingrequest::findOrFail($id);
        return view('sellers.negorequest', compact('showrequest'));
    }    

    /**
     * Get all data request respond
     */
    public function allReSpondRequest()
    {
        $allresponds = Buyingrequest::where('status',1)->get();
        return view('sellers.allresponds', compact('allresponds'));
    }            

    /**
     * Get detail respond request by request_id
     */
    public function showReSpondRequest($id)
    {
        $respond = Managerequest::where('request_id',$id)->first();
        return view('sellers.showresponds', compact('respond'));
    }    

    /**
     * Create a new nego respond after a validation 
     *
     * @param  array  $data
     */
    public function negoRequestStore(Request $request)
    {
        // validasi input dari user
        $this->validate($request, [
            'deskripsi' => 'required',
            'deadline' => 'required|date',
        ]);     

        $data = $request->all(); // ambil data dari form request

        $request = Buyingrequest::findOrFail($data['request_id']); // cari data request berdasarkan id
        $request['status'] = 1; // ubah status request menjadi responded
        $request->save();

        $data['status'] = 0; // set default status penawaran     
        Managerequest::create($data); // simpan ke database

        // Mail::send('buyers.email-verification', ['email' => $email_encrypt], function($message) use ($email){
        //     $message->to($email, 'New Customer')->subject('Verifikasi pembuatan akun Ralali');
        // });                        
        session()->flash('msg','Reepond negosiasi ke buyer anda berhasil dikirim');        
        return redirect()->to('/');        
    }    

    /**
     * form message from buyer to seller
     */
    public function message()
    {
        return view('sellers.message');     
    }    

    /**
     * Approved respond from buyer
     */
    public function approvedReSpondRequest($id)
    {
        $request = Managerequest::findOrFail($id);

        $request['status'] = 1; // set status penawaran menjadi approved
        $request->save();
        session()->flash('msg','Negosiasi berhasil di setujui');        
        return redirect()->to('/home');        
    }        
}
