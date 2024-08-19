<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    protected $ApiUrl;

    public function __construct() { 
        $this->ApiUrl = env('API_URL'); 
    }
        public function CreateShow(Request $request){

            $token = $request->session()->get("token");
            $response = Http::withToken($token)->get($this->ApiUrl .'create/show');
            $data = $response->json();

            if(isset($data["status"]) && $data["status"]== "success"){
                return view('products.create'); 
            }else{
                return view("login_error");
            }
        }
        

    
    public function productsAll(Request $request)
    { 
        $token = $request->session()->get("token");
        $response = Http::withToken($token)->get($this->ApiUrl .'products', $request->all());
        $data = $response->json();
        
        
        if(isset($data["status"]) && $data["status"]== "success"&&isset($data['product'])){
            $products=$data['product'];
            return view('products.product', ['products'=> $products]); 
        }else{
            return view("login_error");
        }
        


}
public function create(Request $request)
{
        $token = $request->session()->get("token");
        $response = Http::withToken($token)->post($this->ApiUrl .'products/create', [
            'name' => $request->input('name'),
            'detail' => $request->input('detail'),
            'price' => $request->input('price'),
        ]);
        $product = $response->json();
        if ($response->status() == 422) {
            $errors = $response->json('errors');
            return redirect()->back()->withErrors($errors)->withInput();
        }
    
        if (isset($product['login']) && $product['login'] == 'fail') {
            return view("login_message");
        } 
    
        if ($response->successful() && isset($product['status']) && $product['status'] === 'success') {
            $message = $product['message']; 
            return redirect()->route('products.store')->with('success', $message);
        } else {
            return redirect()->route('products.store')->with('error', 'Ürün ekleme başarısız.');
        }
    }





    public function ProductDetail(Request $request, $id)
    {
        $token = $request->session()->get("token");
        $response = Http::withToken($token)->get($this->ApiUrl .'products/product_detail/'.$id );
        $data = $response->json();
        if(isset($data["status"]) && $data["status"]== "success"){

            return view('products.show', ['products'=> $data['data']]); 
        }else{
            return view("login_error");
        }
        
       
        // if ($response->successful()) {
        //     return view('products.show', ['products'=> $data['data']]);
        // } else {
         
        //   return redirect()->route('products.store');
        // }
        
    }

    public function show(Request $request, $id)
    {
        $token = $request->session()->get("token");
        $response = Http::withToken($token)->get($this->ApiUrl .'products/show/'.$id );
        $data = $response->json();
        if(isset($data["status"]) && $data["status"]== "success"){
            return view('products.edit',['products'=> $data['data']]); 
        }else{
            return view("login_error");
        }
       
    }

    public function update(Request $request, Product $product , $id)
    {
       
        $token = $request->session()->get("token");
        $response = Http::withToken($token)->put($this->ApiUrl .'products/update/'.$id, $request->all());
        $data = $response->json();

        if ($response->status() == 422) {
            $errors = $response->json('errors');
            return redirect()->back()->withErrors($errors)->withInput();
        }
        
        if (isset($data['status']) && $data['status'] === 'success') {
           return redirect()->route('products.store')->with('success','Ürününüz Başarılı Bir Şekilde Güncellendi !');
        } else {
            return redirect()->route('products.store')->with('error', 'Ürün düzenleme başarısız.');
        }

    
    }

    public function destroy(Product $product,Request $request, $id)
{
    $token = $request->session()->get("token");
    $response = Http::withToken($token)->delete($this->ApiUrl .'products/delete/'.$id);
    $data = $response->json();
    $responseData = Http::withToken($token)->get($this->ApiUrl .'products', $request->all());
    $info = $responseData->json();
    $products=$info['product'];
    if(isset($data["status"]) && $data["status"] == "success"){
        return view('products.product', ["products"=>$products]); 
    }else{
        return view("login_error");
    }
    if ($response->successful() && isset($data['status'])&& $data['status']=='success') {
       return redirect()->route('products.store')->with('success',$data['message']);
    } else {
       return redirect()->route('products.store')->with('error','ürün silinemedi');
    }
}

}