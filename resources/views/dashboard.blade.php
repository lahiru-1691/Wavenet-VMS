@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br/>
            <div class="card">
                <div class="card-header">{{ __('Subscribers List') }} <a href="{{route('new-subscriber')}}" class="btn btn-primary float-right">New Subscriber</a></div>
  
                <div class="card-body">
                    
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Subscriber MSISDN</th>
                        <th scope="col">Subscriber PIN</th>
                        <th scope="col">Subscriber Voice Mail account status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;?>
                        @if(count($subscribers) > 0)
                            @foreach($subscribers as $result_val)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$result_val->subscriber_msisdn}}</td>
                                    <td>{{$result_val->pin}}</td>
                                    <td>
                                        @if($result_val->account_status == 1)
                                            {{'Not Locked'}}
                                        @else
                                            {{'Locked'}}
                                        @endif
                                    </td>
                                </tr>
                            <?php $i++;?>
                            @endforeach
                        @else
                            <tr><td colspan="6" class="text-center">No data found.</td></tr>
                        @endif
                        </tbody>
                    </table>
                    @if($subscribers != null)
                        <div style="float: right;">{!! $subscribers->render() !!}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection