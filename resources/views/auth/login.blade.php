<!doctype html>
<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--favicon-->
		<link rel="icon" href="{{asset('assets/images/favicon-32x32.png')}}" type="image/png" />
		<!-- loader-->
		<link href="{{asset('assets/css/pace.min.css')}}" rel="stylesheet" />
		<script src="{{asset('assets/js/pace.min.js')}}"></script>
		<!-- Bootstrap CSS -->
		<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
		<link href="{{asset('assets/css/app.css')}}" rel="stylesheet">
		<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('assets/css/jquery.toast.css')}}">

		<title>Asset Management</title>
	</head>

<body class="bg-login">
	<!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="mb-4 text-center">
                            <img src="{{asset('assets/images/logo-img.png')}}" width="180" alt="" />
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">Sign in</h3>
                                       
                                    </div>
                                    
                                    <div class="form-body">
                                        <form class="row g-3" method="POST" action="{{ route('login') }}" id="loginform" autocomplete="off">
                                        @csrf

                                            <div class="col-12">
                                                <label for="login">Login ID:</label>
                                                <input type="text" name="login_id" id="login_id" class="form-control" value="{{ old('login_id') }}" autocomplete="login_id" autofocus>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword" value="{{ old('password') }}" autocomplete="password" autofocus placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
	<!--end wrapper-->

	<!--plugins-->
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <!-- <script src="{{asset('assets/js/jquery-3.1.1.min.js')}}"></script> -->
    
    <!-- <script src="{{asset('assets/js/customjquery.validate.min.js')}}"></script>    
    <script src="{{asset('assets/js/custom.js')}}"></script> -->
    <script src="{{asset('assets/js/custom-validation.js')}}"></script> 

    <!-- multi select -->
    <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
    <script src="{{asset('plugins/select2/custom-select2.js')}}"></script>    

    <script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/form-validation.js')}}"></script>
    <script src="{{asset('assets/js/jquery.toast.js')}}"></script>
    
    <script>
        //  var APP_URL = {!! json_encode(url('/')) !!};
    
        // $(document).ready(function() {
        //     App.init();
        // });
        
        $(document).ready(function () {
            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>

</body>

</html>
