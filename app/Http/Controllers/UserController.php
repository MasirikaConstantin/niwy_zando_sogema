<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->orderBy('nom', "ASC")->get();
        $users_count = $users->count();
        return view('pages.users.index', compact('users', 'users_count'));
    }

    public function create()
    {
        if(Auth::user()->role->name == "Super Admin")
        {
            $roles = Role::get();
            return view('pages.users.create', compact('roles'));
        }else{
            toastr()->error($this->messagePermission);
            // return $this->messagePermission;
            return back();
        }
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|unique:users|email',
            'sexe' => 'required',
            'role_id' => 'required|exists:roles,id',
        ]);
               
        try {
            $user = new User;
            $user->username = $request->email;
            $user->email = $request->email;
            $user->nom = $request->nom;
            $user->postnom = $request->postnom;
            $user->prenom = $request->prenom;
            $user->sexe = $request->sexe;
            $user->role_id = $request->role_id;
            $role = Role::find($request->role_id);
            if($role != null){
                $user->name = $role->name;
            }
            $filename = '';
            if ($request->hasfile('uploadImg')) {
                $extension = request('uploadImg')->getClientOriginalExtension();
                $file_title = Treatement::slug_title($request->nom) . "_" . Treatement::slug_title($request->prenom) . '_' . time() . '.' . $extension;
                $filename = $request->uploadImg->storeAs('profiles', $file_title);
            }
            $user->avatar = $filename;
            $user->password = Hash::make('1234');
            $user->save();

            if ($user) {
                return redirect('user/create')->with('success', "User créer avec success! Username pour la connexion $user->email, mot de passe par defaut 1234");
            } else {
                return redirect('user/create')->with('error', 'Erreur lors de la creationr! essayer a nouveau');
            }
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    public function edit($id)
    {
        try {
            $user = User::find($id);
            if($user == null){
                toastr()->error("Impossible de traiter cette requête", "Vendeur");
                return back();
            }
            $roles = Role::get();
            return view('pages.users.edit', compact('user','roles'));
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    public function update(Request $request, $idUser)
    {
        
        $validator = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            //'email' => 'required|unique:users|email',
            'sexe' => 'required',
            'role_id' => 'required|exists:roles,id',
        ]);
               
        try {
            //$user = new User;
            $user = User::find($idUser);
            if($user == null)
            {
                toastr()->error("Impossible de traiter cette requête", "Vendeur");
                return back();
            }
            $user->username = $request->email;
            $user->email = $request->email;
            $user->nom = $request->nom;
            $user->postnom = $request->postnom;
            $user->prenom = $request->prenom;
            $user->sexe = $request->sexe;
            $user->role_id = $request->role_id;
            $role = Role::find($request->role_id);
            if($role != null){
                $user->name = $role->name;
            }
            //$user->password = Hash::make('1234');
            $filename = '';
            if ($request->hasfile('uploadImg')) {
                if(File::exists(public_path('uploaded_files/'.$user->avatar))){
                    File::delete(public_path('uploaded_files/'.$user->avatar));
                }
                $extension = request('uploadImg')->getClientOriginalExtension();
                $file_title = Treatement::slug_title($request->nom) . "_" . Treatement::slug_title($request->prenom) . '_' . time() . '.' . $extension;
                $filename = $request->uploadImg->storeAs('profiles', $file_title);
            }
            $user->avatar = $filename;
            $user->save();

            if ($user) {
                return back()->with('success', "User modifié avec success!");
            } else {
                return back()->with('error', 'Erreur lors de la modification! essayer a nouveau');
            }
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    public function userStatus($id){
        $user = User::find($id);
        if($user == null)
        {
            toastr()->error("Impossible de traiter cette requête", "Vendeur");
            return back();
        }
        if($user != null){
          // return $user->status;
            if($user->status == 1){
                // $user->update(['status'=> '0']);
                $user->status = 0;
            }else{
                //$user->update(['status'=> '1']);
                $user->status = 1;
            }

            if ($user->save()) {
                return back()->with('success', "Status Modifié avec success");
            } else {
                return back()->with('error', 'Erreur lors de la Modification! essayer a nouveau');
            }
        }{
            return 'User Introuvable';
        }
    }

    public function monCompte($idUser)
    {
        $user = User::find($idUser);
        if($user == null)
        {
            toastr()->error("Impossible de traiter cette requête", "Vendeur");
            return back();
        }
        return view('pages.users.profile', compact('user'));
        return $idUser;
    }

    public function monCompteUpdate(Request $request,$idUser)
    {
        $validator = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            //'email' => 'required|unique:users|email',
            'sexe' => 'required',
        ]);
               
        try {
            //$user = new User;
            $user = User::find($idUser);
            if($user == null)
            {
                toastr()->error("Impossible de traiter cette requête", "Vendeur");
                return back();
            }

            if($user->email != $request->email){
                $request->validate([
                    'email' => 'required|unique:users|email',
                ]);
            }

            $filename = '';
            if ($request->hasfile('uploadImg')) {
                if(File::exists(public_path('uploaded_files/'.$user->avatar))){
                    File::delete(public_path('uploaded_files/'.$user->avatar));
                }
                $extension = request('uploadImg')->getClientOriginalExtension();
                $file_title = Treatement::slug_title($request->nom) . "_" . Treatement::slug_title($request->prenom) . '_' . time() . '.' . $extension;
                $filename = $request->uploadImg->storeAs('profiles', $file_title);
            }
            $user->avatar = $filename;

            $user->username = $request->email;
            $user->email = $request->email;
            $user->nom = $request->nom;
            $user->postnom = $request->postnom;
            $user->prenom = $request->prenom;
            $user->sexe = $request->sexe;
            //$user->password = Hash::make('1234');
            $user->save();

            if ($user) {
                return back()->with('success', "profile modifié avec success!");
            } else {
                return back()->with('error', 'Erreur lors de la modification! essayer a nouveau');
            }
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    public function monCompteUpdatePwd(Request $request,$idUser)
    {
        $validator = $request->validate([
            'pwd' => 'required',
            'pwdNouveau' => 'required',
        ]);

        try {
            $user = User::find($idUser);
            if($user == null)
            {
                toastr()->error("Impossible de traiter cette requête", "Vendeur");
                return back();
            }
            if (Hash::check($request->pwd, $user->password)) {
                $user->password = Hash::make($request->pwdNouveau);
                $user->save();
                return back()->with('success', "Mot de passe modifié avec success!");
            }else
            {
                return back()->with('error', 'Erreur lors de la modification du mot de passe! essayer a nouveau'); 
            }
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
        //return $request->all();
    }
}
