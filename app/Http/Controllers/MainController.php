<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Question;
use App\Models\ShippingInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use RealRashid\SweetAlert\Facades\Alert;
use Brian2694\Toastr\Facades\Toastr;


class MainController extends Controller
{

    public function Brand (Request $request) {
        if($request->isMethod("POST")){
            // $request->validate([
            //     "name" => "required"
            // ]);
            $save_Brand = $request->all();

            $save_Brand = Brand::create($save_Brand);

            if($save_Brand){
                
                return view("brands");
            }
        }
        return view("brands");
    }

    public function Category (Request $request) {
        if($request->isMethod("POST")){
            // $request->validate([
            //     "name" => "required"
            // ]);
            $save_Category = $request->all();

            $save_Category = Category::create($save_Category);

            if($save_Category){
                
                return view("category");
            }
        }
        return view("category");
    }

    public function upload_product(Request $request)
    {
        if ($request->isMethod("POST")) {
            $request->validate([
                "product_name" => "required",
                "product_price" => "required",
                "product_old_price" => "required",
                "product_description" => "required",
                "product_image1" => "required",
                "product_image2" => "required",
                "product_image3" => "required",
                "product_image4" => "required",
            ]);


            $product = $request->all();
            $product_image1 = $request->file("product_image1")->getClientOriginalName();
            $destination1 = $request->product_image1->move(("images"), $product_image1);
            $product_image2 = $request->file("product_image2")->getClientOriginalName();
            $destination2 = $request->product_image2->move(("images"), $product_image2);
            $product_image3 = $request->file("product_image3")->getClientOriginalName();
            $destination3 = $request->product_image3->move(("images"), $product_image3);
            $product_image4 = $request->file("product_image4")->getClientOriginalName();
            $destination4 = $request->product_image4->move(("images"), $product_image4);


            $product["product_image1"] = $destination1;
            $product["product_image2"] = $destination2;
            $product["product_image3"] = $destination3;
            $product["product_image4"] = $destination4;

            $save_product = Product::create($product);
            if ($save_product) {
                
                Toastr::success('Product added successfully', 'Success');

            }
        }
       $brand = Brand::all();
       $category = Category::all();
        return view("home", compact("brand", "category"));
    }


    public function Blog(Request $request)
    {
        if ($request->isMethod("POST")) {
            $request->validate([
                "title" => "required",
                "author" => "required",
                "content" => "required",
                "image" => "required",
            ]);


            $about = $request->all();
            $image = $request->file("image")->getClientOriginalName();
            $destination = $request->image->move(("images"), $image);

            $about["image"] = $destination;
            

            $save_about = Blog::create($about);
            if ($save_about) {
                // dd("HAHAH");
            }
        }
        return view("blog");
    }

    public function Blogs()
    {

        $blogs = Blog::all();
        return response()->json($blogs);
    }



    public function About(Request $request)
    {

        if ($request->isMethod("POST")) {
            $request->validate([
                "title" => "required",
                "content" => "required",
                "image" => "required",
            ]);


            $about = $request->all();
            $image = $request->file("image")->getClientOriginalName();
            $destination = $request->image->move(("images"), $image);


            $about["image"] = $destination;
            // $save_about = About::create($about);
            // if ($save_about) {
            //     // dd("HAHAH");
            // }

            //check for 
            $about = About::where('id', '1')->update(['title' => $request->title, 'content' => $request->content, 'image' => $image]);
            if ($about) {
                return back()->with('edited', 'About was successfullly edited');
            } else {
                return back()->with('error', 'About was not edited');
            }
        }

        $about = About::find(1);
        // dd($about);
        return view('about', compact('about'));

    }

    public function Abouts()
    {

        $abouts = About::all();
        return response()->json($abouts);
    }



    public function products()
    {

        $products = Product::all();
        return response()->json($products);
    }

    public function products_single($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }



    public function upload_faq(Request $request)
    {

        if ($request->isMethod("POST")) {
            // dd($request);
            $request->validate([
                "question" => "required",
                "answer" => "required",
            ]);
            $faq = $request->all();

            $save_faq = Faq::create($faq);
            if ($save_faq) {
                return ("faq saved");
            }
        }

        return view("faq");
    }

    public function faqs()
    {

        $faqs = Faq::all();
        return response()->json($faqs);
    }


    public function add_question(Request $request)
    {
        if ($request->isMethod("POST")) {
            $request->validate([
                "name" => "required",
                "subject" => "required",
                "message" => "required",
            ]);

            $question = $request->all();

            $save_message = Question::create($question);

            if ($save_message) {
                return response()->json(["message" => "message saved", "data" => $save_message]);
            }
        }
    }

