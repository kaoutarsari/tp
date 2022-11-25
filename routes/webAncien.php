
/*

Skip to content
Search or jump to…
Pull requests
Issues
Codespaces
Marketplace
Explore
 
@kaoutarsari 
kaoutarsari
/
tourisme
Private
Code
Issues
Pull requests
Actions
Projects
Security
Insights
Settings
tourisme/routes/web.php /
@kaoutarsari
kaoutarsari first commit
Latest commit 978ed08 14 days ago
 History
 1 contributor
171 lines (137 sloc)  7.51 KB

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\LangsController;

use App\Http\Controllers\CommentaireController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/',[OffreController::class,'index']);
//detail blog
//Route::get('/detailBlog/{slug}',[OffreController::class,'blogDetail']);
//liste blogs
//Route::get('/blogs',[BlogController::class,'index']);

//Route::get('/blogs',[BlogController::class,'index']);

//Route::get('/categories-product/{slug}',[CategoryController::class,'index']);



// hadi hia li fiha forumlaire, la makantch rah aslan mahaybanch lik form wach hadi tkon haka
//matalan route smiythe prod wach haka ghadi tkon
// haka atkon asghar 3
//************************************************************************************* */
//Route::get('produit/{id}',[OffreController::class,'prodDetail'])->name("prod");
//Route::post('/prodDetailComm/{id}',[CommentaireController::class,'store'])->name('prodDetailComm');
//************************************************************************************* */

// wahd lhaja la7dtha fik, routes makatsmihomch mzian 

// makandiroch prod-detail
// hadi ana andir liha produit/detail/{slug}
// matalan hna atwli produit/{slug}
// makayn lach tktbti detail ok
// gdma ktbti route sghira gdma hsn
// ila la vrmnt whlti 3ada diri 2 dial les mots.
// fhmti ? wa simo oui branchit hi chargeur
// une autres chose: 
// chofi m3aya matalan had controler dial CommentaireController, kaybano lik fih dok les methodes
// index, store, create etc ... yak ? iui
// mnin jaw hadok ? kayjiw automatique
// voila donc la plus part des fois hadok li khask tkhdmi bihom, ila la knti mhtaja chi haja mn ghir dok les 5
// matalan hna lach dayra prodDetail ? kayna show f dok les 5
// show kankhdmo biha bach nbyeno les detail dial wahd le produit specific donc khdmi biha hia 
// create kanbyeno biha le formulaire matalan /produit/new 
// index kanbyeno biha list dial produits matalan /produit
// store hadi hia li kansifto lih les donnes dial formulaire
// delete hadi bayna rah hia li kansupprimiw biha un formulaire
// dima fach tbghi tgadi chi model o diri lih routes dialo f controller khdmi b hadchi li glt lik
// tawkan tkon chi haja kharj 3la had 5 3ada zidiha mn 3ndk, d'accord ? oui
// donc manbghich nchof chi haja bha prodDetail.d'accord

// talite haja: 
// ->name kandiroh ghalibna une combinaison mabin model o l'action 
// matalan ila tb3ti hadakchi li glt lik qbl prodDetail atwli store yak ? nn
// ach atwli ? show
// nchdk nbosk,  hhh
// drtha expre bach nchofk wach chada m3aya mais saraha mzian 
// Donc prodDetail atwli show
// f name atwli combinaison mabin model li hwa offre o action li hia store 
// donc aywli ->name('offre.show');
// fhmti ? oui
// meme chose pour les autes 
// route li atkon fiha store atwli ->name('offre.store');
// route li atdina l create ->name('offre.create')
// fhmti ?oui
// hadchi machi chi haja li obligé mais rah ila chafk chi wahd kadirhom ay3rk 3arfa ach kadiri 
// donc 4 d les chose bghit nchofhom:
// 1- Routes maykonch 3la had achkal chihaja-chihaja, chihaja_chihaja, chihajaChija ila la vrmnt kan khass itsmaw haka.
// 2- Routes hawli ma amkan tkon wahd le mot, produit/detail/{slug} atwli produit/{slug}
// 3- Utiliser les actions li kaytgeneraw automatiquement m3a le controller index,create,store,show,delete
// 4- le nome dial route ikon combinaison 3la hadchkel model.action ex: produit.store
// Safe ? ouii


