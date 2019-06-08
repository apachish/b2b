@extends('layouts.main')
@section('css')
    <style>

        @import "/css/fontawesome/font-awesome.min.css";



        .tag{
            top: 0px;
        }
        div.tagsinput {
            border: 1px solid #D5D5D5;
            background: #FFF;
            width: 100%;
            min-height: 30px;
            /*overflow-y: auto;*/
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            padding-left: 10px
        ;
        }
        div.tagsinput span.tag {
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            display: block;
            float: left;
            text-decoration: none;
            background: #1b1e24;
            color: #FFF;
            margin: 2px 0px 2px 2px;
            line-height: 20px;
            padding: 2px 5px 2px 20px;
            position: relative;
        }
        div.tagsinput span.tag a {
            color: #FFF;
            text-decoration: none;
            position: absolute;
            left: 5px;
            width: 15px;
            height: 20px;
            opacity: 0.5;
            filter: alpha(opacity = 50);
        }
        div.tagsinput span.tag a:hover {
            opacity: 1;
            filter: alpha(opacity = 100);
        }
        div.tagsinput span.tag a:before {
            position: absolute;
            font-family: "FontAwesome";
            content: "\f00d";
            color: #FFF;
            font-size: 12px;
            line-height: 20px;
        }
        div.tagsinput input {
            width: 80px;
            margin: 4px 5px;
            border: 0px;
            height: 20px;
            line-height: 20px;
        }
        div.tagsinput div {
            display: block;
            float: left;
        }
        .tags_clear {
            clear: both;
            width: 100%;
            height: 0px;
        }
        .not_valid {
            background: #E04B4A !important;
            color: #FFF !important;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            padding: 0px 5px;
        }
        /* END tagsinput */
        .dashboardnav #navigation .nav ul.nav li>a.act{color:#fff;background:#555;padding: 2px 30px 2px 30px;}

    </style>
@endsection
@section('content')



<!-- TOP dashbord menu -->
<div class="changepass">
    <div id="mobile-header" class="dashboard-menu">
        <a id="responsive-menu-button" href="#sidr-main">{{__("messages.Dashboard")}}</a>
    </div>

        @include('menu_profile')
    <!-- breadcrumb -->
    <section class="breadcrumb">
        <div class="container">
            <span class="right-align" >{{__("messages.You are here")}} :</span>
            <div class="right-align"  itemscope="" itemtype="{{ route('home') }}">
                <a href="{{ route('home') }}" itemprop="url"><span itemprop="title">{{__("messages.Home")}}</span></a>
            </div>
            <i  class="right-align icon-angle-left"></i>
            <div  class="right-align divinhere" itemscope="" itemtype="">
                <a href="{{ route('home') }}" itemprop="url"><span itemprop="title">{{__("messages.Manage Leads")}}</span></a>
            </div>
        </div>
    </section>
    <!-- breadcrumb ENDS -->
</div>
@endsection
@section('javascript')

