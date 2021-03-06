<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Lead;
use App\Request as RequestModel;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    public function index(Request $request)
    {
        $filter = [
            'lead' => $request->get('lead', ''),
            'sort' => $request->get('sort', 'DESC'),
            'limit' => $request->get('limit', 15),
        ];
        $requests = RequestModel::whereHas('lead', function ($q) {
//                $q->where('user_id',auth()->id());
        });
        $count = $requests->count();
        $requests = $requests->paginate($request->get('limit', 15));
        $leads = Lead::where('user_id', auth()->id())->get();
        return view('requests.index', compact('requests', 'leads', 'filter','count'));
    }

    public function show(Request $request, $id_request)
    {
        $request = RequestModel::findOrFail($id_request);

        return  view('requests.show',compact('request'));
    }

    public function send(Request $request,$slug_leads)
    {
        $lead = Lead::where('product_friendly_url',$slug_leads)->where('status', 1)->where('approval_status', 2)->firstOrFail();
        return view('requests.send',compact('lead'));
    }

    public function store(StoreRequest $request)
    {

    }
}
