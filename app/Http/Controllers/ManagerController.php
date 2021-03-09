<?php

namespace App\Http\Controllers;

use App\manager;
use Illuminate\Http\Request;
use App;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manager = App\manager::paginate(3);
        return view('content',compact('manager'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $values =  new manager;
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'address' => 'required',
            'password' => 'required',
        ]);
        $values->username = $request->username;
        $values->name = $request->name;
        $values->address = $request->address;
        $values->password = $request->password;
        $values->save();
        return back()->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $values = App\manager::findOrFail($id);
        return view('edit', compact('values'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $values = App\manager::findOrFail($id);
        $values->name = $request->name;
        $values->address = $request->address;
        $values->save();
        return back()->with('update', 'Sửa thành công');     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $values = App\manager::findOrFail($id);
        $values->delete();
        return back()->with('delete', 'Xóa thành công');
    }
}
