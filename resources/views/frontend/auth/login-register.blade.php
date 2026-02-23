@extends('frontend.layouts.app')

@section('title', __('Register'))

@push('after-styles')
    {{ style('assets/plugins/select2/css/select2.min.css') }}
    {{ style('assets/plugins/select2/css/select2-bootstrap.min.css') }}
    {{ style('assets/plugins/daterangepicker/daterangepicker.css') }}
    {{ style('assets/css/frontend.css') }}
    <style type="text/css">
        :root{
          --form-height:550px;
          --form-width: 900px;
          /*  Sea Green */
          --left-color: #0c2f55!important;
          /*  Light Blue  */
          --right-color: #0c2f55!important;
        }

        *, *::before, *::after {
            box-sizing: unset;
        }

        body, html{
          width: 100%;
          height: 100%;
          margin: 0;
          font-family: 'Helvetica Neue', sans-serif;
          letter-spacing: 0.5px;
        }

        .login-register{
          width: var(--form-width);;
          height: var(--form-height);;
          position: relative;
          margin: auto;
          box-shadow: 2px 10px 40px rgba(22,20,19,0.4);
          border-radius: 10px;
          margin-top: 50px;
        }
        /* 
        ----------------------
              Overlay
        ----------------------
        */
        .overlay{
          width: 100%; 
          height: 100%;
          position: absolute;
          z-index: 100;
          background-image: linear-gradient(to right, var(--left-color), var(--right-color));
          border-radius: 10px;
          color: white;
          clip: rect(0, 385px, var(--form-height), 0);
        }

        .open-sign-up{
            animation: slideleft 1s linear forwards;
        }

        .open-sign-in{
            animation: slideright 1s linear forwards;
        }

        .overlay .sign-in, .overlay .sign-up{
          /*  Width is 385px - padding  */
          --padding: 50px;
          width: calc(385px - var(--padding) * 2);
          height: 100%;
          display: flex;
          justify-content: center;
          flex-direction: column;
          align-items: center;
          padding: 0px var(--padding);
          text-align: center;
        }

        .overlay .sign-in{
          float: left;
        }

        .overlay-text-left-animation{
            animation: text-slide-in-left 1s linear;
        }
        .overlay-text-left-animation-out{
            animation: text-slide-out-left 1s linear;
        }

        .overlay .sign-up{
          float:right;
        }

        .overlay-text-right-animation{
            animation: text-slide-in-right 1s linear;
        }

        .overlay-text-right-animation-out{
            animation: text-slide-out-right 1s linear;
        }


        .overlay h1{
          margin: 0px 5px;
          font-size: 2.1rem;
        }

        .overlay p{
          margin: 20px 0px 30px;
          font-weight: 200;
        }
        /* 
        ------------------------
              Buttons
        ------------------------
        */
        .switch-button, .control-button{
          cursor: pointer;
          display: block;
          margin-left: auto;
          margin-right: auto;
          width: 140px;
          height: 40px;
          font-size: 14px;
          text-transform: uppercase;
          background: none;
          border-radius: 20px;
          color: white;
        }

        .switch-button{
          border: 2px solid;
        }

        .control-button{
          border: none;
          margin-top: 15px;
        }

        .switch-button:focus, .control-button:focus{
          outline:none;
        }

        .control-button.up{
          background-color: var(--left-color);
        }

        .control-button.in{
          background-color: var(--right-color);
        }

        /* 
        --------------------------
              Forms
        --------------------------
        */
        .form{
          width: 100%; 
          height: 100%;
          position: absolute;
          border-radius: 10px;
        }

        .form .sign-in, .form .sign-up{
          --padding: 50px;
          position:absolute;
            /*  Width is 100% - 385px - padding  */
          width: calc(var(--form-width) - 385px - var(--padding) * 2);
          height: 100%;
          display: flex;
          justify-content: center;
          flex-direction: column;
          align-items: center;
          padding: 0px var(--padding);
          text-align: center;
        }

        /* Sign in is initially not displayed */
        .form .sign-in{
          display: none;
        }

        .form .sign-in{
          left:0;
        }

        .form .sign-up{
          right: 0;
        }

        .form-right-slide-in{
          animation: form-slide-in-right 1s;
        }

        .form-right-slide-out{
          animation: form-slide-out-right 1s;
        }

        .form-left-slide-in{
          animation: form-slide-in-left 1s;
        }

        .form-left-slide-out{
          animation: form-slide-out-left 1s;
        }

        .form .sign-in h1{
          color: var(--right-color);
          margin: 0;
        }

        .form .sign-up h1{
          color: var(--left-color);
          margin: 0;
        }

        .social-media-buttons{
          display: flex;
          justify-content: center;
          width: 100%;
          margin: 15px;
        }

        .social-media-buttons .icon{
          width: 40px;
          height: 40px;
          border: 1px solid #dadada;
          border-radius: 100%;
          display: flex;
          justify-content: center;
          align-items: center;
          margin: 10px 7px;
        }

        .small{
          font-size: 13px;
          color: grey;
          font-weight: 200;
          margin: 5px;
        }

        .social-media-buttons .icon svg{
          width: 25px;
          height: 25px;
        }

        #sign-in-form input:not([type="radio"]), #sign-up-form input:not([type="radio"]){
          margin: 12px;
          font-size: 14px;
          padding: 15px;
          width: 260px;
          font-weight: 300;
          border: none;
          background-color: #e4e4e494;
          font-family: 'Helvetica Neue', sans-serif;
          letter-spacing: 1.5px;
          padding-left: 20px;
          height: 20px;
        }

        #sign-in-form input::placeholder{
          letter-spacing: 1px;
        }

        .forgot-password{
          font-size: 12px;
          display: inline-block;
          border-bottom: 2px solid #efebeb;
          padding-bottom: 3px;
        }

        .forgot-password:hover{
          cursor: pointer;
        }

        /* 
        ---------------------------
            Animation
        ---------------------------
        */
        @keyframes slideright{
          0%{
            clip: rect(0, 385px, var(--form-height), 0);
          }
          30%{
                clip: rect(0, 480px, var(--form-height), 0);
          }
          /*  we want the width to be slightly larger here  */
          50%{
             clip: rect(0px, calc(var(--form-width) / 2 + 480px / 2), var(--form-height), calc(var(--form-width) / 2 - 480px / 2));
          }
          80%{
                 clip: rect(0px, var(--form-width), var(--form-height), calc(var(--form-width) - 480px));
          }
          100%{
             clip: rect(0px, var(--form-width), var(--form-height), calc(var(--form-width) - 385px));
          }
        }

        @keyframes slideleft{
          100%{
            clip: rect(0, 385px, var(--form-height), 0);
          }
          70%{
                clip: rect(0, 480px, var(--form-height), 0);
          }
          /*  we want the width to be slightly larger here  */
          50%{
             clip: rect(0px, calc(var(--form-width) / 2 + 480px / 2), var(--form-height), calc(var(--form-width) / 2 - 480px / 2));
          }
          30%{
                 clip: rect(0px, var(--form-width), var(--form-height), calc(var(--form-width) - 480px));
          }
          0%{
             clip: rect(0px, var(--form-width), var(--form-height), calc(var(--form-width) - 385px));
          }
        }

        @keyframes text-slide-in-left{
          0% {
            padding-left: 20px;
          }
          100% {
            padding-left: 50px;
          }
        }

        @keyframes text-slide-in-right{
          0% {
            padding-right: 20px;
          }
          100% {
            padding-right: 50px;
          }
        }

        @keyframes text-slide-out-left{
          0% {
            padding-left: 50px;
          }
          100% {
            padding-left: 20px;
          }
        }

        @keyframes text-slide-out-right{
          0% {
            padding-right: 50px;
          }
          100% {
            padding-right: 20px;
          }
        }

        @keyframes form-slide-in-right{
          0%{
            padding-right: 100px;
          }
          100%{
            padding-right: 50px;
          }
        }

        @keyframes form-slide-in-left{
          0%{
            padding-left: 100px;
          }
          100%{
            padding-left: 50px;
          }
        }

        @keyframes form-slide-out-right{
          0%{
            padding-right: 50px;
          }
          100%{
            padding-right: 80px;
          }
        }

        @keyframes form-slide-out-left{
          0%{
            padding-left: 50px;
          }
          100%{
            padding-left: 80px;
          }
        }
    </style>
