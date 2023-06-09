@extends('layouts.app')

@push('styles')
<style>
  .flex-center-start {
      display: flex;
      align-items: center;
      justify-content: start;
  }

</style>
@endpush

@section('content')
    <div class="container">
        <div class="">
            <a class="btn btn-success" href="{{route('home')}}">{{__('Back')}}</a>
        </div>
        <br>
        <div class="">
            <h1>Member Details</h1>
            <hr>
        </div>
        <div class="container">
            <table class="table table-hover">
                @php
                // Contact Number related
                    $contactNum = $member->contact_number;
                    // Remove leading 0s
                    $contactNumber = ltrim($contactNum, '0');
                    $contactNumberISO = '+94'.$contactNumber;
                
                // Tax related
                    $memberType = $member->membership_type;
                    if ($memberType == 'vip') {

                        $memberValue = 5000;
                        $taxAmount = $memberValue * 12 / 100;
                        $finalAmount = $memberValue + $taxAmount;;

                    } else if($memberType == 'gold') {

                        $memberValue = 3000;
                        $taxAmount = $memberValue * 12 / 100;
                        $finalAmount = $memberValue + $taxAmount;;

                    }else {

                        $memberValue = 1000;
                        $taxAmount = $memberValue * 12 / 100;
                        $finalAmount = $memberValue + $taxAmount;

                    }
                    
            @endphp
                <tbody>
                  <tr>
                    <td>{{ __('Full name') }}</td>
                    <td>{{$member->full_name}}</td>
                  </tr>
                  <tr>
                    <td>{{ __('Name with Initials') }}</td>
                    <td>{{$member->name_with_initials}}</td>
                  </tr>
                  <tr>
                    <td>{{ __('Address') }}</td>
                    <td>{{$member->address}}</td>
                  </tr>
                  <tr>
                    <td>{{ __('Reversed Address') }}</td>
                    <td>{{$member->reversed_address}}</td>
                  </tr>
                  <tr>
                    <td>{{ __('Contact Number (Local Format)') }}</td>
                    <td>{{ $member->contact_number }}</td>
                  </tr>
                  <tr>
                    <td>{{ __('Contact Number (International Format)') }}</td>
                    
                    <td>{{ $contactNumberISO }}</td>
                  </tr>
                  <tr>
                    <td>{{ __('Contact Number Type') }}</td>
                    <td>{{ $member->contact_number_type }}</td>
                  </tr>
                  <tr>
                    <td>{{ __('Gender') }}</td>
                    <td class="text-uppercase">{{$member->gender}}</td>
                  </tr>
                  <tr>
                    <td>{{ __('Birthday') }}</td>
                    <td>{{$member->dob}}</td>
                  </tr>
                  <tr>
                    <td>{{ __('Age') }}</td>
                    <td>{{$member->age}}</td>
                  </tr>
                  <tr>
                    <td>{{ __('Membership Type') }}</td>
                    <td class="text-uppercase">{{$member->membership_type}}</td>
                  </tr>

                  <tr>
                    <td>{{ __('Membership Value before Tax') }}</td>
                    <td>Rs. {{ number_format($memberValue, 2) }}</td>
                  </tr>
                  <tr>
                    <td>{{ __('Final amount After calculation of Tax') }}</td>
                    <td>Rs. {{ number_format($finalAmount, 2) }}</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
@endsection

@push('scripts')
    
@endpush
