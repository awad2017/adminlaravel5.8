@extends('layouts.dashboard.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.add')</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}">@lang('site.dashboard')</a> </li>
                <li><a href="{{ route('dashboard.users.index') }}">@lang('site.users')</a></li>
                <li class="active">@lang('site.add')</li>
            </ol>
        </section>
        <section class="content">
          <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">@lang('site.add')</h3>
                </div><!-- end of box header -->
            <div class="box-body">
                @include('partials._errors')
                <form action="{{ route('dashboard.users.store') }}" method="POST">
                    @csrf
                    {{ method_field('post') }}
                    <div class="form-group">
                        <label>@lang('site.first_name')</label>
                        <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}">
                    </div>
                    <div class="form-group">
                        <label>@lang('site.last_name')</label>
                        <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
                    </div>
                    <div class="form-group">
                        <label>@lang('site.email')</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label>@lang('site.password')</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>@lang('site.password_confirmation')</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>@lang('site.permissions')</label>
                        <div class="nav-tabs-custom">
                            @php
                              $models = ['users', 'categories', 'products'];
                            @endphp
                            <ul class="nav nav-tabs">
                                @foreach ($models as $index=>$model)
                                    <li class="{{ $index == 0 ? 'action' : '' }}"><a href="#{{ $model }}" data-toggle="tab">@lang('site.' . $model)</a> </li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                               @foreach($models as $index=>$model)
                                    <div class="tab-pane {{ $index == 0 ? 'action' : '' }}" id="{{ $model }}">
                                        <label><input type="checkbox" name="permissions[]" value="create_{{ $model }}"> @lang('site.create')</label>
                                        <label><input type="checkbox" name="permissions[]" value="read_{{ $model }}"> @lang('site.read')</label>
                                        <label><input type="checkbox" name="permissions[]" value="update_{{ $model }}"> @lang('site.update')</label>
                                        <label><input type="checkbox" name="permissions[]" value="delete_{{ $model }}"> @lang('site.delete')</label>
                                    </div>
                               @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                    </div>
                </form>
            </div>
          </div>
        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
