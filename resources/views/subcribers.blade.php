@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br/>
            <div class="card">
                <div class="card-header">{{ __('Subscribers List') }} <a href="" class="btn btn-primary float-right">New Subscriber</a></div>
  
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
                        <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection