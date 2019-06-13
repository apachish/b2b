<div class="reqdiv contactleft">
    <h3 class="title">{{__('messages.Contact Info')}}</h3>
    <p class="nameinfo">{{$company->first_name. ' ' . $company->last_name}}</p>
    <p class="contactinfo">{{$company->address}}<br>
       {{$company->city->getName()}}
        -{{$company->state->getName()}} <br>
        {{$company->country->getName()}}</p>
    <div class="sharediv">
        <p class="db pb5"><?= $this->translate("Share on") ?> :</p>
        <a href="#" class="img_scale" title="Facebook"><img src="/images/cmm_face.png" class="vam"
                                                            alt=""></a>
        <a href="#" class="img_scale" title="Twitter"><img src="/images/cmm_twit.png" class="vam"
                                                           alt=""></a>
        <a href="#" class="img_scale" title="Google+"><img src="/images/cmm_g.png" class="vam"
                                                           alt=""></a>
        <a href="#" class="img_scale" title="YouTube"><img src="/images/cmm_Y.png" class="vam"
                                                           alt=""></a>
        <a href="#" class="img_scale" title="Pinterest"><img src="/images/cmm_pinit.png" class="vam"
                                                             alt=""></a>
    </div>
    <p class="referto"><a
                href="{{route('refer-friend') . "?link=" . base64_encode(route()) . "&text=" . base64_encode($company->getCompanyName())}}"
                class="refer border3 ac p5 db uo group1"><img src="/images/refer.png"
                                                              class="vam mr5 pb3"
                                                              alt="">{{__('messages.Refer to Friend')}}
        </a></p>
</div>