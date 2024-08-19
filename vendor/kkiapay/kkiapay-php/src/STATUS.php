<?php
namespace Kkiapay;

/**
 * Created by PhpStorm.
 * User: shadai.ali
 * Date: 2019-02-24
 * Time: 02:23
 *
 * THIS FILE CONTAINS ALL KKIAPAY API STATUS
 */

final class STATUS {
    const SUCCESS = "SUCCESS";
    const INVALID_TRANSACTION = "INVALID_TRANSACTION";
    const INVALID_TRANSACTION_TYPE = "INVALID_TRANSACTION_TYPE";
    const TRANSACTION_NOT_FOUND = "TRANSACTION_NOT_FOUND";
    const TRANSACTION_NOT_ELIGIBLE = "TRANSACTION_NOT_ELIGIBLE";
    const INSUFFICIENT_FUND = "INSUFFICIENT_FUND";
    const PENDING = "PENDING";
    const FAILED = "FAILED";
    const REVERTED = "REVERTED";
}