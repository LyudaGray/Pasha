<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Purchase;
use App\Order;
use App\Category;
use App\Product;
use Laracasts\Flash\Flash;

class AdminController extends MainController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        return view('admin.admin');

    }

    public function generateRandomString($length = 10) {

        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            ceil($length/strlen($x)) )),1,$length);

    }

    public function add_category(Request $request){

        if ($request->isMethod('post')){
            $image = $this->generateRandomString();
            $category = new Category();
            $category['title'] = $request['new_category'];

            if($request->hasFile('image')) {
                $category['img'] = $image;
                $file = $request->file('image');
                $file->move(public_path() . '/img', $image.'.jpg');
            }

            $category->save();

            Flash::success('Категория добавлена!');
            return redirect('/admin');
        }

        return view('admin.admin_add_category');
    }

    public function getCategoryId($category){

        foreach (Category::all() as $cat){
            if ($cat['title']==$category){
                return $cat['id'];
            }
        }

    }

    public function add_product(Request $request){

        $categiries= Category::all();

        if ($request->isMethod('post')){

            $category = $this->getCategoryId($request['category']);
            $image = $this->generateRandomString();

            $product = new Product();
            $product['product_name'] = $request['new_product'];
            $product['cat_id'] = $category;
            $product['price'] = $request['price'];
            $product['short_description'] = $request['description'];
            $product['full_description'] = $request['description'];

            if($request->hasFile('image')) {
                $product['img'] = $image;
                $file = $request->file('image');
                $file->move(public_path() . '/img', $image.'.png');
            }

            $product->save();

            Flash::success('Товар добавлен!');
            return redirect('/admin');
        }


        return view('admin.admin_add_product', ['categories' => $categiries]);
    }

    public function show_orders($status){

        $orders = Order::where('status', $status)->get();
        $purchases = Purchase::all();
        $products = Product::all();

        return view('admin.admin_orders', ['orders'=>$orders, 'purchases'=>$purchases, 'products'=>$products]);

    }

}