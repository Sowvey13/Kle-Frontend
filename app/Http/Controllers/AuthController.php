<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{

    protected $ApiUrl;

    public function __construct() { 
    $this->ApiUrl = env('API_URL'); 
    }
    public function index(Request $request)
    {
        
        $token = $request->session()->get("token");
        $response = Http::withToken($token)->get($this->ApiUrl .'index', $request->all());
        $product = $response->json();
        if(isset($product["status"]) && $product["status"]== "success"){
            return view('home'); 
        }else{
            // session()->forgot("token");
            return view("login_error");
        }
    }

    public function login() {
        return view("login");
    }

    public function registration() {
        return view("registration");
    }

    public function loginPost(Request $request) {
       
    
        $response = Http::post($this->ApiUrl, [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);
        $responseData = $response->json();
         if($response->status()===422){
            return redirect()->back()->withErrors($responseData["errors"])->withInput();
         }
        if ($response->successful() && isset($responseData['status']) && $responseData['status'] === 'success') {
            session(['user' => $responseData['user']]);
            session(['token' => $responseData['token']]);
            session(['username' => $responseData['user']['name']]);
           
            return redirect()->route('index')->with('success', 'Başarılı bir şekilde giriş yaptınız.');
        } else {
            return back()->withErrors(['email' => $responseData['message'] ?? 'Giriş yaparken bir hata oluştu, lütfen tekrar deneyiniz.']);
        }
    }
    
    

    public function registrationPost(Request $request) {
        
     
        $response = Http::post($this->ApiUrl . 'registration', [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'password_confirmation' => $request->input('password_confirmation')
        ]);
    
     
        $data = $response->json();
            if ($response->status() === 422) {
                
                return back()->withErrors($data['errors'])->withInput();
            }
            if (isset($data['status']) && $data['status'] === 'success') {
               return redirect()->route('login')->with('success', $data['message']);
            } else {
                $errors = isset($data['error']) ? $data['error'] : ['Email Kayıtlı değil'];
                return redirect()->back()->withErrors($errors)->withInput();
            }
    }
    

    public function logout(Request $request) {
        $token = session('token');
        $request->session()->forget('token');
        if ($token) {
            $response = Http::withToken($token)->post($this->ApiUrl. 'logout');
            $data = $response->json();
            
        }
        return redirect()->route('login')->with('success', $data['message']??'Giriş yapılan bir hesap bulunamadı .');
        
       
    }
}
