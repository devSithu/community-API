<?php

namespace App\Services;

use App\Models\Introducer;
use App\Contracts\Dao\BillPaymentDaoInterface;
use App\Contracts\Services\BillPaymentServiceInterface;

class BillPaymentService implements BillPaymentServiceInterface
{
    private $billPaymentDao;

    /**
     * Class Constructor
     * @param billPaymentDaoInterface
     * @return
     */
    public function __construct(BillPaymentDaoInterface $billPaymentDao)
    {
        $this->billPaymentDao = $billPaymentDao;
    }

    /**
     * pay bill for connect person
     *
     * @param -
     * @return void
     */
    public function billPayment()
    {
        return $this->billPaymentDao->billPayment();
    }



        /**
     * get user data with login id
     *
     * @param [integer] $login_id
     * @return void
     */
    public function getUserData($loginId)
    {
        return $this->billPaymentDao->getUserData($loginId);
    }

    public function getIntroducedUsers($loginId)
    {
        return $this->billPaymentDao->getIntroducedUsers($loginId);
    }

        /**
     * update phone bill
     *
     * @param [integer] $phoneBill
     * @return void
     */
    public function updatePhoneBill($phoneBill)
    {

        $this->billPaymentDao->updatePhoneBill($phoneBill);      

    }
}
