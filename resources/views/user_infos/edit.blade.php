@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            User Infos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($userInfos, ['route' => ['userInfos.update', $userInfos->id], 'method' => 'patch']) !!}

                        @include('user_infos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection