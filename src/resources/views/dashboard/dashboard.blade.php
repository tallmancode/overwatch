@extends('OverWatch::layouts.main')

@section('page-title', 'Dashboard')

@section('content')
<div class="page-content">
       <div class="container-fluid row">
            <div class="col-xs-12 col-sm-6 col-md-4"><div class="panel widget center bgimage" style="margin-bottom:0;overflow:hidden;background-image:url('{{ overwatch_asset("images/widget-backgrounds/01.jpg")}}');">
                <div class="dimmer"></div>
                <div class="panel-content">
                    <h4>Users</h4>
                    <p>You are currently using the defualt user. We recommend you delete it and create your own!</p>
                    <a href="{{ route('overwatch.users') }}" class="btn btn-primary">Go To Users Now</a>
                </div>
            </div>
            </div>
       </div>
    </div>
@endsection

