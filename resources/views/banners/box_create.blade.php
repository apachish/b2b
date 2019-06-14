<div class="boxcolor">
    <p>{{__("messages.Your have not yet posted any ADS at")}}<br>
        <b>{{strtoupper($_SERVER['HTTP_HOST'])}}</b><br>
        {{__("messages.To get quote from verified suppliers")}}</p>
    <p class="btnlink"><a href="{{route('members.leads.post.type_ad',['type_ad' => isset($type_ad)?$type_ad:'buy'])}}" title="{{__("messages.List Now!")}}" class="btn btn-datklist">{{__("messages.List Now!")}}</a></p>
</div>