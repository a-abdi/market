@extends('layouts.admin.main')


@section('title')
    admin|login
@endsection


@section('styles')

@endsection


@section('scripts')

@endsection


@section('content') 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-right">
			<div class="card mb-3 border-secondary item-center" style="max-width: 36rem;">
				<div class="card-header text-secondary">ورود</div>
				<div class="card-body text-secondary">
					<input type="text" name="user" class="form-control text-right my-2" placeholder="نام کاربری" tabindex="0">
					<input type="password" name="password" class="form-control text-right my-2" placeholder="رمز" tabindex="1">
					<button type="button" class="btn btn-primary w-100" tabindex="7">ورود</button>
				</div>
				<div class="card-footer text-secondary">نام کاربری یا پسورود فراموش کردم</div>
			</div>
        </div>
    </div>
</div>
@endsection