<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Pharmacies</title>
</head>

<body>

    <div class="container">
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                    {{ __('Les pharmacies') }}
                </h2>
            </x-slot>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="d-flex justify-content-between">
                            </div>
                            <div class="d-flex justify-content-between">
                                <!-- {{ $pharmacies->links()}} -->

                                <p align="center">
                                    <a class="btn btn-primary " href="{{route('pharmacie.create')}}">
                                        Ajouter un médecin
                                    </a>
                                </p>


                                <!-- @include('partials.pharmacieSearch') -->

                            </div>



                            <div class="card-body">
                                <div id="table" class="table-editable bg-light">
                                    <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
                                    @if(session()->has('successDelete'))
                                    <div class="alert alert-success">
                                        <h3>{{session()->get('successDelete')}}</h3>
                                    </div>
                                    @endif
                                    <table class="table table-bordered table-responsive-md table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th class="text-center"> Identifiant de la pharmacie</th>
                                                <th class="text-center"> Ville de la pharmacie</th>
                                                <th class="text-center"> Adresse de la pharmacie</th>
                                                <th class="text-center"> Numero de la pharmacie</th>
                                                <th class="text-center"> Mail de la pharmacie</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pharmacies as $pharmacie)
                                            <tr>
                                                <td class="pt-3-half"> {{$pharmacie->getKey()}} </td>
                                                <td class="pt-3-half"> {{$pharmacie->PHARMAVille}}</td>
                                                <td class="pt-3-half"> {{$pharmacie->PHARMAAdresse}}</td>
                                                <td class="pt-3-half"> {{$pharmacie->PHARMANumeroTelephone}}</td>
                                                <td class="pt-3-half"> {{$pharmacie->PHARMAMail}}</td>
                                                <td>
                                                    <a href="{{route('pharmacie.edit', ['pharmacie'=>$pharmacie->PHARMACode])}}" class="btn btn-primary" ">Modifier</a>
                            </td>
                            <td>
                                <a href=" #" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cette pharmacie ?')){document.getElementById('{{$pharmacie->PHARMACode}}'). submit()}">
                                                        Supprimer

                                                    </a>
                                                    <form id="{{$pharmacie->PHARMACode}}" action="{{route('pharmacie.supprimer',['pharmacie'=>$pharmacie->PHARMACode])}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="delete">
                                                    </form>

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-app-layout>
    </div>
</body>

</html>