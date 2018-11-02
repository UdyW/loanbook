@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a style="color:black;" class="button" href="{{ route('client.getClient',['id'=>0])}}">Add Client</a>
            <div class="card">
                
                <table class="u-full-width table">
                    <thead>
                    <th>Name</th>
                    <th>Loan Amount</th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr>  
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->loan_amount }}</td>
                                {{ csrf_field() }}
                                <td><form action="{{ route('client.getClient',['id'=>$client->id])}}" method="get" id="{{$client->id}}"><button type="submit">...</button> </form></td>               
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
