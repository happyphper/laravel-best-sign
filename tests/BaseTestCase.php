<?php

namespace Happyphper\LaravelBestSign\Tests;

use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase;
class BaseTestCase extends TestCase
{
    use WithWorkbench;

    protected $loadEnvironmentVariables = true;

    protected function defineEnvironment($app): void
    {
        tap($app['config'], function (\Illuminate\Config\Repository $config) {
            $key = file_get_contents(getenv('BEST_SIGN_PRIVATE_KEY'));
            $config->set('bestsign.env', getenv('BEST_SIGN_ENV'));
            $config->set('bestsign.client_id', getenv('BEST_SIGN_CLIENT_ID'));
            $config->set('bestsign.client_secret', getenv('BEST_SIGN_CLIENT_SECRET'));
            $config->set('bestsign.private_key', $key);
            $config->set('bestsign.dev_account_id', getenv('BEST_SIGN_DEV_ACCOUNT_ID'));
            $config->set('bestsign.bind_account', getenv('BEST_SIGN_BIND_ACCOUNT'));
            $config->set('bestsign.bind_account_type', getenv('BEST_SIGN_BIND_ACCOUNT_TYPE'));
        });
    }
}
