<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['data_users'] = User::role('admin')->get();
        return view('admin.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            User::create([
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'name' => $request->name,
                'phone' => $request->phone,
            ])->assignRole('admin');
        }catch(Exception $e){
            return redirect()->route('user-admin.index')
            ->with('error', 'Gagal Membuat data user admin! Alasan : '. $e->getMessage());
        }

        return redirect()->route('user-admin.index')
        ->with('success', 'Berhasil Membuat Data User Admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['user'] = User::find($id); //2
        return view('admin.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $user -> update([
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        return redirect()->route('user-admin.index')
                ->with('success', 'Berhasil Mengupdate Data User Admin!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();

        return redirect()->route('user-admin.index')
                ->with('success', 'Berhasil Menghapus Data User Admin');
    }
}
