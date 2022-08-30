@extends('layouts.navbaradmin')
@section('content2')
<!-- affichage d'erreur -->
@if(count($errors) > 0)
    <div class=" alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>    
        @endforeach
      </ul>
    </div>
    @endif
    @if (session('success'))
      <div class="alert alert-success">
          <p>{{ session('success') }}</p>
      </div> 
  @endif
    <!-- bouton d'ajout -->
    <div class="col-md-5">
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalresultat">
            <i class="zmdi zmdi-plus" style="color: white; background-color: #450446; border-radius: 90%; margin-left: 150px; font-size: 50px; width: 50px; height: 50px; "></i>
           Publication des résultas
        </button>
    </div>
    <!-- debut modal ajout formation -->
    <div class="modal fade" id="modalresultat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Publication des résultats</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
                <form action= "{{ route('Resultats.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">							
                        <div class="mb-3">
                            <label for="" class="form-label">Date publication </label>
                            <input type="date" class="form-control" name="datepub" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Fichier</label>
                            <input type="file" class="form-control" name="fichier" id="fichier">
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
        </div>3
    </div>
    <!-- fin modal ajout formation -->

    <!-- debut tableau -->
    <div class="card-body" style="width: 80%; margin: auto;"> 
        <table id="datatable" class="table table-bordered">
            <thead >
              <tr>
                <th scope="col" class="masque">ID</th>
                <th scope="col">Date publication</th>
                <th scope="col">FIchiers</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($result as $rest)   
                    <tr>
                        <td scope="row" class="masque">{{$rest->id}}</td>
                        <th scope="row">{{$rest->datepub}}</td>
                        <th scope="row">{{$rest->fichier}}</td>
                        <td>
                            <button class="btn item" data-toggle="tooltip" data-placement="top" title="Plus">
                                <i class="zmdi zmdi-more"></i>
                            </button>
                            <button class="btn item" data-toggle="tooltip" data-placement="top" title="Archive">
                                <i class="zmdi zmdi-archive"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
          </table>
    </div>
    <!-- fin tableau -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 

<script>
    $(document).ready( function () 
    {
        $('#datatable').DataTable();
    } );
</script>

<script>
    $(document).ready( function () {
        $('.th_1').hide();
    } );
</script>

@endsection