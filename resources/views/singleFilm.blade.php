@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-offset-2 col-md-8">
          <div id="app">  <div class="card">
                <div class="card-header">
             @{{film.name}}
           <div style="float: right;"> 
            <a class="btn btn-info" href="/home">Back</a>
            
           </div>
            </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

   

    <div class="row">
        <div class="col-md-4">

<img :src="'/'+film.photo" width="150" height="200">
        </div>
        <div class="col-md-6">
            <b>Description:</b>
            <p>@{{film.description}}</p>
            <p><b>Release_date:</b>@{{film.release_date}}</p>
            <p><b>Country:</b>@{{film.country}}</p>
            <p><b>Rating:</b>@{{film.ratings}}</p>
            <p><b>Ticker Price:</b>@{{film.ticket_price}}</p>
            <p><b>Genre:</b>@{{film.release_date}}</p>
        </div>
    </div>
<div class="row">
@auth
   <div class="col-md-12 form-group">
    <label >Comment</label>
    <input type="hidden" v-model="newcomment.filmid" />
    <textarea v-model="newcomment.comments" class="form-control"></textarea>
     <small  class="form-text text-error" style="color: red;"  v-if="errors.comments">@{{errors.comments[0]}}</small>
    <br> 
    <button class="btn btn-info" @click="savecomment">Submmit</button>
  </div>
  @else
  <p>Please Login to add Comment</p>
  @endauth
                <div class="col-md-12">
                  <div class="page-header">
Comments 
                  </div> 
                   <div class="comments-list" v-for="com in comments">
                       <div class="media">
                          
                            
                            <div class="media-body">
                                
                              <h4 class="media-heading user_name">@{{com.username}}</h4>
                          <p>@{{com.comments}}</p>
                              
                              
                            </div>
                          </div>
                       
                   </div>
                   
                    
                    
                    
                </div>
            </div>
   
</div>

                </div></div>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/vue-router"></script>
<script type="text/javascript">


    new Vue({
        
        el: '#app',
        data: function () {
  return {
     url:@json($slug),
    errors:[],
    film:[],
    comments:[],
    newcomment:{
        filmid:'',
        comments:''

    }
  }
},
mounted(){

  // var url =last( window.location.pathname.split( '/' ) ); 
  
this.fetchfilms();
},

        methods: {
            fetchfilms: function (q) {
                  var app = this;
                var page_url = '/api/film/'+this.url;
                axios
    .get(page_url)
    .then(response => {
        console.log(response.data)
       app.film=response.data.film;
       app.newcomment.filmid=response.data.film.id;
       app.comments=response.data.comments;

  
    })
    .catch(function (error) {
      console.log(error)
    })

            },

        savecomment: function ()
        {
             let api_token = document.head.querySelector('meta[name="api_token"]');
               axios.defaults.headers.common['Authorization'] = 'Bearer ' + api_token.content;
                  event.preventDefault();
                  var app = this;
                  var newcomment=this.newcomment;
                axios.post('/api/addcomment',newcomment)
    .then(response => {

        if(response.data.errors)
        {
        app.errors=response.data.errors;
          console.log(app.errors);
        }
        else
         {
              app.comments=response.data.comments;
           
        }
        
      
    })
    .catch(function (error) {
         var app = this;
         alert(error);
      console.log(error)
    })



        }
           
            }
        
    });
</script>
@endsection
