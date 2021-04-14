@extends('layouts.app')

@section('content')

<form action="{{ route('search') }}" method="GET" style="padding:25px;">
  <input type="text" name="search" required/>
  <button type="submit">Introdu cuvantul cheie</button>

</form>
<br> 


  <hr>


<form enctype="multipart/form-data" action="{{ action('App\Http\Controllers\ContinutController@categorie') }}"
            method="POST">

             
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                <input type="nume" name="nume" class="form-control" placeholder="categorie"/>
                 <input type="submit" class="btn btn-primary"/>
            </form>  
            
            
            

<h1 style="margin-top: 50px">Nume postari</h1>



   <table border="2" name="table-keywords" >
    
  <tr>
    {{-- @if(Auth::user()->id == $continut->idUtilizator) --}}
    @foreach ($continut as $key )
    {{-- @if(Auth::user()->id == $key->idUtilizator) --}}
       
       <tr border="2" >
             {{-- <td>{{$key['titlu']}}</td>    --}}
             {{-- <td>{{$key['keywords']}}</td>    --}}
             <td width="200"><h4><a href="/continut/{{$key->id}}"> {{$key->titlu}}</a></h4></td>
              {{-- <td><b><?php echo $key->titlu?></b></td> --}}
              
              

            <td width="700" border="2">
            
              <div class="modal-body">
              {!! Form::open(['action' => ['App\Http\Controllers\ContinutController@updateKeywords', $key->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  
             
             
          
              <div class="form-group">
                  {{-- <b>{{Form::label('keywords', 'Keywords')}}</b> --}}
                  <textarea class="form-control" id="keywords" name=<?php echo $key->id?>>
                      <?php echo htmlspecialchars($key->keywords); ?>
                  </textarea>
              </div> 

              {{Form::hidden('_method', 'POST')}} 
              {{Form::submit('Editeaza', ['class'=>'btn btn-primary'])}}
              {!! Form::close() !!} 
              <div>

 <div style="padding-top: 10px">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#yourModal{{$key->id}}">+</button>

            <div class="modal fade" id="yourModal{{$key->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              {{-- <form enctype="multipart/form-data" action="{{ action('App\Http\Controllers\ContinutController@storeKeywords') }}"
              method="POST"> --}}
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   
                  </div>
                  <div class="modal-body">
                    {{-- <form enctype="multipart/form-data" action="{{ action('App\Http\Controllers\ContinutController@storeKeywords') }}"
                    method="POST"> --}}
                    <form enctype="multipart/form-data" action="{{ action('App\Http\Controllers\ContinutController@storeKeywords') }}"
                    method="POST">
                     
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                        <input type="text"  name=<?php echo $key->id?>  class="form-control" placeholder="keywords"/>
                         {{-- <input type="submit" class="btn btn-primary"/> --}}
                    {{-- </form>  --}}
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <input type="submit" class="btn btn-primary"/>
                  {{-- </form> --}}
                  </div>
                </div>
              </div>
           
            </div>
          </form>
          </div> 
</td>
        



             {{-- <form enctype="multipart/form-data" action="{{ action('App\Http\Controllers\ContinutController@storeKeywords') }}"
            method="POST">

             
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                <input type="text"  name=<?php echo $key->id?>  class="form-control" placeholder="keywords"/>
                 <input type="submit" class="btn btn-primary"/>
            </form>  --}}
            
            
            
           
        
      @endforeach
    
    </tr>
  </table> 

     {{-- <script>
                $(document).ready(function(){

                  fetch_data();
                    function fetch_data()

                       $.ajax({
                         url:"/live/fetch_data",
                         dataType:"json",
                         success:function(data)
                         {
                           var html="";
                           html += '<tr>';
                            html += '<td content id="titlu"></td>';
                              html += '<td contenteditable id="keywords"></td>';
                                html += '<td><button type="button" class="btn btn-success btn-xs" id="add">Add</button></td></tr>';
                                 for(var count=0; count<data.lenght; count++)
                                 {
                                   html += '<tr>'
                                    html += '<td contenteditable" class="column_name" data-column_name="titluri" id="'+data[count]+id+">'+data[count].titlu+'</td>';
                                    html += '<td contenteditable" class="column_name" data-column_name="keywords" id="'+data[count]+id+">'+data[count].keywords+'</td>';
                                    
                                 }

                                 $('tbody').html(html);
                         }
                       })


                });

       </script> --}}

      

  

@endsection