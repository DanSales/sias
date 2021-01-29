<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Conta;
use App\Policies\ContaPolicy;
use App\Models\Beneficiario;
use App\Policies\BeneficiarioPolicy;
use App\Models\Servidor;
use App\Policies\ServidorPolicy;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Conta::class => ContaPolicy::class,
        Beneficiario::class => BeneficiarioPolicy::class,
        Servidor::class => ServidorPolicy::class,
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
