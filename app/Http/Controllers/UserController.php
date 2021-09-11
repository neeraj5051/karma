<?php

namespace App\Http\Controllers;

use App\Models\DocumentModel;
use App\Models\UserForm;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use File;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
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
        return  View('createuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_data = array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            // 'email' => $request->email,
            'email' => 'neeraj21@yopmail.com',

            'hobbies' => json_encode($request->hobby)
        );

        $user = UserForm::create($user_data);
        foreach ($request->files as $key => $file) {
            // dump($file);
            $key = $key;
            foreach ($file as $singleFile) {
                // dump($singleFile);
                $document  = new DocumentModel();
                $document->user_id = $user->id;
                $document->document_name = '';
                $filenameWithExt = $singleFile->getClientOriginalName();

                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

                $extension = $singleFile->getClientOriginalExtension();

                $fileNameToStore =  time() . '_' . $filename . '.' . $extension;
                $path = $singleFile->move('public/documents', $fileNameToStore);
                // dump($document);
                $document->document_link = 'public/documents/' . $fileNameToStore;
                $document->save();
            }


            // $user->avatar = $fileNameToStore;
        }

        dd();
        // return $request->all();
        return;
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
