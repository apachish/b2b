<h3 class="title-cat">{{ __("messages.Featured Products") }}</h3>
<?php
$url_append = "";
if($this->category){
    $url_append = "?category=".$this->category;
}

if($this->type_featured){
    if($url_append){
        $url_append .="&";
    }else{
        $url_append .="?";

    }
    $url_append .= "featured=".$this->type_featured;
}
?>
<p class="morelink"><a href="<?= $this->url('home/featured').$url_append ?>" title="View All"
                       class="uo"><?= $this->translate("View All") ?></a></p>
<ul class="listfeatureleft">
    <?php if (!empty($this->featureds)) { ?>

    <?php foreach ($this->featureds as $featured): ?>
    <li class="bb1">
        <div class="pro_list auto mb10 mt10">
            <?php if ($featured['adType'] == 1 || $featured['adType'] == 'sell'): ?>

            <div class="pro_pc">

                <figure>
                    <a href="<?= $this->url('home/product', ['cat_id' => $featured['categoryId'], 'id' => $featured['id']]) ?>"
                       title="">
                        <img src="<?= $featured['image'] ?>" alt="" width="100px" height="100px">
                    </a></figure>
            </div>
            <?php endif; ?>

            <p class="pro-list-title"><a
                        href="<?= $this->url('home/product', ['cat_id' => $featured['categoryId'], 'id' => $featured['id']]) ?>"
                        class="uo" title=""><?= $featured['productName'] ?></a></p>
            <p class="pro-detials">
            <?php if ($featured['adType'] == 1 || $featured['adType'] == 'sell' || $this->membership): ?>
            <!--                                    <a href="--><? //= $this->url('company/detail',['id'=>$company['id']])?><!--" class="uo">--><? //=$company['companyName']?><!--</a>-->
                <a href="<?= $this->url('company/detail', ['id' => $featured['memberId']]) ?>" class="uo"
                   title=""><?= $featured['supplier_name'] ?></a>

                <?php elseif ($featured['adType'] == 2 || $featured['adType'] == 'buy'): ?>
                            <?= $this->translate('Buyer') . "  " . $featured['firstName'] ?>
                        <?php endif; ?>
            </p>
            <p class="pro-list-des"><?= $featured['productsDescription'] ?></p>
        </div>
    </li>
    <?php endforeach; ?>
    <?php } ?>
</ul>
