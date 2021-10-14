<?php

namespace IBill;

/**
 * Default values for the configuration parameters of the client.
 */
class Config
{
    public const TIMEOUT = 60;
    public const ADDITIONAL_HEADERS = [];
    public const ENVIRONMENT = 'production';

    public const API_URL = 'https://api.ibill.com';
    public const API_URL_SANDBOX = 'http://api.ibill.test';

    public const IBILL_VERSION = '2021-08-01';
    public const USER_AGENT = 'iBill-PHP/20210801';

    public const IS_DEBUG = false;
    public const TEST_ACCOUNT_ID = 6509;
    public const TEST_ACCESS_TOKEN = 'access-token';
}