@endpush
     
@section('content')
        <div class="login-register">
          <div class="overlay" id="overlay">
            <div class="sign-in" id="sign-in">
              <h1>Welcome Back!</h1>
              <p>To keep connected with us please login with your personal info</p>
              <button class="switch-button" id="slide-right-button">@lang('Login')</button>
            </div>
            <div class="sign-up" id="sign-up">
              <h1>New Here?</h1>
              <p>Enter your personal details and start a journey with us</p>
              <button class="switch-button" id="slide-left-button">@lang('Register')</button>
            </div>
          </div>
          <div class="form">
            <div class="sign-in" id="sign-in-info">
              <h1>@lang('Welcome Back!')</h1>
              
              <x-forms.post :action="route('frontend.auth.login')" id="sign-in-form">     
                <input type="text" class="form-control" name="email" placeholder="{{ __('E-mail Address or Phone No') }}"/>
                <input type="password" class="form-control" name="password" placeholder="{{ __('Password') }}"/>
                {{--<p class="forgot-password">Forgot your password?</p>--}}
                <p><x-utils.link :href="route('frontend.auth.password.request')" class="btn btn-link" :text="__('Forgot Your Password?')" /></p>
                <button class="control-button in" style="background: #82C55B;">@lang('Login')</button>
              </x-forms.post>
            </div>
            <div class="sign-up" id="sign-up-info">
              <h1>Create Account</h1>
              <x-forms.post :action="route('frontend.auth.first.register.confirm')" id="sign-up-form">
                <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}"/>

                <div class="form-check form-check-inline">
                    <i class="fas fa-mars" style="font-size: 35px;color:#32b9ec;"></i>
                    <label>
                        <input type="radio" class="option-input radio" value="male" name="gender" checked />
                        <!-- <i class="fas fa-mars"></i> -->
                    </label>
                    <i class="fas fa-venus" style="font-size: 35px;color:#d67a8a; margin-left: 20px;"></i>
                    <label>
                        <input type="radio" class="option-input radio" value="female" name="gender" />
                        
                        
                    </label>
                </div>
                

                <input type="text" name="date_of_birth" id="dob" class="form-control" value="{{ old('date_of_birth') }}" placeholder="{{ __('Date of Birth') }}" maxlength="100" autofocus autocomplete="date_of_birth" />
                                        
                                    
                <input type="text" class="form-control" name="email_or_mobile" placeholder="{{ __('E-mail Address or Phone No') }}"/>
                <button class="control-button up" style="background: #82C55B;">@lang('Register')</button>
              </x-forms.post>
            </div>
          </div>
        </div>




