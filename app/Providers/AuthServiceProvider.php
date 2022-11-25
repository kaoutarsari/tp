<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
         'App\Models\Commentaire' => 'App\Policies\CommentairePolicy',

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
             /*method1 */
       // Gate::resource('comment','App\Policies\CommentairePolicy');
                    /*method2 */

          /*
        Gate::define('comment.update','App\Policies\CommentairePolicy@update');
        Gate::define('comment.delete','App\Policies\CommentairePolicy@delete');
        */

        /*policies katl3ab nafs dour tah Gate hi hiya bien organizé*/
                     /*method3 */


        /*

        Gate::define("comment.update",function($user,$commentaire){
               return $user->id === $commentaire->user_id; //ligne1
        }
    );

        Gate::define("post.delete",function($user,$comment)
        {
            return $user->id === $comment->user_id;//ligne2

        });
        */
        //ligne1 et ligne2 wach equal ou pas

         //had méthode kat éxcuta kbal makatexécuta define
         // hi l'admin li 3ando le droit issuprimer et modifier f gah les post
         //o possible man3tiwhch le droit f delete an7iydo post.delete

         //ability l9odra
         //hna kat3ti l'administrateur ila droit ach man 7ak ach dir f l'application

         //Gate::before kat éxcuta une fois ghadi t lanca chi authorize
         //kbal mat excuta ligne1 et ligne2 katexcuta Gate::before
         //ila t7kakat la condition kay déclonchi code1 et code2 mat7kakatch makaydéclonchich code1 et
         //code2
            
        Gate::before(function($user,$ability){

            if($user->is_admin && in_array($ability,["delete","update"]))
            {
                return true;
            }
        }
        
        
    );




    }
    
}
