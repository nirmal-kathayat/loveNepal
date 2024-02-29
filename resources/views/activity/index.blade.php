@extends('layouts.default')
@section('content')
<section class="inner-section-wrapper">

     <div class=" bg-white menu">
          <div class="title-wrapper flex">
               <div class="page-title"> Category List </div>
               <div class="flex align-items-center">

                    <a href="{{ route('activity.create') }}">
                         <button class="btn btn--primary btn--icon ml-24">
                              <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                   xmlns="http://www.w3.org/2000/svg">
                                   <path d="M10.5 4.16663V15.8333" stroke="white" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                   <path d="M4.66669 10H16.3334" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                              </svg>
                              <span>New activity</span>
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
                    <table id="activityTable" class="display" style="width:100%">
                         <thead>
                              <tr class="table-header">
                                   <th>S.no</th>
                                   <th>Activity name</th>
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
     $('#activityTable').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('activity.index') }}", // Replace with the correct route
          pageLength : 25,
          columns: [{
                    data: 'id',
                    name: 'id',
                    searchable: false,
                    render: function(data, type, full, meta) {
                         return full?.DT_RowIndex
                    }
               },
               {
                    data: 'activity_name',
                    name: 'activity_name',
                    orderable: false
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
                              "{{route('activity.edit',['id'=>':id'])}}"
                              .replace(':id', full.id);

                         var deleteUrl =
                              "{{route('activity.delete',['id'=>':id'])}}"
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