// Haja okhra hadi deja dwina 3liha, matsmich 2 hwayj mkhtalfin o homa wahd l haja
// manbghich nchof produit-detail o hia rah Offre
// Ya hadi tsmi model produit o tkhdmi b kolchi 3la assas produit 
// ya atsmih Offre o tkhdmi b kolchi 3la assas offre
// daba had route smito produit-detail o kay3yet 3la controller smito Offrecontroller 
// wa fhm tsta nta oui
// hadchi li bghitk daba diri 
// bdli lia smayate dial routes o kolchi mra jaya li nchof had lecode nbghit nlga dakchi li glt lik 
//d'accord
// bnisba l dik qadia li glt lik dial route matkonch fiha bzaf dial les mots rah hadik katnefe3 bzaaaf f SEO 
//ok mera jaya tlka kolchi mbdal
// daba nti achno hwa ashal route li atfkri 
// wach zakariabenali.me/blog/1
// ola zakariabenali.me/blog/detail/1
// chkon li kayban lik sehel tfekerih ? tani
// lwlani machi tani andrbk. i7timal anak tkht2i f typing dial tani rah kter mn lowlani
// tani atgoli wach blog b s ola la wach detail b s ola la 
// lowlani atgoli hir wach blog b s ola la oui
// hadchi chwya avance mais rah 7na kanl3bo 3la l'utilisateur li aydir decision f a9al mn 2seconds 
// utilisateur rah iqdr idir bnaqs la t3nkch f anaho idkhel lik l site.
//oui d'accord.
// Safe mzian ? oui mzaian merci ziko zwin namchi ndir lhna l ch3ri kharja lhmam hhhh
// ayhayhay drbi lia chi tswira b lhnaa, hmm 3lach la hhhhhhhh
// hhhhh mal mok hhhhhh 
// ah ola goli lia rah dakchi aykon manachfch oui ziko l5ayb anmchi nwjad l hmame o aji jibni man hamam

//Route::get('prod-detail/{slug}',[OffreController::class,'prodDetail'])->name("prod-detail");

// makandiroch prodDetailComm
// hadi ana andir liha produit/commentaire/{id}
// f routes makandiroch chihaja-chihaja ola chihajaChihaja ok

// parfois, just rarement fach kanwgfo 3la chi haja bhal haka produit-detail, mais tres rare
//Route::post('/prodDetailComm/{id}',[CommentaireController::class,'store'])->name('prodDetailComm');



// hadi kadalik, makandiro chihaja_chihaja
// dima routes kaykoni 3la had chkel chihaja/chihaja
// f aghlab l'aw9ate makathtajich 2 dial les mots f route, kathtaji ha  whda 
//Route::get('/index_api',[OffreController::class,'index_api']);



// wlah tansrf9k manbkach fik
// ila ha 3la bhal hadchi w tgoli wach tbqay fia
// 3lach dayra any ? hint post ma5dmatch
// safe hir hitach post makhdmatch andir any 
// ach kat3ni any ? tkbal ayi haja sois post sois get
// makaynch hir post o get, kayn put, patch etc..
// any katgoli lih i accepti ga3 hadchi, wach hadchi li bagha nti ? hint post ma5dmatch
// nti dayra formaulaire katsifti biha les donnes l controller, makandiroch any
// ila trate chi mochkil fa rah dayra nti chi mochkil f implementation
// machi mochkil f post makhdmatch
// khdmi 3qlk, rah hadchi machi securisé li yalah drti ntia.
// bima ana post hna makhdmach, fin momkin ikon mochkil ? f formulaire route dyalha
// iwa siri chofi for
// lmochkil baaaaaayn o bzaaaaaaaaaaaaaaf
// daba nti dayra route dial post yak
// o finahia route dial get ? zakaria 3afak ach man get?tani
//
//Route::post('/prodDetailComm/{id}',[CommentaireController::class,'store'])->name('prodDetailComm');


//Route::view("contact", "contact");


//Route::get('send-mail', [MailController::class, 'index']);
//Route::get('/contact', [\App\Http\Controllers\MailController::class, 'index'])->name('contact');
//Route::post('/contact', [\App\Http\Controllers\MailController::class, 'send']);
//Route::post('/contact', [MailController::class,'sendEmail'])->name('contact');



//langue
//Route::get('lang/{lang}', [\App\Http\Controllers\LanguageController::class,'switchLang'])->name('lang.switch');
//Route::get('/languageDemo', [App\Http\Controllers\OffreController::class,'languageDemo']);
