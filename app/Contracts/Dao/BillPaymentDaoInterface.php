<?php

namespace App\Contracts\Dao;

interface BillPaymentDaoInterface
{
  public function billPayment();
  public function getUserData($loginId);
  public function updatePhoneBill($phoneBill);
  public function getIntroducedUsers($loginId);
}
