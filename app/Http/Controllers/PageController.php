<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller{
    //General
    public function loginPage(){return view('login');}
    public function registerPage(){return view('register');}
    public function search(Request $request){
        $productName = $request->get('search');
        $result = DB::table('products')->join('categories', 'categories.id', '=', 'products.categoryId')->where('name', 'LIKE', '%'.$productName.'%')->paginate(6);
        return view('home_page', ['product' => $result]);
    }
    public function homePage(){
        $product = DB::table('products')->select('categories.*', 'products.*')
        ->join('categories','categories.id','=','products.categoryId')->paginate(6);
        return view('home_Page', ['product'=>$product]);
    }
    public function productDetailPage($id){
        $productDetail=Product::select('products.*', 'categoryName')
        ->join('categories','categories.id','=','products.categoryId')
        ->where('products.id', '=', $id)->get();
        return view('product_detail', ['product' => $productDetail]);
    }
    
    //Admin
    public function productPage(){
        $product = DB::table('products')->select('categories.*', 'products.*')
        ->join('categories', 'categories.id','=','products.categoryId')->get();
        return view('product_page', ['products'=> $product]);
    }
    public function addproductPage(){
        $categories = Category::all();
        return view('add_product', ['categories' => $categories]);
    }
    public function editProductPage($id){
        $product = Product::find($id);
        $categories = Category::all();
        return view('edit_product', ['targetProduct' => $product, 'categories'=>$categories]);
    }
    
    public function categoryPage(){
        $categories = Category::all();
        return view('category_page', ['categories' => $categories]);
    }
    public function addCategoryPage(){return view('add_category');}
    public function editCategoryPage($id){
        $targetCategory = Category::find($id);
        return view('edit_category',['targetCategory'=>$targetCategory]);
    }

    //Member
    public Function cartPage(){
        $user_product_list = DB::table('users')->select('users.*', 'items.*', 'categories.*', 'products.*')
        ->join('items','items.userId','=','users.id')
        ->join('products','products.id','=','items.productId')
        ->join('categories','categories.id','=','products.categoryId')->where('users.id', '=', Auth::user()->id)->get();
        return view('cart_page', ['userProductList'=>$user_product_list]);
    }
    public function editCartPage($id){
        $product = Product::find($id);
        return view('edit_cart', ['product'=>$product]);
    }
    public function historyTransactionPage(){
        $transactions = DB::table('transactions')->where('transactions.userId','=', Auth::user()->id)->get();
        $itemDetails = DB::table('details')->whereIn('transactionId',$transactions->pluck('id'))->get();
        return view('history_transaction', ['transactions'=>$transactions, 'itemDetails'=>$itemDetails]);
    }

}
