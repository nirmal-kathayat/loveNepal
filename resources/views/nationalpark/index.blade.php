@extends('layouts.default')
@section('content')
<section class="inner-section-wrapper">

      <div class=" bg-white menu">
            <div class="title-wrapper flex">
                  <div class="page-title"> National Park List </div>
                  <div class="flex align-items-center">

                        <a href="{{ route('nationalPark.create') }}">
                              <button class="btn btn--primary btn--icon ml-24">
                                    <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M10.5 4.16663V15.8333" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                          <path d="M4.66669 10H16.3334" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <span>New national park</span>
                              </button>
                        </a>
                  </div>
            </div>

            @if(Session::has('message'))
      <div id="alert-message" class="alert alert-{{ Session::get('type') }} " role="alert">
            {{ Session::get('message') }}
      </div>
      <script>
            setTimeout(function() {
                  document.getElementById('alert-message').style.display = 'none';
            }, 3000);
      </script>
      @endif

            <div class="container">
                 <div class="table-wrapper">
                  <table id="nationalParkTable" class="display" style="width:100%">
                        <thead>
                              <tr class="table-header">
                                    <th>S.no</th>
                                    <th>National Park</th>
                                    <th>Location</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Action</th>
                              </tr>
                        </thead>
                  </table>
            </div>
      </div>
</div>
</section>
@endsection

@push('scripts')
<script>
      $(document).ready(function() {
            $('#nationalParkTable').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: "{{ route('nationalPark.index') }}", // Replace with the correct route
                  pageLength: 25,
                  columns: [
                  { 
                      data: 'id', 
                      name: 'id', 
                      searchable: false, 
                      render:function(data,type,full,meta){
                          return full?.DT_RowIndex
                    }
              },
              {
                  data: 'title',
                  name: 'title',
                  orderable:false
            },

            {
                  data: 'location',
                  name: 'location',
                  orderable:false
            },

            {
                  data: 'image',
                  name: 'image',
                  orderable:false,
                  render: function(data, type, full, meta) {
                        return '<img src="' + data + '" style="width:50px; height:50px;" alt="Img" />';
                    }
            },

            {
                  data: 'description',
                  name: 'description',
                  orderable:false
            },

            {
                  data: 'action',
                  name: 'action',
                  orderable: false,
                  searchable: false,
                  render: function(datal, type,
                        full, meta
                        ) {
                        var editUrl =
                        "{{route('nationalPark.edit',['id'=>':id'])}}"
                        .replace(':id', full.id);

                        var deleteUrl =
                        "{{route('nationalPark.delete',['id'=>':id'])}}"
                        .replace(':id', full.id);

                        var editButton =
                        '<a class="btn btn-secondary btn-sm" href="' +
                        editUrl + '"><i class="fas fa-edit"></i></a>';

                        var deleteButton =
                        `<a class="btn btn-danger deleteAction btn-sm" href=${deleteUrl}><i class="fa fa-trash"></i></a>`;

                        var actionButtons = `<div style='display:flex;'>
                        ${editButton} ${deleteButton}
                        </div>`;
                        return actionButtons;

                  }
            }
            ],
            initComplete: function(settings, json) {
                        console.log(json); // Log the received JSON data
                  }
            });
      });
</script>
@endpush
