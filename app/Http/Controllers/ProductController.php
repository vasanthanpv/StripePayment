<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

use Auth;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::all(); 
        return view('products', ['products' => $products]);

    }

    public function productDetails($id)
    {
        $user = Auth::user();

        $detailData = Product::find($id); 
        return view('productsdetails', ['details' => $detailData,'intent' => $user->createSetupIntent()]);

    }

    public function checkout(Request $request)
    {

    
        $user = Auth::user();
        $paymentMethod = $request->input('payment_method');
        $amount= $request->input('amount');
        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);
        try
        {
        $user->charge($amount*100, $paymentMethod);
        }
        catch (\Exception $e)
        {
        return back()->withErrors(['message' => 'Error creating subscription. ' . $e->getMessage()]);
        }
       return redirect('products')->with('success', 'Product purchased successfully');   
       
     

    }

}
