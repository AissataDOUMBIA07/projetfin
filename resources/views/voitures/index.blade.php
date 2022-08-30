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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalvoiture">Ajouter voitures</button>
    </div>
    <!-- debut modal ajout voitures -->
    <div class="modal fade" id="modalvoiture" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter voitures</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
                <form action= "{{ route('Voitures.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">							
                        <div class="mb-3">
                            <label for="" class="form-label">Numéro</label>
                            <input type="text" class="form-control" name="numero" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Libéllé</label>
                            <input type="text" class="form-control" name="libelle" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Couleur</label>
                            <input type="text" class="form-control" name="couleur" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Id personnels</label>
                            <select name="id_personnels" id="" class="form-control">
                                @foreach ($vtr as $cool)
                                    <option value="{{$cool->id}}">{{$cool->nom}} {{$cool->prenom}}</option>
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
    <!-- fin modal ajout voitures -->

    <!-- debut tableau -->
    <div class="card-body">
        <table id="datatable" class="table table-bordered" style="width: 80%; margin: auto;">
            <thead >
              <tr>
                <!-- <th scope="col" class="masque">>ID</th> -->
                <th scope="col">Numéro</th>
                <th scope="col">Libélé</th>
                <th scope="col">Couleur</th>
                <th scope="col">Id personnels</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($voiture as $voit)
                
                <tr>
                    <!-- <td scope="row" class="masque">{{$voit->id}}</td> -->
                    <th scope="row">{{$voit->numero}}</td>
                    <th scope="row">{{$voit->libelle}}</td>
                    <th scope="row">{{$voit->couleur}}</td>
                    <th scope="row">{{$voit->id_personnels}}</td>
                    <td>
                        <button class="edit btn item" data-toggle="tooltip" data-bs-toggle="modal" data-placement="top" title="Edit" data-bs-target="#editmodal">
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
            $('#numero').val(data[1]);
            $('#libelle').val(data[2]);
            $('#couleur').val(data[3]);
            $('#id_personnels').val(data[4]);
            $('#editperson').attr('action', '/voitures.index/'+data[0]);
            $('#editmodal').modal('show');
        });
    });
</script>
@endsection