<script type="text/javascript" src="/js/plugins/tagsinput/jquery.tagsinput.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('input[name="adType"]').on('change',function () {
            var val = $(this).val();
            $('#create_lead').attr('action','/members/post_lead/'+val)
            if(val== "1"){
                $('.sell_only').show()
                $('#div_category2').hide();
                $('#div_category3').hide();

                $('#category option').remove();
                $('#category2 option').remove();
                $('#category3 option').remove();
                $.get("/api/category?only=true", function (data) {
                    console.log(data);
                    var categories = data;
                    console.log(categories);
                    categories.unshift({
                        id: "",
                        text: '{{__("messages.SELECT Category")}}'
                    });
                    $("#category").select2({
                        placeholder: "{{__("messages.SELECT Category")}}",
                        width: '70%',
                        allowClear: false,
                        data: categories,
                    })
                });
            }else{
                $('.sell_only').hide();
                $('#div_category2').hide();
                $('#div_category3').hide();

                $('#category option').remove();
                $('#category2 option').remove();
                $('#category3 option').remove();
                $.get("/api/category", function (data) {
                    console.log(data);
                    var categories = data;
                    console.log(categories);
                    categories.unshift({
                        id: "",
                        text: '{{__("messages.SELECT Category")}}'
                    });
                    $("#category").select2({
                        placeholder: "{{__("messages.SELECT Category")}}",
                        width: '70%',
                        allowClear: false,
                        data: categories,
                    })
                });
            }
        })

        var $select2= $('#category').select2({
            placeholder: "{{__("messages.SELECT Category")}}",
            width: '70%',
            allowClear: true,
            data: [],
        }).on("change", function (e) {
            var parent_id= $('#category').val();
            $('#category2 option').remove();
            console.log(parent_id);
            $("#category2").val('').trigger('change');
            $("#category3").val('').trigger('change');
            if(parent_id) {
                $('#div_category2').show();
                $.get("/api/category?p_pid=" + parent_id, function (data) {
                    console.log(data);
                    var categories = data;
                    console.log(categories);
                    categories.unshift({
                        id: "0",
                        text: '{{__("messages.SELECT Category")}}'
                    });
                    $("#category2").select2({
                        placeholder: "{{__("messages.SELECT Category")}}",
                        width: '70%',
                        allowClear: false,
                        data: categories,
                    }).on("change", function (e) {
                        $('#category3 option').remove();
                        var parent = $('#category2').val();

                        if(parent) {
                            $('#div_category3').show();
                            console.log(parent);
                            $.get("/api/category?p_pid=" + parent_id + "&pid=" + parent, function (data) {
                                console.log(data);
                                var categories = data;
                                categories.unshift({
                                    id: "0",
                                    text: '{{__("messages.SELECT Category")}}'
                                });

                                // mostly used event, fired to the original element when the value changes
                                $("#category3").select2({
                                    placeholder: "{{__("messages.SELECT Category")}}",
                                    width: '70%',
                                    allowClear: true,
                                    maximumSelectionLength: "{{$selectItem}}",

                                    data: categories,
                                });
                            });
                        }else{
                            $('#div_category3').hide();
                            $("#category3").select2({
                                placeholder: "{{__("messages.SELECT Category")}}",
                                width: '70%',
                                allowClear: true,
                                maximumSelectionLength: "{{$selectItem}}",

                                data: [],
                            })
                        }

                    })
                });        // mostly used event, fired to the original element when the value changes
            }else{
                $('#div_category2').hide();
                $('#div_category3').hide();
                $("#category2").select2({
                    placeholder: "{{__("messages.SELECT Category")}}",
                    width: '70%',
                    allowClear: true,

                    data: [],
                });
                $("#category3").select2({
                    placeholder: "{{__("messages.SELECT Category")}}",
                    width: '70%',
                    allowClear: true,
                    maximumSelectionLength: "{{$selectItem}}",

                    data: [],
                })
            }
        });
        var parent_id= $('#category').val();
        $('#category2 option').remove();
        console.log(parent_id);
        $("#category2").val('').trigger('change');
        $("#category3").val('').trigger('change');
        if(parent_id) {
            $('#div_category2').show();
            $.get("/api/category?p_pid=" + parent_id, function (data) {
                console.log(data);
                var categories = data;
                console.log(categories);
                categories.unshift({
                    id: "0",
                    text: '{{__("messages.SELECT Category")}}'
                });
                $("#category2").select2({
                    placeholder: "{{__("messages.SELECT Category")}}",
                    width: '70%',
                    allowClear: false,
                    data: categories,
                }).on("change", function (e) {
                    $('#category3 option').remove();
                    var parent = $('#category2').val();

                    if(parent) {
                        $('#div_category3').show();
                        console.log(parent);
                        $.get("/api/categories/"+ parent_id , function (data) {
                            console.log(data);
                            var categories = data;
                            categories.unshift({
                                id: "0",
                                text: '{{__("messages.SELECT Category")}}'
                            });

                            // mostly used event, fired to the original element when the value changes
                            $("#category3").select2({
                                placeholder: "{{__("messages.SELECT Category")}}",
                                width: '70%',
                                allowClear: true,
                                maximumSelectionLength: "{{$selectItem}}",

                                data: categories,
                            });
                        });
                    }else{
                        $('#div_category3').hide();
                        $("#category3").select2({
                            placeholder: "{{__("messages.SELECT Category")}}",
                            width: '70%',
                            allowClear: true,
                            maximumSelectionLength: "{{$selectItem}}",

                            data: [],
                        })
                    }

                })
            });        // mostly used event, fired to the original element when the value changes
        }
        if($(".tagsinput").length > 0){

            $(".tagsinput").each(function(){

                if($(this).data("placeholder") != ''){
                    var dt = "{{__("messages.add a Meta Keyword")}}";
                }else
                    var dt = "{{__("messages.add a Meta Keyword")}}";

                $(this).tagsInput({width: '100%',height:'auto',defaultText: dt});
            });

        }
    })

</script>
@endsection
