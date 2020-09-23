@extends('template.template')
@section('title', "Tambah URL")
@section('content')
              <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit URL</h4>
                <form class="form-sample" method="POST" action="#" autocomplete="off">
                  @csrf
                      <div class="form-group">
                        <label for="">Title URL</label>
                      <input type="text" name="title" class="form-control" value="{{$data->title}}" placeholder="Masukan sesuatu">
                      </div>
                      <div class="form-group">
                        <label for="" id="ip">Deskripsi</label>
                      <textarea name="desc" id="" cols="30" rows="10" class="form-control" placeholder="Masukan deskripsi">{{$data->deskripsi}}</textarea>
                      </div>
                      @php
                          $url = json_decode($data->url, TRUE);
                      @endphp
                      @for ($i = 0; $i < count($url); $i++)
                        @if ($i === 0)
                          <div class="form-row">
                            <div class="form-group col-md-3">
                              <label for="">Nama</label>
                            <input type="text" name="nama[]" value="{{$url[$i]['nama']}}" class="form-control" placeholder="Masukan sesuatu">
                            </div>

                            <div class="form-group col-md-7">
                              <label for="">URL</label>
                              <input type="text" name="url[]" value="{{$url[$i]['url']}}" class="form-control" placeholder="Masukan URL">
                            </div>

                            <div class="form-group col-md-2">
                              <label for="">Action</label>
                              <button class="form-control btn btn-primary" type="button" id="add_button">Tambah</button>
                            </div>
                          </div>
                        @else
                        <div class="form-row" id="add_form{{$i}}">
                            <div class="form-group col-md-3">
                              <label for="">Nama</label>
                            <input type="text" name="nama[]" value="{{$url[$i]['nama']}}" class="form-control" placeholder="Masukan sesuatu">
                            </div>

                            <div class="form-group col-md-7">
                              <label for="">URL</label>
                              <input type="text" name="url[]" value="{{$url[$i]['url']}}" class="form-control" placeholder="Masukan URL">
                            </div>

                            <div class="form-group col-md-2">
                              <label for="">Action</label>
                            <button id="{{$i}}" class="form-control btn btn-danger btn_remove" type="button" id="add_button">Hapus</button>
                            </div>
                          </div>
                        @endif
                      @endfor


                      <div id="url_form"></div>
                      <div class="form-group col-md-3">
                        <input class="form-check-input" type="checkbox" {{$data->public ? 'checked' : ''}} name="public" value="true" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                          Apakah boleh publik melihat urlmu? (Centang jika boleh)
                        </label>
                      </div>
                      <div class="form-group" align="center">
                        
                        <div class="col-md-3">
                        <input type="submit" class="form-control btn btn-success" value="Edit URL">
                        </div>
                      </div>

                    </form>
                </div>
              </div>
            </div> 
@endsection

@push('scripts')
  <script>
    var id_url = 0;
    $(document).on('click', '#add_button', function(){
      id_url++;
          $("#url_form").append('<div class="form-row" id="add_form'+id_url+'" style="display:none;"><div class="form-group col-md-3"><label for="">Nama</label><input type="text" name="nama[]" class="form-control" placeholder="Masukan sesuatu"></div><div class="form-group col-md-7"><label for="">URL</label><input type="text" name="url[]" class="form-control" placeholder="Masukan URL"></div><div class="form-group col-md-2"><label for="">Submit</label><button id="'+id_url+'" class="form-control btn btn-danger btn_remove" type="button">Hapus</button></div></div>');
          $("#add_form"+id_url).slideToggle('slow');
    });

    $(document).on('click', '.btn_remove', function(){

        let button_id = $(this).attr("id");
        let add_form = "#add_form"+button_id;
        $("#add_form"+button_id).stop(1).animate({height: 0},500, function(){
          $(add_form).remove();  
        });
    });

  </script>
    
@endpush