<?php

namespace App\Http\Controllers;

use App\Actualitie;
use App\Email;
use App\Language;
use App\OptionsForProduct;
use App\PartsForProduct;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        $lang = Lang::locale();

//        $products = Product::with('images')->with('product_parts')->with('names')->with('texts')->get();

        $products = Product::with(['images', 'product_parts', 'names' => function($q) use($lang) {
            $q->where('language', '=', $lang);
        }, 'texts' => function($q) use($lang) {
            $q->where('language', '=', $lang);
        }])->get();

        return view('home', [
            'products' => $products
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about(){
        return view('about');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact(){
        return view('contact');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function investors(){
        return view('investors');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function technology()
    {
        return view('technology');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function actualities(Request $request)
    {
        $lang = Lang::locale();
        $lang_id = Language::where('lang', $lang)->first()->id;

        $filter = $request->query('filter');

        if (!empty($filter)) {
            $actualities = Actualitie::with(['images'])->whereHas('actualities_lang', function ($q) use ($lang_id) {
                $q->where('language_id', $lang_id);
            })->where('name', 'like', '%'.$filter.'%')
                ->orderBy('created_at', 'desc')
                ->paginate(3);
        } else {
            $actualities = Actualitie::with(['images'])->whereHas('actualities_lang', function ($q) use ($lang_id) {
                $q->where('language_id', $lang_id);
            })->orderBy('created_at', 'desc')
                ->paginate(3);
        }

        if(Actualitie::all()->count() > 3){
            $rand_actu = Actualitie::all()->random(3);
        }else{
            $rand_actu = Actualitie::all();
        }

        return view('actualities', [
            'actualities' => $actualities,
            'most_read' => $rand_actu
        ])->with('filter', $filter);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function actualitie(Request $request)
    {
        $id = $request['id'];
        $lang = Lang::locale();
        $lang_id = Language::where('lang', $lang)->first()->id;

        $actualities = Actualitie::with(['images'])->whereHas('actualities_lang', function ($q) use ($lang_id) {
            $q->where('language_id', $lang_id);
        })->where('id', $id)->get();

        return view('actualitie', [
            'actualities' => $actualities
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function singlearticle()
    {
        return view('singlearticle');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function products(){

        $lang = Lang::locale();

        $products = Product::with(['images', 'product_parts', 'names' => function($q) use($lang) {
            $q->where('language', '=', $lang);
        }, 'texts' => function($q) use($lang) {
            $q->where('language', '=', $lang);
        }])->get();

        return view('products', [
            'products' => $products
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function product(Request $request){

        $id = $request['id'];
        $lang = Lang::locale();

        $product = Product::with(['images', 'product_parts', 'names' => function($q) use($lang) {
            $q->where('language', '=', $lang);
        }, 'texts' => function($q) use($lang) {
            $q->where('language', '=', $lang);
        }, 'surface_text' => function($q) use($lang) {
            $q->where('language', '=', $lang);
        }])->where('id', $id)->get();

        return view('product', [
            'products' => $product,
            'lang' => $lang
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function product_view(Request $request){
        $id = $request['id'];
        Product::find($id)->increment('views');
        return response()->json(['id' => $id]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function user_email(Request $request){
        $new_email = new Email();
        $new_email->email = $request['user_email'];
        $new_email->country = Lang::locale();
        $new_email->save();

        return back()->with('success', 'Success');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function modules(){

        $lang = Lang::locale();

        $modules = PartsForProduct::with(['part_images', 'part_names' => function($q) use($lang) {
            $q->where('language', '=', $lang);
        }, 'part_texts' => function($q) use($lang) {
            $q->where('language', '=', $lang);
        }])->get();

        $options = OptionsForProduct::with(['names' => function($q) use($lang) {
            $q->where('language', '=', $lang);
        }, 'texts' => function($q) use($lang) {
            $q->where('language', '=', $lang);
        }, 'attributes' => function($q) use($lang) {
            $q->where('language', '=', $lang);
        }])->get();

        $products = Product::with(['product_parts', 'names' => function($q) use($lang) {
            $q->where('language', '=', $lang);
        }])->get();

        return view('modules', [
            'modules'  => $modules,
            'options'  => $options,
            'products' => $products
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function options(){

        $lang = Lang::locale();

        $options = OptionsForProduct::with(['names' => function($q) use($lang) {
            $q->where('language', '=', $lang);
        }, 'texts' => function($q) use($lang) {
            $q->where('language', '=', $lang);
        }, 'attributes' => function($q) use($lang) {
            $q->where('language', '=', $lang);
        }])->get();

        $modules = PartsForProduct::with(['part_images', 'part_names' => function($q) use($lang) {
            $q->where('language', '=', $lang);
        }, 'part_texts' => function($q) use($lang) {
            $q->where('language', '=', $lang);
        }])->get();

        return view('options', [
            'options' => $options,
            'modules' => $modules
        ]);
    }


}
