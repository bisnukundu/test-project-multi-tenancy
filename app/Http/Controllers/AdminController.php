<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Stancl\Tenancy\Database\Models\Domain;

class AdminController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $tenancy = Domain::all();
        return view( 'admin', ['tenant' => $tenancy] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $request->validate( [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255'],
            'password' => ['required'],
        ] );
        //    dd($request->tenant);

        $tanent = Tenant::where( 'id', $request->tenant )->first();

        $tanent->run( function () use ( $request ) {
            $admin = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make( $request->password ),
            ]);
            //    $admin->assignRole('admin');
            if ( Role::where( 'name', 'admin' )->exists() ) {
                $admin->assignRole( 'admin' );
            }
        });

        return back()->with( ['msg' => "Admin Create Successfully"] );
    }

    /**
     * Display the specified resource.
     */
    public function show( string $id ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( string $id ) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, string $id ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id ) {
        //
    }
}
