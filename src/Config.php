<?php

namespace IBill;

/**
 * Default values for the configuration parameters of the client.
 */
class Config
{
    public const TIMEOUT = 60;

    public const ACCESS_TOKEN = 'Merchant Access Token - Replace';

    public const ADDITIONAL_HEADERS = [];

    public const ENVIRONMENT = 'production';

    public const API_URL = 'http://api.ibill.test';
    // public const API_URL = 'https://admin2.ibill.com/api/ibill';

    public const IBILL_VERSION = '2021-07-13';

    public const USER_AGENT = 'iBill-PHP/20210713';
}
