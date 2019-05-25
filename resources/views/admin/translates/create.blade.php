@extends('layouts.admin')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ url('admin') }}">{{ __("messages.Home") }}</a></li>
        <li><a href="{{ url('admin') }}">{{ __("Other Management") }}</a></li>
        <li><a href="{{route('translators.index')}}">{{ __("messages.Translator") }}</a></li>
        <li class="active"><a href="{{route('translators.create')}}">{{ __("messages.Create Translator") }}</a></li>
    </ul>
    <!-- END BREADCRUMB -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        @include('admin.categories.error')
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('translators.store') }}"
                      id="jvalidate" class="form-horizontal" method="post" enctype="multipart/form-data">

                    {{csrf_field()}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <strong>{{ __("messages.Create") }}</strong> {{ __("messages.Translator") }}</h3>
                            <ul class="panel-controls">
                            </ul>
                        </div>
                        <div class="panel-body">

                        </div>
                        <div class="panel-body">

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("messages.Name") }}</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span
                                                            class="fa fa-pencil"></span></span>
                                                <input type="text" name="key" id="key" value="{{old('key')}}" class=" form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("messages.Farsi") }}</label>
                                        <div class="col-md-9 col-xs-12">


                                                <textarea class="form-control" name="name_fa" rows="5">{{old('name_fa')}}</textarea>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("messages.English") }}</label>
                                        <div class="col-md-9 col-xs-12">
                                        <textarea class="form-control" name="name_en" rows="5">{{old('name_en')}}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary" type="reset" >
                            {{ __("messages.Clear Form") }}</button>
                            <button class="btn btn-primary submit" type="submit">{{ __("messages.Submit") }}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

@endsection
