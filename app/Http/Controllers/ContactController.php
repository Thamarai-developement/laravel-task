<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::latest()->paginate(5);
        return view('contact.contactList',compact('contacts'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::get();
        $client =  new \GuzzleHttp\Client();
        $request = $client->get('https://restcountries.com/v3.1/all');// Url of your choosing
        $response = $request->getBody()->getContents();
        $country_codes=json_decode($response);

        return view('contact.contactCreate',compact('country_codes','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'country_code' => 'required',
            'number'=>'required|numeric|digits:9'
        ]);

        $data = New Contact;
        $data->user_id = $request->user_id;
        $data->country_code = $request->country_code; 
        $data->number = $request->number; 
        $data->save();
        return redirect('contact/list')->with('success','Contact created successfully.');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact, $id)
    {
        $contact=Contact::with('user_detail')->where('id',$id)->first();
        return view('contact.contactShow',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact, $id)
    {
        $users=User::get();
        $contact=Contact::find($id);
        $client =  new \GuzzleHttp\Client();
        $request = $client->get('https://restcountries.com/v3.1/all');// Url of your choosing
        $response = $request->getBody()->getContents();
        $country_codes=json_decode($response);

        return view('contact.contactEdit',compact('contact','users','country_codes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'user_id' => 'required',
            'country_code' => 'required',
            'number'=>'required|numeric|digits:9'
        ]);

        $data = Contact::find($request->id);
        $data->user_id = $request->user_id;
        $data->country_code = $request->country_code;  
        $data->save();
        return  redirect('/contact/list')->with('success', 'Contact has updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact, $id)
    {
        $data = Contact::find($id);
        $data->delete();
        return redirect('/contact/list')->with('success', 'Deleted successfully'); 
    }
}
