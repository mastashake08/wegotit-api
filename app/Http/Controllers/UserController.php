<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notifications\NewAccount;
use Illuminate\Support\Facades\Auth;
use Validator;

use App\Http\Resources\UserResource;

class UserController extends Controller
{

  /**
       * login api
       *
       * @return \Illuminate\Http\Response
       */
      public function login(Request $request){
              $http = new \GuzzleHttp\Client;
              $response = $http->post(env('APP_URL').'/oauth/token', [
                  'form_params' => [
                      'grant_type' => 'password',
                      'client_id' => env('PASSPORT_CLIENT_ID'),
                      'client_secret' => env('PASSPORT_CLIENT_SECRET'),
                      'username' => $request->input('email'),
                      'password' => $request->input('password'),
                      'scope' => '',
                  ],
              ]);
            return json_decode((string) $response->getBody(), true);
        }

  /**
       * Register api
       *
       * @return \Illuminate\Http\Response
       */
      public function register(Request $request)
      {
          $validator = Validator::make($request->all(), [
              'name' => 'required|min:3',
              'email' => 'required|email|unique:users',
              'password' => 'required|min:6',
              'c_password' => 'required|same:password'
          ]);
          if ($validator->fails()) {

              return response()->json(['error'=>$validator->errors()], 401);
          }

          $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_customer' =>  true,
          ]);
          $http = new \GuzzleHttp\Client;
          $response = $http->post(env('APP_URL').'/oauth/token', [
              'form_params' => [
                  'grant_type' => 'password',
                  'client_id' => env('PASSPORT_CLIENT_ID'),
                  'client_secret' => env('PASSPORT_CLIENT_SECRET'),
                  'username' => $user->email,
                  'password' => $request->password,
                  'scope' => '',
              ],
          ]);
        return json_decode((string) $response->getBody(), true);
      }

  /**
       * details api
       *
       * @return \Illuminate\Http\Response
       */
      public function details()
      {
          return response()->json(['user' => auth()->user()], 200);
      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show(Request $request,$id)
    {
        //

        $user= User::findOrFail($id);
        return response()->json(new UserResource($user));
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
    public function update(Request $request)
    {
        //

        $user= $request->user();
        $user->fill($request->all());
        $user->save();
        return response()->json(new UserResource($user));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //

        $user= $request->user();
        return response()->json($user->delete());
    }

    public function settings(Request $request){
      $user = $request->user();
      $user->email = $request->email;
      $user->name = $request->name;

      $user->save();
      return response()->json(new \App\Http\Resources\UserResource($user));
    }

    public function changeStatus(Request $request){
      $user = $request->user();
      $user->status = $request->status;
      $user->save();
      return response()->json(new UserResource($user));
    }
  }
