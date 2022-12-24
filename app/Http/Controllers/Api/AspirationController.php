<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Aspiration;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AspirationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $aspirations = Aspiration::orderBy('created_at', 'DESC')->get();

        return response()->json([

            "status" => true,
            "message" => "data Book",
            "data" => $aspirations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payload = $request->all();

        $validator = Validator::make($payload, [
            'name'      => 'required|max:50',
            'email'     => 'required|email|max:50',
            'telephone'  => 'required|max:15',
            'address'      => 'required',
            'photo' => 'image|file'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = $photo->hashName();
            $photo->storeAs('photo', $filename);
            $payload['photo'] = $request->getSchemeAndHttpHost() . "/storage/photo/" . $filename;
        }

        $aspiration = Aspiration::create($payload);
        return response()->json([
            'status' => true,
            'message' => 'insert data Book success',
            'data' => $aspiration
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aspiration  $aspiration
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aspiration = Aspiration::find($id);
        return response()->json([
            'status' => true,
            'message' => 'show data buku',
            'data' => $aspiration
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aspiration  $aspiration
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD


=======
<<<<<<< HEAD
>>>>>>> 088ab00 ((+)menambahkan fitur update di controller)
    function update(Request $request, $id)
=======
    public function update(Request $request, $id)
>>>>>>> cba8ab0 ((+)menambahkan fitur update di controller)
    {
        $status = Aspiration::find($id);

        $status->fill($request->all());
        $status->save();

        return response()->json([
            'status' => true,
            'message' => 'berhasil update',

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aspiration  $aspiration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aspiration $aspiration)
    {
        //
    }
}
