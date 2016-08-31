<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Buyingrequest;
use App\Managerequest;
use Mail;
use Flash;
use Auth;

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
		$allrequests = Buyingrequest::where('status','pending');

        // if role user buyer get by email 
        if (Auth::user()->role == 'buyer'){
            $allrequests = $allrequests->where('email',Auth::user()->email);
        }

        $allrequests = $allrequests->get();
		return view('requests.allrequests', compact('allrequests'));    	
    }

    /**
     * Get data detail request 
     */
    public function showRequest($id)
    {
        $showrequest = Buyingrequest::findOrFail($id);
        return view('requests.showrequest', compact('showrequest'));
    }    

    /**
     * Get data report request 
     */
    public function reportRequest($id)
    {
        $showrequest = Buyingrequest::findOrFail($id);
        $showrequest->status = 'rejected'; // set permintaan di laporkan/ ditolak
        $showrequest->save();
        
        $email = $showrequest->email;
        Mail::send('requests.request-not-approved', ['deskripsi' => $showrequest->deskripsi], function($message) use ($email){
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
        $allrequests = Buyingrequest::where('status','rejected');

        // if role user buyer get by email 
        if (Auth::user()->role == 'buyer'){
            $allrequests = $allrequests->where('email',Auth::user()->email);
        }

        $allrequests = $allrequests->get();
        return view('requests.allreportrequests', compact('allrequests'));     
    }    

    /**
     * Get data request respond
     */
    public function negoRequest($id)
    {
        $showrequest = Buyingrequest::findOrFail($id);
        return view('requests.negorequest', compact('showrequest'));
    }    

    /**
     * Get all data request respond
     */
    public function allRespondRequest()
    {
        $allresponds = Buyingrequest::where('status','respond');

        // if role user buyer get by email 
        if (Auth::user()->role == 'buyer'){
            $allresponds = $allresponds->where('email',Auth::user()->email);
        }

        $allresponds = $allresponds->get();
        return view('responds.allresponds', compact('allresponds'));
    }            

    /**
     * Get detail respond request by request_id
     */
    public function showRespondRequest($id)
    {
        $respond = Managerequest::where('request_id',$id)->first();
        return view('responds.showresponds', compact('respond'));
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
        $request['status'] = 'respond'; // ubah status request menjadi responded
        $request->save();

        $data['status'] = 'pending'; // set default status penawaran     
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
        return view('responds.message');     
    }    

    /**
     * Approved respond from buyer
     */
    public function approvedReSpondRequest($id)
    {
        $respond = Managerequest::findOrFail($id);
        $request = Buyingrequest::findOrFail($respond['request_id']);

        $respond['status'] = 'approved'; // set status penawaran menjadi approved
        $request['status'] = 'approved'; // set status penawaran menjadi approved        
        $respond->save();
        $request->save();        
        session()->flash('msg','Negosiasi berhasil di setujui');        
        return redirect()->to('/all-request');        
    }        

    /**
     * Get all data respond approved
     */
    public function allRequestApproved()
    {
        $allresponds = Managerequest::where('status','approved');

        // if role user buyer get by email 
        if (Auth::user()->role == 'buyer'){
            // $allresponds = $allresponds->where('email',Auth::user()->email);
            return redirect()->to('/all-request');        
        }

        $allresponds = $allresponds->get();
        return view('responds.allapprovedresponds', compact('allresponds'));
    }     

    /**
     * Get all data request approved
     */
    public function allRespondApproved()
    {
        $allapproved = Buyingrequest::where('status','approved');

        // if role user buyer get by email 
        if (Auth::user()->role == 'buyer'){
            $allapproved = $allapproved->where('email',Auth::user()->email);
        }

        $allapproved = $allapproved->get();
        return view('responds.allapproved', compact('allapproved'));
    }               
}
