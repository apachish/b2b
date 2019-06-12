<?php

use App\Article;
use App\Banner;
use App\Category as CategoryAlias;
use App\Comment;
use App\Lead;
use App\Media;
use App\Membership;
use App\Order;
use App\PagePosition;
use App\Request as RequestAlias;
use App\Seller;
use App\Testimonial;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Media::class, 100)->create();
        factory(User::class, 100)->create()->each(function ($user) {
            $rand = rand(0, 1);
            if ($rand) {
                $user->sellers()->syncWithoutDetaching($this->seller_select());
                $user->categories()->syncWithoutDetaching($this->category_select($user->category_id));
                $membership = Order::where('member_id', $user->id)->where('upgrade_status', 'New')->where('exp_date', '>', Carbon::now())->first();
                if ($membership == null) {
                    $plan = Membership::where('price', 0)->where('status', 1)->where('locale', app()->getLocale())->first();
                    do {
                        $uniq_code = "INVOICE-" . Str::random(6);
                    } while (Order::whereOrderNo($uniq_code)->count() > 0);
                    if ($plan) {
                        $membership = Order::create([
                            'order_no' => $uniq_code,
                            'member_id' => $user->id,
                            'plan_id' => $plan->id,
                            'plan_name' => $plan->plan_name,
                            'price' => $plan->price,
                            'duration' => $plan->duration,
                            'allowed_products' => $plan->product_upload,
                            'allowed_request' => $plan->no_of_enquiry,
                            'activation_date' => Carbon::now(),
                            'exp_date' => Carbon::now()->addMonth($plan->duration),
                            'payment_status' => '0',
                            'payment_mode' => 'Paypal',
                            'upgrade_status' => 'New'
                        ]);
                    }
                }
                $number_product = rand(1, 6);
                $membership->post_products = $number_product;
                $membership->update();
                $user->leads()->saveMany(factory(Lead::class, rand(1, 6))->make())->each(function ($lead) use ($user) {
                    $lead->categories()->syncWithoutDetaching($this->category_select());
                    $lead->medias()->syncWithoutDetaching($this->media_select());
                    $lead->pagePositions()->syncWithoutDetaching($this->page_select());

                    $lead->requests()->saveMany(factory(RequestAlias::class, rand(1, 3))->make(['member_id' => $user->id]));
                });
            } else {
                $banner = $user->banners()
                    ->create(factory(Banner::class)->make()->toArray());
                $banner->categories()->syncWithoutDetaching($this->category_select());
                $banner->pagePositions()->syncWithoutDetaching($this->page_select());
                if($banner->type == Banner::BANNER_USER){
                    $banner->bannerInfo()->create(factory(Banner::class)->make()->toArray());
                }

            }
        });
        factory(Article::class, 100)->create()->each(function ($article) {
            $article->comments()->saveMany(factory(Comment::class, rand(1, 10))->make());
        });
        factory(Testimonial::class, 100)->create();

    }

    public function category_select($random_category_parent = null)
    {
        if ($random_category_parent == null)
            $random_category_parent = CategoryAlias::where('parent_id', null)->inRandomOrder()->first()->id;//->pluck('id')->toArray();
        $random_category_sub = CategoryAlias::where('parent_id', $random_category_parent)->first()->id;
        $random_category = CategoryAlias::where('parent_id', $random_category_sub)->orderByRaw('RAND()')->take(rand(1, 4))->pluck('id')->toArray();

        return $random_category;

    }

    public function media_select()
    {
        $data =[];
         $random_media = Media::where('status', 1)->where('type', Media::TYPE_MEDIA_PHOTO)->orderByRaw('RAND()')->take(rand(1, 4))->pluck('id')->toArray();
        foreach ($random_media as $i=>$media){
            $data[$media] = ['is_default'=>!$i?1:0,'sort_order'=>$i];

        }
        return $data;
    }

    public function seller_select()
    {
        return $random_seller = Seller::orderByRaw('RAND()')->take(rand(1, 3))->pluck('id')->toArray();

    }
    public function page_select()
    {
        return $random_page = PagePosition::orderByRaw('RAND()')->take(rand(1, 3))->pluck('id')->toArray();

    }
}
