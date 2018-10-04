@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                List Of films

           <div style="float: right;"> @auth
            <a class="btn btn-info" href="/films/create">Add New</a>
            @endauth
           </div>
            </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<div id="app">

   
    <table class="table">
        <thead>
       
        <th width="10%">Name</th>
        <th width="40%">Description</th>
        <th width="5%">Realease Date</th>
        <th width="5%">Rating</th>
        <th width="5%">Ticket Price</th>
       <th width="10%">Country</th>
        <th width="20%">Genre</th>
        <th>Photo</th>
        <th>View</th>

    </thead>
        <tr v-for="(film ,index) in films">
            
            <td>@{{film.name}}</td>
            <td>@{{film.description}}</td>
             <td>@{{film.release_date}}</td>
              <td>@{{film.ratings}}</td>
               <td>$@{{film.ticket_price}}</td>
                <td>@{{film.country}}</td>
                 <td>@{{film.genrs}}</td>
                  <td><img :src="film.photo" width="150" height="200"></td>
                    <td><a :href="'film/'+film.film_slug">View</td>
                  
        </tr>
    </table>

    <div class="col-md-8">
        <nav aria-label="Page navigation example">
 <div class="pagination">
    <button class="btn btn-default" @click="fetchfilms(pagination.prev_page_url)"
            :disabled="!pagination.prev_page_url">
        Previous
    </button>
    <span>Page @{{pagination.current_page}} of @{{pagination.last_page}}</span>
    <button class="btn btn-default" @click="fetchfilms(pagination.next_page_url)"
            :disabled="!pagination.next_page_url">Next
    </button>
</div>
</nav>
    </div>
</div>
     {{-- <div class="pagination">
    <button class="btn btn-default" @click="fetchStories(pagination.prev_page_url)"
            :disabled="!pagination.prev_page_url">
        Previous
    </button>
    <span>Page @{{pagination.current_page}} of @{{pagination.last_page}}</span>
    <button class="btn btn-default" @click="fetchStories(pagination.next_page_url)"
            :disabled="!pagination.next_page_url">Next
    </button>
</div> --}}
</div>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">


    new Vue({
        el: '#app',
        data: function () {
  return {
    message:'aamie',
    films:'',
   pagination: {}
  }
},
 mounted()
          {
        this.fetchfilms();   
        },
        methods: {
            fetchfilms: function (page_url) {
                  var app = this;
                var page_url = page_url || '/api/films';
                axios
    .get(page_url)
    .then(response => {
        console.log(response.data.data)
       app.films=response.data.data;
       app.makePagination(response.data);
    })
    .catch(function (error) {
      console.log(error)
    })

            },
            makePagination: function(data){
                var self=this;
                var pagination = {
                    current_page: data.current_page,
                    last_page: data.last_page,
                    next_page_url: data.next_page_url,
                    prev_page_url: data.prev_page_url
                }
                self.pagination=pagination;
              
            }
        }
    });
</script>
@endsection
