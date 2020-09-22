@extends('template.template')
@section('title', "Tambah URL")
@section('content')
              <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Title</h4>
                    <form class="form-sample" id="url_form">
                      <div class="form-group">
                        <label for="">Inputan</label>
                        <input type="text" class="form-control" placeholder="Masukan sesuatu">
                      </div>
                      <div class="form-group">
                        <label for="" id="ip">Inputan</label>
                        <input type="text" class="form-control" placeholder="Masukan sesuatu">
                      </div>


                      <div class="form-row">

                          <div class="form-group col-md-3">
                            <label for="">Nama</label>
                            <input type="text" name="nama[]" class="form-control" placeholder="Masukan sesuatu">
                          </div>

                          <div class="form-group col-md-7">
                            <label for="">URL</label>
                            <input type="text" name="url[]" class="form-control" placeholder="Masukan URL">
                          </div>

                          <div class="form-group col-md-2">
                            <label for="">Submit</label>
                            <button class="form-control btn btn-primary" type="button" id="add_button">Tambah</button>
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
        //$("#url_form").append('<div id="nama'+id_url+'" class="form-group col-md-3"><label for="">Inputan</label><input type="text" class="form-control" placeholder="Masukan sesuatu"></div>');
        //$("#url_form").append('<div id="url'+id_url+'" class="form-group col-md-7"><label for="">URL</label><input type="text" class="form-control" placeholder="Masukan URL"></div>');
        //$("#url_form").append('<div id="btnrm'+id_url+'"  class="form-group col-md-2"><label for="">Submit</label><button id="'+id_url+'" class="form-control btn btn-danger btn_remove" type="button">Hapus</button></div>');
          $("#url_form").append('<div class="form-row" id="add_form'+id_url+'" style="display:none;"><div class="form-group col-md-3"><label for="">Nama</label><input type="text" name="nama[]" class="form-control" placeholder="Masukan sesuatu"></div><div class="form-group col-md-7"><label for="">URL</label><input type="text" name="url[]" class="form-control" placeholder="Masukan URL"></div><div class="form-group col-md-2"><label for="">Submit</label><button id="'+id_url+'" class="form-control btn btn-danger btn_remove" type="button">Hapus</button></div></div>');
          $("#add_form"+id_url).slideToggle('slow');
    });

    $(document).on('click', '.btn_remove', function(){

        let button_id = $(this).attr("id");
        let add_form = "#add_form"+button_id;
        //$("#add_form"+button_id).slideToggle('slow');
        //$(add_form).remove();

        $("#add_form"+button_id).stop(1).animate({height: 0},500, function(){
          $(add_form).remove();  
        });
    });

  </script>
    
@endpush