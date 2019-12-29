@extends('layouts.admin.main')


@section('title')
    admin|login
@endsection


@section('styles')

@endsection


@section('scripts')
<script src="{{asset('js/admin/auth/login.js')}}"></script>
@endsection


@section('content') 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-right">
			<div class="card mb-3 border-secondary item-center" style="max-width: 36rem;">
				<div class="card-header text-secondary">ورود</div>
				<div class="card-body text-secondary">
					<div class="container-floud">
						<div class="row">
							<div class="col-12">
								<input type="text" class="form-control text-right my-2" id="user_name" placeholder="نام کاربری" tabindex="0">
							</div>
							<div class="col-12">
								<input type="password" class="form-control text-right my-2" id="password" placeholder="رمز" tabindex="1">
							</div>
							<div class="col-12">
								<button type="button" class="btn btn-primary w-100 my-2" onclick="login()" tabindex="2">ورود</button>
							</div>
							<div class="col-12 mt-2" id="msg">
							
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer text-secondary" id="forgot"></div>
			</div>
        </div>
    </div>
</div>
@endsection