<?php

namespace App\Http\Controllers;

use App\Mail\BookService;
use App\Mail\ServiceOrdered;
use Illuminate\Http\Request;

use App\Models\{Order, Counter, Services, User, City, Budget, Wishlist};

use Auth;

use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Order::where('user_id', Auth::user()->id)->where('status', 'in-cart')->latest()->get();

        $total = Order::where('user_id', Auth::user()->id)->where('status', 'in-cart')->sum('amount');

        return view('cart.index', compact('carts', 'total'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            $validation = \Validator::make(
                $data,
                [
                    'first_name'        => 'required',
                    'last_name'         => 'required',
                    'year'        => 'required|numeric',
                    'make'         => 'required',
                    'model'        => 'required',
                    'type'         => 'required',
                    'email'        => 'required|email',
                    'phone_number'         => 'required',
                    'description'        => 'required',

                ]
            );

            if (!$validation->passes()) {
                return response()->json([
                    'status' => 0,
                    'msg' => 'Something went wrong',
                    'error' => $validation->errors()->toArray(),
                    'error_length' => $validation->errors()->all(),
                ]);
            } else {
                $data['name'] = ucfirst($data['first_name']) . ' ' . ucfirst($data['last_name']);

                $data['vehicle'] = $data['year'] . ' ' . ucwords($data['make']) . ' ' . ucwords($data['model']) . ' ' . $data['type'];

                $data['status'] = 'in-process';

                $count = Counter::where('name', 'order')->first();

                $data['orderNumber'] = 'ORD' . str_pad($count->count + 1, 4, '0', STR_PAD_LEFT);

                $order =  Order::create($data);

                $count->increment('count', 1);

                $admin = 'geraldowusuansah2@gmail.com';

                Mail::to($data['email'])->send(new BookService($order));

                Mail::to($admin)->send(new ServiceOrdered($order));

                return response()->json([
                    'status' => 1,
                    'msg' => 'Service successfully booked',
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /* public function verifyPayment(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.flutterwave.com/v3/transactionions/" .  $request->tr_id . "/verify",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer FLWSECK_TEST-18e3c3360250414b015dfe309675f9d3-X"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $res = json_decode($response);

        if ($res->status == "success") {
            $count = Counter::where('name', 'order')->first();

            $inv = Counter::where('name', 'invoice')->first();

            $order = 'ORD' . str_pad($count->count + 1, 4, '0', STR_PAD_LEFT);

            $invoice = 'INV' . str_pad($inv->count + 1, 4, '0', STR_PAD_LEFT);

            $input = [
                'orderNumber' => $order,
                'phone1'      => $request->phone1,
                'phone2'      => $request->phone2,
                'region'     => strtoupper($request->region),
                'city'     => strtoupper($request->city),
                'address'     => strtoupper($request->address),
                'status'      => 'ordered',
                'invoice'     => $invoice,
                'ordered_at' => date('Y-m-d H:m:s')
            ];

            Order::where('user_id', Auth::user()->id)->where('status', 'in-cart')->update($input);

            Counter::where('name', 'order')->increment('count', 1);

            Counter::where('name', 'invoice')->increment('count', 1);

            $sent = $this->sendMail($request, $order);

            return [$res->status];
        }
    }
    */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function history()
    {
        $cart = Order::where('user_id', Auth::user()->id)->where('status', '!=', 'in-cart')->latest()->get();

        return view('cart.history', compact('cart'));
    }*/


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /* public function cartQtyUpdate(Request $request)
    {

        if ($request->ajax()) {
            $id = $request->itemID;

            $qty = $request->qty;

            $item = Order::find($id);

            if ($qty == 0) {
                $item->forceDelete();
            } else {
                $amount = $item->services->price * $qty;

                $userOrders = $qty - $item->qty;

                $item->update([
                    'qty' => $qty,
                    'amount' => $amount,
                ]);
            }

            $total = Order::where('user_id', Auth::user()->id)->where('status', 'in-cart')->sum('amount');

            $carts = Order::where('user_id', Auth::user()->id)->where('status', 'in-cart')->latest()->get();

            $view = view('cart.data', compact('carts', 'total'))->render();

            return response()->json([
                'status' => 1,
                'msg' => 'Cart updated',
                'numberOfOrders' => Auth::user()->order->where('status', 'in-cart')->sum('qty'),
                'view'  => $view,
                'numberOfRows'  => count($carts)
            ]);
        }
    }
    */


    public function update(Request $request)
    {

        $validation = \Validator::make($request->all(), [
            'phone1'     => 'required|numeric|digits:10',
            'phone2'     => 'nullable|numeric|digits:10',
            'region'         => 'required',
            'city'        => 'required',
            'address'            => 'required',
        ]);


        if (!$validation->passes()) {
            return response()->json([
                'status' => 0,
                'error' => $validation->errors()->toArray()
            ]);
        }
    }

    /*  public function cartActions(Request $request)
    {
        if ($request->ajax()) {

            $action = $request->actions;

            if (count(request('cart')) == 1) {
                $row = 'Item';
            } else {
                $row = 'Items';
            }

            for ($i = 0; $i < count(request('cart')); $i++) {
                if ($action == 'allow') {
                    Order::find($request->cart[$i])->update(['status' => 'allowed']);
                } elseif ($action == 'deny') {
                    Order::find($request->cart[$i])->update(['status' => 'denied']);
                } elseif ($action == 'remove') {

                    $find =   Order::find($request->cart[$i]);

                    $orderQty = $find->qty;

                    $find->forceDelete();

                    $msg =   $row . " removed";
                }
            }

            $carts = Order::where('user_id', Auth::user()->id)->where('status', 'in-cart')->latest()->get();

            $total = Order::where('user_id', Auth::user()->id)->where('status', 'in-cart')->sum('amount');

            $view = view('cart.data', compact('carts', 'total'))->render();

            return response()->json([
                'status' => 1,
                'msg' => $msg,
                'numberOfOrders' => Auth::user()->order->where('status', 'in-cart')->sum('qty'),
                'view'  => $view,
                'numberOfRows'  => count($carts)
            ]);
        }
    }
    */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }



    public function destroyWishlist(Request $request)
    {
        //
    }

    public function destroyOrder(Request $request)
    {
        Order::where('id', $request->id)->update(['status' => 1]);

        return response()->json([
            'msg' => 'Order successfully cancelled',
        ]);
    }
}
