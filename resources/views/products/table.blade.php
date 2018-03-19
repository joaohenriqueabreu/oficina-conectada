<table class="table table-responsive" id="products-table">
    <thead>
        <tr>
            <th>Url</th>
        <th>Email</th>
        <th>Title</th>
        <th>Description</th>
        <th>Logo Url</th>
        <th>Encrypt</th>
        <th>Callback Url</th>
        <th>Public Token</th>
        <th>Private Token</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $products)
        <tr>
            <td>{!! $products->url !!}</td>
            <td>{!! $products->email !!}</td>
            <td>{!! $products->title !!}</td>
            <td>{!! $products->description !!}</td>
            <td>{!! $products->logo_url !!}</td>
            <td>{!! $products->encrypt !!}</td>
            <td>{!! $products->callback_url !!}</td>
            <td>{!! $products->public_token !!}</td>
            <td>{!! $products->private_token !!}</td>
            <td>
                {!! Form::open(['route' => ['products.destroy', $products->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('products.show', [$products->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('products.edit', [$products->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>