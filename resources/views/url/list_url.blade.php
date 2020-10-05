@extends('template.template')
@section('title', "Tambah URL")
@section('content')

<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Table</h4>
        <p class="card-description">Sebuah Deskripsi</p>
        <table class="table table-bordered" id="tableurl">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              {{-- <th>Deskripsi</th> --}}
            </tr>
          </thead>
          {{-- <tbody>
            <tr>
              <td>1</td>
              <td>Fajar Muharam</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Dinar</td>
            </tr>
          </tbody> --}}
        </table>
    </div>
  </div>
</div>

<!-- Modal: modalCart -->
<div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">

        <table class="table table-hover" id="detail_table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>URL</th>
            </tr>
          </thead>
        </table>
      </div>
      <!--Footer-->
      <center><p style="word-wrap: break-word;" id="desc">Ini deskripsi</p></center>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal: modalCart -->

@endsection


@push('scripts')

<script src="{{ URL::asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script>

function renderDetail(id){
  $('#modalCart').modal('show'); 
}

$(function() {
    $('#tableurl').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('userlistapi') !!}',
        columns: [
            { data: 'DT_RowIndex', orderable: false},
            { data: 'title' , render: function(data,type,row,meta){
              return `<a href="#" onclick="renderDetail(${row.id})">${data}</a>`
            }},
            // { data: 'deskripsi', render: function(data,type,row,meta){
            //   return `<div style='white-space:normal; width:500px; align:center;'>${data}</div>`;
            // }}
        ]
    });
});
</script>
@endpush


@push('css')
  <link rel="stylesheet" href="{{URL::asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">    
@endpush