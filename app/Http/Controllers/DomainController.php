<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Stancl\Tenancy\Database\Models\Domain;

class DomainController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $domains = Domain::all();
        return view( 'dashboard', ['domains' => $domains] );
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
        $validate = $request->validate( [
            'domain' => 'required|alpha:ascii',
        ] );

        $tenant1 = Tenant::create(['id' => $validate['domain']]);
        $tenant1->domains()->create(['domain' => $validate['domain'] . '.localhost']);

        $tenant1->run(function () {
            Artisan::call('create:roles');
        });
        return back()->with(['msg' => "Domain Create Successfully"]);
    }

    /**
     * Display the specified resource.
     */
    public function show( string $id ) {

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
        Domain::destroy( $id );
        return back()->with( ['msg' => 'Domain Delete Successfully'] );
    }

}
