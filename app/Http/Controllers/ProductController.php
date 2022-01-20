<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // DB ファサードを use する

// use App\Models\Product;
// use App\Models\Order;
// use App\Models\Out;
use App\Product;
use App\Order;
use App\Out;
use Psy\Command\WhereamiCommand;

class ProductController extends Controller
{
    /**
     * 在庫一覧表示
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $products = Product::orderBy('created_at', 'asc')->get();
        return view('products.index', [
            'products' => $products,
        ]);
    }
    /**
     * 注文申請への遷移と注文データの受け渡し
     *
     * @param Request $request
     * @return Response
     */
    public function order(Request $request)
    {
        $products = Product::where('id', $request->id)->get();
        //dd($products);
        return view('order', [
            'products' => $products,
        ]);
    }
    /**
     * 備品登録画面へ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {

        return view('create');
    }
    /**
     * 持ち出し申請画面へ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        return view('out');
    }
    /**
     * 備品登録
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {

        $this->validate($request, [
            'product_name' => 'required|max:25',
            'stock' => 'required|max:25',
            'order' => 'required|max:25',
        ]);

        $product = new Product;
        $product->id = 0;
        $product->product_name = $request->product_name;
        $product->stock = $request->stock;
        $product->order = $request->order;
        $product->save();

        return redirect('products');
    }
    /**
     * ordersテーブルへのデータ受け渡し、在庫数に反映
     *
     * @param Request $request
     * @return Response
     */
    public function insert(Request $request)
    {
        $this->validate($request, [
            'new_order' => 'required|max:25',
            'staff' => 'required|max:25',
        ]);

        //ordersテーブルへのデータ受け渡し
        $order = new Order;
        $order->product_id = $request->product_id;
        $order->product_name = $request->product_name;
        $order->new_order = $request->new_order;
        $order->staff = $request->staff;
        $order->save();
        /* dd($order); */

        // CSRFトークンを再生成して、二重送信対策
        $request->session()->regenerateToken(); // <- この一行を追加

        //在庫数に反映
        $data = Product::where('id', $request->product_id)
            ->value('stock');


        $renew = $data + $request->new_order;

        DB::table('products')
            ->where('id', $request->product_id)
            ->update([
                'stock' => $renew
            ]);

            $orders = Order::orderBy('created_at', 'asc')->get();
            return view('order_table', [
            'orders' => $orders,
        ]);
    }
     /**
     * 注文一覧表示
     *
     * @param Request $request
     * @return Response
     */
    public function order_table(Request $request)
    {
        $orders = Order::orderBy('created_at', 'asc')->get();
        return view('order_table', [
            'orders' => $orders,
        ]);
    }

    //削除停止
   /*  public function delete($product_name){ */
        //削除対象レコードを検索
      /*   public function delete(Request $request,$id)
        {
           $order=Order::find($request->$id);
           $order->delFlg='Y';
           $order->save();
 */

        /* $product =Product::find($product_name);
        //Productから削除

        $product->delete();

        $order = Order::find($product_name);

        $order->delete(); */

        //リダイレクト
       /*  return redirect('/order_table');
        } */


    /**
     *
    *メール作成フォームに注文表を表示

     * @param Request $request
     * @return Response
     * */
    /* public function form(Request $request)

        {


            //value1or2をOrderテーブルに入力
        $list=$request->order;
            foreach($list as $value){

            DB::table('orders')
            ->where('product_id',$value['product_id'])
            ->update([
                'status'=>$value['status']
            ]);
        }
        // 表示させる注文を指定
        $orders = Order::where('status','=','1')
        ->get();
        // dd($orders);

        return view('form', [
            'orders' => $orders,
        ]);
    } */
    public function mail(Request $request)

        {


            //value1or2をOrderテーブルに入力
        $list=$request->order;
            foreach($list as $value){

            DB::table('orders')
            ->where('product_id',$value['product_id'])
            ->update([
                'status'=>$value['status']
            ]);
        }
        // 表示させる注文を指定
        $orders = Order::where('status','=','1')
        ->get();
        // dd($orders);

        return view('mail', [
            'orders' => $orders,
        ]);
    }

    //持ち出し申請→outテーブルへの登録
    public function subtract(Request $request)
    {

        $this->validate($request, [
            'product_id' => 'required|max:25',
            'out_amount' => 'required|max:25',
        ]);

        $out = new Out;
        $out->product_id = $request->product_id;
        $out->out_amount = $request->out_amount;
        $out->staff = $request->staff;
        $out->save();


        //在庫表への反映→在庫表へ遷移
        $data = Product::where('id', $request->product_id)
            ->value('stock');


        $subtract = $data - $request->out_amount;

        DB::table('products')
            ->where('id', $request->product_id)
            ->update([
                'stock' => $subtract
            ]);


        return redirect('products');
    }
}
