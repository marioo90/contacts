@extends('layouts.app')

    @section('content')
    
    <h2>Contacts List</h2>
    <!-- ----------------------------    CONTACTS TABLE    ----------------------------------------->
    <div class="card">
      <div class="card-body">
    
       <table class="table table-bordered table-hover" id="contactsTable">
          <thead class="thead-light">
              <tr >
                <th>
                  ID
                </th>
                <th>
                  Name
                </th>
                <th>
                  Show Details
                </th>
                <th>
                  Edit
                </th>
                <th>
                  Delete
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($contacts as $contact)
                <tr>
                  <th scope="row"> {{ $contact->id }}</th>
                  <td> {{ $contact->name }} </td>
                  <td> 
                    <form action="showDetails" method="GET">
                      @csrf
                      <input type="text" name="contact_id" value="{{$contact->id}}" hidden>
                     
                        <button type="submit" class="btn btn-small btn-primary"><i class="fas fa-eye"></i></button>
                    </form>
                  
                  </td>
                  <td class="align-center">
                          <button type="button" class="btn btn-small btn-warning" data-toggle="modal" data-target="#editContactModal" data-id="{{ $contact->id }}"
                          data-name="{{ $contact->name }}" data-email="{{ $contact->email }}" data-contact="{{ $contact->contact }}">
                          <i class="fas fa-edit"></i>
                          </button>
                     </td>
                    
                    <td class="align-center">
                          <button type="button" class="btn btn-small btn-danger" onclick="deleteMessage({{$contact->id}})">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        <form action="{{route('contacts.destroy',$contact->id)}}" method="POST" id="del-message-{{$contact->id}}" style="display:none;">
                            @csrf
                            @method('DELETE')
                        </form>
                     </td>
               
                </tr>
              @endforeach
    
            </tbody>
          </table>
      </div>
    </div>

    <!-- ----------------------------    /END OF TABLE    ----------------------------------------->
    

       
 
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    

  <script type="application/javascript">
  
    function deleteMessage(id){
        swal({
        title: 'Are you sure?',
        text: "It will not be possible to reverse!",
        icon: 'warning',
        buttons: true,
        dangerMode: true,
        buttons: ["Cancel", "Yes, delete!"]
        }).then((value) => {
            if (value) {
                document.getElementById('del-message-'+id).submit();
                swal(
                'Deleted!',
                'Contact deleted.',
                'success',
                {
                    buttons: false,
                    timer: 1000,
                })
            }
        })
    };
    
    $(document).ready(function(){
  
  $("#editContactModal").on('show.bs.modal', function () {
    alert('The modal is about to be shown.');
  });
});

 </script>


    <!---------------------------- EDIT CONTACT MODAL ---------------------------->
      <div class="modal fade" id="editContactModal"tabindex="-1" role="dialog" aria-labelledby="editContactModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editContactModalLabel">Edit Contact</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action = "editContact" method = "POST">
                  @csrf

                  <div class="form-group">
                    <input type="text" class="form-control" id="contactIdEdit" name="contactIdEdit" >
                  </div>
              

                    <div class="form-group">
                      <label for="contactNameEdit">Name</label>
                      <input type="text" class="form-control" id="contactNameEdit" name="contactNameEdit" placeholder="Name of contact">
                    </div>
  
  
                  <button type="submit" class="btn btn-primary">Save</button>
                  
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
           </div>
          </div>
        </div>
      </div>

    <!-- ----------------------------    /END OF EDIT MODAL------------------------------------>
  
  @endsection
