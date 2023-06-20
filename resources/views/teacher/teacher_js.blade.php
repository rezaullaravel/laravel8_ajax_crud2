<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  </script>

  <script type="text/javascript">
  	$(document).ready(function(){

  		//add teacher
  		$(document).on('click','.add_teacher',function(e){
            e.preventDefault();
  			let formData=new FormData($('#addTeacherForm')[0]);

  			$.ajax({
  				method:'POST',
  				url:"{{route('teacher.store')}}",
  				data:formData,
  				cache:false,
                contentType: false,
                processData: false,

  				success:function(response){
                 $('.alert').show();
                 $('.alert').html(response.status);
                 $('#addTeacherForm')[0].reset();
                 $('.errMsgShow').text('');
                 $('#addModal').modal('hide');
                 $('.table').load(location.href+' .table');
  				},error:function(err){
  					//console.log(err);

  					let error=err.responseJSON;

  					$.each(error.errors,function(index,value){
  						$('.errMsgShow').append('<span class="text-danger mb-3">'+value+'</sapn>'+'<br>');
  					})
  				}
  			});


  		})
  		//add teacher end


        //show data in edit modal
        $(document).on('click','.editButton',function(){
            let id=$(this).data('id');

            //alert(id);

            $('#editModal').modal('show');

            $.ajax({
                method:'GET',
                url:'/edit/teacher/'+id,
                success:function(response){
                   //console.log(response);
                    $('#edit_name').val(response.teacher.name);
                    $('#edit_phone').val(response.teacher.phone);
                    $('#edit_id').val(id);
                }
            });
        });
        //show data in edit modal end


        //update teacher
        $(document).on('click','.update_teacher',function(e){
            e.preventDefault();
            let id=$('#edit_id').val();
            //alert(id);

            let editFormData=new FormData($('#editTeacherForm')[0]);
            $.ajax({
                method:'POST',
                url:'/update/teacher'+id,
                data:editFormData,
                contentType:false,
                processData:false,
                success:function(response){
                        $('.alert').show();
                         $('.alert').html(response.status);
                         $('#editTeacherForm')[0].reset();
                         $('.errMsgShow').text('');
                         $('#editModal').modal('hide');
                         $('.table').load(location.href+' .table');
                },error:function(err){
                    //console.log(err);

                    let error=err.responseJSON;

                    $.each(error.errors,function(index,value){
                        $('.errMsgShow').append('<span class="text-danger mb-3">'+value+'</sapn>'+'<br>');
                    })
                }
                
            });
        })
        //update teacher end


        //delete teacher
        $(document).on('click','.delete_teacher',function(){
            let id=$(this).data('id');
            //alert(id);
            if(confirm('Are you sure to delte this item???')){
                $.ajax({
                method:'GET',
                url:'/delete/teacher/'+id,
                success:function(response){
                        $('.alert').show();
                         $('.alert').html(response.status);
                         $('.table').load(location.href+' .table');
                }
            });
            }
        });
        //delete teacher end
  	});
  </script>