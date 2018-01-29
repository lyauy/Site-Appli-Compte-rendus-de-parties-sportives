<!--//        $("#mydiv").append('<table>'+'<tr><th class="no"> Joueur ' + n + '</th></tr>' 
//                        +"<th><tr>{!! Form::text('joueur[][nolicence]', null, ['class' => 'form-control', 'placeholder' => 'Numéro de licence'])  !!}</th></tr>"
//                        +"<th><tr>{!! Form::text('joueur[][fullname]', null, ['class' => 'form-control', 'placeholder' => 'Nom et prénom'])  !!}</th></tr>"
//                        +'</table>'
//                        +'<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>'//);
 //           n++;




////       $(function () {
////            $('.add').click(function () {
////                var n = ($('.resultbody tr').length - 0) + 1;
                //var tr = '<tr><td class="no">' + n + '</td>' +

                       // '<td><input type="text" class="nolicence form-control" name="nolicence[]" value="{{ old('nolicence') }}"></td>'+
                       // '<td><input type="text" class="fullname form-control" name="fullname[]" value="{{ old('fullname') }}"></td></tr>'+
                       // '<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';

//                var tr = '<table>'+'<tr><th class="no"> Joueur ' + n + '</th></tr>' 
//                        +"<th><tr>{!! Form::text('joueur[][nolicence]', null, ['class' => 'form-control', 'placeholder' => 'Numéro de licence'])  !!}</th></tr>"
//                        +"<th><tr>{!! Form::text('joueur[][fullname]', null, ['class' => 'form-control', 'placeholder' => 'Nom et prénom'])  !!}</th></tr>"
 //                       +'</table>'
   //                     +'<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';
//                $('.resultbody').append(tr);
  //          });
//        $('.resultbody').delegate('.delete', 'click', function () {
//            $(this).parent().parent().remove();
//        });
//    });

<!--<table id="mydiv">
                                                <tr><th>Joueur 1</th></tr>                      
                                                <tr class = "{!! $errors->has('rows[$m][nolicence]') ? 'has-error' : '' !!}"><th>
                                                    {!! Form::text('rows[$m][nolicence]', null, ['class' => 'form-control', 'placeholder' => 'Numéro de licence'])  !!}
                                                    {!! $errors->first('nolicence', '<small class="help-block">:message</small>') !!}
                                                </th></tr>
                                                <tr class = "{!! $errors->has('rows[$m][fullname]') ? 'has-error' : '' !!}"><th>
                                                    {!! Form::text('rows[$m][fullname]', null, ['class' => 'form-control', 'placeholder' => 'Nom et prénom']) !!}
                                                    {!! $errors->first('fullname', '<small class="help-block">:message</small>') !!}
                                                </th></tr>
                                                    
                                            </table>-->





     