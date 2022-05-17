<?php

namespace App\Http\Controllers;

use App\Actualitie;
use App\ActualitieImages;
use App\ActualitiesLanguage;
use App\Email;
use App\Language;
use App\OptionAttributes;
use App\OptionImages;
use App\OptionNames;
use App\OptionsForProduct;
use App\OptionTexts;
use App\PartImages;
use App\PartNames;
use App\PartsForProduct;
use App\PartTexts;
use App\ProductNames;
use App\ProductParts;
use App\ProductSurface;
use App\ProductTexts;
use Illuminate\Http\Request;
use App\Product;
use App\ProductImages;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{

    /*
     *
     * PRODUCT ******************************************************************
     *
     */

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function admin (){

        $products = Product::all();
        $parts = PartsForProduct::get();
        $language = Language::all();

        return view('admin.admin', [
            'products' => $products,
            'parts' => $parts,
            'language' => $language
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete_product (Request $request) {

        $id_product = $request['id'];
        Product::where('id', $id_product)->delete();
        ProductImages::where('product_id', $id_product)->delete();
        ProductNames::where('product_id', $id_product)->delete();
        ProductTexts::where('product_id', $id_product)->delete();
        ProductParts::where('product_id', $id_product)->delete();
        ProductSurface::where('product_id', $id_product)->delete();
        $image_path = public_path('images\products\product_'.$id_product); // upload path
        if(File::exists($image_path)) {
            File::deleteDirectory($image_path);
        }

        return back()->with('success', 'Product Deleted Successfully');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit_product (Request $request) {

        Product::where('id', $request['product_id'])->update(['price' => $request['price'], 'surface' => $request['surface'], 'type' => $request['type']]);

        $check = $request->all();

        foreach ($check as $key => $req){
            if(strpos($key, 'part') !== false){
                if($req != null && $req != '') {
                    $product_part = new ProductParts();
                    $product_part->product_id = $request['product_id'];
                    $product_part->part_id = $req;
                    $product_part->save();
                }
            }
            if(strpos($key, 'name') !== false){
                if($req != null && $req != '') {
                    $part_lang = explode('_', $key)[1];
                    ProductNames::updateOrCreate(
                        ['product_id' => $request['product_id'], 'language' => $part_lang],
                        ['name' => $req]
                    );
                }
            }
            if(strpos($key, 'text') !== false){
                if($req != null && $req != '') {
                    $part_lang = explode('_', $key)[1];
                    ProductTexts::updateOrCreate(
                        ['product_id' => $request['product_id'], 'language' => $part_lang],
                        ['text' => $req]
                    );
                }
            }

            if(strpos($key, 'surtxt') !== false){
                if($req != null && $req != '') {
                    $part_lang = explode('_', $key)[1];
                    ProductSurface::updateOrCreate(
                        ['product_id' => $request['product_id'], 'language' => $part_lang],
                        ['surface' => $req]
                    );
                }
            }
        }

        if ($photos = $request->file('photos')) {

            // Define upload path
            $destinationPath = public_path('/images/products/product_'.$request['product_id'].'/'); // upload path
            foreach($photos as $img) {
                // Upload Orginal Image
                $profileImage =$img->getClientOriginalName();
                $img->move($destinationPath, $profileImage);

                //save photo in database
                $new_photo = new ProductImages;
                $new_photo->product_id = $request['product_id'];
                $new_photo->name = $profileImage;
                $new_photo->save();
            }

        }

        return back()->with('success', 'Product Saved Successfully');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add_product (Request $request) {

        //save product
        $new_product = new Product();
        $new_product->price = $request['price'];
        $new_product->surface = $request['surface'];
        $new_product->type = $request['type'];
        $new_product->save();

        $check = $request->all();

        foreach ($check as $key => $req){
            if(strpos($key, 'part') !== false){
                if($req != null && $req != '') {
                    $part_id = explode('_', $key)[1];
                    for ($x = 0; $x < $request['count_part_'.$part_id]; $x++) {
                        $product_part = new ProductParts();
                        $product_part->product_id = $new_product->id;
                        $product_part->part_id = $req;
                        $product_part->save();
                    }
                }
            }
            if(strpos($key, 'name') !== false){
                if($req != null && $req != '') {
                    $part_lang = explode('_', $key)[1];
                    $product_name = new ProductNames();
                    $product_name->name = $req;
                    $product_name->language = $part_lang;
                    $product_name->product_id = $new_product->id;
                    $product_name->save();
                }
            }
            if(strpos($key, 'text') !== false){
                $part_lang = explode('_',$key )[1];
                if($req != null && $req != ''){
                    $product_text = new ProductTexts();
                    $product_text->text = $req;
                    $product_text->language = $part_lang;
                    $product_text->product_id = $new_product->id;
                    $product_text->save();
                }
            }
            if(strpos($key, 'surtxt') !== false){
                $part_lang = explode('_',$key )[1];
                if($req != null && $req != ''){
                    $product_text = new ProductSurface();
                    $product_text->surface = $req;
                    $product_text->language = $part_lang;
                    $product_text->product_id = $new_product->id;
                    $product_text->save();
                }
            }
        }

        if ($photos = $request->file('photos')) {

            // Define upload path
            $destinationPath = public_path('/images/products/product_'.$new_product->id.'/'); // upload path
            foreach($photos as $img) {
                // Upload Orginal Image
                $profileImage =$img->getClientOriginalName();
                $img->move($destinationPath, $profileImage);

                //save photo in database
                $new_photo = new ProductImages;
                $new_photo->product_id = $new_product->id;
                $new_photo->name = $profileImage;
                $new_photo->save();
            }

        }

        return back()->with('success', 'Product Saved Successfully');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete_product_photo (Request $request) {

        $image_name = $request['image_name'];
        $id = $request['id'];
        $image_id = $request['photo_id'];
        $image_path = public_path('/images/products/product_'.$id.'/'.$image_name); // upload path
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        ProductImages::where('id', $image_id)->delete();
        return response()->json(['image_id' => $image_id]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete_part_product (Request $request) {

        $part_id = $request['id'];
        $product_id = $request['product_id'];

        ProductParts::where('product_id', $product_id)->where('part_id', $part_id)->first()->delete();
        return response()->json(['part_id' => $part_id]);

    }

    /*
     *
     * PART ***********************************************************************
     *
     */

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function parts (Request $request) {

        $parts = PartsForProduct::all();
        $language = Language::all();

        return view('admin.parts', [
            'parts' => $parts,
            'language' => $language
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete_part (Request $request) {

        $id_part = $request['id'];
        PartsForProduct::where('id', $id_part)->delete();
        PartImages::where('part_id', $id_part)->delete();
        PartNames::where('part_id', $id_part)->delete();
        PartTexts::where('part_id', $id_part)->delete();
        $image_path = public_path('images\parts\part_'.$id_part); // upload path
        if(File::exists($image_path)) {
            File::deleteDirectory($image_path);
        }

        return back()->with('success', 'Part Deleted Successfully');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit_part (Request $request) {

        PartsForProduct::where('id', $request['part_id'])->update(['price' => $request['price'], 'surface' => $request['surface']]);

        $check = $request->all();

        foreach ($check as $key => $req){
            if(strpos($key, 'name') !== false){
                if($req != null && $req != '') {
                    $part_lang = explode('_', $key)[1];
                    PartNames::updateOrCreate(
                        ['part_id' => $request['part_id'], 'language' => $part_lang],
                        ['name' => $req]
                    );
                }
            }
            if(strpos($key, 'text') !== false){
                if($req != null && $req != '') {
                    $part_lang = explode('_', $key)[1];
                    PartTexts::updateOrCreate(
                        ['part_id' => $request['part_id'], 'language' => $part_lang],
                        ['text' => $req]
                    );
                }
            }
        }

        if ($photos = $request->file('photos')) {

            // Define upload path
            $destinationPath = public_path('/images/parts/part_'.$request['part_id'].'/'); // upload path
            foreach($photos as $img) {
                // Upload Orginal Image
                $profileImage =$img->getClientOriginalName();
                $img->move($destinationPath, $profileImage);

                //save photo in database
                $new_photo = new PartImages();
                $new_photo->part_id = $request['part_id'];
                $new_photo->name = $profileImage;
                $new_photo->save();
            }

        }

        return back()->with('success', 'Part Saved Successfully');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add_part (Request $request) {

        //save part
        $new_part = new PartsForProduct();
        $new_part->price = $request['price'];
        $new_part->surface = $request['surface'];
        $new_part->save();

        $check = $request->all();

        foreach ($check as $key => $req){
            if(strpos($key, 'name') !== false){
                if($req != null && $req != '') {
                    $part_lang = explode('_', $key)[1];
                    $part_name = new PartNames();
                    $part_name->name = $req;
                    $part_name->language = $part_lang;
                    $part_name->part_id = $new_part->id;
                    $part_name->save();
                }
            }

            if(strpos($key, 'text') !== false){
                $part_lang = explode('_',$key )[1];
                if($req != null && $req != ''){
                    $part_text = new PartTexts();
                    $part_text->text = $req;
                    $part_text->language = $part_lang;
                    $part_text->part_id = $new_part->id;
                    $part_text->save();
                }
            }
        }

        if ($photos = $request->file('photos')) {

            // Define upload path
            $destinationPath = public_path('/images/parts/part_'.$new_part->id.'/'); // upload path
            foreach($photos as $img) {
                // Upload Orginal Image
                $profileImage =$img->getClientOriginalName();
                $img->move($destinationPath, $profileImage);

                //save photo in database
                $new_photo = new PartImages();
                $new_photo->part_id = $new_part->id;
                $new_photo->name = $profileImage;
                $new_photo->save();
            }

        }

        return back()->with('success', 'Part Saved Successfully');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete_part_photo (Request $request) {

        $image_name = $request['image_name'];
        $id = $request['id'];
        $image_id = $request['photo_id'];
        $image_path = public_path('/images/parts/part_'.$id.'/'.$image_name); // upload path
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        PartImages::where('id', $image_id)->delete();
        return response()->json(['image_id' => $image_id]);

    }

    /*
     *
     * OPTION ***********************************************************************
     *
     */

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function options (Request $request) {

        $options = OptionsForProduct::all();
        $language = Language::all();

        return view('admin.options', [
            'options' => $options,
            'language' => $language
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete_option (Request $request) {

        $id_option = $request['id'];
        OptionsForProduct::where('id', $id_option)->delete();
        OptionAttributes::where('option_id', $id_option)->delete();
        OptionTexts::where('option_id', $id_option)->delete();
        OptionNames::where('option_id', $id_option)->delete();

//        OptionImages::where('option_id', $id_option)->delete();
//        $image_path = public_path('images\options\option_'.$id_option); // upload path
//        if(File::exists($image_path)) {
//            File::deleteDirectory($image_path);
//        }

        return back()->with('success', 'Option Deleted Successfully');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit_option (Request $request) {

        OptionsForProduct::where('id', $request['option_id'])->update(['type' => $request['type'], 'price' => $request['price']]);

        $check = $request->all();

        foreach ($check as $key => $req){
            if(strpos($key, 'name') !== false){
                if($req != null && $req != '') {
                    $option_lang = explode('_', $key)[1];
                    OptionNames::updateOrCreate(
                        ['option_id' => $request['option_id'], 'language' => $option_lang],
                        ['name' => $req]
                    );
                }
            }
            if(strpos($key, 'text') !== false){
                if($req != null && $req != '') {
                    $option_lang = explode('_', $key)[1];
                    OptionTexts::updateOrCreate(
                        ['option_id' => $request['option_id'], 'language' => $option_lang],
                        ['text' => $req]
                    );
                }
            }
            if(strpos($key, 'attributes') !== false){
                if($req != null && $req != '') {
                    $option_lang = explode('_', $key)[1];
                    OptionAttributes::updateOrCreate(
                        ['option_id' => $request['option_id'], 'language' => $option_lang],
                        ['attributes' => $req]
                    );
                }
            }
        }

//        if ($photos = $request->file('photos')) {
//
//            // Define upload path
//            $destinationPath = public_path('/images/options/option_'.$request['option_id'].'/'); // upload path
//            foreach($photos as $img) {
//                // Upload Orginal Image
//                $profileImage =$img->getClientOriginalName();
//                $img->move($destinationPath, $profileImage);
//
//                //save photo in database
//                $new_photo = new OptionImages();
//                $new_photo->option_id = $request['option_id'];
//                $new_photo->name = $profileImage;
//                $new_photo->save();
//            }
//
//        }

        return back()->with('success', 'Option Saved Successfully');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add_option (Request $request) {

        //save option
        $new_option = new OptionsForProduct();
        $new_option->type = $request['type'];
        $new_option->price = $request['price'];
        $new_option->save();

        $check = $request->all();

        foreach ($check as $key => $req){
            if(strpos($key, 'name') !== false){
                if($req != null && $req != '') {
                    $part_lang = explode('_', $key)[1];
                    $part_name = new OptionNames();
                    $part_name->name = $req;
                    $part_name->language = $part_lang;
                    $part_name->option_id = $new_option->id;
                    $part_name->save();
                }
            }

            if(strpos($key, 'text') !== false){
                $part_lang = explode('_',$key )[1];
                if($req != null && $req != ''){
                    $part_text = new OptionTexts();
                    $part_text->text = $req;
                    $part_text->language = $part_lang;
                    $part_text->option_id = $new_option->id;
                    $part_text->save();
                }
            }

            if(strpos($key, 'attributes') !== false){
                $part_lang = explode('_',$key )[1];
                if($req != null && $req != ''){
                    $part_text = new OptionAttributes();
                    $part_text->attributes = $req;
                    $part_text->language = $part_lang;
                    $part_text->option_id = $new_option->id;
                    $part_text->save();
                }
            }
        }

//        if ($photos = $request->file('photos')) {
//
//            // Define upload path
//            $destinationPath = public_path('/images/options/option_'.$new_option->id.'/'); // upload path
//            foreach($photos as $img) {
//                // Upload Orginal Image
//                $profileImage =$img->getClientOriginalName();
//                $img->move($destinationPath, $profileImage);
//
//                //save photo in database
//                $new_photo = new OptionImages();
//                $new_photo->option_id = $new_option->id;
//                $new_photo->name = $profileImage;
//                $new_photo->save();
//            }
//
//        }

        return back()->with('success', 'Option Saved Successfully');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete_option_photo (Request $request) {

        $image_name = $request['image_name'];
        $id = $request['id'];
        $image_id = $request['photo_id'];
        $image_path = public_path('/images/options/option_'.$id.'/'.$image_name); // upload path
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        OptionImages::where('id', $image_id)->delete();
        return response()->json(['image_id' => $image_id]);

    }

    /*
     *
     * Actualities ********************************************************************
     *
     */

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function actualities (Request $request) {

        $actualities = Actualitie::orderBy('id', 'DESC')->get();
        $language = Language::all();

        return view('admin.actualities', [
            'actualities' => $actualities,
            'language' => $language
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete_actualities (Request $request) {

        $id_actualities = $request['id'];
        Actualitie::where('id', $id_actualities)->delete();
        ActualitiesLanguage::where('actualities_id', $id_actualities)->delete();
        ActualitieImages::where('actualities_id', $id_actualities)->delete();

        return back()->with('success', 'Actualities Deleted Successfully');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit_actualities (Request $request) {

        $date = \DateTime::createFromFormat("U", strtotime($request['date']));
        Actualitie::where('id', $request['actualities_id'])->update(['name' => $request['name'], 'text' => $request['text'], 'created_at' => $date]);
        ActualitiesLanguage::where('actualities_id', $request['actualities_id'])->delete();

        $check = $request->all();

        foreach ($check as $key => $req){
            if(strpos($key, 'lang') !== false){
                $lang_id = explode('_',$key )[1];
                if($req != null && $req != ''){
                    $act_lang = new ActualitiesLanguage();
                    $act_lang->actualities_id = $request['actualities_id'];
                    $act_lang->language_id = $lang_id;
                    $act_lang->save();
                }
            }
        }

        if ($photos = $request->file('photos')) {

            // Define upload path
            $destinationPath = public_path('/images/actualities/actualities_'.$request['actualities_id'].'/'); // upload path
            foreach($photos as $img) {
                // Upload Orginal Image
                $profileImage =$img->getClientOriginalName();
                $img->move($destinationPath, $profileImage);

                //save photo in database
                $new_photo = new ActualitieImages();
                $new_photo->actualities_id = $request['actualities_id'];
                $new_photo->name = $profileImage;
                $new_photo->save();
            }

        }

        return back()->with('success', 'Actualities Saved Successfully');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add_actualities (Request $request) {

        //save actualities
        $date = \DateTime::createFromFormat("U", strtotime($request['date']));

        $new_actualities = new Actualitie();
        $new_actualities->name = $request['name'];
        $new_actualities->text = $request['text'];
        $new_actualities->created_at = $date;
        $new_actualities->save();

        $check = $request->all();

        foreach ($check as $key => $req){
            if(strpos($key, 'lang') !== false){
                $lang_id = explode('_',$key )[1];
                if($req != null && $req != ''){
                    $act_lang = new ActualitiesLanguage();
                    $act_lang->actualities_id = $new_actualities->id;
                    $act_lang->language_id = $lang_id;
                    $act_lang->save();
                }
            }
        }

        if ($photos = $request->file('photos')) {

            // Define upload path
            $destinationPath = public_path('/images/actualities/actualities_'.$new_actualities->id.'/'); // upload path
            foreach($photos as $img) {
                // Upload Orginal Image
                $profileImage =$img->getClientOriginalName();
                $img->move($destinationPath, $profileImage);

                //save photo in database
                $new_photo = new ActualitieImages();
                $new_photo->actualities_id = $new_actualities->id;
                $new_photo->name = $profileImage;
                $new_photo->save();
            }

        }

        return back()->with('success', 'Actualities Saved Successfully');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete_actualities_photo (Request $request) {

        $image_name = $request['image_name'];
        $id = $request['id'];
        $image_id = $request['photo_id'];
        $image_path = public_path('/images/actualities/actualities_'.$id.'/'.$image_name); // upload path
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        ActualitieImages::where('id', $image_id)->delete();
        return response()->json(['image_id' => $image_id]);

    }

    /*
     *
     * LANGUAGE ***********************************************************************
     *
     */

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function language (Request $request) {

        $language = Language::all();

        return view('admin.language', [
            'languages' => $language
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete_language (Request $request) {

        Language::where('id', $request['id'])->delete();
        return back()->with('success', 'Language Deleted Successfully');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add_language (Request $request) {

        //save language
        $new_lang = new Language();
        $new_lang->lang = $request['lang'];
        $new_lang->save();

        return back()->with('success', 'Language Saved Successfully');

    }

    /*
    *
    * EMAILS ***********************************************************************
    *
    */

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function emails (Request $request) {

        $emails = Email::all();

        return view('admin.emails', [
            'emails' => $emails
        ]);

    }

}
