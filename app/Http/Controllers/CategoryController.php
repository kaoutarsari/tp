<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Offre;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $cat =Category::where('slug',$slug)->firstOrfail(); 
        $products = $cat->products;

       // return $products;
    
        //wach dik products jaya man model 3lach hadchi 5dam bla madir l with ola has
        // Hadchi 3lach glt lik khassk tfhmi les basics, hada hwa l OOP
        // hadik products rah wahd l function li kayna fost mn model 
        // with kandiroha bach njbdo wahd l haja o m3aha relationship dialha 
        // Matalan bghiti tjbdi categories o fost mn kola category biti ikon wahd variable 
        // fih products, hna fin katnf3k with;
        // example:
        // Ban lik dakchi li khrj lina had le code f browser ?oui
        // Walakin ana bghit njbd category m3a products dialha
        // hna fin katnfe3 with
        // Chfti daba kiwla dakchi ? oui oui rah hadchi fahmah
        // O 3lach glti lia " 3lach hadchi 5dam bla madir l with ola has"
        //hint saraha kant frassi hi with o has had tarika li darti nta daba
        //mahmrha f rassi
        // with o has rah makayjbdoch lik items dial une relationship bohdhom
        // with katjbd lik dak le parent o katjbd lik m3ah relationshi
        // Chofi f browser, rah makayninch ha productss, kayn m3ah smia d cat o slug 
        // o ga3 informations dial category 
        // Mais f hala dialna 7na bghina njbdo ha products mabinach ijbd m3ah infos dial 
        // category 
         // $category = Category::with('products')->first();
         // return $category;
        // Kanqdro ndiro had tariqa haka 
         //$categories = $cat->products;
         //return $categories;
        // fhmti chwya . ouii
        // daba had tariqa nti raki kadkhli l relationship o katqdri diri operations 3la relationship
        // Daba anaftarid a lala nti bghiti ha product lowl f had products dial had category 
        // Ana jbt hir le 1er product mn products dial had category intila9an mn relationship oui
         //$firstProduct = $cat->products()->first();
        // return $firstProduct;
        // daba with kandiroha labina njibo dak l'element o m3ah items dial relationship dialo 
        // mais la bghina hir item dial relationship kandiro kima drt item->relationship

        // daba naftarid nti bghiti diri pagination l dok products li katjibi, kihadiri liha 
        // $firstProduct = $cat->products()->paginate(10);
        // voila lah irdi 3lik.

        // hmmm waqila fixawha f laravel 9, mais qbl makantch katkhdm zakaria katZrab bzaf hhh  nn 5lih 3afak
        // dd($categories);

        // Safe kolchi mzian ?ouii
        // bhal hadchi mahanbqach n3awnk fih !ouii hadchi basic laa safi akhir merra
        // Achno kadir has ? has existe katjib lik chi haja kayna mabin table o table ila kan chi produit madrtch fih 
        //id categories matjibouch with katjib lik kolchiii
        // Non, has katjib lik category li fihom 3la aqal 1 produit, ila drti category mafiha ta produit mahayjibhach lik 
        // chofi achno atkhrj lia hadi
        $cats = Category::has('products')->withCount('products')->get();
        // khrjate lia ga3 les 7 categories .oui
        // walakin machi ga3 categories fihom products yak ?oui
        // ana bghit ha categories li fihom products, hna fin has katkhdm
        // ch7am mn category khrj lia daba ? 3
        // mfhoma has ach kadir ? oui wach momkin n afficher chi variable man product intilakan man has
        // has mt3lqa bl parent, li hwa category, product hwa relationship ma3ndoch 3alaqa b dik has
        // daba ->first() ach kadir lik ? katjib lwlani makandiroch fiha boole
        // iwa has tahia katjib lik chi haja dik l haja hia les categories li mafihomch chi products
        // has = 3ndo bl'anglais 
        // mnin kandiro has kangolo l elequent jib lina items li 3ndhom chi haja 
        // matalan f le cas dialna kangolo l elequent jib lina categories li 3ndhom products 
        // fhmti ?oui
        // chfti achno zdte ? oui
        // lahdi bila kaynin categories 3ndhom 0 products
        // mn category 4 - 7 kamlhom 3ndhom 0 products, 
        // donc mnin andir has, mahayjibhomch lia,
        // wade7 ? ouii

        // a blati ntia mazal khass ntraka lik koi ntraka = nryeh o n3tik wqte. kayban lia mazal khass n3tik les questions
        // had laravel anbdah m3ak a 0 chokraaaaaaan bzaaaf 
        // walakin ana an3tik questions kima 3titk qbel o nti atqlbi mahanjich ana nchre7 lik okk safi mchat
        // walakin khask chwya t7li 3qlek o tsrbi m3aya, daba dok les questions khass had simana tkoni fahmahom
        //li déja 3titini, oui oui had simana 
 
        
        // matnsaych bila tahaja mas3iba, 3ndk 3ql, dakchi li mhtaja mamahtaja ta haja okhra
        // o mhtajani ta ana nsit !hhhhh ouiiiiii yalah bghit ngolha
        // hhhhh a lah ihdik, rah ana la mchit atmanager Rask o mzian.ma3andak fin tamchi 3liya d5ol lhmam b7al 5rojo
        // wakha a lala ma3ndi fin anmchi hhhhh
        // aji ana rah khass ntghada, bslama 3lik bslama
       // return $cats;
        return view('categories-product',compact('cat','products'));

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
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}