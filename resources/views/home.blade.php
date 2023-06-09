@extends('layouts.app')

@push('styles')
    <style>
        .flex-center-end {
            display: flex;
            align-items: center;
            justify-content: end;
        }
    </style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white bg-dark">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}
                    <div class="row">
                        <div class="flex-center-end">
                            <a href="{{route('members.create')}}" class="btn btn-primary">{{ _('Add Member Details') }}</a>
                        </div>
                    </div>
                    <br>
                    @if (count($members) > 0)
                        <div class="">
                            <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">{{ __('No:') }}</th>
                                <th scope="col">{{ __('Full Name:') }}</th>
                                <th scope="col">{{ __('Address:') }}</th>
                                <th scope="col">{{ __('Contact number:') }}</th>
                                <th scope="col">{{ __('Gender:') }}</th>
                                <th scope="col">{{ __('Actions:') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($members as $member)
                                    <tr>
                                        <th scope="row">{{$i}}</th>
                                        <td>{{ $member->full_name ?? '--' }}</td>
                                        <td>{{ $member->address ?? '--' }}</td>
                                        <td>{{ $member->contact_number ?? '--' }}</td>
                                        <td class="text-uppercase">{{ $member->gender ?? '--' }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-success" href="{{route('members.show', $member->id)}}">{{ __('View More') }}</a>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                            </table>
                    </div>
                    @else
                        
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
