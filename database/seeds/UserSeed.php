<?php

use App\Banner;
use App\Category as CategoryAlias;
use App\Lead;
use App\Media;
use App\Request as RequestAlias;
use App\Seller;
use App\User;
use Illuminate\Database\Seeder;

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
                $user->leads()->saveMany(factory(Lead::class, rand(1, 6))->make())->each(function ($lead) use ($user) {
                    $lead->categories()->syncWithoutDetaching($this->category_select());
                    $lead->medias()->syncWithoutDetaching($this->media_select());
                    $lead->requests()->saveMany(factory(RequestAlias::class, rand(1, 3))->make(['member_id' => $user->id]));
                });
            } else {
                $banner = $user->banners()
                    ->create(factory(Banner::class)->make()->toArray());
                $banner->categories()->syncWithoutDetaching($this->category_select());
                if($banner->type == Banner::BANNER_USER){
                    $banner->bannerInfo()->create(factory(Banner::class)->make()->toArray());
                }

            }
        });

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
        return $random_media = Media::where('status', 1)->where('type', Media::TYPE_MEDIA_PHOTO)->orderByRaw('RAND()')->take(rand(1, 4))->pluck('id')->toArray();

    }

    public function seller_select()
    {
        return $random_seller = Seller::orderByRaw('RAND()')->take(rand(1, 3))->pluck('id')->toArray();

    }
}
