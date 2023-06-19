
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>




<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  </script>


<script>
 $(document).ready(function(){

  //add student
  $(document).on('click','.add_student',function(e){
    e.preventDefault();
    let name=$('#name').val();
    let email=$('#email').val();

    //console.log(name+''+email);


    $.ajax({
        url:"{{ route('add.student') }}",
        method:'post',
        data:{name:name,email:email},
        success:function(res){


                $('#addModal').modal('hide');
                $('#addStudentForm')[0].reset();
                $('.table').load(location.href+' .table');
                $('.errMsgShow').text('');
                //$('.alert').show();
               // $('.alert').text(res.status);
               Command: toastr["success"]("Student added successfully", "Success")

                toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
                }

        },error:function(err){
// console.log(err);
        let error=err.responseJSON;
        $.each(error.errors,function(index,value){
            $('.errMsgShow').append('<span class="text-danger">'+value+'</span>'+'<br>');
        });
        }
    });
  });
   //end add student


   //show data in update modal
   $(document).on('click','.updateForm',function(){

    let id=$(this).data('id');
     $('#updateModal').modal('show');

    //console.log(id);
    // let name=$(this).data('name');
    // let email=$(this).data('email');

    // $('#update_id').val(id);
    // $('#update_name').val(name);
    // $('#update_email').val(email);

    $.ajax({
        method:'GET',
        url:'/edit/student/'+id,
        success:function(response){
            //console.log(response);
            $('#update_name').val(response.student.name);
            $('#update_email').val(response.student.email);
            $('#update_id').val(id);
        }
    });
   });
   //end show data in update modal




    //update student
  $(document).on('click','.update_student',function(e){
    e.preventDefault();
    let update_id=$('#update_id').val();
    let update_name=$('#update_name').val();
    let update_email=$('#update_email').val();
    //alert(update_id);


$.ajax({
    url:"{{ route('update.student') }}",
    method:'post',
    data:{update_id:update_id,update_name:update_name,update_email:update_email},

    success:function(result){
               $('#updateModal').modal('hide');
                $('#updateStudentForm')[0].reset();
                $('.table').load(location.href+' .table');
                $('.errMsgShow').text('');
                //$('.alert').show();
                //$('.alert').text(result.status);
                Command: toastr["success"]("Student updated successfully", "Success")

                toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
                }
        },
        error:function(err){
// console.log(err);
        let error=err.responseJSON;
        $.each(error.errors,function(index,value){
            $('.errMsgShow').append('<span class="text-danger">'+value+'</span>'+'<br>');
        });
        }

});
  });
   //end update student



   //delete student
  $(document).on('click','.delete_student',function(e){
    e.preventDefault();
    let student_id=$(this).data('id');
    //alert(student_id);

    if(confirm('Are you sure to delete this student???')){
        $.ajax({
            url:"{{ route('delete.student') }}",
            method:'post',
            data:{student_id:student_id},

          success:function(result){
                $('.table').load(location.href+' .table');
                //$('.alert').show();
                //$('.alert').text(result.status);
                Command: toastr["success"]("Student deleted successfully", "Success")

                toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
                }
         }

        });
    }



  });
   //end delete student


   //pagination
   $(document).on('click','.pagination a',function(e){
    e.preventDefault();

    let page=$(this).attr('href').split('page=')[1];
    pagination(page);
   });


   function pagination(page){
    $.ajax({
        url:'/student/pagination?page='+page,
        success:function(res){
            $('.studentPage').html(res);
        }
    });
   }
   //pagination end


   //search start
   $(document).on('keyup','#search_string',function(){
      let search_string=$('#search_string').val();
      //console.log(search_string);

      $.ajax({
        url:"{{ route('search.student') }}",
        method:'GET',
        data:{search_string:search_string},

        success:function(res){
         $('.studentPage').html(res);
         if(res.status=='not found'){
            $('.studentPage').html('<span class="text-danger">'+'No result found'+'</span>');
         }
        }
      });
   });
   //search end

});
</script>
