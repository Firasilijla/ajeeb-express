
@extends('layouts.app')
@section('title',' الرئيسية')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card text-center">

            <h1 class="font-weight-boldest text-dark-75 mt-15" style="font-size: 3rem">
                اأهــــلاً وسهــــلاً بكـــم فـــي لوحه الادمن
            </h1>
            <p class="font-size-h3 text-dark font-weight-normal">

            </p>
            <p>
         
<form action="{{route('admin.admin.sendMessage')}}" method="post">
    @csrf
    <input type="text" name="message" id="">
    <input type="submit" value="Sendmessage">
</form>
            </p>
            <p class="font-size-h3 text-dark font-weight-normal">

            </p>
        </div>
    </div>
</div>





@endsection