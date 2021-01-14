<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        // session()->flush('cart');
       $carts = session()->has('cart') ? session()->get('cart') : [];
       return view('cart', compact('carts'));
    }

    public function add(Request $request)
    {
        
        $product =  $request->get('product');
        // session()->flush('cart');
        
        if(session()->has('cart')){

            $products = session()->get('cart');
            $productsSlug = array_column($products, 'slug');

            if(in_array($product['slug'], $productsSlug)){

                $products = $this->productIncrement($product['slug'], $product['amount'], $products);

                session()->put('cart', $products);
            }else {
                session()->push('cart', $product);
            }
            

        }else{

            session()->push('cart', $product);

        }

        flash('Produto adicionado no carrinho')->success();
        // return redirect()->route('product.single', ['slug' => $product['slug']]);
        return redirect()->route('home');
    }

    public function remove($slug)
    {
        // dd($slug);
        if(!session()->has('cart'))
            return redirect()->route('cart.index');
        
        $products = session()->get('cart');

        $products = array_filter($products, function($line) use($slug){
            return $line['slug'] != $slug;
        });

        session()->put('cart', $products);
        return redirect()->route('cart.index');
    }

    public function cancel()
    {
        session()->forget('cart');
       
        flash('Compra cancelada com sucesso')->success();
        return redirect()->route('cart.index');
    }

    private function productIncrement($slug, $amount, $products)
    {
        $products = array_map(function($line)use($slug, $amount){
            if($slug == $line['slug']){
                $line['amount'] += $amount;
            }
            return $line;
        }, $products);
        return $products;
    }
}
