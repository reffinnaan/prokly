<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Gambar;
use Validator;
use Session;
use Auth;
use User;
use File;

class DataController extends Controller
{
    //
	public function index(Request $request){
		if($this->cekSessionLogin($request)){
			return redirect('/data/data');
		}else{
			return view('login');
		}
	}
	public function cekSessionLogin(Request $request){
		return $request->session()->has('sudahlogin');
	}
	public function logout(Request $request){
		$request-session()->forget('sudahlogin');
		return redirect('/data');
	}
	/*function auth(Request $request)
	{
		$this->validate($request, [
			'email'		=>		'required|email',
			'password'	=>		'required|alphaNum|min:3'
		]);
		
		$user_data = array(
			'email'		=>	$request->input('email'),
			'password'	=>	$request->input('password')
		);
		
		if(Auth::attempt($user_data))
		{
			return redirect('data/data');
		}
		else
		{
			return back()->with('errors', 'Wrong Login Details');
		}
	}*/
	public function auth(Request $request){
		$email=$request->email;
		$pass=$request->password;
		$hasil= DB::select("select * from usr where  email=? and pswrd=?",[$email,$pass]);
		//print_r($hasil);
		if(count($hasil)){
			$data=DB::table('usr')->get();
			$request->session()->put('sudahlogin','1');
			return view('data',['data'=>$data]);
		}else{
			return redirect('/data');	
			//return back()->with('errors', 'Wrong Login Details');
		}
	}
	public function data(Request $request){
		if(!$this->cekSessionLogin($request)){
			return view('login');
		}else{
			$data=DB::table('usr')->get();
			return view('data',['data'=>$data]);
		}
	}
	public function tambah(Request $request){
		if(!$this->cekSessionLogin($request)){
			return view('login');
		}else{
			return view('tambah');
		}
	}
	public function stored(Request $request){
		if(!$this->cekSessionLogin($request)){
			return view('login');
		}else{
			$in=1;
			$file = $request->file('file');
			$nm=$request->nama."-".date("dmYhis").".txt";
			$fp=fopen('data_fl/'.$nm,'w');
			$sp=",";
			$cg=$request->nama.$sp.
				$request->password.$sp.
				$request->email.$sp.
				$request->dateofbirth.$sp.
				$request->notelp.$sp.
				$request->gender;
			if($file!==null){
				$nama_file = time()."_".$file->getClientOriginalName();
				$dest = 'data_img';
				$file->move($dest,$nama_file);
				DB::table('usr')->insert([
				'nama'			=> $request->nama,
				'pswrd'			=> $request->password,
				'email'			=> $request->email,
				'dateofbirth'	=> $request->dateofbirth,
				'notelp'		=> $request->notelp,
				'gen'		=> $request->gender,
				'namefile'	=> $request->nama."-".date("dmYhis"),
				'inputter'	=> $in,
				'foto'		=> $nama_file
				]);
				$ch=$cg.$sp.$nama_file;
				fwrite($fp,$ch);
				fclose($fp);
				Session::flash('sukses','Data Member Telah Disimpan');
				return redirect('/data/data');
			}else{
				DB::table('usr')->insert([
				'nama'			=> $request->nama,
				'pswrd'			=> $request->password,
				'email'			=> $request->email,
				'dateofbirth'	=> $request->dateofbirth,
				'notelp'		=> $request->notelp,
				'gen'		=> $request->gender,
				'namefile'	=> $request->nama."-".date("dmYhis"),
				'inputter'	=> $in
				]);
				fwrite($fp,$cg);
				fclose($fp);
				Session::flash('sukses','Data Member Telah Disimpan');
				return redirect('/data/data');
			}
		}
	}
	public function edit($id,Request $request){
		if(!$this->cekSessionLogin($request)){
			return view('login');
		}else{
			$data=Gambar::where('uid',$id)->get();
			return view('update',['data'=>$data]);
		}
	}
	public function updated(Request $request){
		if(!$this->cekSessionLogin($request)){
			return view('login');
		}else{
			$in=1;
			$file = $request->file('file');
			$nm=$request->namefile;
			$sp=",";
			$cg=$request->nama.$sp.
			$request->password.$sp.
			$request->email.$sp.
			$request->dateofbirth.$sp.
			$request->notelp.$sp.
			$request->gender;
			$ch=$request->img;
			unlink('data_fl/'.$nm.".txt");
			$fp=fopen('data_fl/'.$nm.".txt",'w');
			if($file!==null){
				File::delete('data_img/'.$ch);
				$nama_file = time()."_".$file->getClientOriginalName();
				$dest = 'data_img';
				$file->move($dest,$nama_file);
				$ch=$cg.$sp.$nama_file;
				fwrite($fp,$ch);
				fclose($fp);
				DB::table('usr')->where('uid',$request->id)->update([
				'nama' 			=> $request->nama,
				'pswrd'			=> $request->password,
				'email'			=> $request->email,
				'dateofbirth'	=> $request->dateofbirth,
				'notelp'		=> $request->notelp,
				'gen'			=> $request->gender,
				'inputter'		=> $in,
				'foto'			=> $nama_file
				]);
				Session::flash('update','Data Member Telah Diubah');
				return redirect('/data/data');
			}else{
				fwrite($fp,$cg);
				fclose($fp);
				DB::table('usr')->where('uid',$request->id)->update([
				'nama' 			=> $request->nama,
				'pswrd'			=> $request->password,
				'email'			=> $request->email,
				'dateofbirth'	=> $request->dateofbirth,
				'notelp'		=> $request->notelp,
				'gen'			=> $request->gender,
				'inputter'		=> $in
				]);
				Session::flash('update','Data Member Telah Diubah');
				return redirect('/data/data');
			}
		}
	}
	public function hapus($id,Request $request){
		if(!$this->cekSessionLogin($request)){
			return view('login');
		}else{
			$gambar=Gambar::where('uid',$id)->first();
			File::delete('data_img/'.$gambar->foto);
			unlink(public_path('data_fl/'.$gambar->namefile.".txt"));
			Gambar::where('uid',$id)->delete();
			Session::flash('delete','Data Member Telah Dihapus');
			return redirect('/data/data');
		}
	}
}
