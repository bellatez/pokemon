@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <form class="form-inline" method="get" action="{{Route('search.results')}}">
                    <div class="form-group mb-2">
                      <label for=""><b>Search By:</b>  &nbsp;</label>
                      <div class="form-group mb-0">
                        <select class="form-control form-search-control" name="option" id="exampleFormControlSelect1">
                            <option value="name" {{app('request')->input('option') == 'name' ? 'selected': ''}}>name</option>
                            <option value="rarity" {{app('request')->input('option') == 'rarity' ? 'selected': ''}}>Rarity</option>
                            <option value="hp" {{app('request')->input('option') == 'hp' ? 'selected': ''}}>Hip points</option>
                        </select>
                    </div>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                      <input type="text" class="form-control" value="{{ app('request')->has('query')? app('request')->input('query'): null }}" placeholder="enter search" name="query">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                </form>
            </div>
        </div>
        <h2 class="text-center mt-4">Search Results</h2>
        <div class="row text-center">
            @isset($results)
                @if (count($results) > 0)
                    @foreach($results as $card)
                        <div class="col mt-4">
                            <img src="{{$card['imageUrl']}}" alt="">
                        </div>
                    @endforeach
                @else
                    <h3>No data found for: <b>"{{ app('request')->input('query')}}"</b></h3>
                @endif
            @endisset
        </div>
    </div>
@endsection