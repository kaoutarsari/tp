<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Offre;
use App\Models\User;

use App\Models\Blog;
use App\Models\Category;


use App\Http\Requests\StoreOffreRequest;
use App\Http\Requests\UpdateOffreRequest;
use Illuminate\Support\Facades\Auth;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Offre::latest()->with('commentaires')->get();
        $blogs =Blog::latest()->take(3)->get();

       // dd($products);
        return view('welcome',compact('products','blogs'));
    }
  

    public function languageDemo(){
        return view('languageDemo');
    }

      //detail de blog
    public function blogDetail($slug){
       // $blog =Blog::where('id',$id)->where('slug',$slug)->firstOrfail();
          $blog = Blog::where('slug',$slug)->firstOrfail();
          // $cat = Category::where('slug',$slug)->firstOrfail();
          $categories = Category::has('products')->get();

          
          
          //$products = $categories->products()->paginate(10);
      
        return view('show',compact('blog','categories'));
    }

    //detail offre
    public function prodDetail(string $slug){
        $offre = Offre::where('slug', $slug)->with('commentaires')->firstOrfail();
        $comments_count_by_user = User::withCount(['commentaires'=> function($q) use($offre) {
            $q->where('offre_id', $offre->id);
        }])->get();
        //return $comments;
        //kas7aaaa zikoooooo
        // achno hia li kas7a ? req
        // sahla, hir hadchi jdid 3lik ntia oui 
        // mnin glti lia ach bghiti 3rft bila hadchi mahatfhmihch,
        // dakchi 3lach glt lik bla madirih, lahqach atbqay talfa
        //3lach darti use($offre)
        // drt use($offre) lahqach hadik function est une callback, 3
        //koi function callback, rah hadchi 3lach glt lik atlfi, callback chwya avancer 
        // callback hia wahd function kanpassiwha l une autre function kangolo fiha 
        // mnin t'executa wahd haja 3yete l had callback,
        // daba f laravel kandiro hadik function bach nqdro n9te3o le query dial commentaire
        // o ndiro 3lih modification qbl maykml
        // ila lahdti rah drt $q->where('offre_id', $offre->id) fost dik function
        // bach ngolih matjibch lia ga3 commentaires, jib lia commentaire li kayhtarmo had condition
        // fhmti ? chwiya
        // oui rah avancer hadchi, daba fost callback manqdroch ndkhlo l variables li 3la bra
        // donc manqdrch nkhdm b dak $offre li 3la bra, dakchi 3lach kayna had qadia dial use
        // mnin kandiru use kanpassiw dak variable li 3la bra l ldakhel bach nqdro nkhdmo bih
        // daba ana 3arf rask nadt fih chyata mafhmti rb3a drial.hhhh ouiii
        // iwa hadchi 3lach kangolik matbqaych t3l9i fin tflqi hhhh daba had project ch7al mn haja
        // gaditha ana o nti mafahmahach mzian gah dakchi li gaditih fhmto mzayan
        // iwa hamdulah, hadi machi daruri tfhmiha daba atfmhiha mn hna lgdam.
        //ok o ila bghit nbiynha f blade hhhhhhhh please zakaria
        // voila 3afak zakaria kifach ndir liha f bladee??
        // t la ?ouiiiiii
        // daba zdt wahd commentaire f had offre l had user zakaria 
        // daba comment count fih 0, khass iwli 1
        // ban lik ? oui
        // ila bdlt offre id dial had comment f base de donner khass irdoh lia 0
        // c bon ?  3afak o f blade wach ndir boucle fost boucle
        // daba nti kaybqa 3lik kifach bghiti tbyenihom, nti li khass t9reri 
        //je sais mais hi wach tatkon boucle fost focle 
        // nti glti lia biti iban zakaria - 4 commets hhhh safi 
        // ila bghiti iban kima glti lia zakaria - 4 commentaire, kaoutar - 1 commentair
        // hadiri hir boucle whda 3la hado li drt.ok
        //ziko lah is3lha 3lik 
        // amine, hadchi rah mahati7ich fih, ana drtoliwach had cas maghadich nti7 fiha
        // ghaliban la, 3mrni tht f bhal had le cas ana, mais kati7 f des cas plus complexe 3liha 
        // ana gaditha lik daba bach matgolich "la zakaria ma3rfch liha oa kaythereb hhhhh'
        //ntaya t3rf nmla fin m5byaha wladha ila h7toha fost code
        // lawah lawah ayah ayah

       // $arr = User::where('id')->get();
//Offre::comments()->count()
/*
$arr = Users::with(['commentaires', function($q) 
{ $q->where('offre_id', $offre_id) } ])->withCount('comments')
*/

      //dd($posts);
       //$comments = Commentaire::where($offre->offre_id)->get();


        //return $comments;
       // return $offre->commentaires;//->pluck('user_id');

     //SELECT users.name,users.email,count(users.id) FROM `users` inner join 
     //commentaires on commentaires.user_id =users.id GROUP by users.name,users.email;

    // $comment = $offre->commentaires;
    // $comment1 = Commentaire::has('user')->get();
    // return $offre;

     //kaytla3 lik hna user li connecti ila commentaire dar hi user li connecté
     //ama ila makanch conncté gama itla3 lik commentaire wa5a dayr commentaire

     /*
     $arr=  Commentaire::whereHas('user', function($q) {
        return $q->where('user_id', auth()->id());
    })->get();
    dd($arr);
    */
        $categories = Category::has('products')->get();
        $commentaires = $offre->commentaires()->latest()->get()->transform(function($data) use($comments_count_by_user) {
            $data->comments_count = $comments_count_by_user->where('id', $data->user_id)->first()->commentaires_count;
            $data->kaoutar_zwina = 'koutar mouah 3liha';
            return $data;
        });
       // return $commentaires;
        // safe ? cbon ? ouii 3LACH bdalti dak forach
        // daba kansift commentaires mn hna, machi kandkhl lihom b $offre->commentaires() mn blade kima knti dayra
        // bach nqdr nkhdm b dik transform li zdte. o ila rj3naha kif kant ay5raj erreur
        // fkri m3aya, wach makatbanch lik dik ->transform li zdte ? bant liya
        // iwa kihadi diri tzidiha o nti katjbdi commentaires f blade ? 
        // daba nti f lowl knti katbyeno comemntaires bla le nombre yak ? anmchi m3ak bl khochaybat ga3
        // 7na wlina kanjbdo kola utilisateur ch7al mn commentaire dar f l'offre yak ? oui
        // iwa kifach anjm3o had joj ? nhzo idina l sidi rbi o nd3iw ? 
        // bach njm3o had joj khass nktbo chi code
        // dak le code hwa wahd l function smitha transform kayna f elequent li kanqdro nbdlo biha 
        // le resulta dial dak query li kayn
        // matalan
        // bghiti tzidi f kola commentaire wahd variable smito zakaria_zwin, kihadiri liha ? 
        // kandiro had transform
        // transform hwa kandiro modification 3la resultat final, swa nzido ola nqso ola nbdlo 
        // fhmti ? oui 
        // wa rah hadchi li bghiti nti rah hadchi li kaydar lih hhhhhhh wach bghiti 
        // wach bghiti ngado program kaydina l 9amar b echo 'dina l 9amar' ? 
        // hadchi li bghiti nti kaytgad haka, c'est un peut compliqué 3la dakchi li kadiri standard
        //daba ana bghit hi ndwi lik f blade 3laach mandiroch foreach fost forach
        //o hadik li kasti rj3ha kif ma kant o nza
        //:o dir forach a zakaria zwin
        // en peut pas, safe, had le cas machi dial foreach fost foreach, had le cas 
        // dial foreach o fostha ila bghiti diri khass diri une recherche 
        // kola commentaire wslti lih f foreach atqlbi f had comments_count_by_user 3la dak user bach tjbdi count dialo
        // ama foreach fost foreach mahatkhdmch lik hna ah oui donc katkon had hala tah foreach fost forach
        // non foreach fost foreach kandiroha la bghina nlopiwa 3la chi haaj fost mn chi haja 
        // matalan 3ndna offres::with('comments')
        // hna ayjib lina offres o f kola offres 3ndha list dial comments 
        // donc nqdro ndiro foreach($offres as $offre) o fost mn had foreach ndiro 
        // foreach($offres->comments as $comment) 
        // fach katkon 3ndna list o fost kola item f dik list kana une list dial chi haja 
        // hna nqdro ndiro foreach fost foreact.
        // fhmti ? oui
        // 3la slamtna hhhhhh 
        // ha dial l3dan mabakich 7malt rassi bad niveau safi wlat katch3al bola hamraaa
        // Arbi la matb3i dakchi li kangolik, 3lach katbay tiri ? ouii wach n7iyado 
        //o nraja3 dakchi basic ola hi n5liha
        // glt lik gadi lia todoslit galtiha liya b syylfony
        // gadiha ta b laravel, ok angadhaa
        // gadi bhal hadi.
        //https://d33wubrfki0l68.cloudfront.net/a03471273d7f8222782da3f881f5649497c0a809/ee118/assets/img/posts/building-a-todo-app-with-laravel-vue-js-and-tailwind-css-part-iii/image-2.png
        // gadiha bla matchofi la video la walu, chi mochkil, siri l google
        // rah atlahdi bla rah atlgay machakil, daba nti katgoli wa todolist wa dakchi sahl
        //rah ankadhaa machi sahla katban liya
        // iwa gadiha,; ok, apre angolik gadi lia authentication fiha 
        // gadiha lia b ahsan tariqa momkin tgadiha ok
        // imta tqdri twjdiha lia ? lundi
        // lach mse7ti demain hhhhhhhhh
        //demain anbdaha merci lhla i5tik lah is3lha 3lik
        // daba gadi lia had todolist kima f dak video 
        // ya diri css dialk, ya diri tailwindcss 
        // kanfdl diri tailwindcss, mais la ma3Rftich diri css.
        //ok
        // bghit lvalidation tkon katban tht l'input 
        // bghit had l validation: max-char: 155, min-char:10, string, required.
        // matalan ana dkhlt zaka, igolia minmum charachter est 10 
        // fhmti ? oui zakaria 3afak bghit nsift lik audio f watsap
        // d'accord siftih lia  je re 3afak, ok re reeeeee reeeeeee zikoooo
        //reeee
        return view('prod-detail',compact('offre','categories', 'commentaires'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOffreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOffreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function show(Offre $offre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function edit(Offre $offre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOffreRequest  $request
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOffreRequest $request, Offre $offre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offre $offre)
    {
        //
    }
}
