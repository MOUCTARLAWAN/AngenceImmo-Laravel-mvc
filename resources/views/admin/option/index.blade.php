@extends('admin.admin')

@section('title', 'Toutes les options')

@section('content')
           <div class="d-flex justify-content-between align-items-center">
            <h1>@yield('name')</h1>
            <a href="{{route('admin.option.create')}}" class="btn btn-primary" role="button">Ajouter une option</a>
           </div>

        <hr>
     <table class="table">
        <thead>
            <tr>
                <th scope="col">Option</th>
                <th class="text-end" scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($options as $option)
              <tr>
                <td>{{ $option->name}}</td>
                <td>
                   <div class="d-flex gap-2 w-100 justify-content-end">
                       <a href="{{route('admin.option.edit', $option->id)}}" class="btn btn-primary">Editer</a>
                       <form action="{{route('admin.option.destroy',$option)}}" method="post">
                          @csrf
                          @method("delete")
                          <button class="btn btn-danger">Supprimer</button>
                       </form>
                    </div>
                </td>
              </tr>
            @endforeach
        </tbody>
     </table>
     {{ $options->links() }}
@endsection
