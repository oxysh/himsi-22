@extends('template.bootstrap.temp')

@section('title')
    Artikel
@endsection


@section('content')
    <div class="container my-4">
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @elseif (Session::has('error'))
            <div class="alert alert-error" role="alert">
                {{Session::get('error')}}
            </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @if ($errors->has('title', 'NIM', 'content'))
                <span>Silahkan isi data-data yg diperlukan!</span>
            @elseif ($errors->has('title', 'NIM'))
                <span>Isi Judul dan NIM</span>
            @elseif ($errors->has('title', 'content'))
                <span>Isi Judul dan Konten</span>
            @elseif ($errors->has('NIM', 'content'))
                <span>Isi Konten dan NIM</span>
            @elseif ($errors->has('NIM'))
                <span>Isi NIM</span>
            @elseif ($errors->has('content'))
                <span>Isi Konten</span>
            @elseif ($errors->has('title'))
                <span>Isi Judul</span>
            @else
                <span>Silahkan isi data-data yg diperlukan!</span>
            @endif
        </div>
    @endif
        <div class="row">
            <div class="jumbotron jumbotron-fluid col-12">
                <div class="container">
                    <h1 class="display-4">Dashboard Artikel</h1>
                    <p class="lead">Mau Ngapain Sih ??? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat
                        animi iste alias, totam atque saepe earum voluptate fugit! Nam, eveniet.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <h2>Artikel ({{$articles->count()}})</h2>
        </div>
        <div class="row">
            <table class="table table-striped table-hover">
                <thead>
                    <th>#</th>
                    <th>Tanggal Dikirim</th>
                    <th>Author</th>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse ($articles as $article)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{date('l, d F - H:i', strtotime($article->created_at))}}</td>
                            <td>{{$article->author}}</td>
                            <td>{{$article->title}}</td>
                            <td>
                                @if ($article->status == 'submitted')
                                    <span class="badge bg-secondary text-light">Submit</span>
                                @elseif ($article->status == 'decline')
                                    <span class="badge bg-danger text-light">Tolak</span>
                                @elseif ($article->status == 'publish' and \Carbon\Carbon::parse($article->schedule) <= \Carbon\Carbon::now())
                                    <span class="badge bg-success text-light">Publish</span>
                                @elseif ($article->status == 'publish' and \Carbon\Carbon::parse($article->schedule) > \Carbon\Carbon::now())
                                    <span class="badge bg-warning">Dijadwal</span>
                                @endif
                            </td>
                            <td>
                                <!-- Check -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#check{{$article->id}}">Cek</button>
                                <!-- Edit -->
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit{{$article->id}}">Edit</button>
                                <!-- Hapus -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$article->id}}">Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Masih belum ada artikel yang dikirim</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="row">
            {{$articles->links()}}
        </div>
        @foreach ($articles as $article)
            <!-- Check -->
            <div class="modal fade" id="check{{$article->id}}" data-keyboard="false" tabindex="-1" aria-labelledby="check{{$article->id}}Label" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="check{{$article->id}}Label">Artikel "{{$article->title}}"</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <h4>{{$article->title}}</h4>
                        <label class="col-form-label"><strong>Author:</strong> {{$article->author}}</label><br>
                        <label class="col-form-label"><strong>NIM:</strong> {{$article->NIM}}</label><br>
                        <label class="col-form-label"><strong>Dikirim:</strong> {{date('l, d F - H:i', strtotime($article->created_at))}}</label><br>
                        <label class="col-form-label"><strong>Status:</strong> 
                            @if ($article->status == 'submitted')
                                <span class="badge bg-secondary text-light">Submit</span>
                            @elseif ($article->status == 'decline')
                                <span class="badge bg-danger text-light">Tolak</span>
                            @elseif ($article->status == 'publish' and \Carbon\Carbon::parse($article->schedule) <= \Carbon\Carbon::now())
                                <span class="badge bg-success text-light">Publish</span>
                            @elseif ($article->status == 'publish' and \Carbon\Carbon::parse($article->schedule) > \Carbon\Carbon::now())
                                <span class="badge bg-warning">Dijadwal</span>
                            @endif
                        </label><br>
                        @if ($article->status == 'publish')
                            <label class="col-form-label"><strong>Tanggal Publish:</strong> 
                                <span>{{date('l, d F - H:i', strtotime($article->schedule))}}</span>
                            </label><br>
                        @elseif ($article->status == 'decline')
                            <label class="col-form-label"><strong>Feedback:</strong> 
                                <span>{{$article->feedback}}</span>
                            </label><br>
                        @endif
                        <label class="col-form-label"><strong>Konten:</strong>
                            <p>{{$article->content}}</p>
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        @if ($article->status == 'submitted')
                            <button type="submit" class="btn btn-danger" data-toggle="modal" data-dismiss="modal" data-target="#decline{{$article->id}}">Tolak</button>
                            <button type="submit" class="btn btn-warning" data-toggle="modal" data-dismiss="modal" data-target="#schedule{{$article->id}}">Jadwalkan</button>
                            <form action="{{route('article.admin.publish', $article->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Publish</button>
                            </form>
                        @else
                            <form action="{{route('article.admin.reset', $article->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Reset</button>
                            </form>
                        @endif
                    </div>
                </div>
                </div>
            </div>
            <!-- Edit -->
            <div class="modal fade" id="edit{{$article->id}}" data-keyboard="false" tabindex="-1" aria-labelledby="edit{{$article->id}}Label" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
                  <form class="modal-content" action="{{route('article.admin.edit', $article->id)}}" method="POST">
                    <div class="modal-header">
                      <h5 class="modal-title" id="edit{{$article->id}}Label">Edit "{{$article->title}}"</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="author" class="col-form-label"><strong>Author:</strong></label>
                            <input type="text" class="form-control" name="author" id="author" value="{{old('author') !== null ? old('author') : $article->author}}">
                        </div>
                        <div class="form-group">
                            <label for="NIM" class="col-form-label"><strong>NIM:</strong></label>
                            <input type="text" class="form-control" name="NIM" id="NIM" value="{{old('NIM') !== null ? old('NIM') : $article->NIM}}">
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-form-label"><strong>Judul:</strong></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{old('title') !== null ? old('title') : $article->title}}">
                        </div>
                        <label class="col-form-label"><strong>Dikirim:</strong> {{date('l, d F - H:i', strtotime($article->created_at))}}</label><br>
                        <label class="col-form-label"><strong>Status:</strong> 
                            @if ($article->status == 'submitted')
                                <span class="badge bg-secondary text-light">Submit</span>
                            @elseif ($article->status == 'decline')
                                <span class="badge bg-danger text-light">Tolak</span>
                            @elseif ($article->status == 'publish' and \Carbon\Carbon::parse($article->schedule) <= \Carbon\Carbon::now())
                                <span class="badge bg-success text-light">Publish</span>
                            @elseif ($article->status == 'publish' and \Carbon\Carbon::parse($article->schedule) > \Carbon\Carbon::now())
                                <span class="badge bg-warning">Dijadwal</span>
                            @endif
                        </label><br>
                        @if ($article->status == 'publish')
                            <div class="form-group">
                                <label for="schedule" class="col-form-label"><strong>Tanggal Publish:</strong></label>
                                <input type="datetime-local" class="form-control" name="schedule" id="schedule" value="{{old('schedule') !== null ? old('schedule') : date('Y-m-d\TH:i:s', strtotime($article->schedule))}}">
                            </div>
                        @elseif ($article->status == 'decline')
                            <div class="form-group">
                                <label for="feedback" class="col-form-label"><strong>Feedback:</strong></label>
                                <textarea name="feedback" class="form-control" id="feedback" cols="30" rows="10">{{old('feedback') !== null ? old('feedback') : $article->feedback}}</textarea>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="content" class="col-form-label"><strong>Konten:</strong></label>
                            <textarea name="content" class="form-control" id="content" cols="60" rows="10">{{old('content') !== null ? old('content') : $article->content}}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Edit</button>
                    </div>
                  </form>
                </div>
            </div>
            <!-- Hapus -->
            <div class="modal fade" id="delete{{$article->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="delete{{$article->id}}Label" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="delete{{$article->id}}Label">Hapus "{{$article->title}}"</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <h4>{{$article->title}}</h4>
                        <label class="col-form-label"><strong>Author:</strong> {{$article->author}}</label><br>
                        <label class="col-form-label"><strong>NIM:</strong> {{$article->NIM}}</label><br>
                        <label class="col-form-label"><strong>Dikirim:</strong> {{date('l, d F - H:i', strtotime($article->created_at))}}</label><br>
                        <label class="col-form-label"><strong>Status:</strong> 
                            @if ($article->status == 'submitted')
                                <span class="badge bg-secondary text-light">Submit</span>
                            @elseif ($article->status == 'decline')
                                <span class="badge bg-danger text-light">Tolak</span>
                            @elseif ($article->status == 'publish' and \Carbon\Carbon::parse($article->schedule) <= \Carbon\Carbon::now())
                                <span class="badge bg-success text-light">Publish</span>
                            @elseif ($article->status == 'publish' and \Carbon\Carbon::parse($article->schedule) > \Carbon\Carbon::now())
                                <span class="badge bg-warning">Dijadwal</span>
                            @endif
                        </label><br>
                        @if ($article->status == 'publish')
                            <label class="col-form-label"><strong>Tanggal Publish:</strong> 
                                <span>{{date('l, d F - H:i', strtotime($article->schedule))}}</span>
                            </label><br>
                        @elseif ($article->status == 'decline')
                            <label class="col-form-label"><strong>Feedback:</strong> 
                                <span>{{$article->feedback}}</span>
                            </label><br>
                        @endif
                        <label class="col-form-label"><strong>Konten:</strong>
                            <p>{{$article->content}}</p>
                        </label>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <form action="{{route('article.admin.delete', $article->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Hapus</button>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
            <!-- Jadwalkan -->
            <div class="modal fade" id="schedule{{$article->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="schedule{{$article->id}}Label" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
                  <form class="modal-content" action="{{route('article.admin.schedule', $article->id)}}" method="POST">
                    <div class="modal-header">
                      <h5 class="modal-title" id="schedule{{$article->id}}Label">Jadwalkan "{{$article->title}}"</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="schedule" class="col-form-label"><strong>Tanggal Publish:</strong></label>
                            <input type="datetime-local" class="form-control" name="schedule" id="schedule" value="{{old('schedule') !== null ? old('schedule') : date('Y-m-d\TH:i:s', strtotime(\Carbon\Carbon::now()))}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Jadwalkan</button>
                    </div>
                  </form>
                </div>
            </div>
            <!-- Decline -->
            <div class="modal fade" id="decline{{$article->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="decline{{$article->id}}Label" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
                  <form class="modal-content" action="{{route('article.admin.decline', $article->id)}}" method="POST">
                    <div class="modal-header">
                      <h5 class="modal-title" id="decline{{$article->id}}Label">Tolak "{{$article->title}}"</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="feedback" class="col-form-label"><strong>Feedback:</strong></label>
                            <textarea name="feedback" class="form-control" id="feedback" cols="30" rows="10">{{old('feedback') !== null ? old('feedback') : $article->feedback}}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Tolak</button>
                    </div>
                  </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection