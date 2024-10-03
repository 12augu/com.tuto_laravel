@extends('admin.admin')

@section('title',$property->exists ? "Editer un bien":"Créer un bien")

@section('content')
<h1>@yield('title')</h1>
<form class="vstack gap-3" action="{{route($property->exists?'admin.property.update':'admin.property.store',$property  )}}" method="post">
    @csrf
    @method($property->exists ? 'PUT':'POST')
    <div>
        <div class="row">
            @include(
                'shared.input',
                [
                     'class'=>'col',
                     'name'=>'title',
                     'value'=>$property->title
                ]
            )

            <div class="col row">
                @include(
                    'shared.input',
                    [
                         'class'=>'col',
                         'name'=>'surface',
                         'value'=>$property->surface
                    ]
                )
                 @include(
                    'shared.input',['label'=>'Prix','class'=>'col', 'name'=>'price', 'value'=>$property->price]
                )

            </div>
        </div>
        @include(
            'shared.input',[ 'type'=>'textarea','label'=>'Description', 'name'=>'description', 'value'=>$property->description]
        )

        <div class="row">
            @include(
                'shared.input',['label'=>'Pièces','class'=>'col', 'name'=>'rooms', 'value'=>$property->rooms]
            )
            @include(
                'shared.input',['label'=>'Chambres','class'=>'col', 'name'=>'bedrooms', 'value'=>$property->bedrooms]
            )
            @include(
                'shared.input',['label'=>'Etage','class'=>'col', 'name'=>'floor', 'value'=>$property->floor]
            )

        </div>
        <div class="row">
            @include(
                'shared.input',['label'=>'Adresse','class'=>'col', 'name'=>'address', 'value'=>$property->address]
            )
            @include(
                'shared.input',['label'=>'Ville','class'=>'col', 'name'=>'city', 'value'=>$property->city]
            )
            @include(
                'shared.input',['label'=>'Code Postal','class'=>'col', 'name'=>'postal_code', 'value'=>$property->postal_code]
            )

        </div>
        @include(
            'shared.checkbox',['label'=>'Vendu', 'name'=>'sold', 'value'=>$property->sold]
        )
    </div>

    <div>
        <button class="btn btn-primary">
            {{ $property->exists ? "Modifier":"Créer" }}
        </button>
    </div>

</form>
@endsection
