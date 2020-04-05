<?php

namespace App\Contracts\Services;

interface BillPaymentServiceInterface
{
    public function billPayment();
    public function getUserData($loginId);
    public function updatePhoneBill($phoneBill);
    public function getIntroducedUsers($loginId);
}
