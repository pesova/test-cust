<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cookie;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $url = env('API_URL', 'https://dev.api.customerpay.me'). '/store/all';

        try {
            $client = new Client;
            $payload = ['headers' => ['x-access-token' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwaG9uZV9udW1iZXIiOjIzNDgxMjYyMzM0MTEsImVtYWlsIjoicGVzb3ZhMTQxMUBnbWFpbC5jb20iLCJwYXNzd29yZCI6InBhc3MxMjMiLCJpc19hY3RpdmUiOmZhbHNlLCJ1c2VyX3JvbGUiOiJzdG9yZV9hZG1pbiIsImlhdCI6MTU5MzU2NTM4OSwiZXhwIjoxNTkzNTY4OTg5fQ.qiLPWeUjv27o-iPM-52wVYCwWUm9OH52p2glcnXBgqs']];
            $response = $client->request("GET", $url, $payload);
            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();
            $Stores = json_decode($body);

            if ( $statusCode == 200 ) {
                return view('backend.stores.store_list')->with('response', $Stores);
            } else {
                return view('errors.500');
            }
        }
        catch (\Exception $e) {
            return view('errors.500');           
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
