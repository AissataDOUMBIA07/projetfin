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
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalprogramme">
            <i class="zmdi zmdi-plus" style="color: white; background-color: #450446; border-radius: 90%; margin-left: 150px; font-size: 50px; width: 50px; height: 50px; "></i>
            Panifier programmes            
        </button>
    </div>
    <!-- debut modal ajout programme -->
    <div class="modal fade" id="modalprogramme" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter programmes</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             
                <form action= "{{ route('Programmes.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">	
                        <div class="mb-3">
                            <label for="" class="form-label">Programmes</label>
                            <input type="text" class="form-control" name="programme" >
                        </div>						
                        <div class="mb-3">
                            <label for="" class="form-label">Date Début </label>
                            <input type="date" class="form-control" name="datedebut" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Date FIn </label>
                            <input type="date" class="form-control" name="datefin" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Heure</label>
                            <input type="time" class="form-control" name="heure" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Id Personnels</label>
                            <select name="id_personnels" id="" class="form-control">
                                @foreach ($pgrm as $bien)
                                    <option value="{{$bien->id}}">{{$bien->nom}} {{$bien->prenom}}</option>
                                @endforeach
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
    <!-- fin modal ajout programme -->

    <!-- debut tableau -->
    <div class="card-body" style="width: 80%; margin: auto;"> 
        <table id="datatable" class="table table-bordered">
            <thead >
              <tr>
                <th scope="col" class="masque">ID</th>
                <th scope="col">Programmes</th>
                <th scope="col">Date Début</th>
                <th scope="col">Date Fin</th>
                <th scope="col">Heure</th>
                <th scope="col">Id Personnels</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($programe as $prog)
                
                <tr>
                    <td scope="row" class="masque">{{$prog->id}}</td>
                    <th scope="row">{{$prog->programme}}</td>
                    <th scope="row">{{$prog->datedebut}}</td>
                    <th scope="row">{{$prog->datefin}}</td>
                    <th scope="row">{{$prog->heure}}</td>
                    <th scope="row">{{$prog->id_personnels}}</td>
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


<!-- <script type="text/javascript">
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
</script> -->

@endsection