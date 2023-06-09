@extends('layouts.app')

@push('styles')
<style>
  .flex-center-start {
      display: flex;
      align-items: center;
      justify-content: start;
  }
  .has-error input,
  .has-error textarea {
      border: red solid 2px !important;
  }
  .error-help-block,
  .has-error .error-help-block {
      color: red !important;
      padding: 10px 10px 10px 10px !important;
  }
</style>
@endpush

@section('content')
<div class="container">

  <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-white bg-dark">{{ __('Add member Details') }}</div>

            <div class="card-body">

              <div class="col-md-12 col-lg-12">
                <form action="{{route('members.store')}}" method="POST">
                  @csrf
                  <div class="col-12 mt-3">
                    <label for="full_name" class="form-label">{{ __('Full Name') }}</label>
                    <input type="text" class="form-control" id="full_name" name="full_name">
                  </div>

                  <div class="col-12 mt-3">
                    <label for="address" class="form-label">{{ __('Address') }}</label>
                    <input type="text" class="form-control" id="address" name="address">
                  </div>

                  <div class="col-12 mt-3">
                    <label for="contact_number" class="form-label">{{ __('Contact Number') }}</label>
                    <input type="text" class="form-control" id="contact_number" name="contact_number">
                  </div>

                  <div class="col-12 mt-3">
                    <label for="dob" class="form-label">{{ __('Date of Birth') }}</label>
                    <input type="date" class="form-control" id="dob" name="dob">
                  </div>

                  <div class="mt-3">
                    <label class="form-check-label" for="">{{__('Gender')}}</label>

                    <div class="my-3 flex-center-start">
                      <div class="form-check">
                        <input id="male" name="gender" type="radio" value="male" class="form-check-input">
                        <label class="form-check-label" for="male">{{__('Male')}}</label>
                      </div>
                      <div class="form-check mx-5">
                        <input id="female" name="gender" type="radio" value="female" class="form-check-input">
                        <label class="form-check-label" for="female">{{__('Female')}}</label>
                      </div>
                      <div class="form-check">
                        <input id="other" name="gender" type="radio" value="other" class="form-check-input">
                        <label class="form-check-label" for="other">{{__('Other')}}</label>
                      </div>
                    </div>

                  </div>

                  <div class="mt-3">
                    <label class="form-check-label" for="credit">{{__('Membership Type')}}</label>

                    <div class="my-3 flex-center-start">
                      <div class="form-check">
                        <input id="vip" name="membership_type" type="radio" value="vip" class="form-check-input">
                        <label class="form-check-label" for="vip">{{__('VIP')}}</label>
                      </div>
                      <div class="form-check mx-5">
                        <input id="gold" name="membership_type" type="radio" value="gold" class="form-check-input">
                        <label class="form-check-label" for="gold">{{__('Gold')}}</label>
                      </div>
                      <div class="form-check">
                        <input id="general" name="membership_type" type="radio" value="general" class="form-check-input">
                        <label class="form-check-label" for="general">{{__('General')}}</label>
                      </div>
                    </div>

                  </div>


        
                  <hr class="my-4">

        
                  <button class="w-100 btn btn-primary btn-lg" type="submit">{{_('Save Details')}}</button>
                </form>
              </div>

                
            </div>
        </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')

<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{!! JsValidator::formRequest('App\Http\Requests\MemberStoreRequest') !!}
    
@endpush