    public function Register(Request $request)
    {
        if ($request->isMethod('POST')) {
            // $request->validate([
            //     "name" => "required",
            //     "email" => "required",
            //     "password" => "required",
            // ]);


            // $user = new User();
            // $user->name = $request->name;
            // $user->email = $request->email;
            // $user->password = Hash::make($request->password);
            // $user->save();

            // if ($user) {
            //     return response()->json(["message" => "Registered Successfully", "data" => $user]);
            // }

            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:6|confirmed',
                ]
            );
            $user = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->toJson(), 400);
            }else{
                return response()->json(["message" => "Registered Successfully", "data" => $user]);
            }


            $token = JWTAuth::fromUser($user);

            return response()->json($token);

        }


    }

    public function Login(Request $request)
    {
        if ($request->isMethod('POST')) {
            // $request->validate([
            //     "email" => "required",
            //     "password" => "required",
            // ]);

            // $user = User::where('email', '=', $request->email)->first();
            // $userInfo['name'] = $user->name;
            // $userInfo['email'] = $user->email;
            // $userInfo['id'] = $user->id;

            // if (Auth::attempt([ 'email' => $request->email, 'password' => $request->password])) {
            //     Auth::login($user);
            //     return response()->json(["message" => "Login Successful", "user"=>$userInfo], 200);
            // }

            $credentials = $request->only('email', 'password');

            try {
                $token = JWTAuth::attempt($credentials);
                if (!$token ) {
                    return response()->json(['error' => 'invalid_credentials'], 400);
                }else{
                    // return response()->json($token);
                    User::where('email', $request->email)->update(['remember_token' => $token]);
                    $user = User::where('email', $request->email)->first();
                    return response()->json(['success' => 'logged in', "token"=>$token, "user"=>$user], 200);
                }
            } catch (JWTException $e) {
                return response()->json(['error' => 'could_not_create_token'], 500);
            }

        }

        // $credentials = $request->only('email', 'password');

        // try {
        //     if (!$token = JWTAuth::attempt($credentials)) {
        //         return response()->json(['error' => 'invalid_credentials'], 400);
        //     }
        // } catch (JWTException $e) {
        //     return response()->json(['error' => 'could_not_create_token'], 500);
        // }

        // return response()->json($token);

    }

    public function ShippingInfo(Request $request)
    {
        if ($request->isMethod('POST')) {
             $request->validate([
            "emailNumber" => "required",
            "firstName" => "required",
            "lastName" => "required",
            "address" => "required",
            "apartment" => "required",
            "city" => "required",
            "country" => "required",
            "postalCode" => "required",
            ]);

            $shipping = new ShippingInfo();
            $shipping->emailNumber = $request->emailNumber;
            $shipping->firstName = $request->firstName;
            $shipping->lastName = $request->lastName;
            $shipping->address = $request->address;
            $shipping->apartment = $request->apartment;
            $shipping->city = $request->city;
            $shipping->country = $request->country;
            $shipping->postalCode = $request->postalCode;
            $shipping->user_id = $request->user_id;
            $shipping->save();

            if ($shipping) {
                return response()->json(["message" => "Shipping  Address sent Successfully", "data" => $shipping]);
            }
        }
    }


    public function updateShippings(Request $request, $user_id)
    {
        if ($request->isMethod('POST')) {
             $request->validate([
            "emailNumber" => "required",
            "firstName" => "required",
            "lastName" => "required",
            "address" => "required",
            "apartment" => "required",
            "city" => "required",
            "country" => "required",
            "postalCode" => "required",
            ]);


            $shipping = request()->all();
            ShippingInfo::where('id', $user_id)->update(["emailNumber" => $request->emailNumber, "firstName"=> $request->firstName, "lastName"=>$request->lastName,
                "address" => $request->address, "apartment" => $request->apartment, "city"=> $request->city, "country"=>$request->country, "postalCode"=> $request->postalCode]);

            if ($shipping) {
                return response()->json(["message" => "Shipping  Address Updated Sucessfully", "data" => $shipping]);
            }
        }
    }


    public function Shipping($user_id)
    {

        $shipping = ShippingInfo::where("user_id", $user_id)->get();
        return response()->json($shipping);
    }


    public function Ship()
    {
        $shipping = ShippingInfo::get();
        return response()->json($shipping);
    }


    public function Payment(Request $request)
    {

        // return response()->json(["message" => "Payment  Successfully", "data" => $request->all()]);


        if ($request->isMethod('POST')) {
             $request->validate([
                "user_id" => "required",
                "product_id" => "required",
                "price" => "required",
                "quantity" => "required",
                "productTotal" => "required",
                "transTotal" => "required",
                "tranStatus" => "required",
            ]);

            $payment = new Payment();
            $payment->user_id = $request->user_id;
            $payment->product_id = $request->product_id;
            $payment->price = $request->price;
            $payment->quantity = $request->quantity;
            $payment->productTotal = $request->productTotal;
            $payment->transTotal = $request->transTotal;
            $payment->tranStatus = $request->tranStatus;
            $payment->save();

            if ($payment) {
                return response()->json(["message" => "Payment  Successfully", "data" => $payment]);
            }
        }

    }

    public function payments(Request $request, $id)
    {
        if ($request->method("PUT")) {
            $request->validate([
                "tranStatus" => "required",
                "transRef" => "required",
                
            ]);

            $payment = new Payment();
            $payment->tranStatus = $request->tranStatus;

            $payment = Payment::where("product_id", $id)->update(["tranStatus" => $request->tranStatus, "transRef" => $request->transRef]);

            if($payment) {
                return response()->json(["message" => "Payment  Successfully", "data" => $payment]);
            }
        }
    }
}