@endsection
@push('after-scripts')
{{ script('assets/plugins/select2/js/select2.full.min.js')}}
{{ script("assets/plugins/select2/component/components-select2.js") }}
{{ script("assets/plugins/daterangepicker/moment.min.js") }}
{{ script("assets/plugins/daterangepicker/daterangepicker.min.js") }}
<script type="text/javascript">
    $(function() {
      $('#dob').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1960,
        maxYear: parseInt(moment().format('YYYY'),10),
        autoUpdateInput: false,
        }, function(chosen_date) {
        $('#dob').val(chosen_date.format('DD-MM-YYYY'));
      });
    });

    var overlay = document.getElementById("overlay");

    // Buttons to 'switch' the page
    var openSignUpButton = document.getElementById("slide-left-button");
    var openSignInButton = document.getElementById("slide-right-button");

    // The sidebars
    var leftText = document.getElementById("sign-in");
    var rightText = document.getElementById("sign-up");

    // The forms
    var accountForm = document.getElementById("sign-in-info")
    var signinForm = document.getElementById("sign-up-info");

    // Open the Sign Up page
    openSignUp = () =>{
      // Remove classes so that animations can restart on the next 'switch'
      leftText.classList.remove("overlay-text-left-animation-out");
      overlay.classList.remove("open-sign-in");
      rightText.classList.remove("overlay-text-right-animation");
      // Add classes for animations
      accountForm.className += " form-left-slide-out"
      rightText.className += " overlay-text-right-animation-out";
      overlay.className += " open-sign-up";
      leftText.className += " overlay-text-left-animation";
      // hide the sign up form once it is out of view
      setTimeout(function(){
        accountForm.classList.remove("form-left-slide-in");
        accountForm.style.display = "none";
        accountForm.classList.remove("form-left-slide-out");
      }, 700);
      // display the sign in form once the overlay begins moving right
      setTimeout(function(){
        signinForm.style.display = "flex";
        signinForm.classList += " form-right-slide-in";
      }, 200);
    }

    // Open the Sign In page
    openSignIn = () =>{
      // Remove classes so that animations can restart on the next 'switch'
      leftText.classList.remove("overlay-text-left-animation");
      overlay.classList.remove("open-sign-up");
      rightText.classList.remove("overlay-text-right-animation-out");
      // Add classes for animations
      signinForm.classList += " form-right-slide-out";
      leftText.className += " overlay-text-left-animation-out";
      overlay.className += " open-sign-in";
      rightText.className += " overlay-text-right-animation";
      // hide the sign in form once it is out of view
      setTimeout(function(){
        signinForm.classList.remove("form-right-slide-in")
        signinForm.style.display = "none";
        signinForm.classList.remove("form-right-slide-out")
      },700);
      // display the sign up form once the overlay begins moving left
      setTimeout(function(){
        accountForm.style.display = "flex";
        accountForm.classList += " form-left-slide-in";
      },200);
    }

    // When a 'switch' button is pressed, switch page
    openSignUpButton.addEventListener("click", openSignUp, false);
    openSignInButton.addEventListener("click", openSignIn, false);
</script>
@endpush
