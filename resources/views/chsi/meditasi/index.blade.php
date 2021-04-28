@extends('template.bootstrap.temp')

@section('title')
    admin - Meditasi
@endsection

@section('content')
    <div class="container my-4">
        <div class="row">
            <a href="{{ route('chsi.admin.index') }}" class="text-dark">
                <img src="https://img.icons8.com/flat-round/64/000000/back--v1.png" style="width:25px" /> kembali
            </a>
        </div>

        <div class="row my-4">
            <h1 class="display-4">Meditasi Index</h1>
        </div>

        <div class="row mb-2">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalLink">
                Tambah Link Baru
            </button>
        </div>



        <div class="row">
            <table class="table table-striped col-12 table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="row">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Link</th>
                        <th scope="row" style="width: fit-content">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td style="width: fit-content">
                            <button class="btn btn-danger">
                                Delete
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td style="width: fit-content">
                            <button class="btn btn-danger">
                                Delete
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td style="width: fit-content">
                            <button class="btn btn-danger">
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



    <!-- Modal Tambah Link Baru -->
    <div class="modal fade" id="modalLink" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputName">Name</label>
                            <input type="text" class="form-control" id="inputName">
                        </div>
                        <div class="form-group">
                            <label for="inputLink">Link</label>
                            <input type="text" class="form-control" id="inputLink">
                        </div>
                        <div class="form-group">
                            <label for="selectCategories">Select Categories</label>
                            <select class="form-control" id="selectCategories">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Link</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
