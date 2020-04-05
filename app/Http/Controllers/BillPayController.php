<?php

namespace App\Http\Controllers;

use App\Contracts\Services\BillPaymentServiceInterface;
use App\Models\Introducer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillPayController extends Controller
{

    private $billPaymentService;

    public function __construct(BillPaymentServiceInterface $billPaymentService)
    {
        $this->billPaymentService = $billPaymentService;
    }

    /**
     * show bill payment list
     *
     * @param -
     * @return void
     */
    public function billPayList()
    {
        $paymentData = $this->billPaymentService->billPayment();
        return view('billPayList')->with(["data" => $paymentData]);
    }

    /**
     * pay person
     *
     * @param [integer] $user_number
     * @return void
     */
    public function payPerson($loginId)
    {
        $userData = $this->billPaymentService->getUserData($loginId);
        $introducedUsers = $this->billPaymentService->getIntroducedUsers($loginId);
        return view('bill.payPerson')->with(['userData' => $userData, 'introducedUsers' => $introducedUsers ]);
    }

    /**
     * pay person bill
     *
     * @param [integer] $request,$login_id,$connect_sns
     * @return void
     */
    public function payPersonBill(Request $request)
    {
        $this->billPaymentService->updatePhoneBill($request->all());
        return back()->with(['success' => "Payment Success!"]);
    }

}
