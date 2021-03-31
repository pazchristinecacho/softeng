<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     <h2>NYSE Stock</h2>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Stock Name</th>
        <th>Stock Price</th>
        <th>Description</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($stocks as $stock)
      <tr>
        <td>{{$stock['id']}}</td>
        <td>{{$stock['stockname']}}</td>
        <td>{{$stock['stockprice'].'$'}}</td>
        <td>{{$stock['description']}}</td>

        <td><a href="{{action('StockController@edit', $stock['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('StockController@destroy', $stock['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>