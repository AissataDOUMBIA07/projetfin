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
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalexamens">
            <i class="zmdi zmdi-plus" style="color: white; background-color: #450446; border-radius: 90%; margin-left: 150px; font-size: 50px; width: 50px; height: 50px; "></i>
            
        </button>
    </div>
    <!-- debut modal ajout formation -->
    <div class="modal fade" id="modalexamens" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter examens</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
                <form action= "{{ route('Examens.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">							
                        <div class="mb-3">
                            <label for="" class="form-label">Date Début </label>
                            <input type="date" class="form-control" name="datedebut" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Date FIn </label>
                            <input type="date" class="form-control" name="datefin" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Lieu</label>
                            <input type="text" class="form-control" name="lieu" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Heure</label>
                            <input type="time" class="form-control" name="heure" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Type</label>
                            <select name="type" id="" class="form-control">
                                <option value="Théorie">Théorie</option>
                                <option value="Pratique">Pratique</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    <!-- fin modal ajout formation -->

    <!-- debut modal modifier -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter formation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action= "resource('Examens.update')" method="POST" id="editformat">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                    <div class="modal-body">							
                        <div class="mb-3">
                            <label for="" class="form-label">Date Début </label>
                            <input type="date" value="" class="form-control" name="datedebut" id="datedebut">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Date FIn </label>
                            <input type="date" value="" class="form-control" name="datefin" id="datefin">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Lieu</label>
                            <input type="time" value="" class="form-control" name="lieu" id="lieu">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Heure</label>
                            <input type="heure" class="form-control" name="heure" id="heure">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Type</label>
                            <select name="type" id="" class="form-control" id="type">
                                <option value="">Théorie</option>
                                <option value="">Pratique</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    <!-- fin modal modofier -->

    <!-- debut tableau -->
    <div class="card-body" style="width: 80%; margin: auto;"> 
        <table id="datatable" class="table table-bordered">
            <thead >
              <tr>
                <th scope="col" class="masque">ID</th>
                <th scope="col">Date Début</th>
                <th scope="col">Date Fin</th>
                <th scope="col">Lieu</th>
                <th scope="col">Heure</th>
                <th scope="col">Type</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($exam as $exa)
                
                <tr>
                    <td scope="row" class="masque">{{$exa->id}}</td>
                    <th scope="row">{{$exa->datedebut}}</td>
                    <th scope="row">{{$exa->datefin}}</td>
                    <th scope="row">{{$exa->lieu}}</td>
                    <th scope="row">{{$exa->heure}}</td>
                    <th scope="row">{{$exa->type}}</td>
                    <td>
                        <button type="submit" class="edit btn item" data-toggle="tooltip" data-bs-toggle="modal" data-placement="top" title="Edit" data-bs-target="#editModal">
                            <i class="edit zmdi zmdi-edit"></i>
                        </button>
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


<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#datatable').DataTable();
        table.on('click','.edit', function() {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }
            var data = table.row($tr).data();
            console.log(data);
            $('#datedebut').val(data[1]);
            $('#datefin').val(data[2]);
            $('#lieu').val(data[3]);
            $('#montant').val(data[4]);
            $('#id_personnels').val(data[5]);
            $('#username').val(data[6]);
            $('#editformat').attr('action', '/formations.index/'+data[0]);
            $('#editModal').modal('show');
        });
    });
</script>

@endsection