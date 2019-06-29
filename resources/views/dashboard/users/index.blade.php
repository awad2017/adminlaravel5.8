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
                <div class="container">

                <div class="box-header">

                    <h3 class="box-title">@lang('site.num') @lang('site.users') <small class="num"> (" {{ $users->total() }} ") </small></h3>
                    <!-- Form SEARCH -->
                    <form class="forms" action="{{ route('dashboard.users.index') }}" method="get">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="search" name="search" value="{{ request()->search }}" class="form-control" placeholder="@lang('site.search')">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-success"><i class="fa fa-search fa-fw"></i> @lang('site.search')</button>
                            @if (auth()->user()->hasPermission('create_users'))
                                    <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary"><i class="fa fa-plus fa-fw"> </i>@lang('site.add') </a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus fa-fw"></i> @lang('site.add') </a>
                            @endif
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
                               <td>
                               @if (auth()->user()->hasPermission('update_users'))
                                 <a href="{{route('dashboard.users.edit', $user->id)}}" class="btn btn-info"><i class="fa fa-edit fa-fw"></i>  @lang('site.edit')</a>
                                   @else
                                  <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit fa-fw"></i> @lang('site.edit')</a>
                               @endif
                               @if (auth()->user()->hasPermission('delete_users'))
                                       <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST" style="display: inline-block">
                                           @csrf
                                           {{ method_field('delete') }}
                                           <button type="submit" class="btn btn-danger delete"><i class="fa fa-trash fa-fw"></i> @lang('site.delete')</button>
                                       </form>
                                   @else
                                   <button href="#" class="btn btn-danger disabled">@lang('site.delete')</button>
                               @endif
                               </td>
                           </tr>
                        @endforeach
                        </tbody>
                    </table>
                  {{ $users->appends(request()->query())->links() }}<!--هذا للبحث -->
                  @else
                    <p class="alert alert-info" role="alert">@lang('site.no_data_found')</p>
                  <h2></h2>
              @endif
                <div class="box-body">
                    <h1></h1>
                </div>

            </div>
            </div>
        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
