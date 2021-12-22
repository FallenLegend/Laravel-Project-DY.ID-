<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Detail;
use App\Models\Item;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DatabaseController extends Controller{
    //Account
    public function registerAccount(Request $request){
        $validateData=$request->validate([
            'name'              =>'required|min:5',
            'gender'            =>'required|in:Male,Female',
            'address'           =>'required|min:10',
            'email'             =>'required',
            'password'          =>'required|min:6',
            'confirmPassword'   =>'required|same:password',
            'TermAndCondition'  =>'accepted',
        ]);
        $password=bcrypt($validateData['password']);
        $register=new User;
        $register->name = $validateData['name'];
        $register->gender = $validateData['gender'];
        $register->address = $validateData['address'];
        $register->email = $validateData['email'];
        $register->password = $password;
        $register->role = 'member';
        $register->save();

        return redirect()->route('home');
    }

    // Category
    public function addCategory(Request $request){
        $validateData=$request->validate([
            'name'=>'required|min:2|unique:categories,categoryName',
        ]);
        $category=new Category();
        $category->categoryName=$validateData['name'];
        $category->save();
        return redirect()->route('categoryPage');
    }
    public function editCategory(Request $request){
        $validateData = $request->validate([
            'categoryName' => 'required|unique:categories,categoryName|min:2',
        ]);

        $categories = Category::find($request->id);
        $categories->categoryName = $validateData['categoryName'];
        $categories->update();
        return redirect()->route('categoryPage');
    }
    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categoryPage');
    }

    //Product
    public function addProduct(Request $request){
        $validateData=$request->validate([
            'name'=>'required|min:5|unique:users,name',
            'description'=>'required|min:50',
            'price'=>'required|numeric|min:0',
            'category'=>'required',
            'file'=>'required|image|mimes:jpg',
        ]);
        $fileName=$request->file->getClientOriginalName();
        $request->file->storeAs('public/img/',$fileName);

        $product=new Product();
        $product->name=$validateData['name'];
        $product->description=$validateData['description'];
        $product->price=$validateData['price'];
        $product->categoryId=$validateData['category'];
        $product->image=$fileName;
        $product->save();
        return redirect()->route('productPage');
    }
    public function editProduct(Request $request){
        $validateData = $request->validate([
            'name'          => 'required|unique:users,email|min:5',
            'description'   => 'required|min:50',
            'price'         => 'required|integer|min:0',
            'categoryId'    => 'required',
            'file'          => 'required|image|mimes:jpg',
        ]);
        $fileName=$request->file->getClientOriginalName();
        $request->file->storeAs('public/img/',$fileName);

        $product = Product::find($request->id);
        $product->name = $validateData['name'];
        $product->description = $validateData['description'];
        $product->price = $validateData['price'];
        $product->categoryId = $validateData['categoryId'];
        $product->image = $fileName;
        $product->update();
        return redirect()->route('productPage');
    }
    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('productPage');
    }

    //Cart
    public function addToCart(Request $request){
        $validateData=$request->validate([
            'quantity'=>'required|numeric|min:1',
        ]);

        $find = DB::table('items')->where('productId', '=', $request->id)->where('userID','=', Auth::user()->id)->get();
        if($find->isEmpty()){
            $cart_item = new Item();
            $cart_item->userId = Auth::user()->id;
            $cart_item->productId = $request->id;
            $cart_item->quantity = $validateData['quantity'];
            $cart_item->save();
        }
        else{
            Item::where('productId', '=', $request->id)->where('userId', '=', Auth::user()->id)->update(['quantity'=> $find[0]->quantity + $validateData['quantity']]);
        }
        return redirect()->route('home');
    }
    public function editCartItem(Request $request){
        $validateData = $request->validate([
            'newQuantity' => 'required|numeric|min:1',
        ]);
        echo $validateData['newQuantity'];
        Item::where('productId', '=', $request->id)->where('userId','=',Auth::user()->id)->update(['quantity'=>$validateData['newQuantity']]);
        return redirect()->route('cartPage');
    }
    public function deleteCartItem($id){
        Item::where('productId', '=', $id)->where('userId', '=', Auth::user()->id)->delete();
        return redirect()->route('cartPage');
    }
    public function checkout(){
        $itemDetails = DB::table('users')->select('users.*','categories.*', 'items.*', 'products.*')
        ->join('items','items.userId','=','users.id')
        ->join('products','products.id','=','items.productId')
        ->join('categories','categories.id','=','products.categoryId')
        ->where('items.userId', '=', Auth::user()->id)->get();

        $transaction =  new Transaction();
        $transaction->userId = Auth::user()->id;
        $transaction->save();

        foreach($itemDetails as $item){
            $transaction_detail = new Detail();
            $transaction_detail->transactionId = $transaction->id;
            $transaction_detail->itemName = $item->name;
            $transaction_detail->itemImage = $item->image;
            $transaction_detail->itemQuantity = $item->quantity;
            $transaction_detail->itemPrice = $item->price;
            $transaction_detail->subTotal = $item->quantity * $item->price;

            $transaction = Transaction::find($transaction_detail->transactionId);
            $transaction->totalPrice += $transaction_detail->subTotal;
            $transaction->save();
            $transaction_detail->save();

        };
        Item::where('userId', '=', Auth::user()->id)->delete();
        return redirect()->route('transactionHistoryPage');
    }
}
