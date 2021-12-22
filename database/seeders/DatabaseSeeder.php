<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        $user = new User();
        $user->name = "Bambang";
        $user->gender = 'male';
        $user->address = 'jl. Bambang Sutomo Blok 1 No 2';
        $user->email = "bambang@gmail.com";
        $user->password = bcrypt("12345678");
        $user->role = "admin";
        $user->save();
    
        $category_data = [
            ['id'=>1, 'categoryName'=>'Television'],
            ['id'=>2, 'categoryName'=>'Smartphone'],
            ['id'=>3, 'categoryName'=>'Laptop']
        ]; foreach($category_data as $category){Category::create($category);}
        $product_data = [
            ['categoryId'=>1, 'image'=>'Samsung-32-HD.jpg' , 'name'=>'Samsung 32 HD', 'price'=>3025000, 'description'=>'Wide Color Enhancer, Connect Share Transfer, HD Resolution'],
            ['categoryId'=>2, 'image'=>'Iphone-XR.jpg ' , 'name'=>'Iphone XR', 'price'=>5950000, 'description'=>'Full screen design, Liquid Retina display, TrueDepth'],
            ['categoryId'=>2, 'image'=>'iPhone-11.jpg' , 'name'=>'iPhone 11', 'price'=>10770000, 'description'=>'AThe curved corners follow a beatuiful curved design, adn they are all within a standard rectangle'],
            ['categoryId'=>3, 'image'=>'Acer-Swift.jpg ' , 'name'=>'Acer Swift', 'price'=>12594000, 'description'=>'Disrupt the status quo with the powerful performance of the 1.37 kg'],
            ['categoryId'=>3, 'image'=>'Asus-ROG.jpg' , 'name'=>'Asus ROG', 'price'=>14449000, 'description'=>'The first ROG motherboards made hardcore'],
            ['categoryId'=>2, 'image'=>'Iphone-XS.jpg', 'name'=>'Iphone XS', 'price'=>4850000, 'description'=>'Features 5.8" display, Apple A12 Bionic chipset'],
            ['categoryId'=>3, 'image'=>'Asus-TUF.jpg', 'name'=>'Asus TUF', 'price'=>10300000, 'description'=>'Samsung Note 20 Ultra 256GB Ready Stock!'],
            ['categoryId'=>1, 'image'=>'LG-43-FHD.jpg', 'name'=>'LG 43 FHD', 'price'=>4000000, 'description'=>'A New Level of Full-HD, Dynamic Color Enhance, Dolby Audio TM, A Movie-like Sound Experience'],
            ['categoryId'=>1, 'image'=>'Samsung-43-FHD.jpg', 'name'=>'Samsung 43 FHD', 'price'=>4650000, 'description'=>'Turner Digital 3D Technology No Smart tv Yes Display Type Flat Smart Platform'],
            ['categoryId'=>2, 'image'=>'Samsung-Note-20.jpg', 'name'=>'Samsung Note 20', 'price'=>15999000, 'description'=>'APro-grade Camera & Incredibly Realistic Pen Experience'],            
            ['categoryId'=> 2, 'image'=>'Samsung-a52.jpg', 'name'=>'Samsung a52', 'price'=>4990000, 'description'=>'IP67-Rated Water Resistant for up to 30 minutes. 6,5" Screen and Infinity-O Camera'],
            ['categoryId'=> 2, 'image'=>'Samsung-s21.jpg', 'name'=>'Samsung a21', 'price'=>14999000, 'description'=>'Witness the fastest chip ever in a Galaxy. With a 5nm processor'],
            ['categoryId'=> 1, 'image'=>'LG-43-UHD.jpg', 'name'=>'LG 43 UHD', 'price'=>7138000, 'description'=>'A New Intelligence Evolved with AI With the LG ThinQ AI, many things are possible with just your voice'],
            ['categoryId'=> 3, 'image'=>'Lenovo-Yoga.jpg', 'name'=>'Lenovo Yoga', 'price'=>28634000, 'description'=>'(Shadow Black) Intel Core i7-1185G7 Processor (4C / 8T, 3.0 /4.8GHz, 12MB) 16GB LPDDR4X 4266MHz Onboard 1TB'],
            ['categoryId'=> 3, 'image'=>'Lenovo-Legion.jpg', 'name'=>'Lenovo Legion', 'price'=>24765000, 'description'=>'The Lenovo gaming laptops have the processing and graphics performance you need in a stylish mobile package'],
            ['categoryId'=> 1, 'image'=>'Samsung-55-QLED.jpg', 'name'=>'Samsung 55 QLED', 'price'=>14739000, 'description'=>'Resolution 3 840 x 2 160 Power Consumption 185 W | 225 W HDMI 4 USB 2 Picture Engine Quantum Processor 4K Design'],
            ['categoryId'=> 1, 'image'=>'Samsung-65-Crystal.jpg', 'name'=>'Samsung 65 Crystal', 'price'=>21739000, 'description'=>'Resolution 3 1080 x 2 160 Power Consumption 185 W | 225 W HDMI 4 USB 2 Picture Engine Quantum Processor 4K Design']
        ]; foreach($product_data as $product){Product::create($product);}

    }
}
