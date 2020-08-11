<?php

namespace App\Http\Controllers;

use App\User;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use eloquentFilter\QueryFilter\ModelFilters\ModelFilters;


class UserController extends Controller
{
    /**
     * Return the current user data.
     *
     * @param Request $request
     * @return \App\User
     */
    public function me(Request $request)
    {
        return $request->user();
    }

    /**
     * Authenticate the r
     *
     * @param Request $request
     * @return void
     */
    // public function login(Request $request)
    // {
    //     $this->validate($request, [
    //         'email' => ['required', 'email'],
    //         'password' => ['required', 'string'],
    //     ]);

    //     /** @var \App\User|null */
    //     $user = User::where(['email' => $request->input('email')])->first();
    //     if (!$user || !Hash::check($request->input('password'), $user->password)) {
    //         return response()->json(['message' => trans('auth.failed')], 422);
    //     }

    //     if (Hash::needsRehash($user->password)) {
    //         $user->update(['password' => Hash::make($request->input('password'))]);
    //     }

    //     return $user;
    // }

    /**
     * Register new user.
     *
     * @param Request $request
     * @return void
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'lastName' => ['required', 'string', 'max:100'],
            'firstName' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:150', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = $this->create($request->all());

        return response()->json($user, 201);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->user()
            ->forceFill(['api_token' => Str::random(80),])
            ->save();
    }

    /**
     * Create a new user instance after successful validation.
     *
     * @param array $data
     * @return User
     */
    protected function create(array $data): User
    {
        return User::create([
            'first_name' => $data['firstName'],
            'last_name' => $data['lastName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'api_token' => Str::random(80),
        ]);
    }

    public function index(){
    //    return EloquentFilter::filterRequests('name')->paginate();
        return User::paginate(20);
    }

    public function list(Request $request){
        $sortBy = 'id';
        $orderBy = 'desc';
        $perPage = 10;
        $q = null;

        if ($request->has('orderBy')) $orderBy = $request->query('orderBy');
        if ($request->has('sortBy')) $sortBy = $request->query('sortBy');
        if ($request->has('perPage')) $perPage = $request->query('perPage');
        if ($request->has('q')) $q = $request->query('q');

        $users = new User();
        $users = $users->search($q)->orderBy($sortBy, $orderBy)->paginate($perPage);


        return $users;
    }

}
