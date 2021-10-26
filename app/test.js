	$(document).ready(function(){
		// $('.student').on('click', function(){ 
  //           $('#student_result').hide();
  //           $('#search').val($(this).html());

  //           let id = $(this).data('index');

  //           $.ajax({
  //           	type: 'POST',
  //               url: 'backend_search_student.php',
  //               data: {id:id}, 
  //               success:function(data){
	 //               $('.main-loader').show();	  	
		// 		   	setTimeout(function(){
		// 				$('.main-loader').hide();
	 //                	$('#result2').html(data);
		// 			}, 1000); 
  //               }
  //           });
  //       });
        $('.add_to_list').on('click', function(){ 

            let subid = $(this).data('index');
            let ttttt = $('.ttttt').val();
            $.ajax({
                type: 'POST',
                url: 'backend_search_student.php',
                data: {subid:subid, ttttt:ttttt},
                success:function(data){ 
                    $('#student_subject_table').html(data);
                }  
            });
        }); 
        $('#code').unbind().bind('keyup', function(){
            let code = $(this).val();
            if (!code || code == undefined || code == "") {
                $('#result').hide();    
            }else{
                $.ajax({
                type:'POST',
                url:'backend_search_subject2.php?nocache='+Math.random(),
                data:{code:code},
                cache: false,
                success:function(html){
                    $('#result').show();
                    $('#result').html(html);
                    html.empty();
                }
                });
            }
        });
        $('.click_add').unbind().bind('click', function(){
            let sub_id = $(this).data('index');
            let std_id = $('#student_id').val(); 
            let curlvl_id = $('#curlvl_id').val();
            let add = true;
            $.ajax({
                type:'POST',
                url:'backend_student_subject.php',
                data:{sub_id:sub_id, std_id:std_id, curlvl_id:curlvl_id, add:add},
                success:function(html){ 
                    $('#student_subject_table').html(html);
                }
            });
        });
        $('.delete_me').unbind().bind('click', function(){
            let id = $(this).data('index');
            var stdid = $(this).closest("tr").find('td:eq(0)').text();
            var curlvlid = $(this).closest("tr").find('td:eq(1)').text();
            let destroy = true;
            $.ajax({
                type:'POST',
                url:'backend_student_subject.php',
                data:{id:id, destroy:destroy, stdid:stdid, curlvlid:curlvlid},
                success:function(html){ 
                    $('#student_subject_table').html(html);
                }
            });
        });
        $('#cleartext').on('click', function(){
            $('#code').val('');
            $('#result').hide();
        });

        
	}); 