@extends('admin.admin')


@section('title', $property->exists ? "Editer un bien" : "Creer un bien")

@section('content')
    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property->id ) }}" method="post" >
      @csrf
      @method($property->exists ? 'put' : 'post')

      <div class="row">
        @if ($property->exists)
        <input type="text" name="id" style="display: none;" value="{{ $property->id }}"  />
        @endif
        @include('shared.input', ['class'=> 'col','label'=>'Titre', 'name'=> 'title', 'value' =>$property->title])

        <div class="col row">
            @include('shared.input', ['class'=> 'col', 'name'=> 'surface', 'value' =>$property->surface])
            @include('shared.input', ['class'=> 'col', 'name'=> 'price', 'label'=>'Prix', 'value' =>$property->price])
          </div>
      </div>
      @include('shared.input', ['type' =>'textarea', 'name'=> 'description', 'value' =>$property->description])
      <div class="row">
        @include('shared.input', ['class'=> 'col', 'name'=> 'rooms', 'label'=>'Nombre(s) de Piece(s)', 'value' =>$property->rooms])
        @include('shared.input', ['class'=> 'col', 'name'=> 'bedrooms', 'label'=>'Nombre(s) Chambre', 'value' =>$property->bedrooms])
        @include('shared.input', ['class'=> 'col', 'name'=> 'floor', 'label'=>'Nombre(s) Etage', 'value' =>$property->floor])
      </div>
      <div class="row">
        @include('shared.input', ['class'=> 'col', 'name'=> 'city', 'label'=>'Ville', 'value' =>$property->city])
        @include('shared.input', ['class'=> 'col', 'name'=> 'address', 'label'=>'Addresse', 'value' =>$property->address])
        @include('shared.input', ['class'=> 'col', 'name'=> 'postal_code', 'label'=>'Code postal', 'value' =>$property->postal_code])
      </div>
      @include('shared.select', ['class'=> 'col', 'name'=> 'options', 'label'=>'options', 'value' =>$property->options()->pluck('id'), 'multiple'=>true])
      @include('shared.checkbox', ['name'=> 'sold', 'label'=>'Vendu', 'value' =>$property->sold, 'options'=>$options])
      <div>
        <button class="btn btn-primary">
            @if ($property->exists)
                Modifier
               @else
                 Creer
            @endif
        </button>
      </div>
    </form>
@endsection
