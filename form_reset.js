function submitForm(event){
    event.preventDefault();
       var formData=new FormData(document.getElementById('empForm')); //passing form element to formData
     $.ajax({
                type:'POST',
                data:formData,
                url:'includes/auth.php',
                dataType:'json',
                cache:false,
                contentType: false,
                processData: false,
                success:function(response){
                    console.log(response);
                    if (response.code == '1') {
                    	$('.successresult').html(response.msg);
                    	 $('#empForm')[0].reset(); // reseting form val
                    	 $('#exampleModal').modal('hide');
                    }else{
                       $('.successresult').html(response);
                    }
                },
                error:function(response){
                    console.log(response);
                }

            });

 }
