@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br/>
            <div class="card">
                <div class="card-header">{{ __('New Subscriber') }} <a href="{{}}" class="btn btn-primary float-right">Subscribers List</a></div>
                <div class="card-body">
                    <form role="form" class="form-horizontal form-validation" method="post">
                    @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Subscriber MSISDN,</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="0711234568" name="msisdn" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Subscriber Pin</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="123" name="pin" required> 
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection