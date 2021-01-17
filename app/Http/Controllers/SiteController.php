<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destiny;
use App\Models\Tip;
use App\Models\Package;
use App\Models\First_home_banner;
use App\Models\Banner;
use DB;
use App\Models\Post;

class SiteController extends Controller {

    //Home Landing Page
    public function index() {
        $posts_area1 = Post::where('page', 'Home - Area 1')->orderBy('created_at', 'DESC')->take(2)->get();
        $post_area2 = Post::where('page', 'Home - Area 2')->inRandomOrder()->first();
        $packages = Post::getRandomCategoryPostsHome();
        $firstbanner = Banner::whereIn('location', ['Home-Banner-1', 'Geral'])->where('published', 1)->inRandomOrder()->take(1)->first();
        $bannercarousel = Banner::whereIn('location', ['Home-Banner-Carrousel'])->where('published', 1)->inRandomOrder()->take(3)->get();

        $seotags = $this->getSeoTags([$posts_area1, $post_area2, $packages, $firstbanner, $bannercarousel]);


        return view('site.home')->with([
                    'posts_area1' => $posts_area1,
                    'post_area2' => $post_area2,
                    'packages' => $packages,
                    'firstbanner' => $firstbanner,
                    'bannercarousel' => $bannercarousel,
                    'seotags' => $seotags
        ]);
    }

    public function reservar () {
        return view('site.reservar');
    }
    public function post($category, Post $post) {
        //If Url category is different of post category
        if (strtolower($post->category->name) != $category) {
            dd('Redirecionar para uma 404');
        }
        switch (strtolower($category)) {
            case 'vantagens':
                $bannercarousel = Banner::whereIn('location', ['Home-Banner-Carrousel'])->where('published', 1)->inRandomOrder()->take(3)->get();
                $packages = Post::getRandomCategoryPostsHome();
                $postsbenefits = Post::getPostsfrombenefits2();
                $carousel = Post::withAnyTag($post->tagSlugs())->where('page', 'Vantagens Interna - (Carrossel)')->where('published', 1)->get();
                $firstbanner = Banner::whereIn('location', ['Home-Banner-1', 'Geral'])->where('published', 1)->inRandomOrder()->take(1)->first();
                $seotags = $this->getSeoTags([$post, $postsbenefits, $carousel]);
                return view('site.internavantagens')->with(['bannercarousel' => $bannercarousel, 'packages' => $packages, 'post' => $post, 'firstbanner' => $firstbanner, 'postsbenefits' => $postsbenefits, 'carousel' => $carousel, 'seotags' => $seotags]);
                break;


            case 'dicas':

                $package = Post::withAnyTag($post->tagSlugs())->whereHas('category', function($query) {
                            $query->where('name', 'Pacotes');
                        })->where('published', 1)->inRandomOrder()->first();
                if ($package == null) {
                    $package = Post::getOneRandom();
                }
                $carousel = Post::withAnyTag($post->tagSlugs())->where('page', 'Dicas Interna - (Carrossel)')->where('published', 1)->get();
               if (count($carousel) == 0) {
                   $carousel = Post::getPostsfrombenefits();
               }
               
                $seotags = $this->getSeoTags([$post, $package, $carousel]);
                return view('site.internadicas')->with(['post' => $post, 'package' => $package, 'carousel' => $carousel, 'seotags' => $seotags]);
                break;
                
                case 'luxo':

                $package = Post::withAnyTag($post->tagSlugs())->whereHas('category', function($query) {
                            $query->where('name', 'Pacotes');
                        })->where('published', 1)->inRandomOrder()->first();
                if ($package == null) {
                    $package = Post::getOneRandom();
                }
                $carousel = Post::withAnyTag($post->tagSlugs())->where('page', 'Luxo Interna - (Carrossel)')->where('published', 1)->get();
               if (count($carousel) == 0) {
                   $carousel = Post::getPostsfrombenefits();
               }
               
                $seotags = $this->getSeoTags([$post, $package, $carousel]);
                return view('site.internaluxo')->with(['post' => $post, 'package' => $package, 'carousel' => $carousel, 'seotags' => $seotags]);
                break;
                case 'passagens':

                $package = Post::withAnyTag($post->tagSlugs())->whereHas('category', function($query) {
                            $query->where('name', 'Pacotes');
                        })->where('published', 1)->inRandomOrder()->first();
                if ($package == null) {
                    $package = Post::getOneRandom();
                }
                $carousel = Post::withAnyTag($post->tagSlugs())->where('page', 'Passagens Interna - (Carrossel)')->where('published', 1)->get();
               if (count($carousel) == 0) {
                   $carousel = Post::getPostsfrompassagens();
               }
               
                $seotags = $this->getSeoTags([$post, $package, $carousel]);
                return view('site.internapassagens')->with(['post' => $post, 'package' => $package, 'carousel' => $carousel, 'seotags' => $seotags]);
                break;

                case 'vistos':

                $package = Post::withAnyTag($post->tagSlugs())->whereHas('category', function($query) {
                $query->where('name', 'Pacotes');
                })->where('published', 1)->inRandomOrder()->first();
                if ($package == null) {
                 $package = Post::getOneRandom();
                }
                $carousel = Post::withAnyTag($post->tagSlugs())->where('page', 'Vistos Interna - (Carrossel)')->where('published', 1)->get();
               if (count($carousel) == 0) {
                   $carousel = Post::getPostsfrompassagens();
               }
               
                $seotags = $this->getSeoTags([$post, $package, $carousel]);
                return view('site.internavistos')->with(['post' => $post, 'package' => $package, 'carousel' => $carousel, 'seotags' => $seotags]);
                break;
                
                 case 'cambio':

                $package = Post::withAnyTag($post->tagSlugs())->whereHas('category', function($query) {
                $query->where('name', 'Câmbio');
                })->where('published', 1)->inRandomOrder()->first();
                if ($package == null) {
                 $package = Post::getOneRandom();
                }
                $carousel = Post::withAnyTag($post->tagSlugs())->where('page', 'Câmbio Interna - (Carrossel)')->where('published', 1)->get();
               if (count($carousel) == 0) {
                   $carousel = Post::getPostsfrompassagens();
               }
               
                $seotags = $this->getSeoTags([$post, $package, $carousel]);
                return view('site.internacambio')->with(['post' => $post, 'package' => $package, 'carousel' => $carousel, 'seotags' => $seotags]);
                break;
                
                 case 'traslados':

                $package = Post::withAnyTag($post->tagSlugs())->whereHas('category', function($query) {
                $query->where('name', 'Traslados');
                })->where('published', 1)->inRandomOrder()->first();
                if ($package == null) {
                 $package = Post::getOneRandom();
                }
                $carousel = Post::withAnyTag($post->tagSlugs())->where('page', 'Traslados Interna - (Carrossel)')->where('published', 1)->get();
               if (count($carousel) == 0) {
                   $carousel = Post::getPostsfrompassagens();
               }
               
                $seotags = $this->getSeoTags([$post, $package, $carousel]);
                return view('site.internatraslados')->with(['post' => $post, 'package' => $package, 'carousel' => $carousel, 'seotags' => $seotags]);
                break;
                
                case 'seguros':

                $package = Post::withAnyTag($post->tagSlugs())->whereHas('category', function($query) {
                $query->where('name', 'Seguros');
                })->where('published', 1)->inRandomOrder()->first();
                if ($package == null) {
                 $package = Post::getOneRandom();
                }
                $carousel = Post::withAnyTag($post->tagSlugs())->where('page', 'Seguros Interna - (Carrossel)')->where('published', 1)->get();
               if (count($carousel) == 0) {
                   $carousel = Post::getPostsfrompassagens();
               }
               
                $seotags = $this->getSeoTags([$post, $package, $carousel]);
                return view('site.internaseguros')->with(['post' => $post, 'package' => $package, 'carousel' => $carousel, 'seotags' => $seotags]);
                break;
                
                 case 'chips':

                $package = Post::withAnyTag($post->tagSlugs())->whereHas('category', function($query) {
                $query->where('name', 'Chips');
                })->where('published', 1)->inRandomOrder()->first();
                if ($package == null) {
                 $package = Post::getOneRandom();
                }
                $carousel = Post::withAnyTag($post->tagSlugs())->where('page', 'Chips Interna - (Carrossel)')->where('published', 1)->get();
               if (count($carousel) == 0) {
                   $carousel = Post::getPostsfrompassagens();
               }
               
                $seotags = $this->getSeoTags([$post, $package, $carousel]);
                return view('site.internachip')->with(['post' => $post, 'package' => $package, 'carousel' => $carousel, 'seotags' => $seotags]);
                break;
                
                

                
            case 'destinos':

                $carrousel = Post::withAnyTag($post->tagSlugs())->orWhere('page', 'Destinos Interna - (Carrossel)')->where('published', 1)->inRandomOrder()->get();
                if(count($carrousel)==0) {
                     $carrousel = Post::getPostsfrombenefits();
                }
                /* if($carrousel_1->count() <= 0){
                  $carrousel_1 = Post::where('published', 1)->inRandomOrder()->get();
                  } */

                $package = Post::withAnyTag($post->tagSlugs())->whereHas('category', function($query) {
                            $query->where('name', 'Pacotes');
                        })->where('published', 1)->inRandomOrder()->first();

                if ($package == null) {
                    $package = Post::whereHas('category', function($query) {
                                $query->where('name', 'Pacotes');
                            })->where('published', 1)->inRandomOrder()->take(4)->get();
                }
                

               
                 $hotels = Post::whereHas('category', function($query) {
                    $query->where('name', 'Hoteis');
                })->orderByDesc('created_at')->inRandomOrder()->inRandomOrder()->take(4)->get();
                $packages = Post::getRandomCategoryPosts($post->tagSlugs());

                $seotags = $this->getSeoTags([$post, $carrousel, $package, $packages]);
                
                return view('site.internadestinos')->with(['hotels'=>$hotels, 'seotags' => $seotags, 'destiny' => $post, 'carrousel' => $carrousel, 'package' => $package,  'packages' => $packages]);
                break;

            case 'hoteis':

                $categorias = Post::getTwoRandomCategoryPosts();

                $area3_posts = Post::withAnyTag($post->tagSlugs())->whereHas('category', function($query) use ($categorias) {
                            $query->where('name', $categorias[0]->name);
                        })->where('published', 1)->inRandomOrder()->take(3)->get();

                $area4_posts = Post::withAnyTag($post->tagSlugs())->whereHas('category', function($query) use ($categorias) {
                            $query->where('name', $categorias[1]->name);
                        })->where('published', 1)->inRandomOrder()->take(3)->get();


                if ($area3_posts->count() > 0) {
                    $area3_title = $categorias[0]->title;
                } else {
                    $area3_title = null;
                }
                if ($area4_posts->count() > 0) {
                    $area4_title = $categorias[1]->title;
                } else {
                    $area4_title = null;
                }

 $like_hotels = Post::withAnyTag($post->tagSlugs())->where('page', 'Hoteis - (Carrossel)')->where('published', 1)->get();
               if (count($like_hotels) == 0) {
                   $like_hotels = Post::getPostsfrombenefits();
               }
               
                $banners = Banner::whereIn('location', ['Hoteis', 'Geral'])->where('published', 1)->inRandomOrder()->get();
                
                if (count($banners) == 0) {
                    $banners = Banner::where('published', 1)->inRandomOrder()->get();
                }

                $seotags = $this->getSeoTags([$area3_posts, $area4_posts, $like_hotels, $banners]);

                return view('site.internahoteis')->with(['seotags' => $seotags, 'post' => $post, 'area3_title' => $area3_title, 'area4_title' => $area4_title, 'area3_posts' => $area3_posts, 'area4_posts' => $area4_posts, 'like_hotels' => $like_hotels, 'banners' => $banners]);

                break;
            case 'pacotes':
                 $carrousel = Post::withAnyTag($post->tagSlugs())->where('page', 'Pacotes Interna - (Carrossel)')->where('published', 1)->get();
               if (count($carrousel) == 0) {
                   $carrousel = Post::getPostsfrompassagens();
               }
                $seotags = $this->getSeoTags($post);
                return view('site.internapacotes')->with(['post' => $post, 'seotags' => $seotags, 'carrousel' => $carrousel]);
                break;
            
           

            default:
                $package = Post::withAnyTag($post->tagSlugs())->whereHas('category', function($query) {
                            $query->where('name', 'Pacotes');
                        })->where('published', 1)->inRandomOrder()->first();
                if ($package == null) {
                    $package = Post::getOneRandom();
                }
                $carousel = Post::withAnyTag($post->tagSlugs())->where('page', 'Geral - (Carrossel)')->where('published', 1)->get();
               if (count($carousel) == 0) {
                   $carousel = Post::getPostsfrombenefits();
               }
               
                $seotags = $this->getSeoTags([$post, $package, $carousel]);
                return view('site.internadicas')->with(['post' => $post, 'package' => $package, 'carousel' => $carousel, 'seotags' => $seotags]);
                break;
        }
    }

