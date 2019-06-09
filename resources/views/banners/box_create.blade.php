<div class="boxcolor">
    <p>{{__("Your have not yet posted any ADS at")}}<br>
        <b>{{strtoupper($_SERVER['HTTP_HOST'])}}</b><br>
        {{__("To get quote from verified suppliers")}}</p>
    <p class="btnlink"><a href="{{route('members.leads.post.type_ad',['type_ad' => $type_ad])}}" title="List Now!" class="btn btn-datklist">{{__("List Now!")}}</a></p>
</div>