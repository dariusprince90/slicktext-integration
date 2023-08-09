<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ApiController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;


    public function apiwork()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.slicktext.com/v1/contacts',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic cHViXzNmNjNkNjk3MGU1NGQ3ZjExOThlZTc3OWE1OWY1MmQ1OjAxNWVkYTY0NWFiOTJiODNmNmYxMTAxODVmZGJmYmYy'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
      $contact_data = json_decode($response);

      $all_contacts = $contact_data->contacts;
        return view ('apiwork',compact('all_contacts'));

    }


    public function destroy($id)
    {
        $curl = curl_init();

      

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.slicktext.com/v1/contacts/'.$id.'',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => array('action' => 'DELETE','textword' => '3737622'),
          CURLOPT_HTTPHEADER => array(
            'Authorization: Basic cHViXzNmNjNkNjk3MGU1NGQ3ZjExOThlZTc3OWE1OWY1MmQ1OjAxNWVkYTY0NWFiOTJiODNmNmYxMTAxODVmZGJmYmYy'
          ),
        ));

        // echo "<pre>";
        // print_r('hello');
        // die();
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;

        return redirect()->back()->with('success', 'Contact deleted successfully.');
    }


    public function apidataform()
    {
        // You can add any necessary logic here before loading the view
        return view('apidataform');
    }


    public function saveContact(Request $request)
    {
        
        $data = $request->all();
       
        
        $apiData = [
            'action' => 'OPTIN',
            'textword' => '3737622', 
            'number' => $data['number'], 
            'firstName' => $data['first_name'], 
            'lastName' => $data['last_name'], 
            'email' => $data['email'], 
            'city' => $data['city'], 
            'state' => $data['state'], 
            'zipcode' => $data['zipcode'], 
            'country' => $data['country'], 
            'subscribed_date' => $data['subscribed_date'], 
            
            
            
            
        ];


        $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.slicktext.com/v1/contacts',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $apiData,
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic cHViXzNmNjNkNjk3MGU1NGQ3ZjExOThlZTc3OWE1OWY1MmQ1OjAxNWVkYTY0NWFiOTJiODNmNmYxMTAxODVmZGJmYmYy'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;




       

       
        return redirect()->route('apiwork')->with('success', 'Data saved successfully.');
    }




}