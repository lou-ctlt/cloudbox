<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use Redirect;
use App\Box;
use App\File;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $boxes = Box::where('user_id', '=', $userId)->get();

        return view('home')->with('boxes', $boxes);
    }

    /**
     * fonctions pour afficher les différentes vues
     * 
     *                                                  VUES DES BOXES
     */
    public function showSingleBox (Request $request)
    {
        $boxId = $request->boxid;
        $boxes = Box::where('id', '=', $boxId)->get();
        $files = File::where('box_id', '=', $boxId)->get();

        return view('user.singlebox')->with('files', $files)->with('boxes', $boxes);
    }
                                                    // FORMULAIRE D'AJOUT
    public function boxForm ()
    {
        return view('user.boxForm');
    }
                                                    // FONCTION D'AJOUT
    public function newBox (Request $request)
    {
        $values = $request->all();

        $rules = [
            'name' => 'string|required',
            'description' => 'string|max:255'
        ];

        $validator = Validator::make($values, $rules, [
            'name.required' => 'Veuillez donner un nom à votre boite',
            'name.string' => 'Le nom doit être une chaîne de caractères',
            'description.string' => 'La description doit être une chaîne de caractères',
        ]);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInputs();
        }

        $box = new Box();

        $boxId = $request->boxid;
        $boxes = Box::where('id', '=', $boxId)->get();
        $nb_files = File::where('box_id', '=', $boxId)->count();

        $box->user_id = Auth::user()->id;
        $box->name = $values['name'];
        $box->description = $values['description'];
        $box->nb_files = $nb_files;

        $box->save();

        return redirect()->route('home')->with('successMessage', 'Nouvelle boite créée !');
    }
                                                // FORMULAIRE DE MODIFICATION
    public function updateBoxForm (Request $request)
    {
        $boxId = $request->boxid;
        $boxes = Box::where('id', '=', $boxId)->get();
        
        return view('user.updateBoxForm')->with('boxes', $boxes);
    }
                                                // FONCTION DE MODIFICATION
    public function updateBox (Request $request)
    {
        $boxes = Box::where('user_id', '=', Auth::user()->id);

        $values = $request->all();

        $rules = [
            'name' => 'string|required',
            'description' => 'string|max:255'
        ];

        $validator = Validator::make($values, $rules, [
            'name.required' => 'Veuillez donner un nom à votre boite',
            'name.string' => 'Le nom doit être une chaîne de caractères',
            'description.string' => 'La description doit être une chaîne de caractères',
        ]);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInputs();
        }

        $box = Box::where("id", "=", $values['id'])->update([
            "name" => $values['name'],
            "description" => $values['description']
        ]);

        return redirect()->route('home');
    }
                                                // FONCTION DE SUPPRESSION
    public function deleteBox (Request $request)
    {
        $boxId = $request->boxid;
        $boxes = Box::where('id', '=', $boxId)->get();

        DB::table('files')->where('box_id', '=', $boxId)->delete();
        DB::table('boxes')->where('id', '=', $boxId)->delete();
                                            
        return redirect()->back();
    }









    /**
     * fonctions pour afficher les différentes vues
     * 
     *                                                  VUES DES FICHIERS
     */

                                                    // FORMULAIRE D'AJOUT
    public function fileForm (Request $request)
    {
        $boxId = $request->boxid;
        return view('user.fileForm')->with('box_id', $boxId);
    }
                                                    // FONCTION D'AJOUT
    public function newFile (Request $request)
    {
        $values = $request->all();

        $box = Box::where('id', '=', $values['box_id']);

        $rules = [
            'name' => 'string|required',
            'description' => 'string|max:255',
            'file_path' => 'mimes:jpeg,png,jpg,gif,pdf|max:1080'
        ];
        
        $validator = Validator::make($values, $rules, [
            'name.required' => 'Veuillez donner un nom à votre boite',
            'name.string' => 'Le nom doit être une chaîne de caractères',
            'description.string' => 'La description doit être une chaîne de caractères',
            'file_path.mimes' =>'L\'extension du fichier est incorrecte',
            'file_path.max' =>'La taille du fichier est trop importante',
        ]);
        
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInputs();
        }
       
        $filePath = $request->file('file_path');
        $filePathSaveAsName = time() . "." . $filePath->getClientOriginalExtension();

        $destinationFilePath = storage_path('/app/public/box');
        $filePath->move($destinationFilePath, $filePathSaveAsName);

        $file = new File();

        $file->box_id = $values['box_id'];
        $file->user_id = Auth::user()->id;
        $file->name = $values['name'];
        $file->description = $values['description'];
        $file->file_path = $filePathSaveAsName;
        $file->extension = $filePath->getClientOriginalExtension();

        $file->save();

        return redirect()->back();
    }
                                                // FORMULAIRE DE MODIFICATION
    public function updateFileForm (Request $request)
    {
        $fileId = $request->fileid;
        $files = File::where('id', '=', $fileId)->get();
        return view('user.updateFileForm')->with('files', $files);
    }

                                                // FONCTION DE MODIFICATION
    public function updateFile (Request $request)
    {
        $values = $request->all();
        
        $rules = [
            'name' => 'string|required',
            'description' => 'string|max:255',
            'file_path' => 'mimes:jpeg,png,jpg,gif,pdf|max:1080'
        ];
        
        $validator = Validator::make($values, $rules, [
            'name.required' => 'Veuillez donner un nom à votre boite',
            'name.string' => 'Le nom doit être une chaîne de caractères',
            'description.string' => 'La description doit être une chaîne de caractères',
            'file_path.mimes' =>'L\'extension du fichier est incorrecte',
            'file_path.max' =>'La taille du fichier est trop importante',
        ]);
        
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInputs();
        }
        
        if($_FILES["file_path"]["error"] == 0){
            $filePath = $request->file('file_path');
            $filePathSaveAsName = time() . "." . $filePath->getClientOriginalExtension();
    
            $destinationFilePath = storage_path('/app/public/box');
            $filePath->move($destinationFilePath, $filePathSaveAsName);

            $file = File::where('id', '=', $values['id'])->update([
                "file_path" => $filePathSaveAsName,
                "extension" => $filePath->getClientOriginalExtension()
            ]);
        };

        $file = File::where('id', '=', $values['id'])->update([
            "name" => $values['name'],
            "description" => $values['description']
        ]);

        return redirect()->back();
    }

                                                // FONCTION DE SUPPRESSION
    public function deleteFile (Request $request)
    {
        $boxId = $request->boxid;
        $boxes = Box::where('id', '=', $boxId)->get();
        $files = File::where('box_id', '=', $boxId)->get();

        $fileId = $request->fileid;
        DB::table('files')->where('id', '=', $fileId)->delete();

        return redirect()->back();
    }







    public function showAccount ()
    {
        return view('user.account');
    }
}
