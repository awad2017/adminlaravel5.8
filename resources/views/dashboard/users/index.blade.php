@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.users')</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a> </li>
                <li class="active">@lang('site.users')</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">@lang('site.users')</h3>
                    <form action="" class="forms">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> @lang('site.search')</button>
                                <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.add') </a>
                            </div>
                        </div>
                    </form>
                </div>
              @if ($users->count() > 0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('site.first_name')</th>
                            <th>@lang('site.last_name')</th>
                            <th>@lang('site.email')</th>
                            <th>@lang('site.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                           <tr>
                               <td>{{ $user->id }}</td>
                               <td>{{ $user->first_name }}</td>
                               <td>{{ $user->last_name }}</td>
                               <td>{{ $user->email }}</td>
                               <td><a href="{{route('dashboard.users.edit', $user->id)}}" class="btn btn-info">@lang('site.edit')</a>
                                   <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST" style="display: inline-block">
                                       @csrf
                                       {{ method_field('delete') }}
                                       <button class="btn btn-danger">@lang('site.delete')</button>
                                   </form>
                               </td>
                           </tr>
                        @endforeach
                        </tbody>
                    </table>
                  @else
                    <p class="alert alert-info" role="alert">@lang('site.no_data_found')</p>
                  <h2></h2>
              @endif
                <div class="box-body">
                    <h1>dsf</h1>
                </div>
            </div>
        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
