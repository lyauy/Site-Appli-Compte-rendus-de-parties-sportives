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





     <div class="form-group">
                        <table>
                            <thead>
                                <tr>
                                    <th>Club équipe 1</th>
                                    <th>Club équipe 2 (adverse)</th>
                                </tr>                        
                            </thead>
                            <tbody>
                                <tr>
                                @for ($i = 1;$i < 3;$i++)                                                                            
                                    <th class = "{!! $errors->has('nomclub[]') ? 'has-error' : '' !!}">
                                        {!! Form::text('nomclub[]', null, ['class' => 'form-control', 'placeholder' => 'Nom du club']) !!}
                                        {!! $errors->first('nomclub[]', '<small class="help-block">:message</small>') !!}
                                    </th>                                  
                                @endfor
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </br>
                    <div class="form-group">
                        <table>
                            <thead>
                                <tr>
                                    <th>Directeur équipe 1</th>
                                    <th>Directeur équipe 2 (adverse)</th>
                                </tr>                        
                            </thead>
                            <tbody>
                                <tr>
                                @for ($i = 1;$i < 3;$i++)
                                    <th class = "{!! $errors->has('nomdirecteur[]') ? 'has-error' : '' !!}">
                                        {!! Form::text('nomdirecteur[]', null, ['class' => 'form-control', 'placeholder' => 'Nom du directeur du club']) !!}
                                        {!! $errors->first('nomdirecteur[]', '<small class="help-block">:message</small>') !!}
                                    </th>  
                                @endfor                         
                                </tr>                                
                            </tbody>                        
                        </table>
                    </div>
                </br>
                    <div class="form-group">
                        <table id="mydiv">                            
                            <thead>
                                <tr>
                                    <th>Joueurs équipe 1</th>
                                    <th>Joueurs équipe 2 (adverse)</th>
                                </tr>                        
                            </thead> 
                        </br>                           
                            <tbody>
                                @php($m=1)                                                  
                                    <tr>
                                    @for($k = 1;$k < 3;$k++)                                        
                                        <th>                                            
                                            <table>
                                                <thead>
                                                    <tr>Joueur 1</tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="form-group"><input type="text" name="nolicence[]" class="form-control" placeholder="Numéro de licence"/></tr>
                                                    <tr class="form-group"><input type="text" name="fullname[]" class="form-control" placeholder="Nom et prénom"/></tr>
                                                </tbody>
                                            </table>
                                            @php($m++)
                                        </th>                                         
                                    @endfor                                                     
                                    </tr>                                    
                            </tbody>                                                      
                        </table>
                    <tr><th>
                        <input type="button" class="btn btn-lg btn-primary add" value="+" onclick="createNew()">
                        <!--<input type="button" class="btn btn-danger delete" value="x" onclick="deleteNew()">-->
                    </th></tr>   
                </div>