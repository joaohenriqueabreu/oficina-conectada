<table class="table table-responsive" id="subscriptions-table">
    <thead>
        <tr>
            <th>Title</th>
        <th>Description</th>
        <th>Price</th>
        <th>Trial</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($subscriptions as $subscription)
        <tr>
            <td>{!! $subscription->title !!}</td>
            <td>{!! $subscription->description !!}</td>
            <td>{!! $subscription->price !!}</td>
            <td>{!! $subscription->trial !!}</td>
            <td>
                {!! Form::open(['route' => ['subscriptions.destroy', $subscription->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('subscriptions.show', [$subscription->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('subscriptions.edit', [$subscription->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>