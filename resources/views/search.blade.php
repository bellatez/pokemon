@extends('layouts.app')

@section('content')
    <div class="container d-flex h-100 mt-5">
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
        <div class="row row h-100 justify-content-center align-items-center">
            <div class="col-12">
            <form class="form-inline" method="get" action="{{Route('search.results')}}">
                    <div class="form-group mb-2">
                      <label for="" class="sr-only">Search By:</label>
                      <div class="form-group mb-0">
                        <select class="form-control form-search-control bg-white border-0" name="option" id="exampleFormControlSelect1">
                            <option value="name" {{app('request')->input('option') == 'name' ? 'selected': ''}}>name</option>
                            <option value="rarity" {{app('request')->input('option') == 'rarity' ? 'selected': ''}}>Rarity</option>
                            <option value="hp" {{app('request')->input('option') == 'hp' ? 'selected': ''}}>Hip points</option>
                        </select>
                    </div>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                      <input type="text" class="form-control" placeholder="enter search" name="query">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                </form>
            </div>
            @isset($results)
            @if (count($results) > 0)
                @foreach($results as $card)
                    <div class="col">
                        <img src="{{$card['imageUrl']}}" alt="">
                    </div>
                @endforeach
            @endif
            @endisset
        </div>
    </div>
@endsection