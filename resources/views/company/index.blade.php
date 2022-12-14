@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">

        <div class="col-md-12">

             <div class="company-profile">

                {{-- Fetching the cover photo to display from the database --}}
                @if (empty(Auth::user()->company->cover_photo))

        <img src="{{ asset('cover/business.jpg') }}" alt="company banner" width="100%" class="shadow">

        @else
                <img src="{{ asset('uploads/coverphoto')}}/{{ Auth::user()->company->cover_photo }}" alt="company banner" width="100%" class="shadow" width=devicePixelRatio>

        @endif


            <div class="company-description mt-3">

                 @if (empty(Auth::user()->company->logo))
                    
                <img src="{{ asset('avatar/man.jpg') }}" alt="profile picture" width="250px" class="mt-3 shadow">

                @else

                <img src="{{ asset('uploads/logo')}}/{{ Auth::user()->company->logo }}" alt="company logo" width="300px" class="mt-3 shadow img-fluid">

                @endif

                 <p class="mt-3">{{ $company->description }}</p>

                <h2 class="text-decoration-underline">{{ $company->company_name }}</h2>

                <p class="mt-3"><b>Slogan :</b>&nbsp;{{ $company->slogan }} || <b>Address :</b>&nbsp;{{ $company->address }} || <b>Phone Number :</b>&nbsp;{{ $company->phone}} ||<b> Website :</b>&nbsp;{{ $company->website }}</p>
                
            </div>
       </div>

       <h3 class="mt-5">All available roles at {{ $company->company_name }}</h3>
        <table class="table">
            
            <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thead>

            <tbody>

                {{-- fetching all the jobs that belong to a particular company using the relationship in the COMPANY & JOB Model --}}
                
                @foreach ($company->jobs as $job )       
                <tr>
                    <td><img src="{{ asset('avatar/man.jpg') }}" alt="" width="80" class="shadow"></td>

                    <td>Position: {{ $job->position }}
                        <br><br>
                        <i class="fa fa-solid fa-clock"></i>&nbsp; {{ $job->type }}

                    </td>
                    <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; {{ $job->address }}</td>
                    <td><i class=" fa fa-solid fa-globe"></i>&nbsp; {{ $job->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}">
                        <button class="btn btn-success btn-sm">Apply</button>
                    
                            </a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>

            {{-- column ends here --}}
        </div>
      
        {{-- row ends here --}}
    </div>
    {{-- container ends here --}}
</div>
@endsection
