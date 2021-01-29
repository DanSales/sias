<?php

namespace App\Providers;

use App\Models\Anexo;
use App\Models\Edital;
use App\Models\Programa;
use App\Models\Beneficiario;
use  App\Models\Bolsa;
use App\Models\Conta;

use App\Policies\AnexoPolicy;
use App\Policies\BolsaPolicy;
use App\Policies\EditalPolicy;
use App\Policies\ProgramaPolicy;
use App\Policies\ContaPolicy;
use App\Policies\BeneficiarioPolicy;
<<<<<<< HEAD

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


=======
use App\Models\Servidor;
use App\Policies\ServidorPolicy;
>>>>>>> upstream/master
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
<<<<<<< HEAD
        Bolsa::class => BolsaPolicy::class,
        Programa::class => ProgramaPolicy::class,
        Anexo::class => AnexoPolicy::class,
        Edital::class => EditalPolicy::class,
=======
        Servidor::class => ServidorPolicy::class,
>>>>>>> upstream/master
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