    /**
     * Função que retorna tags do Modelo ou dos Modelos passados como parametros
     * @author 'Ewerton' <ewerton@yellowlamp.com.br>
     * @param mixed $model
     *
     * @return void
     */
    
    public function contato () {
        return view('site.contato');
    }
    
    public function reservas () {
        return view('site.reservas');
    }
    public function getSeoTags($model) {

        $seotags = '';
        if (is_array($model)) {
            foreach ($model as $itens) {
                if ($itens instanceof Post) {
                    if (isset($itens->tags)) {
                        foreach ($itens->tags as $tag) {
                            if (!stristr($seotags, $tag->slug)) {
                                $seotags .= $tag->slug . ',';
                            }
                        }
                    }
                } else {
                    if ($itens != null) {

                        foreach ($itens as $item) {
                            if (isset($item->tags)) {
                                foreach ($item->tags as $tag) {
                                    if (!stristr($seotags, $tag->slug)) {
                                        $seotags .= $tag->slug . ',';
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } else {

            if ($model instanceof Post) {
                if (isset($model->tags)) {
                    foreach ($model->tags as $tag) {
                        if (!stristr($seotags, $tag->slug)) {
                            $seotags .= $tag->slug . ',';
                        }
                    }
                }
            } else {
                if ($model != null) {
                    foreach ($model as $item) {
                        if (isset($item->tags)) {
                            foreach ($item->tags as $tag) {
                                if (!stristr($seotags, $tag->slug)) {
                                    $seotags .= $tag->slug . ',';
                                }
                            }
                        }
                    }
                }
            }
        }
        $seotags = rtrim($seotags, ',');
        if ($seotags == '') {
            $seotags = null;
        }
        return $seotags;
    }

    //Destinies Page
    public function destinies() {
        
        $vistos = collect();
        $post = Post::whereHas('category', function($query) {
                    $query->where('name', 'Destinos');
                })->orderByDesc('created_at')->take(15)->inRandomOrder()->get();
       $vistos = $post;
        $seotags = $this->getSeoTags($vistos);


        $vistos = $vistos->chunk(3);
         $carousel = Post::Where('page', 'Destinos - (Carrossel)')->where('published', 1)->inRandomOrder()->get();
                
                if (count($carousel) == 0) {
                    $carousel = Post::getPostsfrombenefits();
                }

        $packages = Post::whereHas('category', function($query) {
                    $query->where('name', 'Pacotes');
                })->inRandomOrder()->take(2)->get();

        return view('site.destinos')->with(['carousel'=>$carousel,'destinies' => $vistos, 'packages' => $packages, 'seotags' => $seotags]);
    }

    //Destiny Details Page
    public function destiny(Destiny $destiny) {
        $carrousel_1 = Banner::withAnyTag($destiny->tagSlugs())->whereIn('location', ['Destinos-carrousel-1', 'Geral'])->whereNotNull(['title', 'body'])->where('published', 1)->inRandomOrder()->get();
        if ($carrousel_1 == null) {
            $carrousel_1 = Banner::whereIn('location', ['Destinos-carrousel-1', 'Geral'])->whereNotNull(['title', 'body'])->where('published', 1)->inRandomOrder()->get();
        }
        $package = Package::withAnyTag($destiny->tagSlugs())->where('published', 1)->inRandomOrder()->first();
        if ($package == null) {
            $package = Package::where('published', 1)->inRandomOrder()->first();
        }

        return view('site.internadestinos')->with(['destiny' => $destiny, 'carrousel_1' => $carrousel_1, 'package' => $package]);
    }

    //Tips Page
    public function tips() {
        
        $vistos = collect();
        $post = Post::whereHas('category', function($query) {
                    $query->where('name', 'Dicas');
                })->orWhere('page', 'Dicas - Area 1')->orderByDesc('created_at')->get();
        $tops = Post::withAnyTag(['Dicas','Informações'])->where('published', 1)->orderByDesc('created_at')->inRandomOrder()->get();
        if(count($tops) > 0) {
          foreach($tops as $forb) {
                foreach($tops as $pingous) {
                    $vistos->push($pingous);
                }
        }
        foreach($post as $p) {
          $vistos->push($p);
        }
        $vistos = $vistos->unique();
           
        } 
        else {
            foreach($post as $p) {
                $vistos->push($p);
            }
        }
        
        
       $banners = Banner::whereIn('location', ['Dicas', 'Geral'])->where('published', 1)->inRandomOrder()->get();
       $carrousel = Post::where('page', 'Dicas - (Carrossel)')->where('published', 1)->get();
               if (count($carrousel) == 0) {
                   $carrousel = Post::getPostsfrompassagens();
               }
        $seotags = $this->getSeoTags($vistos);

        return view('site.dicas')->with(['tips' => $vistos, 'banners' => $banners, 'seotags' => $seotags, 'carrousel' => $carrousel]);
    }
    
      //Tips Page
    public function generalcategories($categories) {
        $categories = $categories;
       
        $catgregory = Post::whereHas('category', function($query) use($categories) {
                    $query->where('name', $categories);
                })->orderByDesc('created_at')->get();
        $banners = Banner::whereIn('location', ['Geral'])->where('published', 1)->inRandomOrder()->get();
       $carrousel = Post::where('page', 'Geral - (Carrossel)')->where('published', 1)->get();
               if (count($carrousel) == 0) {
                   $carrousel = Post::getPostsfrompassagens();
               }
        $seotags = $this->getSeoTags($catgregory);

        return view('site.dicas')->with(['tips' => $catgregory, 'banners' => $banners, 'seotags' => $seotags, 'carrousel' => $carrousel]);
    }

    public function benefits() {
        
        $vistos = collect();
        $post = Post::whereHas('category', function($query) {
                    $query->where('name', 'Vantagens');
                })->orWhere('page', 'Vantagens - Area 1')->orderByDesc('created_at')->get();
        $tops = Post::withAnyTag(['vantagens','vantagem'])->where('published', 1)->orderByDesc('created_at')->inRandomOrder()->get();
        if(count($tops) > 0) {
          foreach($tops as $forb) {
                foreach($tops as $pingous) {
                    $vistos->push($pingous);
                }
        }
        foreach($post as $p) {
          $vistos->push($p);
        }
        $vistos = $vistos->unique();
           
        } 
        else {
            foreach($post as $p) {
                $vistos->push($p);
            }
        }
        
  
        $banners = Banner::whereIn('location', ['Dicas', 'Geral','Vantagens'])->where('published', 1)->inRandomOrder()->get();
         $carrousel = Post::where('page', 'Vantagens - (Carrossel)')->where('published', 1)->get();
               if (count($carrousel) == 0) {
                   $carrousel = Post::getPostsfrompassagens();
               }
        $seotags = $this->getSeoTags($vistos);

        return view('site.vantagens')->with(['tips' => $vistos, 'banners' => $banners, 'seotags' => $seotags, 'carrousel' => $carrousel]);
    }
    
     public function luxury() {
         $vistos = collect();
        $post = Post::whereHas('category', function($query) {
                    $query->where('name', 'Luxo');
                })->orWhere('page', 'Luxury - Area 1')->orderByDesc('created_at')->get();
        $tops = Post::withAnyTag(['luxo','viagens de luxo'])->where('published', 1)->orderByDesc('created_at')->inRandomOrder()->get();
        if(count($tops) > 0) {
          foreach($tops as $forb) {
                foreach($tops as $pingous) {
                    $vistos->push($pingous);
                }
        }
        foreach($post as $p) {
          $vistos->push($p);
        }
        $vistos = $vistos->unique();
           
        } 
        else {
            foreach($post as $p) {
                $vistos->push($p);
            }
        }
         
             $luxury = collect();
       
        
        $banners = Banner::whereIn('location', ['Dicas', 'Geral','Luxo'])->where('published', 1)->inRandomOrder()->get();
 $carrousel = Post::where('page', 'Viagens de Luxo - (Carrossel)')->where('published', 1)->get();
               if (count($carrousel) == 0) {
                   $carrousel = Post::getPostsfrompassagens();
               }
        $seotags = $this->getSeoTags($luxury);

        return view('site.luxury')->with(['tips' => $vistos, 'banners' => $banners, 'seotags' => $seotags, 'carrousel' => $carrousel]);
    }
    
      public function passagens() {
          
       
          
        $vistos = Post::whereHas('category', function($query) {
                    $query->where('name', 'Passagens Aéreas');
                })->orWhere('page', 'Passagens - Área 1')->orderByDesc('created_at')->get();
      
        
            $passagens = collect();
       
       
                $passcollect = collect();
                foreach ($vistos as $key => $pass) {
                    
                    if ($key != 0) {
                        $passcollect->push($vistos);
                    }
                }
              
         $carousel = Post::withAnyTag(['passagens','aereo','avião'])->where('published', 1)->orderByDesc('created_at')->inRandomOrder()->get();
        if(count($carousel) == 0) {
             $carousel = Post::where('published', 1)->orderByDesc('created_at')->inRandomOrder()->get();
        }

        $seotags = $this->getSeoTags($passagens);

        return view('site.passagens')->with(['passagens' => $vistos, 'pass' => $vistos, 'carousel' => $carousel, 'seotags' => $seotags]);
    }
      public function vistos() {
        
        $vistos = Post::whereHas('category', function($query) {
        $query->where('name', 'Vistos');
            })->orWhere('page', 'Vistos - Área 1')->orderByDesc('created_at')->get();
       
        $carousel = Post::withAnyTag(['vistos'])->where('published', 1)->orderByDesc('created_at')->inRandomOrder()->get();
        if(count($carousel) == 0) {
             $carousel = Post::where('published', 1)->orderByDesc('created_at')->inRandomOrder()->get();
        }

        $seotags = $this->getSeoTags($vistos);

        return view('site.vistos')->with(['passagens' => $vistos, 'carousel' => $carousel, 'seotags' => $seotags]);
    }

    public function notices() {
        $tips = collect();
        $post = Post::whereHas('category', function($query) {
        $query->where('name', 'Notícias');
            })->orWhere('page', 'Notícias - Área 1')->orderByDesc('created_at')->get();
        $tops = Post::withAnyTag(['noticias','Notícias'])->where('published', 1)->orderByDesc('created_at')->get();
        if(count($tops) > 0) {
          foreach($tops as $forb) {
                foreach($tops as $pingous) {
                    $tips->push($pingous);
                }
        }
        foreach($post as $p) {
          $tips->push($p);
        }
        $tips = $tips->unique();
           
        } 
        else {
            foreach($post as $p) {
                $tips->push($p);
            }
        }
        $banners = Banner::whereIn('location', ['Dicas', 'Geral', 'Noticias'])->where('published', 1)->inRandomOrder()->get();
        $carrousel = Post::where('page', 'Noticias - (Carrossel)')->where('published', 1)->get();
               if (count($carrousel) == 0) {
                   $carrousel = Post::getPostsfrompassagens();
               }
        $seotags = $this->getSeoTags($tips);

        return view('site.dicas')->with(['tips' => $tips, 'banners' => $banners, 'seotags' => $seotags, 'carrousel' => $carrousel]);
    }

    //Tip Detail Page (Waiting for View)
    /* public function tip(Tip $tips)
      {
      return view('site.')->with('tip', $tip);
      } */

    public function packages() {
        
        $packages = collect();
        $post = Post::whereHas('category', function($query) {
                    $query->where('name', 'Pacotes');
            })->where('published', 1)->orderByDesc('created_at')->inRandomOrder()->get();
        $tops = Post::withAnyTag(['pacotes','packages'])->where('published', 1)->orderByDesc('created_at')->inRandomOrder()->get();
        if(count($tops) > 0) {
          foreach($tops as $forb) {
                foreach($tops as $pingous) {
                    $packages->push($pingous);
                }
        }
        foreach($post as $p) {
          $packages->push($p);
        }
        $packages = $packages->unique();
           
        } 
        else {
            foreach($post as $p) {
                $packages->push($p);
            }
        }
        $packageseo = $packages;

        $packages = $packages->chunk(4);

        $destinies = Post::where('published', 1)->orderByDesc('created_at')->inRandomOrder()->take(3)->get();

        $bannerpacote = Banner::whereIn('location', ['Pacotes', 'Geral'])->where('published', 1)->inRandomOrder()->take(1)->first();


        //$carrousel_1 = Banner::whereIn('location', ['Pacotes-carrousel-1', 'Geral'])->whereNotNull(['title', 'body'])->where('published', 1)->inRandomOrder()->get();
        $carrousel_1 = Post::where('page', 'Pacotes - (Carrossel 1)')->where('published', 1)->inRandomOrder()->get();
        if (count($carrousel_1) == 0) {
                    $carrousel_1 = Post::getPostsfrombenefits();
                }
        $carrousel_2 = Post::where('page', 'Pacotes - (Carrossel 2)')->where('published', 1)->inRandomOrder()->get();
         if (count($carrousel_2) == 0) {
                    $carrousel_2 = Post::getPostsfrombenefits();
                }
        //$carrousel_2 = Banner::whereIn('location', ['Pacotes-carrousel-2', 'Geral'])->whereNotNull(['title', 'body'])->where('published', 1)->inRandomOrder()->get();

        $seotags = $this->getSeoTags([$packageseo, $destinies, $bannerpacote, $carrousel_1, $carrousel_2]);
        return view('site.pacotes')->with(['seotags' => $seotags, 'packages' => $packages, 'destinies' => $destinies, 'carrousel_1' => $carrousel_1, 'carrousel_2' => $carrousel_2, 'bannerpacote' => $bannerpacote]);
    }

    public function mountyourtrip() {
        return view('site.montesuaviagem');
    }

    public function hotels() {
        $hotels = collect();
        $post = Post::withoutTags(['Destaque'])->whereHas('category', function($query) {
                    $query->where('name', 'Hoteis');
                })->orderByDesc('created_at')->inRandomOrder()->take(2)->get();
        $tops = Post::withAnyTag(['hoteis'])->where('published', 1)->orderByDesc('created_at')->inRandomOrder()->take(2)->get();
        if(count($tops) > 0) {
          foreach($tops as $forb) {
                foreach($tops as $pingous) {
                    $hotels->push($pingous);
                }
        }
        foreach($post as $p) {
          $hotels->push($p);
        }
        $hotels = $hotels->unique();
           
        } 
        else {
            foreach($post as $p) {
                $hotels->push($p);
            }
        }
        
        $spotlight_hotels = Post::withAnyTag(['Destaque'])->whereHas('category', function($query) {
                    $query->where('name', 'Hoteis');
                })->orderByDesc('created_at')->inRandomOrder()->get();

        $carousel = Post::where('page', 'Hoteis - (Carrossel)')->inRandomOrder()->get();


        $packages = Post::withAnyTag(['Hoteis', 'Hotel', 'Pousada'])->whereHas('category', function($query) {
                    $query->where('name', 'Pacotes');
                })->inRandomOrder()->take(2)->get();
                if (count($packages) == 0) {
                  $packages = Post::whereHas('category', function($query) {
                    $query->where('name', 'Pacotes');
                })->where('published', 1)->orderByDesc('created_at')->inRandomOrder()->take(2)->get();
                }



        $banners = Banner::whereIn('location', ['Hoteis', 'Geral'])->where('published', 1)->inRandomOrder()->take(3)->get();
        if(count($banners)==0) {
            $banners = Banner::where('published', 1)->inRandomOrder()->take(3)->get();
        }

        $seotags = $this->getSeoTags([$hotels, $spotlight_hotels, $carousel, $packages, $banners]);

        return view('site.hoteis')->with(['hotels' => $hotels, 'banners' => $banners, 'spotlight_hotels' => $spotlight_hotels, 'carousel' => $carousel, 'packages' => $packages, 'seotags' => $seotags]);
    }

 

      public function cambio() {
        
        $vistos = Post::whereHas('category', function($query) {
                    $query->where('name', 'Câmbio');
            })->orWhere('page', 'Câmbio - Área 1')->orderByDesc('created_at')->get();
     
       
        $carousel = Post::withAnyTag(['cambio'])->where('published', 1)->orderByDesc('created_at')->inRandomOrder()->get();
        if(count($carousel) == 0) {
             $carousel = Post::where('published', 1)->orderByDesc('created_at')->inRandomOrder()->get();
        }

        $seotags = $this->getSeoTags($vistos);

        return view('site.cambio')->with(['passagens' => $vistos, 'carousel' => $carousel, 'seotags' => $seotags]);
    }

    public function chip() {
        
        $vistos = Post::whereHas('category', function($query) {
                    $query->where('name', 'Chips');
                })->orWhere('page', 'Chips - Área 1')->orderByDesc('created_at')->get();
        
         $carousel = Post::withAnyTag(['chips'])->where('published', 1)->orderByDesc('created_at')->inRandomOrder()->get();
        if(count($carousel) == 0) {
             $carousel = Post::where('published', 1)->orderByDesc('created_at')->inRandomOrder()->get();
        }

        $seotags = $this->getSeoTags($vistos);

        return view('site.chip')->with(['passagens' => $vistos, 'carousel' => $carousel, 'seotags' => $seotags]);
    }

    public function seguros() {
       
        $vistos = Post::whereHas('category', function($query) {
                    $query->where('name', 'Seguros');
                })->orWhere('page', 'Seguros - Área 1')->orderByDesc('created_at')->get();
     
        $carousel = Post::withAnyTag(['seguros'])->where('published', 1)->orderByDesc('created_at')->inRandomOrder()->get();
        if(count($carousel) == 0) {
             $carousel = Post::where('published', 1)->orderByDesc('created_at')->inRandomOrder()->get();
        }

        $seotags = $this->getSeoTags($vistos);

        return view('site.seguroviagem')->with(['passagens' => $vistos, 'carousel' => $carousel, 'seotags' => $seotags]);
    }
    
     public function passagensaereas() {
        
        $vistos = Post::whereHas('category', function($query) {
        $query->where('name', 'Passagens Aéreas');
            })->orWhere('page', 'Passagens - Área 1')->orderByDesc('created_at')->get();
       
        $carousel = Post::withAnyTag(['passagens','aereo','avião'])->where('published', 1)->orderByDesc('created_at')->inRandomOrder()->get();
        if(count($carousel) == 0) {
             $carousel = Post::where('published', 1)->orderByDesc('created_at')->inRandomOrder()->get();
        }
                
        $seotags = $this->getSeoTags($post);

        return view('site.passagens')->with(['post' => $vistos,'carousel'=>$carousel, 'seotags' => $seotags]);
    }

    public function traslados() {
       
        $vistos = Post::whereHas('category', function($query) {
                    $query->where('name', 'Traslados');
                })->orWhere('page', 'Traslados - Área 1')->orderByDesc('created_at')->get();
        
        $carousel = Post::withAnyTag(['cambio'])->where('published', 1)->orderByDesc('created_at')->inRandomOrder()->get();
        if(count($carousel) == 0) {
             $carousel = Post::where('published', 1)->orderByDesc('created_at')->inRandomOrder()->get();
        }

        $seotags = $this->getSeoTags($vistos);

        return view('site.traslados')->with(['passagens' => $vistos, 'carousel' => $carousel, 'seotags' => $seotags]);
    }

}
