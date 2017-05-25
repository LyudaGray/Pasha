<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;
use Mail;
use App\Order;
use App\Purchase;

class CartController extends MainController
{
    public $summa;

    function addtocart($prod_id, Request $request){


        $resData = array();
        if (!isset(session('cart')['product_'.$prod_id])){
            $request->session()->push('cart.product_'.$prod_id, ['prod_id' => $prod_id]);
            $resData['count_cart'] = count($request->session()->get('cart'));
            $resData['success']=1;
        } else{
            return;
        }

        echo json_encode($resData);
    }

    function removefromcart($prod_id, Request $request){

        $resData = array();
        if(isset(session('cart')['product_'.$prod_id])){
            $request->session()->forget('cart.product_'.$prod_id);
            $resData['success'] =1;
            $resData['count_cart'] = count($request->session()->get('cart'));
        }else{
            return;
        }

        echo json_encode($resData);
    }

    public function showCart(){

        $prod_in_cart = [];



        if (session('cart')) {
            foreach (session('cart') as $product) {
                array_push($prod_in_cart, Product::where('id', $product[0]['prod_id'])->first());
            }
        }

        return view('cart', ['menus'=>$this->menu, 'cart'=>$prod_in_cart, 'summa'=>$this->summa]);

    }

    public function saveorder(Request $request){

        $clientsData = $request->all();
//        dd($clientsData);

        $message = [
            'required' => 'Поле :attribute обязательно к заполнению',
            'email' => 'Поле :attribute должно соответствовать email адресу',
            'captcha' => 'Неверная капча'
        ];

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'captcha' => 'required|captcha'
        ], $message);


        $order = new Order();
        $order->client_name = $clientsData['name'];
        $order->email = $clientsData['email'];
        $order->phone = $clientsData['phone'];
        $isOrder = $order->save();

        $prod_id = [];

        foreach ($request->session()->get('cart') as $item){
            array_push($prod_id, $item[0]["prod_id"]);
        }

        if($isOrder){
            foreach ($prod_id as $id){
                $purchase = new Purchase();
                $purchase->product_id = $id;
                $purchase->count = $request['countOfProductId_'.$id];
                $purchase->order_id =$order->id;
                $purchase->save();
            }

        }


        Mail::send('zakaz', ['data'=>$clientsData], function($message) use ($clientsData){

            $mail_admin = env('MAIL_ADMIN');
            $message->to($clientsData['email'], $clientsData['name']);
            $message->from($mail_admin, 'Mr_Coffee')->subject('Zakaz_Coffee');

        });



        Session::flush();

        Flash::success('Заказ оформлен, мы вам позвоним!');

        return redirect('/about');

    }
}
