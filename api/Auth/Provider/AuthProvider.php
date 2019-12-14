<?php


namespace Api\Auth\Provider;


use Api\Auth\Repository\ClientInterface;
use Api\Auth\Repository\ClientRepository;
use Api\Auth\Repository\UserInterface;
use Api\Auth\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;


class AuthProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        require_once  __DIR__."./../helpers/auth.php";
        $this->app->bind(ClientInterface::class,ClientRepository::class );
        $this->app->bind(UserInterface::class,UserRepository::class );
    }
}
