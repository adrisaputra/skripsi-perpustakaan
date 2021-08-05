<?php

namespace App\Http\Controllers;

use App\Models\User;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
     ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
		$user = DB::table('users')->orderBy('id','DESC')->paginate(20);
    	
		// $group = Auth::user()->group;
		// if($group !=1 ){
			// return redirect('/home');
		// } else {
			return view('admin.user.index',compact('user'));
		// }
    }
	
	## Tampilkan Data Search
	public function search(Request $request)
    {
        $user = $request->get('search');
		
		$user = User::where('name', 'LIKE', '%'.$user.'%')->orderBy('id','DESC')->paginate(20);
	
		// $group = Auth::user()->group;
		// if($group !=1 ){
			// return redirect('/home');
		// } else {
			return view('admin.user.index',compact('user'));
		// }
		
    }
	
	## Tampilkan Form Create
	public function create()
    {
        $view=view('admin.user.create');
        $view=$view->render();
        return $view;
    }
	
	## Simpan Data
	public function store(Request $request)
    {
		$this->validate($request, [
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:8|confirmed'
			
		]);
		
		$input['name'] = $request->name;
		$input['email'] = $request->email;
		$input['password'] = Hash::make($request->password);
		$input['group'] = 2;
		$input['status'] = 1;
		
        	User::create($input);
		
		return redirect('/user')->with('status','Data Tersimpan');

    }
	
	## Tampilkan Form Edit
    public function edit(User $user)
    {
        $view=view('admin.user.edit', compact('user'));
        $view=$view->render();
		
		$id = Auth::user()->id;
		if($id !=1 ){
			return redirect('/home');
		} else {
			return $view;
		}
       
    }
	
	## Edit Data
    public function update(Request $request, User $user)
    {
		if($request->password){
			$this->validate($request, [
				'name' => 'required|string|max:255',
				'password' => 'required|string|min:8|confirmed',
				'status' => 'required'
			]);
		} else if($request->group !=3){
			$this->validate($request, [
				'name' => 'required|string|max:255',
				'password' => 'required|string|min:8|confirmed',
				'status' => 'required'
			]);
		} else {
			$this->validate($request, [
				'name' => 'required|string|max:255',
				'status' => 'required'
			]);
		}
         

		$user->fill($request->all());
		if($request->password){
			$user->password = Hash::make($request->password);
		}
    		$user->save();
		
		$group = Auth::user()->group;
		if($group !=1 ){
			return redirect('/home');
		} else {
			return redirect('/user')->with('status', 'Data Berhasil Diubah');
		}
		
    }

    ## Hapus Data
    public function delete(User $user)
    {
        $id = $user->id;
		$user->delete();
		
		$group = Auth::user()->group;
		if($group !=1 ){
			return redirect('/home');
		} else {
			return redirect('/user')->with('status', 'Data Berhasil Dihapus');
		}
        
    }

    ## Tampilkan Form Edit
    public function edit_profil(User $user)
    {
        $title = "PROFIL";
        $view=view('admin.user.profil', compact('user','title'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update_profil(Request $request, User $user)
    {
        if($request->get('current-password')){
            if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
                $this->validate($request, [
                    'email' => 'required|email',
                    'foto' => 'mimes:jpg,jpeg,png|max:300',
                    'current-password' => 'string|confirmed'
                ]);
            } 
        }
            
        if($request->get('password')){
            if(!(strcmp($request->get('password'), $request->get('password_confirmation'))) == 0){
                if($request->password){
                    $this->validate($request, [
                        'email' => 'required|email',
                        'password' => 'string|min:8|confirmed'
                    ]);
                }
            } 
        }

        if($request->password){
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:8'
            ]);
        } else {
            $this->validate($request, [
                'email' => 'required|email'
            ]);
        }

        $user->fill($request->all());
        if($request->password){
            $user->password = Hash::make($request->password);
        } else {
            $cek_user = User::where('id', Auth::user()->id)->get();
            $cek_user->toArray();
            $user->password = $cek_user[0]->password;
        }
        
        if($request->file('foto') == ""){}
        else
        {	
            $filename = time().'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('upload/foto'), $filename);
            $user->foto = $filename;
        }
        
        $user->save();
        
        return redirect('/user/edit_profil/1')->with('status', 'Data Berhasil Diubah');
    }
}
